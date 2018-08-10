<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Tags;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $text=$request['search'];

        /*** Search for the product with the product name **/
        $product=products::where('title','like','%'.$text.'%')->paginate(3);

        /*** Search for the product with the product Tag **/
        $productTags=products::whereHas('Tags',function($query) use ($text){
            return $query->where("tag_name",'like','%'.$text.'%');
        })->paginate(3);

        /*** Search for the product with the product Tag **/
        $productCategories=products::whereHas('categories',function($query) use ($text){
            return $query->where("title",'like','%'.$text.'%');
        })->paginate(3);

        $total=$product->total() + $productCategories->total() + $productTags->total();

        $items=array_merge($product->items(),$productTags->items(),$productCategories->items());
        $itemsCollection=collect($items)->unique();

        $currentPage=\Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

//        $count=count($itemsCollection) == 0 ? 1:count($itemsCollection);

        $page=new \Illuminate\Pagination\LengthAwarePaginator($itemsCollection,$total,3,$currentPage);

        // not related to search but i need to Fetch avaliable tags so  the user can use it to search in the search page
        $tags=Tags::all();



//dd($page);
        return view ('Website.search.index',compact('page','text','total','tags'));



    }
}
