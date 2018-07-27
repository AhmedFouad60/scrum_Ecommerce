<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class WebsiteProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=products::paginate(5);
        return view('Website.Products.index',compact('products'));
    }


}
