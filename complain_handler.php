<?php 
class complain_handler{
    private $host   = "localhost";
    private $user   = "root";
    private $pass   = "";
    private $db     = "crs";
    public $mysqli;
    
    public function __construct() {
        return $this->mysqli=new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    
    public function complain($data){
        $name       = $data['name'];
        $email      = $data['email'];
        $invoice    = $data['invoice'];
        $reason     = $data['reason'];
        $message    = $data['message'];

        
        
        $message    = $data['message'];
        $q          = "insert into complain set name='$name', email='$email', invoice='$invoice', reason='$reason', message='$message'";

        if ($data= $this->mysqli->query($q) ==true){
            return true;
        }
        
       }
    }
    


?>