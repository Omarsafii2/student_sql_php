<?php
session_start();

include  "getData.php";





if(isset ($_POST["save_std_btn"] )){
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$passwords=$_POST['passwords'];

  $query='INSERT INTO student ( firstname, email ,  passwords) VALUES (:firstname , :email , :passwords)';
  $query_run=$conn->prepare($query);

  $data=[':firstname'=>$firstname,':email'=>$email,':passwords'=>$passwords];
  $query_excuter=$query_run->execute($data);


  if($query_excuter){
        $_SESSION['message']= 'inserted successfully';
        header('Location:index.php');
        exit(0);
}
else{
    $_SESSION['message']= 'not inserted successfully';
    header('Location:index.php');
    exit(0);
}
}





if (isset($_POST["update_std_btn"])){
  $student_id=$_POST['student_id'];
  $firstname=$_POST['firstname'];
  $email=$_POST['email'];
  $passwords=$_POST['passwords'] ;

  try{
     $query="UPDATE student SET firstname=:firstname, email=:email , passwords=:passwords  WHERE id=:stud_id LIMIT 1" ;
     $statement=$conn->prepare( $query ) ;

     $data=[":firstname"=>$firstname , ":email"=>$email,":passwords"=>$passwords , ":stud_id"=>$student_id ] ;

     $query_excute= $statement->execute($data) ;   
     
     if($query_excute){
      $_SESSION['message']= 'Updated successfully';
      header('Location:index.php');
      exit(0);

    }
    else{
      $_SESSION['message']= 'Not updated ';
      header('Location:index.php');
       exit(0);
      }
  }catch(PDOException $e){
      echo $e->getMessage();
  }
}








if (isset($_POST["delete_std_btn"])){
  $student_id=$_POST['delete_std_btn'];
  
  try{
     $query="DELETE FROM student  WHERE id=:stud_id " ;
     $statement=$conn->prepare( $query ) ;

     $data=[":stud_id"=>$student_id ] ;

     $query_excute= $statement->execute($data) ;   
     
     if($query_excute){
      $_SESSION['message']= 'Updated successfully';
      header('Location:index.php');
      exit(0);

    }
    else{
      $_SESSION['message']= 'Not updated ';
      header('Location:index.php');
       exit(0);
      }
  }catch(PDOException $e){
      echo $e->getMessage();
  }
}





?>