<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SearchLog;

class SearchController extends Controller
{
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

}
