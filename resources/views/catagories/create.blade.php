@extends('layouts.app')

@section('content')


        <div class="col-md-8"> 
                
            <div class="card">  
                <div class="card-header">{{isset($catagory) ? 'Update Catagory' : 'Create Catagories'}}</div> 
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }} 
                            @endforeach
                        </div>
                    @endif
                    <form action="{{isset($catagory) ? route('catagories.update', $catagory->id) : route('catagories.store')}}" method="post">
                        @csrf 

                        @if(isset($catagory))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <lable for="exampleFormControlInput1">Catagories Name *</lable>
                            <input type="text" name="name" class="form-control my-2" placeholder="Catagories Name" id="exampleFormControlInput1" value="{{isset($catagory) ? $catagory->name : ''}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{isset($catagory) ? 'Update Catagory' : 'Create Catagories'}}</button>
                        </div>
                        

                        
                    
                    </form>
                    
                </div>
            </div>
        </div>
@endsection
