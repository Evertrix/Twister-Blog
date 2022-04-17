<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];

    public function post() // the name of the method is important. Laravel will use it to figure out the column name as: post_id
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Post::class); // A Comment belongs to a Post(A comment can be associated with many posts or it can belong to a single one)
    }


    public function user() // the name of the method is important. Laravel will use it to figure out the column name as: author_id. But in this case, we need to override it because the column name is 'user_id', so we do this: "return $this->belongsTo(User::class, 'user_id');"
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class); // A Comment belongs to an Author/User
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
