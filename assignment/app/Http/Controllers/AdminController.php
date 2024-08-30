<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Quản lý danh mục
    public function showCategories() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory() {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request) {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function editCategory($id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    // Quản lý bài viết
    public function showArticles() {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function createArticle() {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function storeArticle(Request $request) {
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->image = $request->image;
        $article->save();
        return redirect()->route('admin.articles.index');
    }

    public function editArticle($id) {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function updateArticle(Request $request, $id) {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->image = $request->image;
        $article->save();
        return redirect()->route('admin.articles.index');
    }

    public function deleteArticle($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.articles.index');
    }

    // Quản lý comment
    public function showComments() {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function deleteComment($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }

    // Quản lý người dùng
    public function showUsers() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
