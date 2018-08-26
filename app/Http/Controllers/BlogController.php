<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts=Post::paginate(5);
        $categories=Categories::all();
        return view('Admin.blog.posts',compact('posts','categories'));
    }
    public function article($id){
        if($id !=''&& $id !=null){

            $post=Post::where('id',$id)->first();
            return view('Admin.blog.post',compact('post'));
        }
        return redirect()->back();
    }

    public function search($word){
        $category_id=Categories::where('title','=',$word)->get()->pluck('id');
        $categories=Categories::all();
        $posts=Post::where("category_id",'=',$category_id)->paginate(5);
        return view ("Admin.blog.postsSearch",compact('posts','categories','word'));
    }


}
