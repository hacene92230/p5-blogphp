<?php

namespace System\Coeur\Models;

use PDO;
use System\Base\DB;

abstract class Model
{
    protected static $table = '';
    protected static $primary = 'id';
public function get(int $id, int $output_style = PDO::FETCH_OBJ): array
    {
        $table = static::$table;
        $primary = static::$primary;
        return $this->request("SELECT * FROM $table WHERE $primary = :id", [':id' => $id], $output_style);
    }

    public function get_all(int $output_style = PDO::FETCH_OBJ): array
    {
        	$table = static::$table;
		return $this->request("SELECT * FROM $table ",[],$output_style);
    }

    public function columns(): array
    {
        $table = static::$table;
        return  $this->request("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table' AND table_schema = DATABASE();", [], PDO::FETCH_COLUMN);
    }

    public function update(int $id, array $values): bool
    {
        $primary = static::$primary;
        $table = static::$table;
        $columns = [];
        foreach ($values as $k => $value) {
            if ($k !==  $primary) {
                $columns[]  = "$k =" . DB::get()->quote($value);
            }
        }
        $columns =  implode(', ', $columns);
        $sql = "UPDATE $table SET $columns WHERE $primary = :id";
        return  $this->execute($sql, [':id' => $id]);
    }

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

    public function truncate(string $table): bool
    {
        $table = static::$table;
        return $this->execute("TRUNCATE $table",[]);
    }

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

    public function execute(string $sql, array $args): bool
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
        $bool = $query->execute();
        $query->closeCursor();
        unset($query);
        return $bool;
    }

    public function request(string $sql, array $args, int $output_style): array
    {
        $pdo  = DB::get();
        $query =  $pdo->prepare($sql);
        foreach ($args as $k => $v) {
            if (is_numeric($v)) {
                $query->bindValue($k, $v, PDO::PARAM_INT);
            } elseif (is_bool($v)) {
                $query->bindValue($k, $v, PDO::PARAM_BOOL);
            } elseif (is_null($v)) {
                $query->bindValue($k, $v, PDO::PARAM_NULL);
            } elseif (is_string($v)) {
                $query->bindValue($k, $v, PDO::PARAM_STR);
            } else {
                $query->bindValue($k, $v);
            }
        }
        $query->execute();
        $all  = $query->fetchAll($output_style);
        $query->closeCursor();
        unset($query);
        return $all;
    }
}
