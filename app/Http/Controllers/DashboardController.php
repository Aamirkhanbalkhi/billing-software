<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getLastFiveVendorRecords()
    {
        // TOTAL VALUES

        $totalUsers = DB::table('users')->where('user_type_id', 3)->select('user_type_id')->count('user_type_id');
        $totalVendor = DB::table('vendor_invoices')->join('users', 'vendor_invoices.user_id', '=', 'users.id')->where('user_type_id', 3)->select('invoice_number')->count();
        $totalGST = DB::table('gstbills')->select('invoice_number')->count();

        // VENDORS LAST FIVE RECORDS

        $lastFiveRecords = DB::table('vendor_invoices')
            ->join('users', 'vendor_invoices.user_id', '=', 'users.id')
            ->where('user_type_id', 3)
            ->select('vendor_invoices.*', 'users.name', 'users.phone_number')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        // dd($lastFiveRecords);

        // GST BILL LAST FIVE RECORDS

        $lastFiveGSTRecords = DB::table('gstbills')
            ->join('users', 'gstbills.clint_id', '=', 'users.id')
            ->select('gstbills.*', 'users.name', 'users.phone_number', 'users.account_number')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('dashboard', compact('lastFiveRecords', 'lastFiveGSTRecords', 'totalUsers', 'totalVendor', 'totalGST'));
    }

    public function GetInvocieData($Invoice)
    {
        // GOTO VENDOR INVOICE

        // $decryptedValue = Crypt::decryptString($Invoice);
        $decryptedValue = base64_decode($Invoice);
        $invoiceInfo = DB::table('vendor_invoices')->join('users', 'vendor_invoices.user_id', '=', 'users.id')
            ->where('vendor_invoices.id', $decryptedValue)
            ->orderBy('invoice_number', 'DESC')
            ->select('vendor_invoices.*', 'users.name', 'users.phone_number', 'users.address', 'users.state', 'users.zip_code')
            ->first();
        // dd($invoiceInfo);

        $invoiceId =
            DB::table('vendor_invoices')
            ->where('id', $decryptedValue)
            ->orderBy('id', 'DESC')
            ->select('id')
            ->first();
        // dd($invoiceId);
        return view('publicbill', compact('invoiceInfo', 'invoiceId'));
    }

    // GOTO GST BILL INVOICE

    public function InvoiceGSTBillPage($id)
    {
        $myCompany = DB::table('company_names')->first();

        $deCrypt = base64_decode($id);
        $bill = DB::table('gstbills')->join('users', 'gstbills.clint_id', '=', 'users.id')
            ->where('gstbills.invoice_number', $deCrypt)
            ->orderBy('invoice_number', 'DESC')
            ->select('gstbills.*', 'users.name', 'users.phone_number', 'users.address', 'users.state', 'users.zip_code', 'users.account_number', 'users.ifsc_code', 'users.bank_name')
            ->first();
        // dd($id);
        return view('printGSTBill', compact('bill', 'myCompany'));
    }

    public function myAccount()
    {
        $myAccount = DB::table('company_names')->first();
        return view('myAccount', compact('myAccount'));
    }
    // public function myCompany()
    // {
    //     $myCompany = DB::table('company_names')->first();
    //     return view('printGSTBill', compact('myCompany'));
    // }
}
