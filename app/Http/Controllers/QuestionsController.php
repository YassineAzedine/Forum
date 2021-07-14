<?php

namespace App\Http\Controllers;
use App\Question;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Str;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        Carbon::setLocale('fr');
        $questions = Question::latest()->paginate(10);
        $categories =Category::all();
        return view('home')->with([
            'questions'=>$questions,
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
      
        return view ('questions.create')->with([
         

            'categories'=>$categories

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        //
        Question::create([
            'title'=>$request->title,
            'body' =>$request->body,
            'slug'=>Str::slug($request->title),
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect('/home')->withSuccess('Question ajoutée');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        $categories = Category::has('questions')->get();
          
        return view('questions.show')->with([
            'question'=>$question,
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $categories=Category::find($id);
         
        $question=question::find($id);
        $categories = Category::has('questions')->get();
        return view('questions.edit')->with([
            'question'=>$question,
            'categories'=>$categories
             
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $question = Question::find($id);
       $question->title =$request ->input('title');
       $question->body = $request ->input('body');
       $question->category_id = $request ->input('category_id');
       $question ->save();

        
           
    
        return redirect('/home')->withSuccess('Question modifie');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request ,$id)
    {
        //
        $question = Question::find($id);
        $question ->delete();

        return redirect('/home')->withSuccess('Question supprimer');

    }
    public function addVote(Question $question){
        $question ->increment('votes');
        return redirect()->back();
    }
    public function removeVote(Question $question){
        $question ->decrement('votes');
        return  redirect()->back();
    }
    public function category(Category $category)
    {
        //
        Carbon::setLocale('fr');
        $questions = Question::where('category_id',$category->id)->latest()->paginate(10);
        $categories =Category::all();
        return view('home')->with([
            'questions'=>$questions,
            'categories'=>$categories
        ]);
    }
}
