<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \TCG\Voyager\Models\Role
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {

        return $this->belongsToMany(User::class, 'user_roles')
                    ->select(app(User::class)->getTable().'.*')
                    ->union($this->hasMany(User::class))->getQuery();
    }

}
