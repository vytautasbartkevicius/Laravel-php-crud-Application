@extends('employees.layout')
@section('content')
<div class="card">
  <div class="card-header">Crud</div>
  <div class="card-body">
      
      
      <form action="{{ url('company/' .$companies->company_name) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <
        <label>Company Name</label></br>
        <input type="text" name="company_name" id="company_name" value="{{$employees->company_name}}" class="form-control"></br>

        <label>First Name</label></br>
        <input type="text" name="first_name" id="first_name" value="{{$employees->first_name}}" class="form-control"></br>

        <label>Last Name</label></br>
        <input type="text" name="last_name" id="last_name" value="{{$employees->last_name}}" class="form-control"></br>

        <label>email</label></br>
        <input type="text" name="email" id="email" value="{{$employees->email}}" class="form-control"></br>
        
        <label>phone</label></br>
        <input type="text" name="phone" id="phone" value="{{$employees->last_name}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop