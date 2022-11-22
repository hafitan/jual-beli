<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        // check validation fails
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // create posts
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // return response
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan!',
            'data' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // define validation fails
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        // check if validation  fails
        if($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        // create post
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // return response
        return response()->json([
            'success' => true,
            'message' => 'Data telah diupdate!',
            'data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete post by id
        POST::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!'
        ]);
    }
}
