<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest; 
use App\Post;
use App\Catagory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')->with('catagories', catagory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
      $image = $request->image->store('posts');
      
      post::create([
        'title' =>$request->title,
        'description'   => $request->description,
        'content'   =>$request->content,
        'image' => $image,
        'status' => true,
        'publish_at' => $request->publish_at,
        'catagory_id' => $request->catagory
      ]);

      session()->flash('message', "Post has been create Successfully.");
      return redirect()->route('post.index');
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
    public function edit(Post $post)
    {
        return view('post.create')->withPost($post)->withCatagories(catagory::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'publish_at']);

        if($request->hasFile('image')) {
            $image = $request->image->store('posts');
            // Storage::delete($post->image);
             $post->deleteImage();
            $data['image'] = $image;
            $data['catagory_id'] = $request->catagory;

        }

        $post->update($data); 
        Session()->flash('message', 'Update Successfully');

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed()) {
            // Storage::delete($post->images);
            $post->deleteImage();
            $post->forceDelete();

        } else {
            $post->delete();   
             session()->flash('message', 'Trash Successfully');
        }

       
        return redirect(route('post.index'));
    }


    public function trashPost(){

        $trashed = Post::onlyTrashed()->get(); 
        return view('post.index')->withPosts($trashed);
    }

    public function restorePost($id){
        
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('message', 'Restore Successfully');
        return redirect()->back();
    }
}
