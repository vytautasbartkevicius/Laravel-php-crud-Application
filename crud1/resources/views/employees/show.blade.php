@extends('employees.layout')
@section('content')
<div class="card">
  <div class="card-header">Companies Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Company Name : {{ $employees->company_name }}</h5>
        <p class="card-text">First Name : {{ $employees->first_name }}</p>
        <p class="card-text">Last Name : {{ $employees->website }}</p>
        <p class="card-text">Email : {{ $employees->email }}</p>
        <p class="card-text">Phone : {{ $employees->phone }}</p>
        
        
  </div>
      
    </hr>
  
  </div>
</div>