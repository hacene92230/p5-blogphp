<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Messagerie extends Model
{
    protected static $table = 'messagerie';
    protected static $primary = 'mes_id';
    public function find_message($destinataire)
    {
        return $this->request('SELECT * FROM messagerie, utilisateurs WHERE uti_id = mes_emetteur and mes_destinataire = :destinataire', [':destinataire' => $destinataire], PDO::FETCH_OBJ);
    }

    public function find_destinataire($destinataire)
    {
                        if (is_numeric($destinataire)) {
                            return $this->request('SELECT uti_id FROM utilisateurs WHERE uti_id = :destinataire', [':destinataire' => $destinataire], PDO::FETCH_ASSOC);
        } else {
        }
        return $this->request('SELECT uti_id FROM utilisateurs WHERE uti_pseudo = :destinataire', [':destinataire' => $destinataire], PDO::FETCH_ASSOC);
    }
}
