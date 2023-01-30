<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
      
      $extensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_extension,$extensions)=== false){
         $errors ="Extension not allowed, please choose a JPEG, GIF or PNG file.";
      }
      
    if($file_size > 2097152){
         $errors='File size must be exactly 2 MB';
    }
    
     if(in_array($file_extension, $extensions)) {

        $newImageName = time().rand().rand().'.'.$file_extension;
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$newImageName);
        $send = true;
        echo "Success";

    }
      else{
        print_r($errors);
      }
    }
   
?>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/default.css">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <title>Mercury Files</title>
    </head>
    <body>

        <header>
            <a href="../">
                <span>Mercury files</span>
            </a>
        </header>
            <section>
                <h1>
                    <?php
                    if(isset($newImageName)) {
                        echo '<h1><img style="width: 400px;" src="uploads/'.$newImageName.'" /></h1>';
                        echo ' <p><label for="image_link"> Lien</label></p><input type="link" id="image_link" value= localhost/uploads/'.$newImageName.'>';

                    } else {
                        echo '<h1><i class="fas fa-paper-plane"></i></h1>';
                    }
                    ?>
                </h1>


                <form method="post" action="index.php" enctype="multipart/form-data">
                    <p>
                        <label for="image">Sélectionnez votre fichier</label><br>
                        <input type="file" name="image" id="image">
                    </p>
                    <p id="send">
                        <button type="submit">Envoyer <i class="fas fa-long-arrow-alt-right"></i></button>
                    </p>
                </form>
            </section>
        
        
    </body>
</html>