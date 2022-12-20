namespace System\Base;

use PDO;
use PDOException;

class DB
{
    private const DATABASE_CONFIG_FILE = __DIR__ . '/config/database.config.php';

    /**
     * Classe utilisée pour obtenir une instance de PDO.
     * Utilisation : 
     * $pdo = DB::get();
     */
    public static function get(): PDO
    {
        static $pdo = null;

        if (is_null($pdo)) {
            // Chargement des informations de connexion à partir d'un fichier de configuration
            $databaseConfig = require self::DATABASE_CONFIG_FILE;

            try {
                // Création de l'objet PDO
                $pdo = new PDO(
                    sprintf(
                        'mysql:host=%s;port=%s;dbname=%s;charset=UTF8',
                        $databaseConfig['host'],
                        $databaseConfig['port'],
                        $databaseConfig['database']
                    ),
                    $databaseConfig['username'],
                    $databaseConfig['password']
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Gestion de l'exception en lançant une exception personnalisée
                throw new DatabaseConnectionException($e->getMessage(), $e->getCode(), $e);
            }
        }

        return $pdo;
    }
}

// Classe exception personnalisée pour les erreurs de connexion à la base de données
class DatabaseConnectionException extends PDOException
{
}
