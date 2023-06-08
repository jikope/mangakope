<?php
include_once "../connect.php";

class Admin extends Connect{

  public function __construct(){
    parent::__construct();
  }

  public function Add_Manga($Name, $Mangaka, $Dir, $Cover){
    $query = $this->con->prepare("INSERT INTO Manga (`name`, 
    `mangaka`, `dir`, `cover`) VALUES(?, ?, ?, ?);");
    $query->bind_param("ssss", $Name, $Mangaka, $Dir, $Cover);
    if(!$query->execute()){
      echo $query->error;
    }else{
      $query->close();
      shell_exec("mkdir ../Manga/$Dir");
      return TRUE;
    }
  }

  public function Fetch_Genre(){
    $query = $this->con->prepare("SELECT * FROM Genre ORDER BY genre");
    if(!$query->execute()){
      echo $query->error;
    }else{
      $result = $query->get_result();
      return $result;
    }
  }

  public function Fetch_Manga(){
    $query = $this->con->prepare("SELECT * FROM Manga ORDER BY id");
    if(!$query->execute()){
      echo $query->error;
    }else{
      $result = $query->get_result();
      return $result;
    }
  }

  public function View_Manga($id){
    $query = $this->con->prepare("SELECT * FROM Manga WHERE id = ?");
    $query->bind_param("i", $id);
    if(!$query->execute()){
      echo $query->error;
    }else{
      $result = $query->get_result();
      return $result->fetch_assoc();
    }
  }
  
  public function Add_Genre(){
    $this->con->prepare("INSERT INTO MangaGenre ('Genre_id', 'Manga_id')
      VALUES (?, ?)");
    $this->con->bind_param("ii");
    if(!$this->con->execute){
      echo $this->con->error();
    }else{
      return TRUE;
    }
  }

  public function Fetch_Chapter($id){
    $query = $this->con->prepare("SELECT * FROM 
      Chapter WHERE Manga_id = ?
      ORDER BY length(Chapter), Chapter");
    $query->bind_param("i", $id);
    if(!$query->execute()){
      echo $query->error;
    }else{
      $result = $query->get_result();
      return $result;
      $query->close();
    }
  }

  public function Add_Chapter($Mangaid, $Chapter, $Location, $ChNumber){
    $query = $this->con->prepare("INSERT INTO Chapter 
      (`Manga_id`,
      `Chapter`,
      `Location`,
      `ChNumber`) VALUES (?, ?, ?, ?);");
    $query->bind_param("issi", $Mangaid, $Chapter, $Location, $ChNumber);
    if(!$query->execute()){
      echo $query->error;
    }else{
      $query->close();
      return TRUE;
    }
  }
  public function getPrevRecord(){
    $query = $this->con->prepare("SELECT id FROM Manga ORDER BY id DESC LIMIT 1");
    $query->execute();
    $result = $query->get_result();
    $fetch = $result->fetch_assoc();
    return $fetch['id'] + 1;
  }
  public function Escape($param){
    return $this->con->real_escape_string($param);
  }
}
?>
