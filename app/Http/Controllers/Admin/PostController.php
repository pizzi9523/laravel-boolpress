<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'title' => 'required|unique:posts',
                'image' => 'required|image',
                'body' => 'nullable',
                'category_id' => 'nullable|exists:categories,id',
            ]

        );

        if ($request->file('image')) {
            $img_path = $request->file('image')->store('post-img');
            $validateData['image'] = $img_path;
        }


        $validateData['user_id'] = Auth::id();
        // ddd($validateData);
        $post = Post::create($validateData);

        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id'
            ]);
            $post->tags()->attach($request->tags);
            // ddd($request->tags);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        if (Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() === $post->user_id) {

            $validateData = $request->validate(
                [
                    'title' => [
                        'required',
                        'max:255',
                        Rule::unique('posts')->ignore($post->id),
                    ],
                    'image' => 'image',
                    'body' => 'nullable',
                    'category_id' => 'nullable|exists:categories,id',
                    'tags' => 'exists:tags,id'
                ]

            );

            $default_image_path = "post-img/t1LygGlKztPeFEugzjwIqqliwhSVRDcW8QAyi9dx.png";
            if ($request->file('image')) {

                $img_path = $request->file('image')->store('post-img');
                $validateData['image'] = $img_path;
                if ($post->image  !== $default_image_path) {
                    Storage::delete($post->image);
                }
            }


            $post->update($validateData);
            $post->tags()->sync($request->tags);

            return redirect()->route('admin.posts.index')->with('message', 'Modifica effettuata con successo');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() === $post->user_id) {

            Storage::delete($post->image);
            $post->delete();

            return redirect()->route('admin.posts.index')->with('message', 'Post eliminato con successo');
        } else {
            abort(403);
        }
    }
}