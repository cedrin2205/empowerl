<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); 
    exit();
}

$allowedRoles = array('ICT12', 'ABM12', 'Humms12','STEM12','GAS12');
if (!in_array($_SESSION['user']['role'], $allowedRoles)) {
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
      <link rel="stylesheet" href="students.css">
      <link rel="stylesheet" href="studentshome.css">

      <style>
     
    </style>
  </head>
  <body>
    
        <header>
            <h2 class="logo"> 
                EmpowerEDU
            </h2>
            <a href="ICT12home.php"><button class="btn">Back</button></a>
        </header>

        <section>
         
            <div class="first-semester">
                <div class="modules-wrap">
                    <div class="image-modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="expandedImg">
                    </div>
                </div>
                <div class="gallery">
                        <?php 
                        include "ictdb12.php";
                        $limit = 15; 
                        $sql = "SELECT * FROM ict12hands1 ORDER BY id DESC LIMIT $limit";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($ict12hands1 = mysqli_fetch_assoc($res)) { ?>
                                <div class="alb">
                                    <?php 
                                    $fileExtension = pathinfo($ict12hands1['image_url'], PATHINFO_EXTENSION);
                                    if ($fileExtension === 'pdf') {
                                        echo '<img src="img/pdficon.png" alt="PDF File">';
                                    } elseif ($fileExtension === 'doc' || $fileExtension === 'docx') {
                                        echo '<img src="img/wordicon.png" alt="Word File">';
                                    } else {
                                    echo '<img src="uploads/'.$ict12hands1['image_url'].'" alt="Uploaded Image">';
                                }
                                    ?>
                                    <p><?php echo $ict12hands1['filename']; ?></p>
                                    <a class="download-btn" href="uploads/<?=$ict12hands1['image_url']?>" download="<?=$ict12hands1['image_url']?>">
                                        <img src="img/download.png" alt="Download" width="20" height="20">
                                    </a>
                            </div>
                        <?php }
                        }
                        ?>
                </div>
            </div>
                                
                </div>
                   
                </div>
                
            </div>

          
         </section>

         <script src="script.js"></script>
         <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
             
  </body>
</html>
<script>
                document.getElementById('expandedImg').src = imageUrl;
                document.querySelector('.image-modal').style.display = 'block';

        document.querySelector('.close').addEventListener('click', function() {
            document.querySelector('.image-modal').style.display = 'none';
        });

    </script>
</body>
</html>
