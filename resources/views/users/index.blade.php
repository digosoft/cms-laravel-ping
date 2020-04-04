@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        
  
            
        <div class="card">  
            <div class="card-header">Users List</div> 
            <div class="card-body">

            @if(count($users) > 0) 
                <table width="100%"> 
                    <tr> 
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email </th>  
                        <th>Action</th>


                    </tr>
                  
                @foreach($users as $user) 

                    <tr style="margin-top: 22px">
                      <td><img height="40px" width="40px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}"></td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>  

                      <td>
                        @if(!$user->isAdmin())
                         <form action="{{ route('users.make-admin', $user->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Make Admin</button> 
                          </form>
                        @endif
                      </td>
                    </tr> 

                @endforeach
                </table>
                @else 
                <h2>No Data Found </h2>
                @endif




            </div>
        </div>
    </div>
@endsection
