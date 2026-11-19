<?php
class DB {
    protected $conn;
    public function __construct() {
        include 'config.php';
        $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    }
    public function execute($query) { return $this->conn->query($query); }
    public function close() { $this->conn->close(); }
}
?>