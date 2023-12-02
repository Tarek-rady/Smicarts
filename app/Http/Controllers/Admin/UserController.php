<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest ;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.admin.users.index' , compact('users'));
    }


    public function create()
    {
        return view('backend.admin.users.create');
    }


    public function store(UserRequest $request)
    {
        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/users/'), $file_name);
            $request_data['img'] = $file_name;
        }

        $request_data['email_verified_at'] = now();
        $request_data['remember_token'] = Str::random(10);

        $user = User::create($request_data);

        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('users.index');
    }



    public function edit($id)
    {
        $user = User::Where('id' , $id)->first();
        return view('backend.admin.users.edit' , compact('user'));

    }


    public function update(UserRequest $request, $id)
    {
        $user = User::Where('id' , $id)->first();
        $request_data = $request->all();
        $request_data['email_verified_at'] = now();
        $request_data['remember_token'] = Str::random(10);
        $user->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $user->img;
            $user->img = $new_file_name ;
            Storage::disk('users')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/users/'), $new_file_name);
        }

        $user->save();
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('users.index');


    }


    public function destroy($id)
    {



        $users = User::where('id' , $id)->first();


        $old_file_name = $users->img;

        if (!empty($users->name)) {

            Storage::disk('users')->delete($users->id);

        }

        User::destroy($id);

        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('users.index');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'User.xlsx');
    }
}
