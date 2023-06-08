<?php
include_once "connect.php";

class User extends Connect{
  public function __construct(){
    parent::__construct();
  }
  
  public function Fetch_Chapter($id){
    $query = $this->con->prepare("SELECT * FROM 
      Chapter WHERE Manga_id = ?
      ORDER BY length(ChNumber), ChNumber");
    $query->bind_param("i", $id);
    if(!$query->execute()){
      echo $query->error;
    }else{
      $result = $query->get_result();
      return $result;
      $query->close();
    }
  }
  
  public function GetchId($ch){
    $query = $this->con->prepare("SELECT ChNumber FROM Chapter WHERE Chapter = ?");
    $query->bind_param("s", $ch);
    if(!$query->execute()){
      echo $this->con->error();
    }else{
      $result = $query->get_result();
      $a = $result->fetch_assoc();
      return $a['ChNumber'];
    }
  }

  public function Pagination($Mangaid, $Chapterid){
    $Nextquery = $this->con->prepare("SELECT * FROM Chapter WHERE Manga_id = ? AND 
      ChNumber = (select min(ChNumber) from Chapter where ChNumber > ? )") or die ($this->con->error);
    $Nextquery->bind_param("ii", $Mangaid, $Chapterid);
    if(!$Nextquery->execute()){
      echo $this->con->error;
    }else{
      $Nextfetch = $Nextquery->get_result();
      // Previous
      $Prevquery = $this->con->prepare("SELECT * FROM Chapter WHERE Manga_id = ? AND 
      ChNumber = (select max(ChNumber) from Chapter where ChNumber < ? );") or die ($this->con->error);
      $Prevquery->bind_param("ii", $Mangaid, $Chapterid);
      $Prevquery->execute();
      $Prevfetch = $Prevquery->get_result();
      echo $this->con->error;
      //$asd = $Prevfetch->fetch_assoc();
      $Next = $Nextfetch->fetch_assoc();
      $Nextrow = $Nextfetch->num_rows;
      $Prev = $Prevfetch->fetch_assoc();
      $Prevrow = $Prevfetch->num_rows;

      if($Prevrow != 0){
?>
        <div class='col-md-2'>
          <a href="../../<?php echo $Prev['Location'];?>">
          <button style="width:100%;" class="btn btn-info" type="button" >Previous Chapter</button>
          </a>
        </div>
<?php 
      }
      if($Nextrow != 0){
?>
        <div class='col-md-2'>
          <a href="../../<?php echo $Next['Location'];?>">
          <button style="width:100%;" class="btn btn-info" type="button" >Next Chapter</button>
          </a>
        </div>    
<?php
      }
    }
  }

  public function Manga_Profile($id ){
    $query = $this->con->prepare("SELECT * FROM Manga WHERE id = ?");
    $query->bind_param("i", $id);
    if(!$query->execute()){
      echo $this->con->error;
    }else{
      $res = $query->get_result();
      return $res->fetch_assoc();
    }
  }

  public function Front(){
    $query = $this->con->prepare("SELECT * FROM Manga ORDER BY id;");
    $query->execute();
    $result = $query->get_result();
    return $result;
  }
}
?>
