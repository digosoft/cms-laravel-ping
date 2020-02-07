@extends('layouts.app')

@section('content')


        <div class="col-md-8"> 
                
            <div class="card">  
                <div class="card-header">Create Post</div> 
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <lable for="title">Title *</lable>
                            <input type="text" name="title" class="form-control my-2"  placeholder="Post Name" id="title">
                        </div>

                        <div class="form-group">
                            <lable for="description">Descriptions *</lable>
                            <textarea name="description" class="form-control my-2" cols="5" rows="5"  placeholder="Post Descriptions" id="description"> </textarea>
                        </div>

                        <div class="form-group">
                            <lable for="content">Contents *</lable>
                            <textarea name="content" class="form-control my-2" cols="5" rows="5"  placeholder="Post Contents" id="description"> </textarea>
                        </div>

                        <div class="form-group">
                            <lable for="publish_at">Publish At *</lable>
                            <input type="date" name="publish_at" class="form-control my-2"  placeholder="Publish At">
                        </div>

                        <div class="form-group">
                            <lable for="image">Upload Image</lable>
                            <input type="file" name="image" class="form-control my-2">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
@endsection
