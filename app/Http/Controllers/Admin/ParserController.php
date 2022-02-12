<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\News\LoadRequest;
use App\Models\News;
use XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $service)
    {
        $loaded = $service->load('https://news.yandex.ru/politics.rss')
                    ->start();
        dd($loaded['title']);
                   
        // News::create([
        //     'title' => $request->get('title'),
        //     'description' => $request->get('display_name'),
        //     'description' => $request->get('description'),
        // ]);

        $created = News::create([
            'title' => $loaded['news'][0]['title'],
            'slug' => $loaded['news'][0]['link'],
            'description' => $loaded['news'][0]['description'],
            'category_id' => $loaded['title'],
        ]);

        if($created) {
            dd('Created!');
        } else {
            dd('Не удалось добавить запись');
        }


        
        $created = News::create(
            $request->validated() + [
                'slug' => \Str::slug($request->input('title'))
            ]
        );
        
    }
}
