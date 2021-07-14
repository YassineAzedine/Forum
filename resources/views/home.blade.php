
@extends('layouts.app')

@section('content')
<div class="container-fluid bg-info   ">
    <div class="row justify-content-start">
        <div class="col-md-4">
           
            <div class="card text-white bg-primary mb-3">
                <div class="card-header bg-primary text-center ">Categories</div>
                <div class="card-body ">
                    <ul class="list-group">

                        @foreach($categories as $categorie)
                            <li class="list-group-item">
                                <a href="{{route('questions.category',$categorie->slug)}}">{{$categorie->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
            <div class="card">
                <div class="p-2 my-3">
                    <a href="{{route('questions.create')}}" class="btn btn-primary">Ajouter Une Question</a>
                </div>
                <div class="card-header bg-primary text-center text-white">Questions</div>
                        <div class="card-body row">
                            @foreach($questions as $question)
                        <div class="col-md-4">
                            <div class="mt-4 d-flex justify-content-center align-items-center flex-column">
                                <a href="{{route('questions.addVote',$question->slug)}}">
                                    <i class="fa fa-chevron-up bg-primary rounded p-1 text-white fa-x2"></i>
                                </a>
                                <p class="mt-3 lead">
                                   {{$question->votes}}
                                </p>
                                <a href="{{route('questions.removeVote',$question->slug)}}">
                                    <i class="fa bg-primary text-white rounded p-1 fa-chevron-down fa-x2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="media bg-light rounded shadow-sm bg-light p-2 my-2">
                            <div class="media-body">
                                <div class="d-flex justify-content-start align-items-start flex-column ">
                                  <img src=" {{$question->user->getAvatarUrl()}}" alt="">
                                    <p class="lead">Par :  {{$question->user->name}}</p>
                                    <p class="bg-danger text-white rounded p-2">{{$question->created_at->diffForhumans()}}</p>
                                </div>
                                <h3><a href="{{route('questions.show',$question -> slug)}}">{{$question->title}}</a></h3>
                                <p class="lead">
                                    <p>{{ Str::limit($question -> body,300) }}</p>

                                </p>
                                <div class="d-flex p-2 m-2 p-3 mb-5">
                                @if(auth()->user()->id === $question->user->id)
                                <h3><a  href="{{url('questions/'.$question -> id.'/edit') }}"><i class="far fa-edit fa-lg"></i></a></h3>
                          
                                @endif
                                <form action="{{url('questions/' .$question->id ) }}" method="POST" >
                              @csrf
                                {{method_field('DELETE')}}
                               @if(auth()->user()->id === $question->user->id)
                                <h3>  <button class="badger btn-danger" type="submit" ><i class="fas fa-trash-alt  "></i>  </button></h3>
                                @endif 
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    {{{$questions->links()}}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection