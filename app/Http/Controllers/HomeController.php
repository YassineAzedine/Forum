<?php

namespace App\Http\Controllers;
use App\Question;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         Carbon::setLocale('fr');
        $questions = Question::latest()->paginate(10);
        $categories = Category::has('questions')->get();
        return view('home')->with([
            'questions'=>$questions,
            'categories'=>$categories
        ]);
    }
}
