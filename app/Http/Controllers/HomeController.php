<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }


    public function feedback(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        dump($request->all());
    }

    public function data(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $data = $request->except(['_token']);
        dump($data);

        file_put_contents('files/document.txt', $data,FILE_APPEND | LOCK_EX);

        $newData = file_get_contents('files/document.txt', True);
        dump($newData);
    }
}
