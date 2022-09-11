<?php
/**
 * Developer: Bhongolethu Sinxo
 * Date Created: 2022-09-09
 * Last Modified: 2022-09-11
 * Project: DevProx CSV Challenge
 * Description: Landing page - Generate and Upload CSV document
 * 
 **/ 
?>
<?php

include_once("includes/connection.php");
include_once("includes/functions.php");


    if(isset($_POST["submit"])){
      
      
      
        if(!empty($_FILES["upload"]["name"])){ // if the upload name is set
           // do something 
           $allowed_ext = array("csv","xlsx"); // array("png","jpg","jpeg","gif");

           $file_name = $_FILES["upload"]["name"];
           $file_type = $_FILES["upload"]["type"];
           $file_tmp =  $_FILES["upload"]["tmp_name"];
           $file_size = $_FILES["upload"]["size"];
           $target_dir = "uploads/{$file_name}";
  
           // get file ext
           $file_ext = explode(".", $file_name);
           $file_ext = strtolower(end($file_ext));

           // validate file ext
           if(in_array($file_ext, $allowed_ext)){
              if($file_size <= 1000000){ // 1MB or less // 1000000 bytes = 1MB

            // first clear the table
            $query = "TRUNCATE TABLE csv_import";
            clear_data($query);

            // Open uploaded CSV file with read-only mode
            $csv_file = fopen($file_tmp, 'r');

            // Skip the first line
            fgetcsv($csv_file);

            // Parse data from CSV file line by line
            while (($csv_data = fgetcsv($csv_file, 10000, ",")) !== FALSE)
            {
                // Get row data
                $name = strip_tags($csv_data[0]);
                $surname = strip_tags($csv_data[1]);
                $initials = strip_tags($csv_data[2]);
                $age = strip_tags($csv_data[3]);
                $dob = strip_tags($csv_data[4]);

 
                // Insert new data
                 $query = "INSERT INTO csv_import (`name`, surname, initials, age, date_of_birth) ";
                 $query .= " VALUES ";
                 $query .= "(?, ?, ?, ?, ?)";

                 insert_data($query,$name, $surname, $initials, $age, $dob);

            }
 
            // Close opened CSV file
            fclose($csv_file);

                  move_uploaded_file($file_tmp, $target_dir);
  
                  // success message
                  $message = "<p style='color: green;'>File uploaded Successfully! Now check the File and Database</P>"; 
              }else{
                 $message = "<p style='color: red;'>The file is too large</P>"; 
              }
           }else{
              $message = "<p style='color: red;'>Invalid file type! Please try again</P>";
           }
           // echo $file_ext; // Testing
        }else{
          $message = "<p style='color: red;'>Please choose a file!</P>";
        }  
      }elseif(isset($_GET["successful"])){
          $message = "<p style='color: green;'>Generated CSV successfully! Now Import and Save Data </P>";
      }
  ?>
  
  <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" rel="stylesheet" type="text/css" />
      <title>File Upload - CSV</title>
    </head>
    <body>
      <?php echo $message ?? null; ?>
      <form action="create_csv.php" method="POST" enctype="multipart/form-data">
    <div Class="input-row">
        <!-- Number of rows to generate: <input type="text" name ="rows" value =""><br><br>  -->
        Number of rows to generate: <input type="number" name ="rows" min="1"  required/> 
        <button type="submit" value="Submit" name="submit">Generate CSV Data</button>
    </div>
  </form>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <div Class="input-row">
        <label>Click "Choose File" button to upload a file: </label>
      <input type="file" name="upload" class="file" accept=".csv,.xls,.xlsx"> 
      <!-- acceptables files also checked in PHP -->
      <div class="import">
          <button type="submit" value="Submit" name="submit">Import CSV and Save Data</button>
      </div>    
    </div>
  </form>
    </body>
    </html>