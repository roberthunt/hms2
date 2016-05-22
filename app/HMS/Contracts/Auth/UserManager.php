<?php

namespace HMS\Contracts\Auth;

interface UserManager
{
    /**
     * Add a new user with the given username and password.
     *
     * @param  string  $username
     * @param  string  $password
     * @return void
     */
    public function add($username, $password);

    /**
     * Remove the new with the given username.
     *
     * @param  string  $username
     * @return void
     */
    public function remove($username);

    /**
     * Check if a user with the given username exists.
     *
     * @param  string  $username
     * @return boolean
     */
    public function exists($username);

    /**
     * Set the password for the given user.
     *
     * @param  string  $username
     * @param  string  $password
     * @return void
     */
    public function setPassword($username, $password);

    /**
     * Check the password for the given username.
     *
     * @param  string  $username
     * @param  string  $password
     * @return boolean
     */
    public function checkPassword($username, $password);
}