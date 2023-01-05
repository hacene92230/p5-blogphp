<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

/**
 * Classe de gestion des articles de blog
 */
class Posts extends Model
{
    protected static $table = 'posts';
    protected static $primary = 'id';

    /**
     * Récupère un article à partir de son identifiant
     *
     * @param int $id Identifiant de l'article
     * @return array
     */
    public function getPostById(int $id): array
    {
        return $this->request('SELECT * FROM posts p WHERE p.id = :id', [':id' => $id], PDO::FETCH_ASSOC);
    }
}
