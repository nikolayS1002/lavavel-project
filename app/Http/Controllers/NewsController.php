<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->select(
            News::$availableFields
        )->paginate(6);
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }

    public function add()
    {
        return view('news.add');
    }
}
