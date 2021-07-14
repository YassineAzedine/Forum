


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-4">
            <div class="p-2 ">
                <a class="btn btn-primary" href="{{route('questions.create')}}" >Ajouter</a>
                <a class="" href="{{route('home')}}" ><i class="fas fa-house-user"></i></a>
                

            </div>
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                   

                   <div class="card-body">
                       <ul class="list-group">
                   @foreach($categories as $categorie)
               <li class="list-group-item">
                <h6><a href="{{route('questions.category',$categorie->slug)}}">{{$categorie->name}}</a></h6>
               </li>
               @endforeach
            </ul>
                   </div>
                   <div class="d-flex justify-content-center align-items-center">
              

                   </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">                           <p>{{$question->user->title}}</p>
                </div>

                <div class="card-body">
                   

                 
                       <div class="col_md-4">
                        <div class="card">
                            @if(session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                
                            @endif
                            <div class="card-header">Questions</div>
                                    <div class="card-body row">
                                
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
                                            <div class="d-flex justify-content-start align-items-start flex-column">
                                               
                                                <p class="lead">Par :  {{$question->user->name}}</p>
                                                <p class="bg-danger text-white rounded p-2">{{$question->created_at->diffForhumans()}}</p>
                                            </div>
                                            <h3>{{$question->title}}</h3>
                                            <p class="lead">
                                                <p>{{ ($question -> body) }}</p>
                                            </p>
                                        </div>
                                    </div>
                                    </div>
               </div>
                  </div>
            </div>
                              </div>
                              <div class="col-md-8">
      
            <div class="card-header">
               Réponse
            </div>
            <div class="card-body">
                @foreach($question->replies as $reply)
                        
                        <div class="col-md-8">
                            <div class="media bg-light rounded shadow-sm bg-light p-2 my-2">
          
           <div class="d-flex align-items-end flex-column  ">
            @if($reply->bestAnswer)
            <span class="badge bg-success text-white p-2 my-3 shadow p-3 mb-5  rounded">Meilluere reponse</span>
  
             @endif

             @if(auth()->user()->id === $question->user->id)
            @if(!$reply->bestAnswer)
            <a href="{{route('replies.markAsBest',$reply->id)}}">
                <i class="far fa-star fa_2x"></i>
        </a>
        @else
        <a href="{{route('replies.removeAsBest',$reply->id)}}">
            <i class="fa fa-star fa_2x"></i>
            
        </a>
        @endif
        @endif
        </div>
   
                            <div class="media-body">
                                <div class="d-flex justify-content-start align-items-start flex-column">
                                   
                                    <p class="lead">Par :  {{$reply->user->name}}</p>
                                    <p class="bg-danger text-white rounded p-2">{{$reply->created_at->diffForhumans()}}</p>
                                </div>
                                <p class="lead">
                                    <p>{{ ($reply -> body) }}</p>
                                </p>
                            </div>
                        </div>
                        </div>
                        @endforeach
            </div>
                                  <div class="card-header">
                                      Ajouter une reponse
                                  </div>
                                  <div class="card-body">
                                    <form method="post" action="{{route('replies.store')}}">
                                        @csrf
                                      
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="reponse" name="body" rows="5" cols="30"></textarea>
                                        </div>
                                        <input type="hidden" name="question_id" value="{{$question->id}}">
                                        
                                      
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
    </div>
</div>
@endsection
