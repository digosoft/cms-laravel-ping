@extends('layouts.app')

@section('content')


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">

                   @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }} 
                            @endforeach
                        </div>
                    @endif
                       

                   <form action="{{route('user.update-profile')}}" method="POST">
                       @csrf
                       @method('PUT')

                       <div class="form-group">
                           <label for="name"> Name</label>
                           <input type="text" class="form-control"  id="name" name="name" value="{{$user->name}}" />
                       </div> 

                       <div class="form-group">
                           <label for="about"> About me</label>
                           <textarea class="form-control" id="about" name="about" cols="5" rows="5"> {{$user->about}} </textarea>
                       </div>

                       <div class="form-group">
                         <label for="form button"></label>
                         <button type="submit" class="btn btn-success"> Update Profile</button>
                       </div>


                   </form>
                </div>
            </div>
        </div>
@endsection
