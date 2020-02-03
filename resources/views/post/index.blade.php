@extends('layouts.app')

@section('content')


        <div class="col-md-8">
            <div class="d-flex justify-content-end">
                <a href="{{ route('post.create') }}" class="btn btn-primary my-2 float-right"> Create Post</a>
            </div>
                
            <div class="card">  
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
@endsection
