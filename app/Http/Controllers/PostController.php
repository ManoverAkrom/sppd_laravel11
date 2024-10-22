<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $title = '';

        if (request('category')) { 
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in Category: ' . $category->name;
        }
        if (request('author')) { 
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        
        return view('posts', [
            'title' => 'Articles' . $title,
            // Tampilkan Search dulu jika ada baru semua posts
            'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }
}
