@extends('masterlayout.masterlayout')
@section('content')

<div class="content-page">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold"><i data-feather="edit" class="mr-1 pr-0"></i>Update Client Detail</h2>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Start Form  -->
    <div style="background-color: white;" class="mb-3">
        <div class="container p-3">
            <form action="{{ route('AfterUpdate', $data->id) }}" class="needs-validation" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Name</label>
                        <input type="text" name="UserName" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Name" value="{{$data->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone No.</label>
                        <input type="text" name="UserNumber" class="form-control addnewcss" id="validationCustom01" placeholder="Phone/Mobile no." value="{{$data->phone_number}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Address</label>
                        <input type="text" name="UserAddress" class="form-control prodect-field" id="validationCustom02" placeholder="Destination/Address" value="{{$data->address}}">
                    </div>
                </div>
                <h4 class="page-title pt-2" style="color: rgb(243, 102, 102);"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER YOUR BANK DETAIL</h4>
                <hr>
                <div class="row my-3">
                    <div class="form-group col-md-4">
                        <label for="">Account Holder Name</label>
                        <input type="text" class="form-control addnewcss" name="AccountHolderName" id="validationCustom01" placeholder="Enter Account Holder Name" value="{{$data->account_holder_name}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Account Number</label>
                        <input type="text" class="form-control addnewcss" name="AccountNumber" id="validationCustom01" placeholder="Enter Account Number" value="{{$data->account_number}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Bank Name</label>
                        <input type="text" class="form-control addnewcss" name="BankName" id="validationCustom02" placeholder="Enter Bank Name" value="{{$data->bank_name}}">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="form-group col-md-4">
                        <label for="">IFSC Code</label>
                        <input type="text" class="form-control prodect-field" name="IFSC" id="validationCustom01" placeholder="IFSC Code" value="{{$data->ifsc_code}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Zip Code</label>
                        <input type="text" class="form-control addnewcss" name="ZipCode" id="validationCustom01" placeholder="Enter Zip Code" value="{{$data->zip_code}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">State</label>
                        <input type="text" class="form-control addnewcss" name="State" id="validationCustom02" placeholder="Enter State Name" value="{{$data->state}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Branch Address</label>
                        <input type="text" class="form-control prodect-field" name="BranchAddress" id="validationCustom01" placeholder="Destination/Address" value="{{$data->branch_address}}">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
    <!-- End Form  -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
@endsection
