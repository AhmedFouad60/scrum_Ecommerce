<?php

namespace App\Http\Controllers;

use App\DataTables\blogDatatable;
use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(blogDatatable $blogDatatable)
    {
        return $blogDatatable->render('Admin.blog.admin.index');    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categories::all();
        return view ('Admin.blog.admin.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());

        //store [title , body , excerpt , author_id=>authUser,imagePath,category_id]

        $this->validate($request, [
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

        $request['author_id']=Auth::user()->id;

        $post=Post::create($request->all());

        if($post){
            return redirect()->route('blog.index')
                ->with('flash_message',
                    'Post successfully added.');
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
        $post=Post::findOrFail($id);
        $categories=Categories::all();
        //status [DRAFT,PUBLISHED,PENDING]
        $state=array('DRAFT','PUBLISHED','PENDING');

        return view('Admin.blog.admin.edit',compact('post','categories','state'));
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

        $post=Post::findOrFail($id);

        $this->validate($request, [
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

       $post->fill($request->all())->save();

        if($post){
            return redirect()->route('blog.index')
                ->with('flash_message',
                    'Post successfully Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a user with a given id and delete
        $post=Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')
            ->with('flash_message',
                'Post successfully deleted.');

    }
}
