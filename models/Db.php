<?php
    class Db
    {
        const DB_DRIVER = 'mysql';
        const DB_HOST = 'localhost';
        const DB_NAME = 'gbphp';
        const DB_USER = 'worker';
        const DB_PASSWORD = 'getData';
        const DB_CONNCT_STR = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;

        public $sql ='';
        private static $instance;
        private $db;
        
        public static function Instance()
        {
            if(self::$instance == null){
                self::$instance = new self();
            }
            return self::$instance;
        }
        
        private function __construct()
        {
            $this->db = new PDO(self::DB_CONNCT_STR, self::DB_USER, self::DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        public function select(array $markers){
            $dbrequest = $this->db->prepare($this->sql);
            $dbrequest->execute($markers);
            return $dbrequest->fetch();
        }

        public function insert(array $markers){
   
            $dbrequest = $this->db->prepare($this->sql);
            $dbrequest->execute($markers); 
            return (int)$dbrequest->rowCount();
        }

        public function delete(){

        }

        public function update(){

        }

    }