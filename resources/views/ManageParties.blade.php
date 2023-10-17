@extends('masterlayout.masterlayout')

@section('title')
Manage Parties
@endsection

@section('content')
<div class="content-page">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold">MANAGE CLIENTS</h2>
            </div>
        </div>
    </div>
    @include('masterlayout.alertMSG')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Manage Vendor Invoice</h4>
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
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 300.4px;" aria-label="Position: activate to sort column ascending">Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 146.4px;" aria-label="Office: activate to sort column ascending">Name/Phone/Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 74.4px;" aria-label="Age: activate to sort column ascending">Bank Details</th>
                                            <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 140.4px;" aria-label="Start date: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ( $data as $user )
                                        <tr>
                                            <td><b><?php echo $i++ ?></b></td>
                                            <td>
                                                {{$user->type_name}}
                                            </td>

                                            <td>
                                                <ul class="list-unstyled">
                                                    <li><b>Name :</b><span> {{$user->name}}</span></li>
                                                    <li><b>Phone :</b><span> {{$user->phone_number}}</span></li>
                                                    <li><b>Address :</b> <span> {{$user->address}}</span></li>
                                                </ul>
                                            </td>

                                            <td>
                                                <ul class="list-unstyled">
                                                    <li><b>A/C Holder Name :</b><span> {{$user->account_holder_name}}</span></li>
                                                    <li><b>A/C Number :</b> <span> {{$user->account_number}}</span></li>
                                                    <li><b>Bank Name :</b><span> {{$user->bank_name}}</span></li>
                                                    <li><b>Branch address :</b> <span> {{$user->branch_address}}</span></li>
                                                    <li><b>IFSC Code :</b> <span> {{$user->ifsc_code}}</span></li>
                                                </ul>
                                            </td>

                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{route('UpdateClient', $user->id)}}"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure delete this')" href="{{ route('DeleteUser', $user->id) }}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                                        <a class="dropdown-item " href="{{ route('CreateInvoice', base64_encode($user->phone_number)) }}" target="_blank">
                                                            <i class="mdi mdi-text-box-multiple-outline mr-2 text-muted font-18 vertical-middle"></i>Create-Invoice
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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

@endsection
