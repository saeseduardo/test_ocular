<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'post_id'];
    protected $hidden = ['updated_at', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
