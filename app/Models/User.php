<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_b',
        'name_cer',
        'email',
        'permission',
        'profession',
        'gender',
        'phone',
        'd_o_b',
        'address',
        'blood',
        'fa_name',
        'mo_name',
        'nid',
        'text',
        'image',
        'remember_token',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['ordered_at', 'created_at', 'updated_at'];
    public function getSomeDateAttribute($date)
    {
        return $date->format('d/m/Y');
    }

    public function accessPermission()
    {
        return $this->hasOne(ModelHasRole::class, 'model_id','id');
    }
}


