<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{   
    public function UserForm(Request $request)
    {
      return view('test');
    }
    public function AddUser(Request $request)
    {
      $user= User::Create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'password'=>hash::make($request->phone)
      ]);
      $user->assignRole('user');
      return redirect('ShowData')->with('message','User Added');
    }   
    public function DeleteUser($id)
    {
       $users = User::find($id);    
       $users->delete();
       return response()->json(['sucess'=>'Record Has Been Delete']);
    }

    public function updateStudent(Request $request)
    {
       
        $users = User::find($request->id);

        $users->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
    
        return true;

    }

    public function getUserId($id)
    {
    
        $users = User::find($id);
        return response()->json($users);
    }


    public function EditAllData(User $users)
    {
        $data = User::all();
        $us =  User::role('user')->get();
        $admin = User::role('admin')->get(); // Returns only users with the role 'admin'
        return view('admin.Modal.Data', compact('data','admin','us','users'));
    }

    public function UpdateAllData(request $request,$id)
    {


;        $users = User::find($id);
        $users->update([
            'name' =>$request->name ,
            'email' =>$request->email,
            'password' =>$request->password
        ]);
        return response()->json('done');
    }

    public function DataUpdate(User $users)
    {   
        return view('admin.DataUpdate' , compact('users'));
    }

    public function DataUpdated(User $users,Request $request)
    {   
        // dd($users);
        $users->update([
            'name' =>$request->name ,
            'email' =>$request->email,
            'password' =>$request->password
        ]);

        return redirect('/admin/data')->with('message','User Edited Succesfully');
    }

    public function testroute()
    {
        return view('Modal.RegisterAdmin');
    }

    public function storetesting(request $Request)
    {
        $user=User::create([
            'name'=>$Request->name,
            'email' => $Request->email,
            'email_verified_at' => now(),
            'password' => hash::make($Request->password), // password
           
        ]);
        $user->assignRole('user');
        return response()->json();
    }

    public function index()
    {
        return view('index');
    }

    public function registeradmin()
    {
        return view('registeradmin');
    }

    public function storeadmin(Request $Request)
    {   
     
    
        $user=User::create([
            'name'=>$Request->name,
            'email' => $Request->email,
            'email_verified_at' => now(),
            'password' => hash::make($Request->password), // password
            'phone' => "080080800"
        ]);
         $user->assignRole('admin','writer');
        //  $role->givePermissionTo($permission);
        return response()->json('done');
        //  return redirect('admin/registeradmin')->with('message', 'NEW ADMIN REGISTERED SUCCESFULLY');
    }

    public function showdata(User $users)
    {    
        // dd($users);
        $data = User::all();      
        // $all_users_with_all_their_roles = User::with('roles')->get();
        $us =  User::role('user')->get();
      
        $admin = User::role('admin')->get(); // Returns only users with the role 'admin'
        return view('data', compact('data','admin','us','users'));
    }
    public function showroles()
    {
        // $roles = Role::wherenotin('name',['admin'])->get();
        $roles=Role::all();
        return view('admin.roles', compact('roles'));
    }

    public function showpermission()
    {
        $permissions = Permission::all();
        return view('admin.permissions',compact('permissions'));
    }

    public function addrole()
    {
        return view('admin.addroles');
    }

    public function storerole(Request $request)
    {
        Role::create([
            'name'=> $request->name
        ]);
        return redirect('/roles')->with('message','New Role Created Succesfully');
    }

    public function addpermission()
    {
        return view('admin.addpermission');
    }

    public function storepermission(Request $request)
    {
        Permission::create([
            'name'=> $request->name
        ]);
        return redirect('/admin/Permission')->with('message','New Permission Created Succesfully');
    }


    public function editpermission(permission $permissions)
    {
        return view('admin.permissionsedit',compact('permissions'));
    }
    public function updatepermission (permission $permissions,Request $request)
    {   
        $validated = $request->validate(['name'=>'required']);
        $permissions->update($validated);

        return redirect('admin/Permission')->with('message','PERMISSION UPDATED SUCCESFULLY ');
    }

    public function editrole(Role $roles)
    {
        $permissions = Permission::all();
        return view('admin.rolesedit',compact('roles','permissions'));
    }
    public function updaterole (Role $roles,Request $request)
    {   
        $validated = $request->validate(['name'=>'required']);
        $roles->update($validated);

        return redirect('admin/roles')->with('message','roles UPDATED SUCCESFULLY ');
    }

    public function deleterole(Role $roles)
    {
        $roles->delete();
        return redirect('admin/roles')->with('message', 'Role Deleted Succesfully ');
    }

    public function deletepermission(Permission $permissions)
    {
        $permissions->delete();
        return redirect('admin/Permission')->with('message', 'Permission Deleted Succesfully ');
    }

    public function assignpermission(Request $request,Role $roles)
    {
        if($roles->hasPermissionTo($request->permissions))
        {
            return back()->with('message', 'permssion already exists');
        }
        $roles->givePermissionTo($request->permissions);
        return back()->with('message','Permission Has Been Assigned');
    }

    public function revokepermissions(Role $roles,Permission $permissions)
    {
        if($roles->hasPermissionTo($permissions))
        {
            $roles->revokePermissionTo($permissions);
            return back()->with('message', 'permssion has been revoked');
        }
        return back()->with('message', 'permssion Does not exist');
    }
}
