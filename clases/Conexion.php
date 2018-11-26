<?php

   class Conexion {
   private $miDb = 'mysql:host=localhost;dbname=tiempo;charset=UTF8;';
   private $dbUser = "root" ;
   private $dbPass = "" ;
   /*private $miDb = 'mysql:host=sql309.epizy.com:3306;dbname=epiz_23052575_tiempo;charset=UTF8;';
   private $dbUser = "epiz_23052575" ;
   private $dbPass = "OaYBjiv2sPEV" ;*/
   //
   private static $instancia;
   private static $db;

      public static function getInstancia() {
         if (is_null(self::$instancia)):
            self::$instancia = new Conexion() ;
         endif ;
         
         return self::$instancia ;
      }

    private function __construct() {
        try {
            self::$db = new PDO($this->miDb, $this->dbUser, $this->dbPass);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

       public function __wakeup() {
         $this->__construct() ;
      }

    private function __clone() {}

    public function prepare($query) {
      return self::$db->prepare($query);
    }

      public function __destruct() 
      {  
         //
         self::$db = null ;
      }

   }





