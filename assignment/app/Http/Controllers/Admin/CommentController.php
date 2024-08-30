<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả các bình luận từ cơ sở dữ liệu
        $comments = Comment::with('article', 'user')->get();

        // Trả về view và truyền dữ liệu bình luận đến view
        return view('admin.comments', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Thông thường, bạn không cần phương thức này cho quản lý bình luận,
        // vì bình luận không được tạo trực tiếp từ giao diện quản trị.
        return redirect()->route('admin.comments.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Thông thường, bạn không cần phương thức này cho quản lý bình luận,
        // vì bình luận thường được tạo từ giao diện người dùng, không phải từ giao diện quản trị.
        return redirect()->route('admin.comments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Thông thường, bạn không cần phương thức này cho quản lý bình luận.
        return redirect()->route('admin.comments.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Thông thường, bạn không cần phương thức này cho quản lý bình luận.
        return redirect()->route('admin.comments.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Thông thường, bạn không cần phương thức này cho quản lý bình luận.
        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Xác thực rằng bình luận tồn tại
        $comment = Comment::findOrFail($id);

        // Xóa bình luận
        $comment->delete();

        // Redirect về trang quản lý bình luận với thông báo thành công
        return redirect()->route('admin.comments.index')->with('success', 'Bình luận đã được xóa.');
    }
}
