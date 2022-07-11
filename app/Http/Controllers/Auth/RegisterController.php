<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function createOrganizationUser($orgName,$email,$password){

        $user =  User::create([
            'name' => $orgName,
            'email' => $email,
            'password' => Hash::make($password),
        ]);



        $checkRole =  Role::where('name','organization_admin')->get();

        if(count($checkRole)>0){
            $role = Role::findByName('organization_admin');
            $role->givePermissionTo('organization_admin_permission');
            $user->assignRole([$role->id]);

        }else{
            $role = Role::create(['name' => 'organization_admin']);
            $role->givePermissionTo('organization_admin_permission');
            $user->assignRole([$role->id]);

        }

        return 1;

    }

	public function createEmployee($name, $email, $password, $role) {
		$user =  User::create([
			'name' => $name,
			'email' => $email,
			'password' => Hash::make($password),
		]);

		if($role == 'sales_manager') {
			$checkRole =  Role::where('name','sales_manager')->get();

			if(count($checkRole)>0) {
				$role = Role::findByName('sales_manager');
				$role->givePermissionTo('manager_permission');
				$user->assignRole([$role->id]);
			} else {
				$role = Role::create(['name' => 'sales_manager']);
				$role->givePermissionTo('manager_permission');
				$user->assignRole([$role->id]);
			}
		} else if($role == 'sales_supervisor') {
			$checkRole =  Role::where('name','sales_supervisor')->get();

			if(count($checkRole)>0) {
				$role = Role::findByName('sales_supervisor');
				$role->givePermissionTo('supervisor_permission');
				$user->assignRole([$role->id]);
			} else {
				$role = Role::create(['name' => 'sales_supervisor']);
				$role->givePermissionTo('supervisor_permission');
				$user->assignRole([$role->id]);
			}
		} else if($role == 'accountant') {
			$checkRole =  Role::where('name','accountant')->get();

			if(count($checkRole)>0) {
				$role = Role::findByName('accountant');
				$role->givePermissionTo('accountant_permission');
				$user->assignRole([$role->id]);
			} else {
				$role = Role::create(['name' => 'accountant']);
				$role->givePermissionTo('accountant_permission');
				$user->assignRole([$role->id]);
			}
		}

		return $user;
	}
}
