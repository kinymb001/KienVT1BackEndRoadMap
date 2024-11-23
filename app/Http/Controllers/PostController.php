<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.content', 'categories.name as category_name', 'users.name as user_name')
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('posts.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $users = User::all();
        return view('posts.edit', compact('post', 'categories', 'users'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    //----------------------------------------------------------------------------------------------------
    public function indexAPI()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    // Lấy thông tin chi tiết bài viết
    public function showAPI(Post $post)
    {
        return response()->json($post);
    }

    // Tạo mới bài viết
    public function storeAPI(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create($validatedData);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }

    // Cập nhật bài viết
    public function updateAPI(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $post->update($validatedData);

        return response()->json(['message' => 'Post updated successfully', 'post' => $post]);
    }

    // Xóa bài viết
    public function destroyAPI(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
