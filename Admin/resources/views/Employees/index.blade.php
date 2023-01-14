@extends('layouts.master')
@section('css')

@section('title')
    Employees
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Employees
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
                    Add Employee
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Lasst Name</th>

                                <th>Email</th>
                                <th>Phone </th>
                                <th>Company</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($employees as $emplyee)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $emplyee->e_firstname }}</td>
                                    <td>{{ $emplyee->e_lastname }}</td>
                                    <td>{{ $emplyee->e_email }}</td>
                                    <td>{{ $emplyee->e_phone }}</td>

                                    <td>{{ $emplyee->company_name }}</td>
                                    <td>
                                        <a name="" id="" class="btn btn-info"
                                            href="{{ route('employees.edit', $emplyee->id) }}" role="button">Edit</a>
                                        <form action="{{ route('employees.destroy', $emplyee->id) }}" method="POST">


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
    {{-- {{$companies->links('pagination::bootstrap-4')}} --}}
</div>
<!-- row closed -->
<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Employee
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="Name" class="mr-sm-2">First Name
                            :</label>
                        <input type="text" name="e_firstname" class="form-control" value="{{ old('e_firstname') }}">
                        @error('e_firstname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2">Last Name
                            :</label>
                        <input type="text" name="e_lastname" class="form-control" value="{{ old('e_lastname') }}">
                        @error('e_lastname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Email
                            :</label>
                        <input type="text" class="form-control" name="e_email" value="{{ old('e_email') }}">
                        @error('e_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Phone
                            :</label>
                        <input type="text" class="form-control" name="e_phone" value="{{ old('e_phone') }}">
                        @error('e_phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Company
                            :</label>
                        <select name="company" class="form-control ">
                            <option value="">Select Company</option>

                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>

                        @error('company')
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
