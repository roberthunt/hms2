<?php

namespace HMS\Auth;

use HMS\Contracts\Auth\UserManager;
use Illuminate\Support\Facades\Storage;

class FileBasedUserManager implements UserManager
{
    protected $usersFile;
    protected $users;

    /**
     * FileBasedUserManager constructor.
     */
    public function __construct($usersFile = 'users.json')
    {
        $this->usersFile = $usersFile;

        if (Storage::has($this->usersFile)) {
            $this->users = json_decode(Storage::get($this->usersFile), true);
        } else {
            $this->users = [];
        }
    }

    /**
     * Add a new user with the given username and password.
     *
     * @param  string $username
     * @param  string $password
     * @return void
     */
    public function add($username, $password)
    {
        $this->users[$username] = $password;
        $this->persistUsers();
    }

    /**
     * Remove the new with the given username.
     *
     * @param  string $username
     * @return void
     */
    public function remove($username)
    {
        unset($this->users[$username]);
        $this->persistUsers();
    }

    /**
     * Check if a user with the given username exists.
     *
     * @param  string $username
     * @return boolean
     */
    public function exists($username)
    {
        return array_key_exists($username, $this->users);
    }

    /**
     * Set the password for the given user.
     *
     * @param  string $username
     * @param  string $password
     * @return void
     */
    public function setPassword($username, $password)
    {
        $this->users[$username] = $password;
        $this->persistUsers();
    }

    /**
     * Check the password for the given username.
     *
     * @param  string $username
     * @param  string $password
     * @return boolean
     */
    public function checkPassword($username, $password)
    {
        return $this->users[$username] == $password;
    }

    private function persistUsers()
    {
        Storage::put($this->usersFile, json_encode($this->users, JSON_PRETTY_PRINT));
    }
}