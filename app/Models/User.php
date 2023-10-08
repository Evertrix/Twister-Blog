<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Stripe\Plan;
use Stripe\Subscription;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

//    public function setPasswordAttribute($password){
//        $this->attributes['password'] = bcrypt($password);
//    }

    public function posts(){ // $user->post : If you have an existing user and want to grab their post, then you need method called posts
        return $this->hasMany(Post::class); // A User can have many posts
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id'); // A Post has Many comments
    }

//    public function subscribed()
//    {
//        $user = User::all();
//        $email = User::all()->pluck('email');
//        $stripeToken = Plan::all()->pluck('stripe_id');
//        $user->newSubscription('main', 'monthly')->create($stripeToken, [
//            'email' => $email,
//        ]);
//    }
}
