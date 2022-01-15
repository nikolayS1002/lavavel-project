<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getAllCategories();

        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function getNewsByCategory($categoryId)
    {
        $news = $this->getNews();
        $categoryNews = [];
        foreach ($news as $value){
            if ($value['category']['id'] == $categoryId) {
                $categoryNews[] = $value;
            }
        }

        return view('news.category', [
            'categoryNews' => $categoryNews
        ]);
    }
}
