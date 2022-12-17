<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Comments extends Model
{
    protected static $table = 'comments';
    protected static $primary = 'id';
    //Deletes the comments of a user passed in parameter.
    public function delete_comment_of_user(int $user)
    {
        return $this->request('delete FROM comments WHERE user_id = :user', [':user' => $user], PDO::FETCH_ASSOC);
    }

    //Retrieves the first name of a user who submitted a comment.
    public function get_user_of_comment($user_id)
    {
        return $this->request('SELECT firstname FROM users, comments WHERE comments.user_id = :user_id', [':user_id' => $user_id], PDO::FETCH_ASSOC);
    }

    //Retrieves approved comments belonging to an article.
    public function get_comment_approve_by_post($post_id)
    {
        return $this->request('SELECT *FROM comments WHERE approval = 1 and posts_id = :post_id', [':post_id' => $post_id], PDO::FETCH_ASSOC);
    }
}
