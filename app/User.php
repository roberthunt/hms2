<?php

namespace App;

use HMS\Contracts\Auth\UserManager;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();
        $userManager = App::make(UserManager::class);

        // Listen for create
        self::creating(function ($user) use($userManager) {

            if (! $userManager->exists($user['email'])) {
                $userManager->add($user['email'], $user['password']);
                unset($user['password']);
            } else {
                // Abort create, there is already a user with this email
                return false;
            }

        });

        // Listen for password changes
        self::updating(function ($user) use ($userManager) {

            if (array_key_exists('password', $user->getDirty())) {
                $userManager->setPassword($user['email'], $user['password']);
                unset($user['password']);
            }
        });
    }
}
