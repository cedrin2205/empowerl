<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); 
    exit();
}

if ($_SESSION['user']['role'] !== 'GAS12') {
    header("Location: index.php");  
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Dashboard</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="upload.css">
      <link rel="stylesheet" href="studentshomep.css">
  </head>
  <body>
    
        <header>
            <h2 class="logo"> 
                EmpowerEDU
            </h2>

            <p>GAS12 Students</p>
            
            <a href="logout.php"><button class="btn">Logout</button></a>
            </button>
        </header>

        <section>
                
            <div class="folders">
                
                <div class="grid-1">
                    <h3>1st Semester</h3>
                    <div class="folder-module1-2">
                    <a href="ICT12hands1stud.php"><img class="folder" src="img/folderblue.png">
                        <p>Major Subjects</p>
                     </div>
     
                     <div class="folder-module3-4">
                     <a href="GAS12hands2stud.php"><img class="folder" src="img/folderblue.png">
                         <p>Handouts 3-4</p>
                     </div>
                </div>
            <div class="modules-wrap">
                
            </div>
         </section>

         <script src="script.js"></script>
         <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
             
  </body>
</html>