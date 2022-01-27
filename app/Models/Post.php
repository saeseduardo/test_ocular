<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];
    protected $hidden = ['updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }
}
