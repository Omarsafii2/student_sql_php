<?php 
include "getData.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container bg-body-secondary">
 <div class="card-header">
  <div class="p-4 d-flex  justify-content-between bg-secondary">
    <h1 class="text-light">Edit student page</h1>
    <div>
    <a href="index.php" class="btn btn-danger my-2 mx-4 border-">Back</a>
   
    </div>  
</div>
</div>
<div class="card-body">

  <?php  
       if (isset($_GET["id"])) {
         $student_id= $_GET["id"];
         $query="SELECT * FROM student WHERE id=:stud_id LIMIT 1";
         $statement=$conn->prepare($query);
         $data=[':stud_id'=>$student_id];
         $statement->execute($data);
         $result= $statement->fetch(PDO::FETCH_ASSOC);

       }
  
           ?>


<form action="insertStudent.php" method="POST">
  
    <input type="hidden" name="student_id" value="<?= $result['id'];  ?>" >
    <div class="mb-3">
        <label>firstname</label>
         <input type="text" name="firstname" value="<?= $result['firstname'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>email</label>
         <input type="email" name="email" value="<?= $result['email'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>password</label>
         <input type="password" name="passwords"  value="<?= $result['passwords'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button class=" btn btn-primary border-2" name="update_std_btn">update student</button>
         
    </div>
    </form>
  
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>