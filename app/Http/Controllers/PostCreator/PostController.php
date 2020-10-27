<?php

namespace App\Http\Controllers\PostCreator;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostInsertFormRequest;
use App\Http\Requests\PostUpdateFormRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all()->sortByDesc('created_at');
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $user=Auth::user();
        return view('backend.post.create',compact('categories','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostInsertFormRequest $request)
    { 
        $this->validate($request, [
            'photo_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         $_photo=$request->file('photo_file');
         //return $request->file('photo_file');
        $filename='';
        if(!empty($_photo)){
            $filename=uniqid().'_'.$_photo->getClientOriginalName();
            $_photo->move(public_path().'/uploads/',$filename);              
        }

        $slug=uniqid();
        Post::create([
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'slug'=>$slug,
            'user_id'=>$request->get('user_id'),
            'img'    =>$filename,
        ]);
        return redirect('postcreator/post/create')->with('status','successfully created new post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $post=Post::find($id);
        $comments=$post->comments;//polimorphic
        return view('backend.post.single',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $post=Post::find($id);
        return view('backend.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateFormRequest $request, $id)
    {
        $post=Post::find($id);
        $post->title=$request->get('title');
        $post->content=$request->get('content');
        $post->cat_id=$request->get('category');
        $post->update();
        return redirect(action('postcreator\PostController@edit',$id))->with('status','Successfully edited');
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
}
