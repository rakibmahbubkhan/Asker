@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2 class="green-text">All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route( 'questions.create') }}" class="btn btn-outline-primary">Ask Question</a>
                        </div>
                    </div>
                </div>

            <div class="card-body">
                @include('layouts._messages')
                
                   @forelse($questions as $question)
                    @include('questions._excerpt')

                   @empty
                   <div class="alert alert-warning">
                   <strong>Sorry</strong> there are no questions avliable.
                   </div>
                   @endforelse
                        {{ $questions->links() }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
