<?php

namespace App\Http\Controllers;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this ->validate($request,[
            'body'=>'required|min:10'
        ]);
        auth()->user()->replies()->create([
              'body'=>$request->body,
              'question_id'=>$request->question_id
        ]);
        return redirect()->back()->withSuccess('Reponse ajoutee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function markAsBest($id)
    {
        //
        $replies = Reply::all();

        foreach ($replies as $reply){
           $reply->bestAnswer =0 ;
           $reply ->save();

        }
        Reply::find($id)->update([
            'bestAnswer'=>1
        ]);
        return redirect()->back()->withSuccess('Reponse marque');

    }
    public function removeAsBest($id)
    {
        //
      
        Reply::find($id)->update([
            'bestAnswer'=>0
        ]);
        return redirect()->back()->withSuccess('Reponse retiree');

    }
    
   

}
