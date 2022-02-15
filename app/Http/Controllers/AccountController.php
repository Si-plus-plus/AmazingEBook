<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use App\Rules\MatchPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function showRegisterForm() {
        return view('account.register', [
            'genders' => Gender::all(),
            'roles' => Role::all(),
        ]);
    }

    public function showLoginForm() {
        return view('account.login');
    }

    public function showUpdateForm() {
        $account = Auth::user();
        return view('account.update', [
            'account' => $account,
            'genders' => Gender::all(),
            'role' => Role::find($account->role_id),
        ]);
    }

    public function showMaintenanceForm() {
        $this->authorize('isAdmin');
        return view('account.maintenance', [
            'accounts' => Account::all()->where('delete_flag', 0),
            'roles' => Role::all(),
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home')->with(['success' => 'Logged out successfully']);
    }

    public function register(Request $request) {
        $this->validate($request, [
            //First, middle, dan last tidak boleh simbol => alphanumeric
            'first_name' => [ 'required', 'string', 'alpha_num', 'max:25' ],
            'middle_name' => [ 'max:25' ],
            'last_name' => [ 'required', 'string', 'alpha_num', 'max:25' ],

            'gender' => [ 'required' ],
            'role' => [ 'required' ],
            'email' => [ 'required', 'string', 'email'],
            'password' => [ 'required', 'string', 'regex:/[A-Za-z]*[0-9]+[A-Za-z]*/', 'min:8' ],
            'display_picture_link' => [ 'required', 'file', 'image', 'max:1024'],
        ]);

        $account = new Account;
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;

        $account->email = $request->email;
        $account->gender_id = $request->gender;
        $account->role_id = $request->role;
        $account->password = Hash::make($request->password);

        $image = $request->display_picture_link;
        $filename = now() . '-' . $image->getClientOriginalName();

        Storage::putFileAs('public/images/', $image, $filename);
        $account->display_picture_link = 'public/images/'. $filename;

        $account->delete_flag = 0;
        $account->modified_at = now();
        $account->modified_by = $account->first_name . " " . $account->last_name;
        $account->save();

        return redirect()->route('account.login')->with(['success' => 'Registered successfully']);
    }

    public function update(Request $request) {
        $this->validate($request, [
            //First, middle, dan last tidak boleh simbol => alphanumeric
            'first_name' => [ 'required', 'string', 'alpha_num', 'max:25' ],
            'middle_name' => [ 'max:25' ],
            'last_name' => [ 'required', 'string', 'alpha_num', 'max:25' ],

            'gender' => [ 'required' ],
            'email' => [ 'required', 'string', 'email'],
            'password' => [ 'required', 'string', 'regex:/[A-Za-z]*[0-9]+[A-Za-z]*/', 'min:8' ],
            'display_picture_link' => [ 'required', 'file', 'image', 'max:1024'],
        ]);

        $account = Account::find($request->account_id);
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;

        $account->gender_id = $request->gender;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);

        $image = $request->display_picture_link;
        $filename = now() . '-' . $image->getClientOriginalName();

        Storage::putFileAs('public/images/', $image, $filename);
        $account->display_picture_link = 'public/images/'. $filename;

        $account->modified_at = now();
        $account->modified_by = $account->first_name . " " . $account->last_name;
        $account->save();

        return redirect()->back()->with(['success' => 'Profile updated successfully']);
    }

    public function maintenance(Request $request)
    {
        $this->authorize('isAdmin');
        $admin = Auth::user()->first_name . " " . Auth::user()->last_name;

        $account = Account::find($request->account_id);
        $account->role_id = $request->role;
        $account->modified_at = now();
        $account->modified_by = $admin;
        $account->save();

        return redirect()->back()->with(['success' => 'Role changed successfully']);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $check = DB::table('accounts')
                    ->where('email', $request->email);

        $deleted=1;
        if($check->count()>0){
            $deleted = $check->first()->delete_flag;
        }

        if ($deleted != 1){
            if (Auth::attempt($credentials)){
                return redirect()->route('home')->with(['success' => 'Logged in successfully']);
            }
        }

        return redirect()->route('account.login')->withErrors([
            'message1' => 'Invalid Credentials',
        ]);
    }


    public function destroy(Request $request)
    {
        $this->authorize('isAdmin');

        $admin = Auth::user()->first_name . " " . Auth::user()->last_name;

        $account = Account::find($request->account_id);
        $account->role_id = 0;
        $account->delete_flag = 1;
        $account->modified_at = now();
        $account->modified_by = $admin;
        $account->save();

        return redirect()->back()->with(['success' => 'Account '.$account->first_name.' deleted successfully']);
    }
}
