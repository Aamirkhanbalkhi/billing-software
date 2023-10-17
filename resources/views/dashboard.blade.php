@extends('masterlayout.masterlayout')

@section('title')
Dashboard
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
                        <h4 class="page-title font-weight-bold">DASHBORAD</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                    <i class="fe-heart font-22 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1">
                                        <span data-plugin="counterup">{{$totalUsers}}</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">
                                        Vendors
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end widget-rounded-circle-->
                </div>
                <!-- end col-->

                <div class="col-md-4 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <!-- <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                </div> -->
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1">
                                        <span data-plugin="counterup">{{$totalVendor}}</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">
                                        Vendor Invoices
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end widget-rounded-circle-->
                </div>
                <!-- end col-->

                <div class="col-md-4 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1">
                                        <span data-plugin="counterup">{{$totalGST}}</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">GST Invoices</p>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end widget-rounded-circle-->
                </div>
                <!-- end col-->

            </div>
        </div>


        <div class="col-xl-6">
            <div class="card-box">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            GST bills
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                            Vendor invoices
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>
                                        S.No.
                                    </th>
                                    <th>
                                        Invoice No.
                                    </th>
                                    <th>Name</th>
                                    <th>Phone No.</th>
                                    <th>TAX</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                            </thead>

                            <tbody><?php
                                    $i = 1; ?>
                                @foreach ( $lastFiveGSTRecords as $key => $invoice )
                                <tr>

                                    <td><b><?php echo $i++ ?></b></td>
                                    <td><b>{{$invoice->id}}</b></td>

                                    <td>
                                        {{$invoice->name}}
                                    </td>
                                    <td>
                                        {{$invoice->phone_number}}
                                    </td>

                                    <td>
                                        ₹<b> {{$invoice->tax}}</b>
                                    </td>
                                    <td>
                                        ₹<b> {{$invoice->item_amount}}</b>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d-M-Y') }}
                                    </td>


                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('lastfivegstrec')}}/{{base64_encode($invoice->id)}}" target="_blank">
                                                    <i class="mdi mdi-text-box-multiple-outline mr-2 text-muted font-18 vertical-middle"></i>Invoice
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane show" id="profile">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>
                                        S.No.
                                    </th>
                                    <th>
                                        Invoice No.
                                    </th>
                                    <th>Name</th>
                                    <th>Phone No.</th>
                                    <th>A/C No.</th>
                                    <th>Date</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1; ?>
                                @foreach ( $lastFiveRecords as $key => $invoice )
                                <tr>

                                    <td><b><?php echo $i++ ?></b></td>
                                    <td><b>{{$invoice->id}}</b></td>

                                    <td>
                                        {{$invoice->name}}
                                    </td>
                                    <td>
                                        {{$invoice->phone_number}}
                                    </td>

                                    <td>
                                        ₹<b> {{$invoice->total_amount}}</b>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d-M-Y') }}
                                    </td>


                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('lastfiverec', base64_encode($invoice->id)) }}" target="_blank">
                                                    <i class="mdi mdi-text-box-multiple-outline mr-2 text-muted font-18 vertical-middle"></i>Invoice
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card-box-->
        </div>
    </div>
    <!-- </div> -->

</div>
@endsection
