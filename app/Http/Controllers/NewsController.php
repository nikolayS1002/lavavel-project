<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();
        return view('news.index', [
            'news' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNewsById($id);

        return view('news.show', [
            'newsItem' => $news
        ]);
    }

    public function add()
    {
        return view('news.add');
    }
}
