<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Vendor Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" />

    <!-- Plugins css -->
    <link href="{{url('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

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

        <div class="content-page m-0 p-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card-box">
                                <!-- Logo & title -->
                                <div class="clearfix ">
                                    <div class="text-right">

                                    </div>
                                </div>
                                <!-- end row -->
                                @if (isset($invoiceInfo))
                                <div class="row">
                                    <div class="col-12 text-center border">
                                        <b>
                                            <h3 class="m-1">INVOICE </h3>
                                        </b>
                                        <h6><Span>{{ \Carbon\Carbon::parse($invoiceInfo->invoice_date)->format('d-M-Y') }}</Span></h6>
                                    </div>
                                </div>
                                <div class="row text-center ">
                                    <div class="col-md-6 border p-0 text-left">
                                        <b>
                                            <div class="border-bottom pl-2">
                                                <h5>Invoice Details :-</h5>
                                            </div>
                                        </b>
                                        <div class="row pl-2">
                                            <div class="col-12 ">
                                                <label for="">Invoice No : </label>
                                                <span>{{ $invoiceInfo->invoice_number }}</span>
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                            <div class="col-12 ">
                                                <label for="">Invoice Date : </label>
                                                <Span>{{ \Carbon\Carbon::parse($invoiceInfo->invoice_date)->format('d-M-Y') }}</Span>
                                                <?php /* <span>{{ $invoiceInfo->invoice_date }}</span>*/ ?>
                                            </div>
                                        </div>
                                        <div class="row pl-2 pb-1">
                                            <div class="col-12">
                                                <label for="">Address : </label>
                                                <span>{{ $invoiceInfo->address }}, {{ $invoiceInfo->state }}, {{ $invoiceInfo->zip_code }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border p-0 text-right">
                                        <b>
                                            <div class="border-bottom pr-2">
                                                <h5>Details of the Client |
                                                    Billed to :-</h5>
                                            </div>
                                        </b>
                                        <div class="row pl-2 pt-1 pr-2">
                                            <div class="col-12">
                                                <label for="">Name : </label>
                                                <span>{{ $invoiceInfo->name }}</span>
                                            </div>
                                        </div>

                                        <div class="row pl-2 pr-2">
                                            <div class="col-12">
                                                <label for="">Phone : </label>
                                                <span>{{ $invoiceInfo->phone_number }}</span>
                                            </div>
                                        </div>
                                        <div class="row pl-2 pb-1 pr-2">
                                            <div class="col-12">
                                                <label for="">Address : </label>
                                                <span>{{ $invoiceInfo->address }}, {{ $invoiceInfo->state }}, {{ $invoiceInfo->zip_code }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                @else
                                <h3>Something wen't wrong</h3>
                                @endif
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="table-responsive table-bordered">
                                            <table class="table mt-4 table-centered border">
                                                <thead>
                                                    <tr>

                                                        <th class="py-0 blue">
                                                            DESCRIPTION</th>
                                                        <th class="text-center py-1 w-15 blue">
                                                            AMOUNT
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4 class="m-0"><b>{{ $invoiceInfo->item_description }}</b></h4>
                                                        </td>
                                                        <td class="text-center font-18">{{ $invoiceInfo->total_amount}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row border">
                                    <div class="col-11">
                                        <!-- <label for=""> -->
                                        <h4><b>Total</b></h4>
                                        <!-- </label> -->
                                    </div>
                                    <div class="col-1">
                                        <h4><b><i class="fas fa-rupee-sign pr-1"></i>{{ $invoiceInfo->net_amount }}</b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 p-2">
                                        <div class="clearfix">

                                            <small class="row text-left">
                                                <div class="col-md-6 pl-2 p-0">
                                                    <b>
                                                        <div>
                                                            <h5>Bank Details</h5>
                                                        </div>
                                                    </b>
                                                    <div class="row pt-1">
                                                        <div class="col-12">
                                                            <label for="">A/C Holder Name : </label>
                                                            <span>{{ $invoiceInfo->account_holder_name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-12">
                                                            <label for="">A/C Number : </label>
                                                            <span>{{ $invoiceInfo->account_number }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-12">
                                                            <label for="">Bank Name : </label>
                                                            <span>{{ $invoiceInfo->bank_name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-12">
                                                            <label for="">IFSC Code : </label>
                                                            <span>{{ $invoiceInfo->ifsc_code }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-1">
                                                        <div class="col-12">
                                                            <label for="">Branch : </label>
                                                            <span>{{ $invoiceInfo->branch_address }}, {{ $invoiceInfo->state }}, {{ $invoiceInfo->zip_code }}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 pt-3 pl-3 text-center">
                                        <small class="text-muted">
                                            <b class="text-dark text-uppercase">{{ $invoiceInfo->name }}</b><br>
                                        </small>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="mt-4 mb-1">
                                    <div class="text-right d-print-none">
                                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light">Print <i class="mdi mdi-printer mr-1"></i></a>
                                    </div>
                                </div>
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

        </div>

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
