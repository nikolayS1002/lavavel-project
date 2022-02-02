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
        $categories = Category::with('news')->paginate(3);

        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function getNewsByCategory($id)
    {
        $categoryNews= News::query()->select(
            News::$availableFields
        )
            ->where('category_id', '=', $id)
            ->paginate(6);

        return view('news.category', [
            'categoryNews' => $categoryNews
        ]);
    }
}
