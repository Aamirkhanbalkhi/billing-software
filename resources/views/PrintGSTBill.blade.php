@extends('masterlayout.masterlayout')

@section('title')
GST Invoice
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
                        <h4 class="page-title">Invoice</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <!-- Logo & title -->
                        <div class="clearfix ">
                            @if ($myCompany)
                            <div class="text-center">
                                <h1>{{$myCompany->name}}</h1>
                                <div class="text-center">
                                    @if (isset($myCompany->address))
                                    <span>Address: {{$myCompany->address}}</span><br>
                                    @endif

                                    <span>
                                        <b>Email:</b> {{$myCompany->email}} |
                                        <b>Web:</b> {{$myCompany->website}} |
                                        <b>Mob:</b> {{$myCompany->phone_number}}
                                    </span>
                                </div>

                                <div class="row pt-3 pb-1">
                                    <div class="col-6 text-right">
                                        @if (isset($myCompany->pan_number))
                                        <span class="text-right"><b>PAN NO:</b> {{$myCompany->pan_number}}</span>
                                        @endif
                                    </div>
                                    <div class="col-6 text-left">
                                        @if (isset($myCompany->gstin_number))
                                        <span><b>GSTIN NO:</b> {{$myCompany->gstin_number}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- end row -->
                            <div class="row">
                                <div class="col-12 text-center border">
                                    <b>
                                        <h3 class="m-1">GST INVOICE </h3>
                                    </b>
                                </div>
                            </div>
                            @if (isset($bill))
                            <div class="row text-center ">
                                <div class="col-md-6 border p-0">
                                    <b>
                                        <div class="border-bottom">
                                            <h5>Details of the Client |
                                                Billed to</h5>
                                        </div>
                                    </b>
                                    <div class="row pl-2 pt-1">
                                        <div class="col-12 d-flex justiy-content-start">
                                            <label for="">Name : </label>
                                            <span> {{ $bill->name }}</span>
                                        </div>
                                    </div>
                                    <div class="row pl-2">
                                        <div class="col-12 d-flex justiy-content-start">
                                            <label for="">Address : </label>
                                            <span>{{$bill->address}}, {{$bill->state}}, {{$bill->zip_code}}</span>
                                        </div>
                                    </div>
                                    <div class="row pl-2">
                                        <div class="col-12 d-flex justiy-content-start">
                                            <label for="">Phone :- </label>
                                            <span>{{$bill->phone_number}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 border p-0">
                                    <b>
                                        <div class="border-bottom">
                                            <h5>Invoice Details</h5>
                                        </div>
                                    </b>
                                    <div class="row pl-2">
                                        <div class="col-12 d-flex justiy-content-start">
                                            <label for="">Invoice No : </label>
                                            <span>{{$bill->invoice_number}}</span>
                                        </div>
                                    </div>
                                    <div class="row pl-2">
                                        <div class="col-12 d-flex justiy-content-start">
                                            <label for="">Invoice Date : </label>
                                            <span>{{ \Carbon\Carbon::parse($bill->invoice_date)->format('d-M-Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="row pl-2">
                                        <div class="col-12 d-flex justiy-content-start">
                                            <label for="">Address : </label>
                                            <span>{{$bill->address}}, {{$bill->state}}, {{$bill->zip_code}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12 p-0">
                                    <div class="table-responsive table-bordered">
                                        <table class="table mt-4 table-centered border">
                                            <thead>
                                                <tr>
                                                    <th class="py-0 w-8 blue">
                                                        SR NO.</th>
                                                    <th class="py-0 blue">
                                                        DESCRIPTION</th>
                                                    <th class="text-center py-1 w-15 blue">
                                                        AMOUNT
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        {{$bill->item_name}}
                                                    </td>
                                                    <td class="text-center">{{$bill->item_amount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row border">
                                @if (isset($myCompany->account_number))
                                <div class="col-sm-6 col-lg-9 p-0">
                                    <div class="clearfix pt-2 pb-2 mt-1 mb-1 ml-1 text-center gray">
                                        <div class="border-bottom"></div>
                                        <h5><b>Bank Details</b></h5>
                                        <p><b>{{$myCompany->bank_name}} </b>|<b> ACCOUNT NO:- </b> {{$myCompany->account_number}} | <b>IFSC:- </b> {{$myCompany->ifsc_code}}</p>
                                    </div>
                                </div> <!-- end col -->
                                @endif
                                <div class="col-sm-6 col-lg-3 mt-1 ">
                                    <ul class="list-unstyled">
                                        <li><b>Total :</b> <span class="float-right"><i class="fas fa-rupee-sign"></i> {{$bill->item_amount}}</span></li>
                                        <li><b>CGST :({{$bill->cgst}}%)</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                                {{$bill->cgst_pre}}</span></li>
                                        <li><b>SGST :({{$bill->sgst}}%)</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                                {{$bill->sgst_pre}}</span></li>
                                        <li><b>IGST :({{$bill->igst}}%)</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                                {{$bill->igst_pre}}</span></li>
                                        <li><b>Total GST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>{{$bill->tax}}</span>
                                        </li>
                                        <li><b>Grand Total :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>{{$bill->net_amount}}</span>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>

                            <!-- end row -->
                            @endif

                            <div class="mt-4 mb-1">
                                <div class="text-right d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light">Print <i class="mdi mdi-printer mr-1"></i></a>
                                    <a href="{{url('ManageGST')}}" class="btn btn-danger waves-effect waves-light">All
                                        Bills <i class="fas fa-rupee-sign"></i></a>
                                </div>
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



    </div>
    @endsection
