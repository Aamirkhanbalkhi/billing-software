@extends('masterlayout.masterlayout')

@section('title')
Create Bill
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
                        <h4 class="page-title font-weight-bold text-uppercase"> Create Bill </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('insertGSTbill','id')}}" class="needs-validation" method="post">
                                @csrf
                                <h4 class="page-title red"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER CLIENT'S INFO</h4>
                                <hr>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Type</label>
                                        <select name="user_id" class="form-control prodect-field" id="validationCustom01" placeholder="Please select Type" required="">
                                            <option value="">Existing Client</option>
                                            @foreach($data as $user)
                                            @if (isset($user->phone_number))
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 ">
                                        <div class="form-group mb-3">
                                            <label>Invoice Date</label>
                                            <input type="date" name="InvoiceDate" class="form-control border-bottom addnewcss" id="validationCustom02" placeholder="Enter invoice date">
                                        </div>
                                    </div>

                                    <div class="col-md-4 ">
                                        <div class="form-group mb-3">
                                            <label>Invoice Number</label>
                                            <input type="text" name="InvocieNumber" class="form-control border-bottom addnewcss" id="validationCustom02" placeholder="Enter number" value="{{ $newinvoice }}">
                                        </div>
                                    </div>
                                </div>

                                <h4 class="page-title red"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER PRODUCT/ITEM DETAIL</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 border p-1">
                                        <span>DESCRIPTIONS</span>
                                    </div>
                                    <div class="col-md-4 border p-1">
                                        TOTAL AMOUNT
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-8 border p-2">
                                        <input class="form-control" name="item_description" />
                                    </div>
                                    <div class="col-md-4 border p-2">
                                        <input class="form-control" name="itemAmount" type="text" id="totalAmountInput" oninput="calculateNetAmount()">
                                    </div>
                                </div>

                                <div class="row mt-0">
                                    <div class="col-md-3">
                                        <label>CGST (%)</label>
                                        <input type="text" class="form-control prodect-field" name="cgst" placeholder="CGST Rate" id="cgst" oninput="calculateNetAmount()">
                                        <span class="float-right gststyle" id="cgstDisplay">0</span>
                                        <input type="hidden" id="cgstAmount" name="cgst_amount" value="0">
                                    </div>

                                    <div class="col-md-3">
                                        <label>SGST (%)</label>
                                        <input type="text" class="form-control prodect-field" name="sgst" placeholder="SGST Rate" id="sgst" oninput="calculateNetAmount()">
                                        <span class="float-right gststyle" id="sgstDisplay">0</span>
                                        <input type="hidden" id="sgstAmount" name="sgst_amount" value="0">
                                    </div>

                                    <div class="col-md-3">
                                        <label>IGST (%)</label>
                                        <input type="text" class="form-control prodect-field" name="igst" placeholder="IGST Rate" id="igst" oninput="calculateNetAmount()">
                                        <span class="float-right gststyle" id="igstDisplay">0</span>
                                        <input type="hidden" id="igstAmount" name="igst_amount" value="0">
                                    </div>

                                    <div class="col-md-3">
                                        <ul class="list-style">
                                            <li>
                                                <b>Total Amount:</b> ₹ <span type="text" id="totalAmountDisplay">0</span>
                                            </li>
                                            <li>
                                                <b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span>
                                                <input type="hidden" value="0" name="tax_amount" id="taxAmount">
                                            </li>
                                            <li>
                                                <b>Net Amount:</b> ₹ <span type="text" id="netAmountDisplay">0</span>
                                                <input type="hidden" value="0" name="net_amount" id="netAmount">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <input type="text" name="Decription" class="form-control prodect-field" id="validationCustom05" placeholder="Declaration" required="">
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

</div>
@endsection