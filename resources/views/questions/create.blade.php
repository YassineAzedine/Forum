
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(!empty($errors))
            @foreach($errors->all() as $error)
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    </li>
                </ul>
            @endforeach
        @endif
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Ajouter une question</div>
                <div class="card-body">
                    <form method="post" action="{{route('questions.store')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Titre" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description" name="body" rows="5" cols="30"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category_id">
                                <option selected="" disabled>Veuillez choisir une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection