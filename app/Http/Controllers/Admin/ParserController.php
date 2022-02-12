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
        dd($loaded);

        foreach ($loaded['news'] as $news) {
            $created = News::create([
                'title' => $news['title'],
                'slug' => $news['link'],
                'description' => $news['description'],
                'category_id' => 4,
            ]);

            if($created) {
                dump('Created!');
            } else {
                dd('Не удалось добавить запись');
            }
        }
        
    }
}
