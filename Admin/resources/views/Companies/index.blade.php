@extends('layouts.master')
@section('css')

@section('title')
    Companies
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Companies
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    Add Company
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>

                                <th>Company Email</th>
                                <th>Company Logo</th>
                                <th>Company Website</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->company_email }}</td>
                                    <td><img src="storage/{{ $company->company_logo }}" alt="s" width="200px">
                                    </td>
                                    <td>{{ $company->company_website }}</td>
                                    <td>
                                        <a name="" id="" class="btn btn-info"
                                            href="{{ route('companies.edit', $company->id) }}" role="button">Edit</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">


                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
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
<div class="mt-6 p-4">
    {{ $companies->links('pagination::bootstrap-4') }}
</div>
<!-- row closed -->
<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Company
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Name" class="mr-sm-2">Company Name
                            :</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ old('company_name') }}">
                        @error('company_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Company Email
                            :</label>
                        <input type="email" class="form-control" name="company_email"
                            value="{{ old('company_email') }}">
                        @error('company_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Company Logo
                            :</label>
                        <input type="file" class="form-control-file" name="company_logo"
                            value="{{ old('company_logo') }}">
                        @error('company_logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Company Wibsite
                            :</label>
                        <input type="text" class="form-control" name="company_website"
                            value="{{ old('company_website') }}">
                        @error('company_website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
