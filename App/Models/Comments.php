<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Comments extends Model
{
    protected static $table = 'comments';
    protected static $primary = 'id';
    public function get_commentaire($user)
    {
        return $this->request('select * from comments where id_user = :user', [':user' => $user], PDO::FETCH_OBJ);
    }
}
