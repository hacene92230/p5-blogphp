<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Correction extends Model
    {
        protected static $table = 'correction';
	protected static $primary = 'cor_id';
public function get_correction($participation)
{
	return $this->request('select * from correction where  cor_participation = :participation',[':participation' => $participation],PDO::FETCH_OBJ);
}
}
