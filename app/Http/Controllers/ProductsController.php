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
        /**save the product**/
        $product=$this->product->create($input->all());

        //product's category to use it in the pivot table
        $category=$input->category;

        if($product){
            //get the product
            $RecentProduct=$this->product->find($product->id);

            /** associate the product to the user who enter it **/
            // $RecentProduct->user()->associate(Auth::user()->id);
            // $RecentProduct->save();

            /** attach the category to the product in the pivot table **/
            $RecentProduct->categories()->attach($category);


            /** save the product Tags **/
            foreach ($input->tags as $tag){
                $newtag=new Tags();
                $newtag->tag_name=$tag;
                $newtag->save();
                $RecentProduct->Tags()->attach($newtag->id);
            }
            //store Multi photoes for the product 
            if ($input->hasFile('photo')) {
                $this->storeMultImages($input,$RecentProduct->id);
            }

            return redirect()->route('products.index');

        }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            $filename=$img->save($thumbnailpath);

            $i+=1;

        
        //put the photo in pivot table productsPhoto
        ProductsPhoto::create([
            'product_id'=>$ProductID,
            'filename'=>$filename
        ]);

    }

}
    










}
