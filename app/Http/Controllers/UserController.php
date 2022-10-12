<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function userprofile(User $user)
  {
    return view('backend.profile.profile', compact('user'));
  }
  public function update(Request $request, User $user)
  {
    $user->update([
      'name' => $request->name,
      'department' => $request->department,
      'email' => $request->email,
      'type' => auth()->user()->type,
    ]);
    if ($request->password != null) {
      $user->password = Hash::make($request['password']);
      $user->save();
    }
    toastr()->success('Updated');

    return redirect()->back();
  }

  //for employee-management
  public function addEmployee()
  {
    return view('backend.employee.add');
  }

  public function storeEmployee(Request $request)
  {
    User::create([
      'name' => $request->name,
      'department' => $request->department,
      'email' => $request->email,
      'type' => "employee",
      'password' => Hash::make($request['password'])
    ]);
    toastr()->success('Employee Added');

    return redirect()->back();
  }
  public function employeeDelete(User $user)
  {
    $user->delete();
    toastr()->success('Deleted');

    return redirect()->back();
  }

  public function updateEmployee(Request $request, User $user)
  {
    $user->update([
      'name' => $request->name,
      'department' => $request->department,
      'email' => $request->email,
      'type' => "employee",
    ]);
    if ($request->password != null) {
      $user->password = Hash::make($request['password']);
      $user->save();
    }
    toastr()->success('Updated');

    return redirect()->back();
  }
}
