<?php

namespace System\Coeur\Models;

use PDO;
use System\Base\DB;

abstract class Model
{
    // Nom de la table en base de données associée au modèle
    protected static $table = '';
    // Nom de la colonne de la table qui sert de clé primaire
    protected static $primary = 'id';

    /**
     * Récupère un enregistrement de la table associée au modèle en fonction de son ID
     *
     * @param int $id ID de l'enregistrement à récupérer
     * @param int $output_style Style de sortie des données (par défaut, un objet PHP)
     * @return array Tableau contenant les données de l'enregistrement récupéré
     */
    public function get(int $id, int $output_style = PDO::FETCH_OBJ): array
    {
        $table = static::$table;
        $primary = static::$primary;
        return $this->request("SELECT * FROM $table WHERE $primary = :id", [':id' => $id], $output_style);
    }

    /**
     * Récupère tous les enregistrements de la table associée au modèle
     *
     * @param int $output_style Style de sortie des données (par défaut, un objet PHP)
     * @return array Tableau contenant tous les enregistrements de la table
     */
    public function get_all(int $output_style = PDO::FETCH_OBJ): array
    {
        $table = static::$table;
        return $this->request("SELECT * FROM $table ", [], $output_style);
    }

    /**
     * Récupère les noms de toutes les colonnes de la table associée au modèle
     *
     * @return array Tableau contenant les noms de toutes les colonnes de la table
     */
    public function columns(): array
    {
        $table = static::$table;
        return  $this->request("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table' AND table_schema = DATABASE();", [], PDO::FETCH_COLUMN);
    }

    /**
     * Met à jour un enregistrement de la table associée au modèle en fonction de son ID
     *
     * @param int $id ID de l'enregistrement à mettre à jour
     * @param array $values Valeurs à mettre à jour (clé = nom de colonne, valeur = nouvelle valeur)
     * @return bool TRUE si la mise à jour a réussi, FALSE sinon
     */
    public function update(int $id, array $values): bool
    {
        $primary = static::$primary;
        $table = static::$table;
        $columns = [];
        // Construit une liste de clauses SET avec les nouvelles valeurs à mettre à jour
        foreach ($values as $k => $value) {
            if ($k !==  $primary) {
                $columns[]  = "$k =" . DB::get()->quote($value);
            }
        }
        $columns =  implode(', ', $columns);
        $sql = "UPDATE $table SET $columns WHERE $primary = :id";
        return  $this->execute($sql, [':id' => $id]);
    }

    /**
     * Ajoute un nouvel enregistrement dans la table associée au modèle
     *
     * @param array $values Valeurs à ajouter (clé = nom de colonne, valeur = valeur à ajouter)
     * @return bool TRUE si l'ajout a réussi, FALSE sinon
     */
    public function register(array $values): bool
    {
        $table = static::$table;
        $columns = $this->columns();
        $x = '(' . implode(', ', $columns) . ')';
        $sql = "INSERT INTO {$table} $x VALUES( ";
        foreach ($columns as $column) {
            if (array_key_exists($column, $values)) {
                $sql .= DB::get()->quote($values[$column]) . ',';
            } else {
                $sql .= 'NULL,';
            }
        }
        $sql = trim($sql, ',');
        $sql .= ')';
        return $this->execute($sql, []);
    }

    /**
     * Vide entièrement la table associée au modèle
     *
     * @param string $table Nom de la table à vider (doit être la même que celle associée au modèle)
     * @return bool TRUE si la table a été vidée, FALSE sinon
     */
    public function truncate(string $table): bool
    {
        $table = static::$table;
        return $this->execute("TRUNCATE $table", []);
    }

    /**
     * Supprime un enregistrement de la table associée au modèle en fonction de son ID
     *
     * @param int $id ID de l'enregistrement à supprimer
     * @return bool TRUE si la suppression a réussi, FALSE sinon
     */
    public function delete(int $id): bool
    {
        $table = static::$table;
        $primary = static::$primary;
        return $this->execute(
            "DELETE FROM $table WHERE $primary = :id",
            [
                ':id' => $id
            ]
        );
    }

    /**
     * Exécute une requête SQL avec des paramètres.
     *
     * @param string $sql Requête SQL à exécuter.
     * @param array $args Paramètres à lier à la requête.
     * @return bool True si la requête a été exécutée avec succès, false sinon.
     */
    public function execute(string $sql, array $args): bool
    {
        // Récupère une instance de PDO.
        $pdo = DB::get();

        // Prépare la requête SQL.
        $stmt = $pdo->prepare($sql);

        // Lie chaque élément du tableau $args à un marqueur de paramètre dans la requête.
        foreach ($args as $key => $value) {
            // Détermine le type de données du paramètre.
            $type = PDO::PARAM_STR;
            if (is_int($value)) {
                $type = PDO::PARAM_INT;
            } elseif (is_bool($value)) {
                $type = PDO::PARAM_BOOL;
            } elseif (is_null($value)) {
                $type = PDO::PARAM_NULL;
            }

            // Lie le paramètre à la requête.
            $stmt->bindValue(':' . $key, $value, $type);
        }

        // Exécute la requête et retourne le résultat.
        return $stmt->execute();
    }


    /**
     * Exécute une requête de sélection avec les paramètres donnés
     *
     * @param string $sql Requête de sélection à exécuter
     * @param array $args Paramètres à lier à la requête
     * @param int $output_style Style de sortie des données (par défaut, un objet PHP)
     * @return array Tableau contenant les données sélectionnées
     */
    protected function request(string $sql, array $args, int $output_style = PDO::FETCH_OBJ): array
    {
        $pdo  = DB::get();
        $query =  $pdo->prepare($sql);
        foreach ($args as $k => $v) {
            if (is_numeric($v)) {
                $query->bindParam($k, $v, PDO::PARAM_INT);
            } elseif (is_bool($v)) {
                $query->bindParam($k, $v, PDO::PARAM_BOOL);
            } elseif (is_null($v)) {
                $query->bindParam($k, $v, PDO::PARAM_NULL);
            } elseif (is_string($v)) {
                $query->bindParam($k, $v, PDO::PARAM_STR);
            } else {
                $query->bindParam($k, $v);
            }
        }
        $query->execute();
        $results =  $query->fetchAll($output_style);
        $query->closeCursor();
        unset($query);
        return $results;
    }
}
