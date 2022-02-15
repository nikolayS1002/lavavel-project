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

        foreach ($loaded['news'] as $news) {
            News::Parse($news, 4);

//            News::create($news + [
//                    'category_id' => 4,
//                    'slug' => $news['link'],
//                ]);
//
//            if($created) {
//                dump('Created!');
//            } else {
//                dd('Не удалось добавить запись');
//            }
        }

    }
}
