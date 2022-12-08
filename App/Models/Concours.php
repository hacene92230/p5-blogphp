<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Concours extends Model
    {
        protected static $table = 'concours';
	protected static $primary = 'con_id';
public function get_statut($statut)
{
return $this->request('select sta_nom from statut where sta_id = :statut',[':statut' => $statut],PDO::FETCH_OBJ);
}

public function get_concour($statut1,$statut2="")
{
	return $this->request('select* from concours where con_statut = :statut1 or con_statut = :statut2',[':statut1' => $statut1, ':statut2' => $statut2],PDO::FETCH_OBJ);
}

public function get_limite($date_limite)
{
		return $this->request('select* from concours where con_date_fin <= :date_limite',[':date_limite' => $date_limite],PDO::FETCH_ASSOC);
}
}
