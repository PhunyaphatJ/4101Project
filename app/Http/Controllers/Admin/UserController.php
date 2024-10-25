<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function users(){
        $users = User::join('persons','users.email','=','persons.email')
                      ->select('users.id','users.email','users.role','persons.name','persons.surname')
                      ->paginate(10);
        return view('admin.users',compact('users')); 
    }

    function user_detail($user_id){
        $user = User::findOrFail($user_id);

        return view('admin.user_detail',compact('user'));
    }

    function professors(){
        $professors = Professor::get();

        return view('admin.professors',compact('professors'));
    }

    function students(){
        $students = Student::get();

        return view('admin.students',compact('students'));
    }

    function student(Request $request){
        if($request->name == null){
            
        }
    }


    function professor_update(Request $request,$professor_id){
        $request->validate(
            [
                'response_detail' => 'required'
            ],
            [
                'response_detail.required' => 'กรุณาป้อนข้อความ'
            ]
        );
        $professor = Professor::findOrFail($professor_id);

        $professor->status = $request->status;
        $professor->person->prefix = $request->prefix;
        $professor->person->name = $request->name;
        $professor->person->surname = $request->surname;
        $professor->professor_id = $request->professor_id;
        $professor->person->phone = $request->phone;

        $professor->save();

        return redirect()->back();
    }


     
}
