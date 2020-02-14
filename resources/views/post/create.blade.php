@extends('layouts.app')

@section('content')


        <div class="col-md-8"> 
                
            <div class="card">  
                <div class="card-header">{{isset($post) ? 'Edit Post': 'Create Post'}}</div> 
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{isset($post) ? route('post.update', $post->id): route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf 

                        @if(isset($post))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <lable for="title">Title *</lable>
                            <input type="text" name="title" class="form-control my-2"  placeholder="Post Name" id="title" value="{{isset($post)? $post->title: ''}}">
                        </div>

                        <div class="form-group">
                            <lable for="description">Descriptions *</lable>
 
                            <textarea name="description" class="form-control my-2" cols="5" rows="5"  placeholder="Post Descriptions" id="description"> {{isset($post)? $post->description: ''}} </textarea> 
                        </div>

                        <div class="form-group">
                            <lable for="content">Contents *</lable>
                            <input id="content" type="hidden" name="content" value="{{isset($post)? $post->content: ''}}">
                              <trix-editor input="content"></trix-editor>

                        </div>

                        <div class="form-group">
                            <lable for="publish_at">Publish At *</lable>
                            <input type="date" id="publish_at" name="publish_at" class="form-control my-2"  value="{{isset($post)? $post->publish_at: ''}}">
                        </div>

                        <div class="form-group">
                            <lable for="image">Upload Image</lable>
                            <input type="file" name="image" class="form-control my-2">
                            @if(isset($post->image))
                                <img src="{{asset('public/storage/'.$post->image)}}" height="222px" width="222px">
                            @endif
                        </div>

                         <div class="form-group">
                            <lable for="Category">Category</lable>
                            <select name="catagory" class="form-control">
                                @foreach($catagories as $catagory)
                                <option value="{{ $catagory->id}}">
                                    @if(isset($post))
                                        @if($catagory->id == $post->catagory_id)
                                            Selected  &nbsp; &nbsp;
                                        @endif
                                    @endif 
                                        {{ $catagory->name}}

                                </option>
                                @endforeach
                            </select>
                         </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script> 

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        flatpickr("#publish_at", { 
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
