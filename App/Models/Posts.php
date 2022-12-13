<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Posts extends Model
{
    protected static $table = 'posts';
    protected static $primary = 'id';
    public function get_id_post(int $id)
    {
        return $this->request('SELECT * FROM posts WHERE id = :id', [':id' => $id], PDO::FETCH_ASSOC);
    }
}
