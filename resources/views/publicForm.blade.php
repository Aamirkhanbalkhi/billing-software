<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Detached Layout | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" />

    <!-- Plugins css -->
    <link href="{{url('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- App css -->
    <link href="{{url('css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{url('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{url('css/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{url('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{url('css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- costom css  -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- start page title -->

        <div class="content-page m-0 p-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title font-weight-bold text-uppercase"> Create Bill </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- ALERT START -->

                    @include('masterlayout.alertMSG')

                    <!-- ALERT END  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('CreateInvoiceDesc') }}" class="needs-validation" method="POST">
                                        @csrf
                                        <h6 class="text-right"><b>Date : </b><input style="border: none;" type="date" name="InvoiceDate" required></h6>
                                        <h4 class="page-title red">YOUR DETAIL</h4>
                                        <hr>
                                        <label for="">Invoice Number : </label>
                                        <input type="text" class="addnewcss w-8" name="InvoiceNumber" value="{{$newinvoice}}" readonly>
                                        @if (isset($user))
                                        <input type="hidden" name="UserId" value="{{ $user->id }}">

                                        <div class="row my-3">
                                            <div class="form-group col-md-6">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Name" value="{{ $user->name }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Phone No.</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom01" placeholder="Phone/Mobile no." value="{{ $user->phone_number }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Address</label>
                                                <input class="form-control prodect-field" id="validationCustom02" placeholder="Destination/Address" value="{{ $user->address}}" readonly>
                                            </div>
                                        </div>
                                        <h4 class="page-title pt-2 red">YOUR BANK DETAIL</h4>
                                        <hr>
                                        <div class="row my-3">
                                            <div class="form-group col-md-4">
                                                <label for="">Account Holder Name</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Account Holder Name" value="{{ $user->account_holder_name }}" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Account Number</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Account Number" value="{{ $user->account_number }}" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Bank Name</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom02" placeholder="Enter Bank Name" value="{{ $user->bank_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="form-group col-md-4">
                                                <label for="">IFSC Code</label>
                                                <input type="text" class="form-control prodect-field" id="validationCustom01" placeholder="IFSC Code" value="{{ $user->ifsc_code }}" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Zip Code</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom01" placeholder="Enter Zip Code" value="{{ $user->zip_code }}" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">State</label>
                                                <input type="text" class="form-control addnewcss" id="validationCustom02" placeholder="Enter State Name" value="{{ $user->state }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Branch Address</label>
                                                <input type="text" class="form-control prodect-field" id="validationCustom01" placeholder="Destination/Address" value="{{ $user->branch_address }}" readonly>
                                            </div>
                                        </div>
                                        @else
                                        <h3><b>User Not Found !</b></h3>
                                        @endif
                                        <hr>
                                        <h4 class="page-title pt-3 mt-3 red"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER PRODUCT/ITEM DETAIL</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-8 border p-1">
                                                <label for="">DESCRIPTIONS</label>
                                            </div>
                                            <div class="col-md-4 border p-1">
                                                <label for="">TOTAL AMOUNT</label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-8 border p-2">
                                                <input class="form-control" name="item_description" />
                                            </div>
                                            <div class="col-md-4 border p-2">
                                                <input class="form-control" type="text" name="TotalAmount" id="totalInput" oninput="calculateTotalAmount()">
                                            </div>
                                        </div>

                                        <div class="row mt-0">
                                            <div class="col-md-12">
                                                <ul class="list-style">
                                                    <li>
                                                        <b>Total Amount:</b> ₹ <span type="text" id="totalDisplay">0</span>
                                                        <input type="hidden" name="NetAmount" id="totalinputDisplay">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary float-right">submit </button>
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

        <!-- END wrapper -->
        <!-- Custom js  -->
        <script src="{{url('js/script.js')}}"></script>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay')}}"></div>

        <!-- Vendor js -->
        <script src="{{url('js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{url('libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{url('libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{url('js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{url('js/app.min.js')}}"></script>

        <!-- Bootstrap js  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
