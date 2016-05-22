<?php

namespace HMS\Auth;

use HMS\Contracts\Auth\UserManager;

class KerberosUserManager implements UserManager
{

    /**
     * Add a new user with the given username and password.
     *
     * @param  string $username
     * @param  string $password
     * @return void
     */
    public function add($username, $password)
    {
        // TODO: Implement add() method.
    }

    /**
     * Remove the new with the given username.
     *
     * @param  string $username
     * @return void
     */
    public function remove($username)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Check if a user with the given username exists.
     *
     * @param  string $username
     * @return boolean
     */
    public function exists($username)
    {
        // TODO: Implement exists() method.
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
        // TODO: Implement setPassword() method.
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
        // TODO: Implement checkPassword() method.
    }
}