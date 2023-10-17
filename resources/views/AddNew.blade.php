@extends('masterlayout.masterlayout')

@section('title')
Add Parties
@endsection

@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title font-weight-bold text-uppercase"> Add New Client </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('AddClientPage') }}" class="needs-validation" method="POST">
                                @csrf
                                <h4 class="page-title red"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER YOUR DETAIL</h4>
                                <hr>

                                <div class="row my-3">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="validationCustom01">Type</label>
                                        <select name="UserType" class="form-control addnewcss" id="validationCustom01" placeholder="Please select Type" required="">
                                            <option value="">Select Your Type</option>
                                            @foreach($data as $key => $type)
                                            @if($key > 0)
                                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" name="UserName" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Phone No.</label>
                                        <input type="text" name="UserNumber" class="form-control addnewcss" id="validationCustom01" placeholder="Phone/Mobile no." required="">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="">Address</label>
                                        <input type="text" name="UserAddress" class="form-control prodect-field" id="validationCustom02" placeholder="Destination/Address" required="">
                                    </div>
                                </div>
                                <h4 class="page-title pt-2 red"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER YOUR BANK DETAIL</h4>
                                <hr>
                                <div class="row my-3">
                                    <div class="form-group col-md-4">
                                        <label for="">Account Holder Name</label>
                                        <input type="text" class="form-control addnewcss" name="AccountHolderName" id="validationCustom01" placeholder="Enter Account Holder Name" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Account Number</label>
                                        <input type="text" class="form-control addnewcss" name="AccountNumber" id="validationCustom01" placeholder="Enter Account Number" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Bank Name</label>
                                        <input type="text" class="form-control addnewcss" name="BankName" id="validationCustom02" placeholder="Enter Bank Name" required="">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-md-4">
                                        <label for="">IFSC Code</label>
                                        <input type="text" class="form-control prodect-field" name="IFSC" id="validationCustom01" placeholder="IFSC Code" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Zip Code</label>
                                        <input type="text" class="form-control addnewcss" name="ZipCode" id="validationCustom01" placeholder="Enter Zip Code" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">State</label>
                                        <input type="text" class="form-control addnewcss" name="State" id="validationCustom02" placeholder="Enter State Name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Branch Address</label>
                                        <input type="text" class="form-control prodect-field" name="BranchAddress" id="validationCustom01" placeholder="Destination/Address" required="">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form  -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>


@endsection
