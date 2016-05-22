<?php

namespace HMS\Auth;

use HMS\Contracts\Auth\UserManager;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class UserManagerUserProvider extends EloquentUserProvider
{
    protected $userManager;

    public function __construct(HasherContract $hasher, $model, UserManager $userManager)
    {
        // Note: $hasher is never used but required to construct EloquentUserProvider
        parent::__construct($hasher, $model);

        $this->userManager = $userManager;
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        return $this->userManager->checkPassword($credentials['email'], $credentials['password']);
    }
}