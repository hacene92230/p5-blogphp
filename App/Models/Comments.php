<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Comments extends Model
{
    protected static $table = 'comments';
    protected static $primary = 'id';
    public function get_comment_approve(int $approval)
    {
        return $this->request('SELECT * FROM comments WHERE approval = :approval', [':approval' => $approval], PDO::FETCH_ASSOC);
    }

    public function get_user_of_comment($user_id)
    {
        return $this->request('SELECT firstname FROM users, comments WHERE comments.user_id = :user_id', [':user_id' => $user_id], PDO::FETCH_ASSOC);
    }
}
