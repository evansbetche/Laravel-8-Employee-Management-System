@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Add breadcrumps -->
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Roles</li>
  </ol>
</nav>
 <!--  Flass the message for required -->
           @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
            @endif  
            <!-- Insert the datatable -->

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <!-- start to Query from the database -->

                                            @if(count($roles)>0)
                                            @foreach($roles as $key => $role)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->description}}</td>
                                                <td><a href="{{route('roles.edit',[$role->id])}}"><i class="fas fa-edit"></i></a></td>
                                                <td><a href="" data-toggle="modal" data-target="#exampleModal{{$role->id}}"><i class="fas fa-trash"></i>
                                                </a>
                                                <!-- Modal -->
<div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('roles.destroy', [$role->id])}}" method="post">@csrf
      {{method_field('DELETE')}}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete {{$role->name}} role?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
</form>
  </div>
</div>

                                            </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <td>No departments to display</td>
                                            @endif

                                            <!-- End of the quesry from the database -->

                                        </tbody>
                                    </table>
           
        </div>
    </div>
</div>
@endsection
