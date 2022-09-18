<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelHasRole extends Model
{
    use HasFactory;
    protected $guarded = [];
    const CREATED_AT = null;
    const UPDATED_AT = null;


    public function role(){
        return $this->belongsTo(Role::class);
    }
}
