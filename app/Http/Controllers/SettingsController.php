<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    //
    public function user()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function userEdit(Request $req, User $users)
    {
        $users = $users->find($req->id);
        $users->update($req->all());
        return \redirect('/user_management');
    }

    public function userDelete(Request $req, User $users)
    {
        $users = $users->find($req->id);
        $users->delete();
        return \redirect('/user_management');
    }
    public function userAdd(Request $req)
    {
        $users = new User();
        $users->name = $req->name;
        $users->email = $req->email;
        $users->password =  Hash::make($req->password); //isset($req->password)? $req->password : "";
        $users->save();
        return \redirect('/user_management');
    }

    public function password()
    {
        return view('change_pass');
    }

    public function passwordReset(Request $req)
    {
        $response = [];
        // $req->old_passw
        // $req->new_passw
        // $req->c_passw
        
        $user = User::find($req->user()->id);
        if ($req->new_passw != $req->c_passw) {
            $response['error'] = true;
            $response['msg'] = 'New password and Confirm password not match!';
        } elseif (!password_verify($req->old_passw, $user->password)) {
            $response['error'] = true;
            $response['msg'] = 'New password and Old password not match!';
        } elseif (password_verify($req->old_passw, $user->password)) {
            $user->password = Hash::make($req->c_passw);
            $user->save();
            $response['success'] = true;
            $response['msg'] = 'Password succefully updated!';
        }

        return view('change_pass', $response);
    }

}
