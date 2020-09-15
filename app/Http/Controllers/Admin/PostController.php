<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\PostCreatedMail;
use App\Mail\PostEditedMail;
use App\Mail\PostDeletedMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $user = Auth::user();
        return view('admin.posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();

        return view('admin.posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!Auth::check()) {
        abort('404');
      }

      // Validazione
      $request->validate($this->validationData());

      $request_data = $request->all();
      // dd($requested_data);



      // Nuova istanza Car
      $new_post = new post();
      $new_post->title = $request_data['title'];
      $new_post->content = $request_data['content'];
      $new_post->user_id = Auth::id();

      if (isset($request_data['image_path'])) {
        $path = $request->file('image_path')->store('images', 'public');
        $new_post->image_path = $path;
      }

      $new_post->save();

      Mail::to($new_post->user->email)->send(new PostCreatedMail());

      return redirect()->route('posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $posts = Post::all();

      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      if (!Auth::check()) {
        abort('404');
      }

      // Validazione
      $request->validate($this->validationData());

      $request_data = $request->all();

      $post->title = $request_data['title'];
      $post->content = $request_data['content'];
      $post->user_id = Auth::id();

      if (isset($request_data['image_path'])) {
        $path = $request->file('image_path')->store('images', 'public');
        $post->image_path = $path;
      } else {
        $post->image_path = '';
      }

      $post->update();

      $post->save();

      Mail::to($post->user->email)->send(new PostEditedMail());

      return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(post $post)
     {
         $post->delete();
         Mail::to($post->user->email)->send(new PostDeletedMail());
         return redirect()->route('posts.index');
     }

     public function validationData() {
       return [
         'title' => 'required|max:255',
         'content' => 'required|max:1000',
         'image_path' => 'image',
       ];
     }
}
