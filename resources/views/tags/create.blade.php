@extends('layouts.app')

@section('content')


        <div class="col-md-8"> 
                
            <div class="card">  
                <div class="card-header">{{isset($tag) ? 'Update tag' : 'Create Tags'}}</div> 
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }} 
                            @endforeach
                        </div>
                    @endif
                    <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="post">
                        @csrf 

                        @if(isset($tag))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <lable for="exampleFormControlInput1">Tags Name *</lable>
                            <input type="text" name="name" class="form-control my-2" placeholder="Tags Name" id="exampleFormControlInput1" value="{{isset($tag) ? $tag->name : ''}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{isset($tag) ? 'Update tag' : 'Create Tags'}}</button>
                        </div>
                        

                        
                    
                    </form>
                    
                </div>
            </div>
        </div>
@endsection
