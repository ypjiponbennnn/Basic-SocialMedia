<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class SocialController extends Controller
{
    public function index(Request $req) {
        $posts = Post::with('tags')->get();
        return view('home')->with("posts", $posts);
    }

    public function create(Request $req) {
        $post = new Post;
        $post->title = $req->title;
        $post->content = $req->content;
        $post->save();
        if ($post->exists) {
            // Check if tags exist before attaching
            $tagIds = [1, 2, 3]; // IDs of tags to attach
    
            // Fetch existing tags
            $existingTags = Tag::whereIn('id', $tagIds)->pluck('id')->toArray();
    
            if (!empty($existingTags)) {
                // Attach only existing tags to the post
                $post->tags()->attach($existingTags);
            } else {
                // Handle the case where none of the tags exist
                // Maybe log an error or notify the user
                return redirect()->back()->withErrors(['tags' => 'No valid tags found to attach.']);
            }
        }
        
        // $post->tags()->attach([1, 2, 3]);
        return redirect()->back()->withErrors(['tags' => 'Yay.']);
    }
}
