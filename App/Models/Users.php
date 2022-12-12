<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Users extends Model
    {
        protected static $table = 'users';
	protected static $primary = 'id';
public function find_user($email)
{
	return $this->request('SELECT * FROM users WHERE email = :email',[':email' => $email], PDO::FETCH_ASSOC);
}

public function get_profil($firstname)
{
	return $this->request('SELECT * FROM users, profil  WHERE profil = pro_id and firstname = :firstname',[':firstname' => $firstname], PDO::FETCH_ASSOC);
}

public function get_admin($profil)
{
return $this->request('SELECT * FROM users WHERE profil = :profil',[':profil' => $profil], PDO::FETCH_ASSOC);
}
}
    