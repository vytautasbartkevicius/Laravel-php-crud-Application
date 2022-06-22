@extends('employees.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Company Name (Please Enter an existing company name)</label></br>
        <input type="text" name="company_name" id="company_name" class="form-control"></br>
        <label>First Name</label></br>
        <input type="text" name="first_name" id="first_name" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="last_name" id="last_name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Phone</label></br>
        <input type="text" name="phone" id="phone" class="form-control"></br>
        
 
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop