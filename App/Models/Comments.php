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
     * @return bool
     * @throws PDOException Si la requête SQL échoue
     */
    public function deleteCommentsOfUser(int $user): bool
    {
        try {
            $result = $this->request('DELETE FROM comments WHERE user_id = :user', [':user' => $user], PDO::FETCH_ASSOC);
            return $result !== false;
        } catch (PDOException $e) {
            throw $e;
        }
    }



    /**
     * Récupère le prénom d'un utilisateur qui a soumis un commentaire
     *
     * @param int $user_id ID de l'utilisateur
     * @return array
     * @throws PDOException Si la requête SQL échoue
     */
    public function getFirstnameByCommentUser(int $user_id): array
    {
        try {
            return $this->request('SELECT firstname FROM users, comments WHERE comments.user_id = :user_id', [':user_id' => $user_id], PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * Récupère les commentaires approuvés appartenant à un article
     *
     * @param int $post_id ID de l'article
     * @return array
     * @throws PDOException Si la requête SQL échoue
     */
    public function getApproved_CommentsByPost(int $post_id): array
    {
        try {
            return $this->request('SELECT * FROM comments WHERE approval = 1 AND posts_id = :post_id', [':post_id' => $post_id], PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
