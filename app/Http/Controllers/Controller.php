<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function getNews() : array
//    {
//        $faker = Factory::create();
//
//        $news = [];
//
//        for($i = 0; $i < 20; $i++) {
//            $news[] = [
//                'id' => $i,
//                'title' => $faker->jobTitle(),
//                'description' => $faker->text(250),
//                'author' => $faker->userName(),
//                'category' => $this->getAllCategories()[rand(0,4)],
//            ];
//        }
//
//        return $news;
//    }
//
//    public function getNewsById(int $id) : array
//    {
//        $faker = Factory::create();
//        return [
//            'id' => $id,
//            'title' => $faker->jobTitle(),
//            'description' => $faker->text(250),
//            'author' => $faker->userName(),
//            'category' => $this->getAllCategories()[rand(0,4)],
//        ];
//    }
//
//    public function getAllCategories() : array
//    {
//        $categories = [
//            ['id' => 0, 'category' => 'наука'],
//            ['id' => 1, 'category' => 'культура'],
//            ['id' => 2, 'category' => 'спорт'],
//            ['id' => 3, 'category' => 'политика'],
//            ['id' => 4, 'category' => 'экономика'],
//        ];
//
//        return $categories;
//    }
}
