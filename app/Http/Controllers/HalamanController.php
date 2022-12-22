<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function explore()
    {
        $des = Destination::all();
        $categories = Category::all();
        return view('explore', [
            'destination' => $des,
            'categories' => $categories
        ]);
    }
}
