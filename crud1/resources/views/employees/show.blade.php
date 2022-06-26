@extends('employees.layout')
@section('content')
<div class="card">
  <div class="card-header">Employees page</div>
  <div class="card-body">
  
        <div class="card-body">
        
        <p class="card-text">First Name : {{ $employees->first_name }}</p>
        <p class="card-text">Last Name : {{ $employees->last_name }}</p>
        <p class="card-text">Email : {{ $employees->email }}</p>
        <p class="card-text">Phone : {{ $employees->phone }}</p>
        
        
  </div>
      
    </hr>
  
  </div>
</div>