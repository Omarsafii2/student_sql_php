<?php session_start();
include "getData.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
     <style>
        table,td, th {
            border: 1px solid black;
        }
        .tdbtn{
            background-color: blue;
        }
       
     </style>
</head>
<body>
 
 <div class="container">
  <?php if(isset($_SESSION['message'])):?>
        <h5 class="alert alert-success"><?=$_SESSION['message'];?></h5>
  
 <?php 
       unset($_SESSION['message']);
        endif; ?>
   <div class="p-4 d-flex  justify-content-between border-2 rounded-2 bg-secondary    ">
  
        <h1 class="text-light">PHP PDO CRUD</h1>
    <div>
    <a href="addStudent.php" class="btn btn-primary my-2 mx-4 border-">add student</a>
   
    </div>   
</div>
    <div>    
    </div>

    <div class="card body">
        <table class="table table-bordered table-striped  ">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $query="SELECT * FROM student ";
                      $statement=$conn-> prepare($query);
                    $statement->execute();

                    $result=$statement->fetchAll(PDO::FETCH_ASSOC); //CAN FETCH AS OBJECT  (PDO::FETCH_OBJ)  $row->id $roe->firstname  $row->email.....
                    if($result){
                        foreach($result as $row){
                         ?>
                          <tr class="text-center ">
                            <td><?= $row['id'];?></td>
                            <td><?= $row['firstname'];?></td>
                            <td><?= $row['email'];?></td>
                            <td><?= $row['passwords'];?></td>
                            <td class="d-flex justify-content-center">
                                <a href="editStudent.php?id=<?= $row['id'];?>" class="btn btn-primary me-2">Edit</a>
                                <form action="insertStudent.php" method="POST">
                                    <button type="submit" name="delete_std_btn" value="<?= $row['id'];?>" class="btn btn-danger">Delete</button>
                                </form>
                             
                            </td>
                            </tr>
                            <?php

                        }
                      
                    }
                    else{
                        ?>
                        <tr><td colspan="5">no record found</td></tr>
                        <?php

                    }
       ?>



        

    </div>
  

    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>