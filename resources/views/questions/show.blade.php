@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex align-items-center">
                        <h2>{{ $question->title }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route( 'questions.index') }}" class="btn btn-outline-secondary">back to all questions</a>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="media">
                <div class="d-flex flex-column vote-controls">
                    <a title="This Question is useful" class="vote-up" href=""><i class="fas fa-caret-up fa-3x"></i></a>
                    <span class="votes-count">1280</span>
                    <a title="This Question is not useful" class="vote-down off" href=""><i class="fas fa-caret-down fa-3x"></i></a>
                    <a title="Click to mark as favourite question(click again to undo)" class="favourite mt-2 favourited" href="">
                    <i class="fas fa-star fa-2x"></i>
                    <span class="favourites-count">123</span>
                    </a>
                </div>


                   <div class="media-body">
                   {!! $question->body_html !!}
                   <div class="float-right">
                        <span class="text-muted">Asked by {{ $question->created_date }}</span>
                        <div class="media mt-2">
                            <a href="{{ $question->user->url }}" class="pr-2">
                            <img src="{{ $question->user->avater }}" alt="">
                            </a>
                            <div class="media-body mt-1">
                                <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            </div>
                        </div>
                  </div>
                   </div>
                </div>

            </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count." ". Str::plural('Answer',$question->answers_count) }}</h2>
                    </div><hr>
                    @foreach($question->answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                        <a title="This Answer is useful" class="vote-up" href=""><i class="fas fa-caret-up fa-3x"></i></a>
                        <span class="votes-count">1280</span>
                        <a title="This Answer is not useful" class="vote-down off" href=""><i class="fas fa-caret-down fa-3x"></i></a>
                        <a title="Mark this answer as best answer" class="vote-accepted mt-2 favourited" href="">
                        <i class="fas fa-check fa-2x"></i>
                        <span class="favourites-count">123</span>
                        </a>
                        </div>
                    <div class="media-body">
                        {!! $answer->body_html !!}
                        <div class="float-right">
                            <span class="text-muted">Answered {{ $answer->created_date }}</span>
                            <div class="media mt-2">
                                <a href="{{ $answer->user->url }}" class="pr-2">
                                <img src="{{ $answer->user->avater }}" alt="">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
