@extends('companies.layout')
@section('content')
<div class="card">
  <div class="card-header">Companies Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name : {{ $companies->company_name }}</h5>
        <p class="card-text">Email : {{ $companies->email }}</p>
        <p class="card-text">Website : {{ $companies->website }}</p>
        <p class="card-text">Logo:
            <img src="{{ asset($companies->logo) }}" width= '50' height='50' class="img img-responsive" />
        </p>
        
  </div>
      
    </hr>
  
  </div>
</div>