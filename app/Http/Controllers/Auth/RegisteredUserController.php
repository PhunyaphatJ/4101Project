<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Person;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Admin;
use App\Models\Address;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        if($request->role == 'admin' || $request->role == 'professor'){
            if(!Auth::check() ){
                return redirect()->back()->with('error', 'You must be logged in to create');
            }
            if (Auth::user()->role != 'admin'){
                return redirect()->back()->with('error', 'You Need a permission to create');
            }
        }

        DB::transaction(function () use ($request) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            Person::create([
                'email' => $request->email,
                'prefix' => $request->prefix,
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
            ]);
    
    
            switch ($request->role){
                case 'student':
                    $address = Address::create([
                        'house_no' => $request->house_no,
                        'village_no' => $request->village_no,
                        'road' => $request->road,
                        'sub_district' => $request->sub_district,
                        'district' => $request->district,
                        'province' => $request->province,
                        'postal_code' => $request->postal_code,
                    ]);
        
                    Student::create([
                        'email' => $request->email,
                        'student_id' => $request->student_id,
                        'student_type' => 'no_register',
                        'department' => $request->department,
                        'address_id' => $address->address_id,
                    ]);
                    break;            
                case 'professor':
                    Professor::create([
                        'email' => $request->email,
                        'professor_id' => $request->professor_id,
                        'remark' => $request->remark,
                        'status' => $request->status,
                        'assigned' => false,
                        'last_assigned_at' => now(),
                    ]);
                    break;
                default:
                    Admin::create([
                        'email' => $request->email,
                        'status' => $request->status,
                    ]);
            }
            event(new Registered($user));
            if(!Auth::check()){
                Auth::login($user);
                // return redirect('/'); 
            }
        });
        if ($request->role == 'professor') {
            return redirect()->route('manage_users', ['users_type' => 'professor']);
        }
       

        return redirect()->back();
    }
}
