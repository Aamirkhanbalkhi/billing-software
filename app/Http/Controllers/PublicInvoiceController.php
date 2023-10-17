<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PublicInvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ! GET USER DATA FROM NUMBER
    public function CreateInvoice($id)
    {
        $decode = base64_decode($id);
        $user = DB::table('users')
            ->where('phone_number', $decode)
            ->first();

        // ! CREATE NEW INVOICE NUMBER QUARY
        $InvoiceNumber = DB::table('vendor_invoices')
            ->where('user_id', $user->id)
            ->orderBy('invoice_number', 'DESC')
            ->select('invoice_number')
            ->first();
        // dd($InvoiceNumber);
        if (!$InvoiceNumber) {
            $newinvoice = 1;
        } else {
            $newinvoice = $InvoiceNumber->invoice_number + 1;
        }
        return view('publicForm', compact('user', 'newinvoice'));
    }

    // ! PUBLIC INVOICE QUERY
    public function PublicInvoiceDetail(Request $req)
    {
        $user = DB::table('users')
            ->where('id', $req->UserId)
            ->first();

        $invoice = DB::table('vendor_invoices')
            ->insert([
                'user_id' => $req->UserId,
                'invoice_date' => $req->InvoiceDate,
                'invoice_number' => $req->InvoiceNumber, // Corrected spelling mistake
                'account_holder_name' => $user->account_holder_name,
                'account_number' => $user->account_number,
                'bank_name' => $user->bank_name,
                'ifsc_code' => $user->ifsc_code,
                'branch_address' => $user->branch_address,
                'item_description' => $req->item_description,
                'total_amount' => $req->TotalAmount,
                'net_amount' => $req->NetAmount,
                'created_at' => now(),
            ]);
        dd($invoice);
        if ($invoice) {
            $invoiceId = DB::table('vendor_invoices')->where('user_id', $user->id)
                ->orderBy('id', 'DESC')
                ->first();
            $Value = $invoiceId->id;
            $CryptValue = base64_encode($Value);
            // $CryptValue = Crypt::encryptString($Value);

            return redirect()->route('InvoiceNumber', $CryptValue)->with('success', 'Your Record Inserted Successfully');
        } else {
            return redirect()->back()->with('error', 'Please insert your items');
        }
    }

    // ! GOTO INVOICE PAGE
    public function InvoiceBillPage(string $invoiceNumber)
    {
        $user = DB::table('vendor_invoices')->where('id', $invoiceNumber)->get();
        return view('publicbill', compact('user'));
        // dd($user);
    }

    // GOTO VENROD INVOICE
    public function GetInvocieData($Invoice)
    {
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

    public function InvocieLists()
    {

        $invoiceslist =
            DB::table('vendor_invoices')->join('users', 'vendor_invoices.user_id', '=', 'users.id')
            ->select('vendor_invoices.*', 'users.name', 'users.phone_number', 'users.address', 'users.user_type_id')
            ->where('user_type_id', 3)
            ->get();
        // return base64_encode(100);
        return view('invoiceList', ['data' => $invoiceslist]);
    }
}
