<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\UploadService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::query()
            ->whereHas('category')
            ->with('category')
//            ->select(News::$availableFields)
            ->paginate(5);

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $created = News::create(
            $request->validated() + [
                'slug' => \Str::slug($request->input('title'))
            ]
        );

        if($created) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    public function Parse($news, $category_id){
        $created = News::create($news + [
                'category_id' => $category_id,
            ]);

        if($created) {
                dump('Created!');
            } else {
                dd('Не удалось добавить запись');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return void
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return void
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return void
     */
    public function update(EditRequest $request, News $news)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = app(UploadService::class)->start($request->file('image'));
        }
        $updated = $news->fill($validated)->save();




        if($updated) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return void
     */
    public function destroy(News $news)
    {
        try{
            $news->delete();
            return response()->json('ok');
        }catch (\Exception $e) {
            \Log::error("Error delete news item");
        }
    }
}
