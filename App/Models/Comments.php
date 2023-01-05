<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Comments extends Model
{
    protected static $table = 'comments';
    protected static $primary = 'id';

    /**
     * Supprime les commentaires d'un utilisateur passé en paramètre
     *
     * @param int $user ID de l'utilisateur
     * @return array
     */
    public function delete_comments_of_user(int $user): array
    {
        return $this->request('DELETE FROM comments WHERE user_id = :user', [':user' => $user], PDO::FETCH_ASSOC);
    }

    /**
     * Récupère le prénom d'un utilisateur ayant soumis un commentaire
     *
     * @param int $user_id ID de l'utilisateur
     * @return array
     */
    public function get_user_of_comment(int $user_id): array
    {
        return $this->request('SELECT firstname FROM users u INNER JOIN comments c ON c.user_id = u.id WHERE c.user_id = :user_id', [':user_id' => $user_id], PDO::FETCH_ASSOC);
    }

    /**
     * Récupère les commentaires approuvés appartenant à un article
     *
     * @param int $post_id ID de l'article
     * @return array
     */
    public function get_comments_approved_by_post(int $post_id): array
    {
        return $this->request('SELECT * FROM comments WHERE approval = 1 AND posts_id = :post_id', [':post_id' => $post_id], PDO::FETCH_ASSOC);
    }
}
