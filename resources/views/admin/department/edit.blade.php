@extends('admin.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
           <!--  Flass the message for required -->
           @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
            @endif  
            <!-- start  the form here -->
        <form action="{{route('departments.update',[$department->id])}}" method="post">@csrf
            {{method_field('PATCH')}}

            <div class="card">
                <div class="card-header">{{ __('Update Department') }}</div>

                <div class="card-body">
                    <!-- Insert from here -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$department->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$department->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
