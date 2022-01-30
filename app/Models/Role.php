<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guar_name'];
    protected $hidden = ['updated_at'];

    public function user()
    {
        return $this->hasOne('App\Models\Role');
    }
}
