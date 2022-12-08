<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Bannis extends Model
    {
        protected static $table = 'bannis';
	protected static $primary = 'ban_id';
public function get_ban($pseudo_id)
{
		return $this->request('SELECT * FROM utilisateurs, bannis WHERE uti_id = :pseudo_id',[':pseudo_id' => $pseudo_id], PDO::FETCH_OBJ);
}
}
