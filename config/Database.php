<?php
    class Database {
        // Parameters
        private $host = 'localhost';
        private $db_name = 'myblog';
        private $username = 'root';
        private $password = '';
        // Represente the Connection
        private $conn;

        // DB Connection
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username, $this->password);

                // Setting Attributes (Error Mode)
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOEXceprion $e) {
                echo 'Conncetion failed : ' . $e->getMessage();
            }
            return $this->conn; 
        }

    }