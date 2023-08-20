<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use function PHPUnit\Framework\returnSelf;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = []; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function newsPost()  // User::with('newsPost')->get();
    {
        return $this->hasMany(NewsPost::class,'user_id','id');
    }

  /*   public function comment()
    {
        return $this->hasMany(NewsComment::class);
    } */

    public static function GetGroupPermission()
    {
        return DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    }

    public static function GroupByPermissionName($group_name)
    {
        return DB::table('permissions')->select('name','id')->where(['group_name'=>$group_name])->get();
    }

    public static function RoleHasPermisson($role,$permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if(!$role->hasPermissionTo($permission)){
                $hasPermission = false;
            }
        }
        return $hasPermission;
    }
}
