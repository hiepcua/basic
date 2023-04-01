<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'username',
        'password',
        'phone',
        'dob',
        'position',
        'status',
        'last_login_ip',
        'last_login_at',
        'change_pass',
        'created_by',
        'updated_by',
        'parent_id',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'date',
    ];

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_TEXT     = [
        self::STATUS_ACTIVE   => "Hoạt động",
        self::STATUS_INACTIVE => "Ngừng HĐ",
    ];

    const ROLE_Admin     = 'Admin';
    const ROLE_SUB_ADMIN = 'SubAdmin';
    const ROLE_CONTENT   = 'Content';
    const ROLE_PRODUCT   = 'Product';
    const ROLE_VIEW      = 'View';

    function other_user()
    {
        return $this->hasOne(User::class, 'id', 'parent_id');
    }

    function avatar(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(File::class, 'id', 'image');
    }
}
