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

<a name="" id="" class="btn btn-success" href="/employees" role="button"><i class="ti-arrow-left"></i>
    Back</a>
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


                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Name" class="mr-sm-2">First Name
                            :</label>
                        <input type="text" name="e_firstname" class="form-control"
                            value="{{ $employee->e_firstname }}">
                        @error('e_firstname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2">Last Name
                            :</label>
                        <input type="text" name="e_lastname" class="form-control"
                            value="{{ $employee->e_lastname }}">
                        @error('e_lastname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Email
                            :</label>
                        <input type="text" class="form-control" name="e_email" value="{{ $employee->e_email }}">
                        @error('e_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Phone
                            :</label>
                        <input type="text" class="form-control" name="e_phone" value="{{ $employee->e_phone }}">
                        @error('e_phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Company
                            :</label>
                        <select name="company" class="form-control ">
                            @foreach ($companies as $company)
                                @if ($company->id == $employee->company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endif
                            @endforeach


                            @foreach ($companies as $company)
                                @if ($company->id == $employee->id)
                                    @continue
                                @else
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endif
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
<!-- add_modal_Grade -->




<!-- add_form -->




<!-- row closed -->
@endsection
@section('js')

@endsection
