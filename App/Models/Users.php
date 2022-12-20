<?php

namespace App\Models;

use System\Coeur\Models\Model;
//use PDO;

class Users extends Model
{
    protected static $table = 'users';
    protected static $primary = 'id';
    //Finds a user by their email address.
    public function find_user($email)
    {
        return $this->request('SELECT * FROM users WHERE email = :email', [':email' => $email], PDO::FETCH_ASSOC);
    }
}
