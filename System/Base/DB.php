<?php

namespace System\Base;

use PDO;
use PDOException;

/**
 * Class utilisée pour obtenir une instance de PDO
 * Utilisation :
 * $pdo = DB::get();
 */
class DB
{
    // Constantes définissant les informations de connexion à la base de données
    const DATABASE = 'p5';
    const USERNAME = 'root';
    const PASSWORD = '';

    // Variable statique stockant l'instance de PDO
    private static $pdo;

    /**
     * Méthode statique retournant l'instance de PDO
     * Si l'instance n'a pas encore été créée, elle est initialisée
     *
     * @return PDO
     * @throws PDOException Si une erreur de connexion se produit
     */
    public static function get(): PDO
    {
        if (is_null(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    sprintf(
                        'mysql:host=localhost;port=3306;dbname=%s;charset=UTF8',
                        self::DATABASE
                    ),
                    self::USERNAME,
                    self::PASSWORD
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$pdo;
            } catch (PDOException $exception) {
                die('Erreur de connection :' . $exception->getMessage());
            }
        }
        return self::$pdo;
    }
}
