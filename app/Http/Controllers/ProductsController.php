<?php

namespace App\Http\Controllers;

use App\DataTables\productDatatable;
use App\Http\Requests\productRequest;
use App\Models\Categories;
use App\Models\products;
use App\Models\ProductsPhoto;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kalnoy\Nestedset\Collection;
use Image; //Intervention Image
use Illuminate\Support\Facades\Storage; //Laravel Filesystem


//TODO:optimize the product edit in this controller make the details in traits file or  create function in this class

//TODO:optimize the functions in this class and put them in another [class,traits,Repository pattern] choose the best choice

class ProductsController extends Controller
{

    /**
     * @var Product
     */
    private $product;

    public function __construct(products $product) {

        $this->product = $product;
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(productDatatable $productDatatable)
    {
        return $productDatatable->render('Admin.products.index',['title'=>'test yajara datatabbles']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories = $this->getCategoryOptions();
        return view('Admin.products.create', compact( 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $input)

    {
        //TODO: add General tag to the product that the user doesn't add tag to them OR Don't add General tag but handle the empty $productTags in the blade file of edit [Admin]

        $input['category_id']=$input['category'];

//        dd($input);
        $product=$this->product->create($input->all()); //save the product
//        $category=$input->category;//product's category to use it in the pivot table

        if($product){//check if  the product saved already
            //TODO: Associate the product to the user who enter it

            /**=====attach the category and tags to the product========*/
            // dd($input);
            $this->AttachTags($product,$input);
            

        }
        return redirect()->route('products.index')
            ->with('flash_message',
                'product successfully stored.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=products::findOrFail($id);
        $productCateID=$product->category_id;

        //i'll make it as array -->Many Tags 
        $productTags=$product->Tags;

        foreach($productTags as $tag){
            $productTagsIDs[]=$tag->id;
        }
        foreach($productTags as $tag){
            $productTagsName[]=$tag->tag_name;
        }
        

        $Photos=$product->photos;
        
        foreach($Photos as $photo){
            $productPhotos[]=$photo->filename;
        }
        // dd($productPhotos);
        
        $AllTags=Tags::all();
        $categories=Categories::all();
        return view('Admin.products.edit',compact('product','categories','productCateID','AllTags','productTagsIDs','productPhotos','productTagsName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productRequest $request, $id)
    {

        $product=products::findOrFail($id);
         
         /*=========== update the product General info ============= */

            $input=$request->only('title','price','weight','quantity','small_description',  'large_description',
            'manufacturer');
            $product->fill($input)->save();

        /*=========== update the product category ================ */

        $categoryExists=Categories::findOrFail($request->category_id);
        if ($categoryExists){
            $product->categories()->sync([$request->category_id]);
        }

        /**================== update the product_tags ============= */
        $this->updateProductTags($request,$product);

        /**======== update the image part [delete the old ones,and replace it with new]===== */
        if($request->photo != null)
            $this->updateProductImgs($product,$request);

            return redirect()->route('products.index')
            ->with('flash_message',
                'product successfully updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=products::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')
        ->with('flash_message',
            'product successfully deleted.');
    }



    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items)
    {

        $options = [ '' => 'Category' ];

        foreach ($items as $item)
        {
            $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->title;
        }

        return $options;
    }




    /**
     * @param Category $except
     *
     * @return CategoriesController
     */
    protected function getCategoryOptions($except = null)
    {

        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Categories::select('id', 'title')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

public function storeMultImages($input,$ProductID){

    $i=1;
    $storageFileLg='public/products/Lg/';
    $storageFileXs='public/products/Xs/';

    /**  save the images of the product in productsPhoto table **/
    foreach($input->photo as $photo){
        // dd($photo);
        //get file extension
        $extension = $photo->getClientOriginalExtension();

        Storage::put($storageFileLg.$ProductID."_" .$i. "." .$extension, fopen($photo, 'r+'));
        Storage::put($storageFileXs.$ProductID."_" .$i. "." .$extension, fopen($photo, 'r+'));

       

        // dd($extension);
            //Resize image here
            $thumbnailpath = public_path('storage/products/Xs/'.$ProductID."_".$i. "." .$extension);

            // $thumbnailpath= "/storage/app/".$storageFileXs.$ProductID."_".$i;
            // dd($thumbnailpath);
            $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);


            //store the product image => for showcase in the product page Website part
            if($i==1){
             $product=products::findOrFail($ProductID);
             $product->image= $ProductID."_".$i. "." .$extension;
             $product->save();
//             dd($product->image);
            }


            $filename=$ProductID."_" .$i. "." .$extension;

            $i+=1;

        
        //put the photo in pivot table productsPhoto
        ProductsPhoto::create([
            'product_id'=>$ProductID,
            'filename'=>$filename
        ]);

    }
    return redirect()->route('products.index')
    ->with('flash_message',
        'product successfully updated.');

}
    


public function updateProductTags($request,$product){

    $productTags[]=$request->tags;
        for($i=0;$i<count($productTags[0]);$i++){

            //check if the tag is int & in the tag table
            if( is_numeric( $productTags[0][$i]) ){
                $tag=Tags::findOrFail($productTags[0][$i]);

                if ($tag){ // if the tag is exists in tags table ... then update the pivit table product_tag
                    //check if the product_tag row exists in the pivate for the selected product  if not exists add it

                     $productTag=$product->Tags()->where('tag_id',$tag->id)->first();

                     if($productTag == null){
                         $product->Tags()->attach($tag->id);
                     }
                }
            }else{
                $newtag=new Tags();
                $newtag->tag_name=$productTags[0][$i];
                $newtag->save();
                $product->Tags()->attach($newtag->id);

            }

        }

} 

public function updateProductImgs($product,$input){

/**======Delete the product images from the storage and from the products_photos table==*/

    //get the photos names from the products_photos table
    $productPhotos=$product->photos;
     foreach($productPhotos as $productPhoto){
         $photos[]=$productPhoto->filename;
     }
    
     //Delete the photos from the storage if exists
     for($i=0;$i<count($productPhotos);$i++){

        if(Storage::exists('public/products/Lg/'.$photos[$i])){
            Storage::delete('public/products/Lg/'.$photos[$i]);
        }
        if(Storage::exists('public/products/Xs/'.$photos[$i])){
            Storage::delete('public/products/Xs/'.$photos[$i]);
        }
            
     }

     
     //Delete the photos rows from the products_photos table
     for($i=0;$i<count($productPhotos);$i++){
         $photoRow=ProductsPhoto::where('filename',$photos[$i]);
        $photoRow->delete();
     }

        
    

    //store the new product photos
    $this->storeMultImages($input,$product->id);

    
    // return redirect()->route('products.index')
    // ->with('flash_message',
    //     'product successfully updated.');



}


public function AttachTags($product,$input){





//    $product->categories()->attach($category);// attach the category to the product

        //   dd($input->tags);
            foreach ($input->tags as $tag){// save the product Tags 
                    //if the tag exists before don't add it if not add it   
                $tagQuery=Tags::where('tag_name',$tag)->first();
                
                if($tagQuery==null){
                    $newtag=new Tags();
                    $newtag->tag_name=$tag;
                    $newtag->save();
                    $product->Tags()->attach($newtag->id);
                }else{
                    //attach the product to the previous stored tag
                    $product->Tags()->attach($tagQuery->id);
                }
               
            }
            //store Multi photoes for the product 
            if ($input->hasFile('photo')) {
                $this->storeMultImages($input,$product->id);
            }

           
}




}
