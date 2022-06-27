@extends('companies.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Companies</div>
                    <div class="card-body">
                        <a href="{{ url('/company/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Company
                        </a>

                        <a href="{{ url('/employee') }}" class="btn btn-success btn-sm" title="Employees">
                            <i class="fa fa-plus" aria-hidden="true"></i> Employees
                        </a>
                        
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Logo</th>
                                        <th>Actions</th>
                                        
                                </thead>
                                </thead>
                                <tbody>
                                @foreach($companies as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->company_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->website }}</td>
                                        <td>
                                            <img src="{{ asset($item->logo) }}" width= '50' height='50' class="img img-responsive" />
                                        </td>
                                        <td>
                                            <a href="{{ url('/company/' . $item->company_name) }}" title="View Company"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/company/' . $item->company_name . '/edit') }}" title="Edit Company"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/company' . '/' . $item->company_name) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{$companies->links()}}
    </div>
    
@endsection
