<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TinController extends Controller
{
    public function index()
    {
        $tinMoi = Article::orderBy('published_at', 'desc')->take(3)->get();
        $tinNong = Article::orderBy('views', 'desc')->take(3)->get();
        
        $categoryBongDa = Category::where('name', 'Bóng Đá')->first();
        $tinBongDa = $categoryBongDa ? Article::where('category_id', $categoryBongDa->id)->orderBy('published_at', 'desc')->get() : collect();
        
        $categoryDuLich = Category::where('name', 'Du Lịch')->first();
        $tinDuLich = $categoryDuLich ? Article::where('category_id', $categoryDuLich->id)->orderBy('published_at', 'desc')->get() : collect();
        
        $categorySucKhoe = Category::where('name', 'Sức Khỏe')->first();
        $tinSucKhoe = $categorySucKhoe ? Article::where('category_id', $categorySucKhoe->id)->orderBy('published_at', 'desc')->get() : collect();

        return view('home', compact('tinMoi', 'tinNong', 'tinBongDa', 'tinDuLich', 'tinSucKhoe'));
    }

    public function tinBongDa()
    {
        $categoryBongDa = Category::where('name', 'Bóng Đá')->first();
        $tinBongDa = $categoryBongDa ? Article::where('category_id', $categoryBongDa->id)->orderBy('published_at', 'desc')->get() : collect();
        
        return view('bongda', compact('tinBongDa'));
    }

    public function tinDuLich()
    {
        $categoryDuLich = Category::where('name', 'Du Lịch')->first();
        $tinDuLich = $categoryDuLich ? Article::where('category_id', $categoryDuLich->id)->orderBy('published_at', 'desc')->get() : collect();
        
        return view('dulich', compact('tinDuLich'));
    }

    public function tinSucKhoe()
    {
        $categorySucKhoe = Category::where('name', 'Sức Khỏe')->first();
        $tinSucKhoe = $categorySucKhoe ? Article::where('category_id', $categorySucKhoe->id)->orderBy('published_at', 'desc')->get() : collect();
        
        return view('suckhoe', compact('tinSucKhoe'));
    }

    public function chitiet($id)
{
    // Lấy bài viết theo ID
    $article = Article::findOrFail($id);

    // Lấy các bình luận liên quan đến bài viết
    $comments = $article->comments()->with('user')->get();

    // Truyền biến đúng cho view
    return view('chitiet', compact('article', 'comments'));
}

public function search(Request $request)
{
    $keyword = $request->input('search');

    // Kiểm tra biến keyword có giá trị không
    if (empty($keyword)) {
        return redirect()->back()->withErrors(['search' => 'Từ khóa tìm kiếm không thể để trống.']);
    }

    // Ghi log tìm kiếm
    SearchLog::create([
        'user_id' => auth()->id(), // Nếu có
        'keyword' => $keyword
    ]);

    // Thực hiện tìm kiếm
    $results = DB::table('articles')
        ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$keyword])
        ->get();

    // Trả về view với biến keyword và kết quả tìm kiếm
    return view('search.search_results', [
        'keyword' => $keyword,
        'results' => $results
    ]);
}

    public function storeComment(Request $request, $id)
{
    $validated = $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    Comment::create([
        'article_id' => $id,
        'user_id' => Auth::id(),
        'content' => $validated['content'],
    ]);

    return redirect()->route('chitiet', ['id' => $id])->with('success', 'Bình luận đã được thêm!');
}
}
