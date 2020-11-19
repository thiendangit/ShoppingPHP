<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    //
    use DeleteModelTrait;
    private $user;
    private $role;
    private $permission;
    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index(){
        $roles = $this->role->paginate(5);
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
        $roles = $this->role->all();
        $permissions = $this->permission->where('parent_id',0)->get();
        return view('admin.role.add',compact('permissions'));
    }

    public function store(UserRole $request)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataRoleCreate = [
                'name' => $request->name,
                'display_name' => $request->display_name,
            ];
            $role = $this->role->create($dataRoleCreate);
            $role -> permissions() -> attach($request-> permission_child_id);
            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function edit($id){
        $permissions = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permissions;
        return view('admin.role.edit',compact('permissions','role','permissionChecked'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataRoleUpdate = [
                'name' => $request->name,
                'display_name' => $request->display_name,
            ];
            $role = $this->role->find($id)->update($dataRoleUpdate);
            $this->role->find($id) -> permissions() -> sync($request-> permission_child_id);
            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id , $this->role);
    }

}
