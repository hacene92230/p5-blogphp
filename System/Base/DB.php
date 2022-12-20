<?php
namespace System\Base {
    use PDO;
	use PDOException;
    /**
     * Class utiliser pour avoir une instance de PDO
     * utilisation : 
     * $pdo = DB::get();
     */
    class DB    
    {
        const DATABASE = 'p5';
        const USERNAME = 'root';
        const PASSWORD = '';
        private static $pdo;
        public static function get(): PDO
        {
            if (is_null(static::$pdo))
	    	{
        		try
        		{
            		static::$pdo = new PDO(
                    	sprintf(
                        	'mysql:host=localhost;port=3306;dbname=%s;charset=UTF8',
                        	self::DATABASE),
                    		self::USERNAME,
                    		self::PASSWORD);
	static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              		return static::$pdo;
  				}
				catch( PDOException $Exception)
      			{
            		die ('Erreur de connection :'.$errorconnexion->getMessage());
      			}
	    	}
	    	return static::$pdo;
		}
    }
}
