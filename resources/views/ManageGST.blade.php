@extends('masterlayout.masterlayout')

@section('title')
GST Invoice List
@endsection

@section('content')
<div class="content-page">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold">MANAGE Bills</h2>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('masterlayout.alertMSG')


    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Manage GST Invoice</h4>
                    <!-- <a href="{{ url('CreateBill')}}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                        <i class="mdi mdi-plus-circle"></i> Create New Bill
                    </a> -->
                    <div id="row-callback-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="row-callback-datatable_length"><label>Show <select name="row-callback-datatable_length" aria-controls="row-callback-datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="row-callback-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="row-callback-datatable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="row-callback-datatable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed table-bordered" role="grid" aria-describedby="row-callback-datatable_info" style="width: 1250px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 200.4px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">S.No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 300.4px;" aria-label="Position: activate to sort column ascending">Cielnt's Info</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 146.4px;" aria-label="Office: activate to sort column ascending">Billing Info</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 74.4px;" aria-label="Age: activate to sort column ascending">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 140.4px;" aria-label="Start date: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ( $bills as $UserBills )
                                        <tr>
                                            <td>
                                                <?php echo $i++ ?>
                                            </td>

                                            <td>
                                                <ul class="list-unstyled">
                                                    <li><b>Name :- </b><span> {{$UserBills->name}}</span></li>
                                                    <li><b>Phone Number :- </b><span> {{$UserBills->phone_number}}</span></li>
                                                </ul>
                                            </td>

                                            <td>
                                                <ul class="list-unstyled">
                                                    <li><b>Total Amount :- </b><span> {{$UserBills->item_amount}}</span></li>
                                                    <li><b>TAX :- </b><span> {{$UserBills->tax}}</span></li>
                                                    <li><b>Net Amount :- </b><span> {{$UserBills->net_amount}}</span></li>
                                                </ul>
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($UserBills->invoice_date)->format('d-M-Y') }}
                                            </td>
                                            <td>

                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{$UserBills->id}}">
                                                            <i class="mdi mdi-alert-octagon-outline mr-2 text-muted font-18 vertical-middle"></i>Detail
                                                        </button>
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure delete this')" href="{{route('delete.bill', $UserBills->id)}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                                        <a class="dropdown-item" href="{{route('lastfivegstrec')}}/{{base64_encode($UserBills->id)}}" target="_blank">
                                                            <i class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i> Print
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </table>
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="basic-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatable_paginate">
                                    <ul class="pagination pagination-rounded">
                                        <li class="paginate_button page-item previous disabled" id="basic-datatable_previous"><a href="#" aria-controls="basic-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="basic-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="basic-datatable_next"><a href="#" aria-controls="basic-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row -->
<!-- Modal -->
@foreach ($bills as $UserBills)
<div class="modal fade" id="exampleModal{{$UserBills->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body p-1">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box m-0">
                            <div class="row">
                                <div class="col-6">
                                    <p class="m-1"><b>Date : </b>{{$UserBills->invoice_date}}</p>
                                </div>
                                <div class="col-6">
                                    <p class="m-1 float-right"><b>Bill No. : </b>{{$UserBills->invoice_number}}</p>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="row pt-1">
                                <div class="col-6">
                                    <p class="m-1"><b>Customer Name : </b>{{$UserBills->name}}</p>
                                </div>
                                <div class="col-6">
                                    <p class="m-1 float-right"><b>Phone No. : </b>{{$UserBills->phone_number}}</p>
                                </div>
                            </div>
                            <!-- <div class="border-bottom"></div> -->

                            <!-- Logo & title -->

                            <div class="row">
                                <div class="col-12 p-0">
                                    <div class="table-responsive table-bordered">
                                        <table class="table mt-0 table-centered border">
                                            <thead>
                                                <tr>

                                                    <th class="py-0" style="background-color: rgb(130, 210, 241); color: black;">
                                                        DESCRIPTION</th>
                                                    <th style="width: 15%; background-color: rgb(130, 210, 241); color: black;" class="text-center py-1">
                                                        AMOUNT
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        {{$UserBills->item_name}}
                                                    </td>
                                                    <td class="text-center">{{$UserBills->item_amount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row border">
                                <div class="col-sm-12 col-lg-12 mt-1">
                                    <ul class="list-unstyled float-right">
                                        <li><b>Total Amount :</b> <span class="float-right"><i class="fas fa-rupee-sign ml-2"></i> {{$UserBills->item_amount}}</span></li>

                                        <li><b>TAX :</b><span class="float-right"><i class="fas fa-rupee-sign"></i> {{$UserBills->tax}}</span>
                                        </li>
                                        <li><b>Net Amount :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>{{$UserBills->net_amount}}</span>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{route('lastfivegstrec')}}/{{base64_encode($UserBills->id)}}" target="_blank" class="btn btn-primary waves-effect waves-light">Print
                    <i class="mdi mdi-printer mr-1"></i>
                </a>


                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
@endsection
