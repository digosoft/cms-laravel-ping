@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        
        <div class="d-flex justify-content-end">
            <a href="{{ route('post.create') }}" class="btn btn-primary my-2 float-right"> Create Post</a>
        </div>
            
        <div class="card">  
            <div class="card-header">Post List</div> 
            <div class="card-body">

            @if(count($posts) > 0) 
                <table width="100%"> 
                    <tr> 
                        <th>Images</th>
                        <th>Title</th>
                    </tr>
                @foreach($posts as $post) 

                    <tr>
                        <td width="30%" class="my-2"><img src="public/storage/{{$post->images}}" width="120px"></td>
                    
                        <td width="70%" class="my-2">{{$post->title}}</td>

                        @if(!($post->trashed()))
                            <td><a href="{{route('post.edit', $post->id)}}" class="btn btn-primary"> Edit</a></td>
                        @endif
                            <td>
                              <form action="{{route('post.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> 
                                    {{$post->trashed() ? 'Delete': 'Trash' }}
                                    </button>
                                    
                                </form>
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
