<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Commentaires extends Model
    {
        protected static $table = 'commentaires';
	protected static $primary = 'com_id';
public function get_commentaire($concour)
{
	return $this->request('select * from commentaires where com_concour = :concour',[':concour' => $concour],PDO::FETCH_OBJ);
}
}
