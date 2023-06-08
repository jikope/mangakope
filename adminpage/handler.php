<?php
include_once "admin.php";
$obj = new Admin();
if(isset($_POST['Add'])){
  $Manga = $obj->Escape($_POST["Manga"]);
  $Mangaka = $obj->Escape($_POST["Mangaka"]);
  $id = $_POST['getid'];
  $CvrName = $_FILES['Cover']['name'];
  $CvrTmp = $_FILES['Cover']['tmp_name'];
  $Dir = str_replace(" ", "-", $Manga);
  if(!empty($_POST['genre'])){
    foreach($_POST['genre'] as $genre){      
    }
  }
  if($obj->Add_Manga($Manga, $Mangaka, $Dir, $CvrName) == TRUE){
    move_uploaded_file($CvrTmp, "../cover/".$CvrName);
    $readphp = file_get_contents('../profile.php');
    $Search = array('Replace_Nama', 'Replace_Chapter', 'Replace_id');
    $Write = array($Manga, $Dir, $id);
    $index2 = str_replace($Search, $Write, $readphp);
    file_put_contents("../Manga/".$Dir."/index.php", $index2);
    header("Location: ../adminpage/");
  }
}  

if(isset($_POST['Chadd'])){
  $Chapter = $_POST['Chapter'];
  $A = array(" ", '"', "(", ")", "[", "]");
  $B = array("-", "-", "-", "-", "-", "-");
  $Chap = str_replace($A, $B, $_FILES['Location']['name']);
  $Chaptmp = $_FILES['Location']['tmp_name'];
  $FileAttr = $_FILES['Location']['type'];
  $Mangaid = $_POST['Mangaid'];
  $Dir = $_POST['DirName'];
  $Size = $_POST['size'];
  $ChNumber = $_POST['Number'];
  $Location = "../Manga/tmprar/";
  $Location2 = "../Manga/".$Dir."/";
  if(isset($Dir)){
    #$obj->Add_Chapter($Mangaid, $Chapter, $Location) 
    move_uploaded_file($Chaptmp, $Location.$Chap);
    if($FileAttr == "application/vnd.rar"){
      $Nam = str_replace(".rar", "", $Chap);
      shell_exec("mkdir ".$Location2.$Nam);
      shell_exec("unrar x ".$Location.$Chap." ".$Location2.$Nam."/");
      shell_exec("rm -r ".$Location.$Chap);
      // Generating File
      if ($Size == "Wide"){
        shell_exec("../a.sh ".$Location2.$Nam." ../h");
      }else if($Size == "Normal"){
        shell_exec("../b.sh ".$Location2.$Nam." ../h");
      }
      $file_inp = file_get_contents('../h');
      $readphp = file_get_contents('../read.php');
      // String editing
      $index = str_replace($Location2.$Nam."/", '', $file_inp);
      $Search = array('Replace_Nama', 'Replace_Chapter', 'Replace_id');
      $Write = array($Dir, $Chapter, $Mangaid);
      $index2 = str_replace($Search, $Write, $readphp);
      // Put to file
      file_put_contents($Location2.$Nam."/index.php", $index2);
      file_put_contents($Location2.$Nam."/inc", $index);

    }else if ($FileAttr == "application/zip"){
      $Nam = str_replace(".zip", "", $Chap);
      shell_exec("unzip ".$Location.$Chap." -d ".$Location2.$Nam);
      shell_exec("rm -r ".$Location.$Chap);
      // Generating file
      if ($Size == "Wide"){
        shell_exec("../a.sh ".$Location2.$Nam." ../h");
      }else if($Size == "Normal"){
        shell_exec("../b.sh ".$Location2.$Nam." ../h");
      }
      $file_inp = file_get_contents('../h');
      $readphp = file_get_contents('../read.php');
      // String editing
      $index = str_replace($Location2.$Nam."/", '', $file_inp);
      $Search = array('Replace_Nama', 'Replace_Chapter', 'Replace_id');
      $Write = array($Dir, $Chapter, $Mangaid);
      $index2 = str_replace($Search, $Write, $readphp);
      // Put to file
      file_put_contents($Location2.$Nam."/index.php", $index2);
      file_put_contents($Location2.$Nam."/inc", $index);
    }
    $obj->Add_Chapter($Mangaid, $Chapter, $Dir."/".$Nam, $ChNumber);
    header("Location: ../adminpage/?page=chapter&manga=$Mangaid");
  }else{
    echo '<script language="javascript">';
    echo 'alert("Failed")';
    echo '</script>';
  }
}
?>
