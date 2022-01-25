<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $model = new Category();
        $categories = $model->getCategories();

        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function getNewsByCategory($categoryId)
    {
        $categoryNews= \DB::table('news')
            ->select()
            ->where('category_id', '=', $categoryId)
            ->get();

        return view('news.category', [
            'categoryNews' => $categoryNews
        ]);
    }
}
