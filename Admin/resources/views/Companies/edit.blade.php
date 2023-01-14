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

<a name="" id="" class="btn btn-success" href="/companies" role="button"><i class="ti-arrow-left"></i>
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


                <form action="{{ route('companies.update', $company->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Name" class="mr-sm-2">Company Name
                            :</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ $company->company_name }}">
                        @error('company_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Company Email
                            :</label>
                        <input type="email" class="form-control" name="company_email"
                            value="{{ $company->company_email }}">
                        @error('company_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Company Logo
                            :</label>
                        <input type="file" class="form-control" name="company_logo"
                            value="{{ $company->company_logo }}">
                        <img src="/storage/{{ $company->company_logo }}" alt="ss" width="200px">
                        @error('company_logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="mr-sm-2">Company Wibsite
                            :</label>
                        <input type="text" class="form-control" name="company_website"
                            value="{{ $company->company_website }}">
                        @error('company_website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">

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
