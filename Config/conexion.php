<?php
    class Conectar {
        
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g10_20","G10_20","GgLLdbKC");
                return $conectar;
            }catch (Exception $e) {
                print "Error BD!!: " . $e->getMessage() . "<br/>";
                die();
            }

        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
    
?>
