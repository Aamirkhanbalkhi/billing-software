<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // INSET USER DETAIL IN TABLE QUERY

    public function AddUserDetail(Request $req)
    {
        $user = DB::table('users')
            ->insert([
                'user_type_id' => $req->UserType,
                'name' => $req->UserName,
                'phone_number' => $req->UserNumber,
                'address' => $req->UserAddress,
                'email' => $req->UserEmail,
                'account_holder_name' => $req->AccountHolderName,
                'account_number' => $req->AccountNumber,
                'bank_name' => $req->BankName,
                'ifsc_code' => $req->IFSC,
                'zip_code' => $req->ZipCode,
                'state' => $req->State,
                'branch_address' => $req->BranchAddress,
                'created_at' => now(),
            ]);
        if ($user) {
            return redirect()->route('ManageParties')->with('success', 'Your Record Insert Succesfully');
        }
    }

    // SHOW USER DETAIL IN TABLE QUERY

    public function ShowUserDetail()
    {
        $type = DB::table('users')->join('usertypes', 'users.user_type_id', '=', 'usertypes.id')->select('users.*', 'usertypes.type_name')->get();
        // dd($type);
        return view('ManageParties', ['data' => $type]);
    }

    // DELETE USER DETAIL QUERY

    public function DeleteUser($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        if ($user) {
            return redirect()->route('ManageParties')->with('success', 'Your record deleted');
        }
    }

    // GO TO UPDATE USER DETAIL PAGE QUERY

    public function UpdateDetailPage(string $id)
    {
        $user = DB::table('users')->find($id);
        return view('UpdateDetail', ['data' => $user]);
    }

    // USER DETAIL UPDATE QUERY

    public function DetailUpdate(Request $req, $id)
    {
        $user = DB::table('users')->where('id', $id)->update([
            'name' => $req->UserName,
            'phone_number' => $req->UserNumber,
            'address' => $req->UserAddress,
            'account_holder_name' => $req->AccountHolderName,
            'account_number' => $req->AccountNumber,
            'bank_name' => $req->BankName,
            'ifsc_code' => $req->IFSC,
            'zip_code' => $req->ZipCode,
            'state' => $req->State,
            'updated_at' => now(),
        ]);
        if ($user) {
            return redirect()->route('ManageParties')->with('success', 'Your record Update Successfully');
        }
    }

    // SHOW EXISTING CLIENTS

    public function ShowExistingClient(Request $req)
    {
        $id = $req->input('user_id');
        $user = DB::table('users')->find($id);
        return view('CreateBill', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches the authenticated user's password
        if (Hash::check($request->current_password, $user->password)) {
            // Update the password in the database
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => Hash::make($request->new_password)]);

            return redirect()->route('home')->with('success', 'Password changed successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid current password.');
        }
    }
}
