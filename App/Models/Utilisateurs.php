<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Utilisateurs extends Model
    {
        protected static $table = 'utilisateurs';
	protected static $primary = 'uti_id';
public function find_user($pseudo)
{
	return $this->request('SELECT * FROM utilisateurs WHERE uti_pseudo = :pseudo',[':pseudo' => $pseudo], PDO::FETCH_ASSOC);
}

public function get_profil($pseudo)
{
	return $this->request('SELECT * FROM utilisateurs, profil  WHERE uti_profil = pro_id and uti_pseudo = :pseudo',[':pseudo' => $pseudo], PDO::FETCH_ASSOC);
}

public function get_admin($profil)
{
return $this->request('SELECT * FROM utilisateurs WHERE uti_profil = :profil',[':profil' => $profil], PDO::FETCH_ASSOC);
}
}
    