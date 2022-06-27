@extends('companies.layout')
@section('content')
<div class="card">
  <div class="card-header">Crud</div>
  <div class="card-body">
      
      
      <form action="{{ url('company/' .$companies->company_name) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <
        <label>Name</label></br>
        <input type="text" name="company_name" id="company_name" value="{{$companies->company_name}}" class="form-control"></br>

        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$companies->email}}" class="form-control"></br>

        <label>Website</label></br>
        <input type="text" name="website" id="website" value="{{$companies->website}}" class="form-control"></br>

        <label>Logo</label></br>
        
        <input class="form-control" name="logo" type="file" id="logo">

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop