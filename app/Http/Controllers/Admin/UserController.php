<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Person;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users(Request $request, $users_type)
    {
        $menu = 'menage_user';
        $request->validate(
            [
                'name' => 'nullable|string',
                'student_id' => 'nullable|string'
            ],
            [
                'name.string' => 'ชื่อจะต้องเป็นข้อความ',
                'student_id.string' => 'รหัสนักศึกษาจะต้องเป็นข้อความ'
            ]
        );

        $name = $request->input('name');
        $id = $request->input('id');

        if ($users_type == 'professor') {
            $query = Professor::query();
        } else {
            $query = Student::query();
        }

        if ($name) {
            $query->whereHas('person', function ($query) use ($name) {
                $query->where('name', 'like', $name . '%');
            });
        }

        if ($id) {
            if ($users_type == 'professor') {
                $query->where('professor_id', 'like', $id . '%');
            } else {
                $query->where('student_id', 'like', $id . '%');
            }
        }

        $users = $query->paginate(10);

        if ($users->isEmpty()) {
            session()->flash('error', 'ไม่พบบุคคลที่ตรงกับคำค้นหา');
        }

        return view('admin.users', compact('menu', 'users', 'users_type'));
    }



    function user_detail($user_type, $user_id)
    {
        $menu = 'menage_user';

        if ($user_type == 'professor') {
            $user = Professor::findOrFail($user_id);
        } else {
            $user = Student::findOrFail($user_id);
        }

        return view('admin.user_detail', compact('menu', 'user', 'user_type'));
    }

    function professor_register()
    {
        $menu = 'menage_user';
        return view('admin.professor_register', compact('menu'));
    }

    function user_update($user_type, $user_id)
    {
        $menu = 'menage_user';
        if ($user_type == 'professor') {
            $user = Professor::findOrFail($user_id);
            return view('admin.user_update', compact('menu', 'user_type', 'user'));
        } else {
            $user = Student::findOrFail($user_id);
            $path = public_path('raw_database.json');
            $data = json_decode(file_get_contents($path), false);
            $provinces = array_map(function ($item) {
                return $item->province;
            }, $data);
            $provinces = array_unique($provinces);
            $provinces = array_values($provinces);

            $amphoes = [];
            $tambons = [];
            return view('admin.user_update', compact('menu', 'user_type', 'user', 'provinces', 'amphoes', 'tambons'));
        }
    }

    function professor_update(Request $request, $user_type, $user_id)
    {
        //ยังไม่ได้ validate
        DB::beginTransaction();

        try {
            if ($user_type == 'professor') {
                $user = Professor::findOrFail($user_id);
                $user->status = $request->status;
                $user->professor_id = $request->professor_id;
            } else {
                $user = Student::findOrFail($user_id);
                $address = Address::findOrFail($user->address_id);
                $user->student_id = $request->student_id;
                $user->department = $request->department;
                $address->village_no = $request->village_no;
                $address->road = $request->road;
                $address->sub_district = $request->sub_district;
                $address->district = $request->district;
                $address->province = $request->province;
                $address->postal_code = $request->postal_code;
                $address->save();
            }
            $person = Person::where('email', $user->email)->first();
            $person->prefix = $request->prefix;
            $person->name = $request->name;
            $person->surname = $request->surname;
            $person->phone = $request->phone;

            $user->save();
            $person->save();
            DB::commit();

            return redirect()->route('manage_users', ['users_type' => $user_type])
            ->with('success', 'Update successful!');            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }
}
