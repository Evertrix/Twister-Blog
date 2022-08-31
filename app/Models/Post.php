<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'image',
        'user_id',
        'post_id',
        'category_id',
        'parent_id',
    ];
//    protected $guarded = [
//        'user_id',
//        'category_id',
//    ];

    public function scopeFilter($query, $filters)
    { // Post::newQuery()->filter();
        if ($filters['search'] ?? false) {
            $query->where(fn($query) => $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
            );
        }

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        ),
        );

        $query->when($filters['user'] ?? false, fn($query, $user) => $query->whereHas('user', fn($query) => $query->where('username', $user)
        ),
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = str_replace(" ", "-", lcfirst($value));
    }

    public function comments()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Comment::class)->whereNull('parent_id'); // A Post has Many comments
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);  // A Post belongs to a User
    }
}
