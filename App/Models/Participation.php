<?php
namespace App\Models;
	use System\Coeur\Models\Model;
    Use PDO;
    class Participation extends Model
    {
        protected static $table = 'participation';
	protected static $primary = 'par_id';
public function a_participer($concour,$utilisateur_id)
{
	return $this->request('select * from participation where  par_concour = :concour and par_utilisateur = :uti_id',[':concour' => $concour, ':uti_id' => $utilisateur_id],PDO::FETCH_OBJ);
}

public function get_participation($pseudo)
{
return $this->request("select * from utilisateurs join participation on participation.par_utilisateur = utilisateurs.uti_id join concours on concours.con_id =participation.par_concour where utilisateurs.uti_id = :pseudo ORDER BY par_date DESC",[':pseudo' => $pseudo],PDO::FETCH_OBJ);
}

public function get_participation_concour($concour)
{
return $this->request("select * from participation where par_concour = :concour",[':concour' => $concour],PDO::FETCH_OBJ);
}

public function get_participation_validitee($validitee)
{
	return $this->request("select par_id, par_concour, par_utilisateur, par_date, par_fichier, par_commentaire, par_texte, par_validitee, con_statut, con_id from participation, concours where par_concour = con_id and par_validitee = :validitee and con_statut = 3 ORDER BY par_concour ASC",[':validitee' => $validitee],PDO::FETCH_OBJ);
}

public function count(int $par_concour)
{
    return reset($this->request('SELECT COUNT(par_validitee) FROM participation WHERE participation.par_validitee = 1 and participation.par_concour = :concour',[':concour' => $par_concour],PDO::FETCH_COLUMN));
}
}
