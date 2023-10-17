<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UserGSTbillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ExistingClient()
    {
        $users = DB::table('users')->get();

        // Get the latest invoice number
        $latestInvoice = DB::table('gstbills')->orderBy('invoice_number', 'DESC')->select('invoice_number')->first();

        $newinvoice = $latestInvoice ? $latestInvoice->invoice_number + 1 : 1;
        // dd($newinvoice);
        return view('CreateBill', ['data' => $users, 'newinvoice' => $newinvoice]);
    }


    public function GSTUserInfoInsert(Request $req)
    {

        $user = DB::table('gstbills')->insert([
            'clint_id' => $req->user_id,
            'invoice_date' => $req->InvoiceDate,
            'invoice_number' => $req->InvocieNumber,
            'item_name' => $req->item_description,
            'item_amount' => $req->itemAmount,
            'cgst' => $req->cgst,
            'sgst' => $req->sgst,
            'igst' => $req->igst,
            'cgst_pre' => $req->cgst_amount,
            'sgst_Pre' => $req->sgst_amount,
            'igst_pre' => $req->igst_amount,
            'tax' => $req->tax_amount,
            'net_amount' => $req->net_amount,
            'info' => $req->Decription,
            'created_at' => now(),
        ]);
        if ($user) {
            $Id = DB::table('gstbills')->where('id', $req->InvocieNumber)
                ->orderBy('id', 'DESC')
                ->select('id')
                ->first();
            $Value = $Id->id;
            $CryptValue = base64_encode($Value);
            // $dryptValue = base64_decode($CryptValue);
            // $CryptValue = Crypt::encryptString($Value);
            // dd($Id);
            return redirect()->route('lastfivegstrec', $CryptValue)->with('success', 'Your Record Insert Succesfully');
        } else {
            return redirect()->back()->with('error', 'Please insert your items');
        }
    }


    public function InvoiceGSTBillPage($id)
    {
        // $myCompany = DB::table('company_names')->first();
        $deCrypt = base64_decode($id);
        $bill = DB::table('gstbills')->join('users', 'gstbills.clint_id', '=', 'users.id')
            ->where('gstbills.invoice_number', $deCrypt)
            ->orderBy('invoice_number', 'DESC')
            ->select('gstbills.*', 'users.name', 'users.phone_number', 'users.address', 'users.state', 'users.zip_code', 'users.account_number', 'users.ifsc_code', 'users.bank_name')
            ->first();

        // dd($myCompany);
        return view('printGSTBill', compact('myCompany'));
    }

    public function GetBills()
    {
        $UserBills = DB::table('gstbills')
            ->join('users', 'gstbills.clint_id', '=', 'users.id')
            ->select('gstbills.*', 'users.name', 'users.phone_number')
            ->get();
        // dd($UserBills);
        return view('ManageGST', ['bills' => $UserBills]);
    }

    public function deleteGstbill($id)
    {
        $deleteBill = DB::table('gstbills')->where('id', $id)->delete();
        if ($deleteBill)
            return redirect()->back()->with('success', 'Your Record delete Succesfully');
    }


    public function CompanyDetailUpdate(Request $req)
    {
        $user = DB::table('company_names')->update([
            'name' => $req->ComName,
            'phone_number' => $req->ComNumber,
            'address' => $req->ComAddress,
            'pan_number' => $req->comPanNumber,
            'gstin_number' => $req->ComGSTINNumber,
            'website' => $req->ComWebside,
            'email' => $req->ComEmail,
            'bank_name' => $req->CombankName,
            'account_number' => $req->CombankNumber,
            'ifsc_code' => $req->CombankIFSC,
            'updated_at' => now(),
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'Your record Update Successfully');
        }
    }
}
