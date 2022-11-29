<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Unique;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function UserView()
    {
        //    $allDataUser=User::all();
        $data['allDataUser'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd()
    {
        //    $allDataUser=User::all();
        //  $data['allDataUser']=User::all();
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'textNama' => 'required',
        ]);
        $data = new User();
        $data->usertype = $request->selectUser;
        $data->name = $request->textNama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('user.view')->with('info', 'Tambah User Berhasil');
    }

    public function UserEdit($id)
    {
        // dd('berhasil msuk');
        $editData = User::Find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = User::Find($id);
        $data->usertype = $request->selectUser;
        $data->name = $request->textNama;
        $data->email = $request->email;
        // if($request->password!=""){
        //     $data->password=bcrypt($request->password);
        // }
        $data->save();

        return redirect()->route('user.view')->with('info', 'Update User Berhasil');
    }
    public function UserDelete($id)
    {
        // dd('berhasil msuk');
        $deleteData = User::Find($id);
        $deleteData->delete();
        return redirect()->route('user.view')->with('info', 'Delete User Berhasil');
        return view('backend.user.edit_user', compact('editData'));
    }
}
