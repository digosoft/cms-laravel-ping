@extends('layouts.app')

@section('content')


        <div class="col-md-8">
            <div class="d-flex justify-content-end">
                <a href="{{ route('catagories.create') }}" class="btn btn-primary my-2 float-right"> Create Catagories</a>
            </div>
                
            <div class="card">  
                <div class="card-header">Catagories List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($catagories) > 0)

                    <table width="100%"> 
                        <tr>
                            <th>Catagory Name</th>
                            <th>Catagory Count</th>
                            <th colspan="3">Catagory Action</th>
                        </tr>
                    @foreach($catagories as $catagory)
                        <tr>
                            <td class="my-2">{{$catagory->name}}</td>
                            <td class="my-2">{{$catagory->posts->count()}}</td>

                            <td>
                                <a href="{{route('catagories.edit', $catagory->id)}}" class="btn btn-info btn-sm float-right">edit</a>
                            </td>
                            <td>
                            <button class="btn btn-warning btn-sm float-right mx-auto" type="button" onclick="deleteHander({{$catagory->id}})">Delete</button>
                             
                            </td> 
                           
                        </tr>

                    @endforeach
                     </table>
                    @else 
                     <h2>No Data Found </h2>
                    @endif


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteCatagaryForm">
    @method('DELETE')
    @csrf

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">
            Are you sure you want to delete the catagory ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No Go back</button>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>





                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
       function deleteHander(id){
        var form =  document.getElementById('deleteCatagaryForm');
        form.action = 'catagories/'+id;
        console.log( form);
        $('#exampleModal').modal('show')

        }
    </script>

@endsection
