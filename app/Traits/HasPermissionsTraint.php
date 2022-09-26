<?php 
namespace App\Traits;
use App\Models\Permission;
use App\Models\Roles;

trait HasPermissionsTraint{
    //give permission
    public function getAllPermissions($permission){
        return Permission::whereIn('slug',$permission)->get();
    }

    //check has permission
    public function hasPermission($permission){
        return $this->permisssions->where('slug',$permission->slug)->count();
    }

    //check has roles
    public function hasRole(...$roles){
        foreach($roels as $role){
            if($this->roles->contains('slug',$slug)){
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission){
        return $this->hasPermissionThroughRole($permission) || this->hasPermission($permission);
    }
     
    public function hasPermissionThroughRole($permission){
        foreach($permissions->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    public function givePermissionTo(...$permissions){
        $permissions= $this->getAllPermissions($permissions);
        if($permissions == null){
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function permissions(){
        return $this->belongsTomany(Permission::class,'users_permissions');
    }

    public function roles(){
        return $this->belongsTomany(Role::class,'users_roles');
    }

}

?>