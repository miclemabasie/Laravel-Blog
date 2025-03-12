<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10); // Fetch posts with pagination
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string',
        ]);

        Post::create([
            'user_id' => Auth::id(), // Assign the logged-in user's ID
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $validated['image'],
            'published' => $request->input('published', false),
        ]);

        return redirect()->route('index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string',
        ]);

        // Update the post fields with the validated data
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $validated['image'],
            'published' => $request->input('published', false),
        ]);

        // Redirect to the post show route with success message
        return redirect()->route('post.show', $post->id)
            ->with('success', 'Post updated successfully.')
            ->with('post', $post); // Pass the updated post to the next page
    }


    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        // if ($post->image_path) {
        //     Storage::disk('public')->delete($post->image_path); // Delete image
        // }

        $post->delete();
        return redirect()->route('profile', Auth::id())->with('success', 'Post deleted successfully.');
    }

    // make a comment on a post
    public function comment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);
        dump($post);
        Comment::create([
            'user_id' => Auth::id(), // Assign the logged-in user's ID
            'post_id' => $post->id, // Assign post id to the current post
            'content' => $validated['comment'],
        ]);

        // Redirect to the post show route with success message
        return redirect()->route('post.show', $post->id)
            ->with('success', 'your comment was saved!.')
            ->with('post', $post); // Pass the updated post to the next page
    }


    public function destroyComment(Comment $comment)
    {
        // Get the post associated with the comment
        $post = $comment->post;

        // Delete the comment
        $comment->delete();

        // Redirect to the post's detail page
        return redirect()->route('post.show', $post->id)
            ->with('success', 'Comment deleted successfully.');
    }



}
