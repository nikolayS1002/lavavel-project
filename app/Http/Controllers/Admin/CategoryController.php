<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('news')->paginate(5);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $request->validate([
            'title' => ['required']
        ]);
        dump($request->all());

        $created = Category::create(
            $request->only(['title', 'description'])
        );

        if($created) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param $category
     * @return void
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $category
     * @return void
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Category $category
     * @return void
     */
    public function update(EditRequest $request, Category $category)
    {
            $updated = $category->fill($request->only(['title', 'description']))
                ->save();

            if($updated) {
                return redirect()->route('admin.categories.index')
                    ->with('success', 'Запись успешно обновлена');
            }

            return back()->with('error', 'Не удалось добавить запись')
                ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @return void
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return response()->json('ok');
        }catch (\Exception $e) {
            \Log::error("Error delete news item");
        }
    }
}
