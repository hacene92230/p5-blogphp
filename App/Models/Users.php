<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Users extends Model
{
    // Déclaration de la table et de la clé primaire utilisées dans les requêtes SQL
    protected static $table = 'users';
    protected static $primary = 'id';

    /**
     * Trouve un utilisateur en utilisant son adresse email
     *
     * @param string $email L'adresse email de l'utilisateur à trouver
     * @return array Les données de l'utilisateur trouvé sous forme de tableau associatif
     * @throws \InvalidArgumentException Si l'adresse email n'est pas une chaîne de caractères valide
     */
    public function findByEmail(string $email): array
    {
        if (!is_string($email)) {
            throw new \InvalidArgumentException('L\'adresse email doit être une chaîne de caractères');
        }

        return $this->request(
            'SELECT * FROM users WHERE email = :email',
            [':email' => $email],
            PDO::FETCH_ASSOC
        );
    }
}
