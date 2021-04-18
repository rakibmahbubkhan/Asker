@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route( 'questions.index') }}" class="btn btn-outline-secondary">back to all questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                   <form action="{{ route('questions.store') }}" method="POST">
                       @csrf
                       @include('questions._form', ['buttonText' => 'Ask Question'])
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
