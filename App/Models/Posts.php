<?php

namespace App\Models;

use System\Coeur\Models\Model;
use PDO;

class Posts extends Model
{
    protected static $table = 'posts';
    protected static $primary = 'id';
}
