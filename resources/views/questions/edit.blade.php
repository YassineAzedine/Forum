
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Modifier une question</div>
                <div class="card-body">
                    <form method="post" action="{{url('questions/'.$question->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Titre" class="form-control" value ="{{$question->title}}">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description" name="body" rows="5" cols="30" >{{$question->body}}</textarea>
                        </div>
                        <div class="form-group">
                           <select class="form-control" name="category_id" value="{{old('category_id')?? $question->category_id}}">
                          
                          
                                <option selected="" disabled>Veuillez choisir une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option {{$question->category_id === $categorie->id ? "selected" : ""}}  value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                  Modifier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection