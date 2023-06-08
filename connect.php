<?php
class Connect{
  private $host = "localhost";
  private $user = "bima";
  private $pass = "admin123";
  private $db = "mangakope";
  
  protected $con;

  public function __construct(){
    $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db);
			if(!$this->con){
				echo "Can't connect to database" . $this->con->connect_error();
				return false;
			} 
  }
}
?>
