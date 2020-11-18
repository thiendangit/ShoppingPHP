<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdmindUserController extends Controller
{
    //
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->paginate(5);
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataUserCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $user = $this->user->create($dataUserCreate);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function edit($id){
        $userForEdit = $this->user->find($id);
        $roles = $this->role->all();
        $roleSelected = $userForEdit -> roles;
        return view('admin.user.edit',compact('userForEdit','roles', 'roleSelected'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $userForUpdate = $this->user->find($id);
            //Insert data to product table
            $dataUserUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $userForUpdate->update($dataUserUpdate);
            $userForUpdate->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id , $this->user);
    }
}
