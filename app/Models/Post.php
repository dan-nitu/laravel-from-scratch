<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // ^ v1) set the guarded fields which CAN NOT be filled by the user
    // protected $fillable = ['title', 'excerpt', 'body'];
    // ^ v2) set the fields which CAN be filled by the user
    // protected $guarded = [];
    // v3) !!! disable mass asignment restriction

    protected $with = ['category', 'author'];
    // include relationships (category and author) in the fetch to reduce the querries number

    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
