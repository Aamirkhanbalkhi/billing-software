@extends('masterlayout.masterlayout')
@section('content')

<div class="content-page">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold"><i myAccount-feather="edit" class="mr-1 pr-0"></i>Update Company Detail</h2>
            </div>
        </div>
    </div>
    @include('masterlayout.alertMSG')
    <!-- end page title -->
    <!-- Start Form  -->
    <div style="background-color: white;" class="mb-3">
        <div class="container p-3">
            <form action="" class="needs-validation" method="POST">
                @csrf
                @if ($myAccount)
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Company Name</label>
                        <input type="text" name="ComName" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Name" value="{{$myAccount->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" name="ComNumber" class="form-control addnewcss" id="validationCustom01" placeholder="Phone/Mobile no." value="{{$myAccount->phone_number}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Address</label>
                        <input type="text" name="ComAddress" class="form-control prodect-field" id="validationCustom02" placeholder="Destination/Address" value="{{$myAccount->address}}">
                    </div>
                </div>
                <div class="row my-3">

                    <div class="form-group col-md-6">
                        <label for="">Pan Number</label>
                        <input type="text" class="form-control addnewcss" name="comPanNumber" id="validationCustom01" placeholder="Enter Account Number" value="{{$myAccount->pan_number}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">GSTIN Number</label>
                        <input type="text" class="form-control addnewcss" name="ComGSTINNumber" id="validationCustom02" placeholder="Enter Bank Name" value="{{$myAccount->gstin_number}}">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="form-group col-md-6">
                        <label for="">Website</label>
                        <input type="text" class="form-control prodect-field" name="ComWebside" id="validationCustom01" placeholder="IFSC Code" value="{{$myAccount->website}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control addnewcss" name="ComEmail" id="validationCustom01" placeholder="Enter Zip Code" value="{{$myAccount->email}}">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="form-group col-md-4">
                        <label for="">Bank</label>
                        <input type="text" class="form-control prodect-field" name="CombankName" id="validationCustom01" value="{{$myAccount->bank_name}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">A/C Number</label>
                        <input type="text" class="form-control addnewcss" name="CombankNumber" id="validationCustom01" value="{{$myAccount->account_number}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">IFCS Code</label>
                        <input type="text" class="form-control addnewcss" name="CombankIFSC" id="validationCustom01" value="{{$myAccount->ifsc_code}}">
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                @else
                "User details note found"
                @endif
            </form>
        </div>
    </div>
    <!-- End Form  -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
@endsection
