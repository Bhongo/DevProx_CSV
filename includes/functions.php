<?php
/**
 * Developer: Bhongolethu Sinxo
 * Date Created: 2022-09-11
 * Last Modified: 2022-09-11
 * Project: DevProx CSV Challenge
 * Description: Array Data to CSV - functions
 * 
 **/ 
?>
<?php

function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}

function downloadCSV_Output($array_data){

    header("Content-Transfer-Encoding: UTF-8");
    
    $filename = "output.csv";
    $csv_folder = "output_csv/".$filename;

    $headers = ["Name", "Surname", "Initials", "Age", "DateOfBirth"];

    // Open the file and write to it
    $fh = fopen($csv_folder, "w");

    // Create the headers
     fputcsv($fh, $headers);

     // Loop through the array data
     foreach ($array_data as $fields) {
        fputcsv($fh, $fields);
    }

     // Close the file
     fclose($fh);
}

function clear_data($query){

    global $conn;

    // Prepare Statement
    $stmt = $conn->prepare($query);

    if(!$stmt){
    echo "Error: ". $conn->error;
    }

    // Execute statement
    $stmt->execute();
    $stmt->close();

} 

function insert_data($query,$name, $surname, $initials, $age, $dob){
    global $conn;

    // Prepare Statement
    $stmt = $conn->prepare($query);

    if(!$stmt){
    echo "Error: ". $conn->error;
    }

    // Binding parameters:
    $stmt->bind_param("sssis", $name, $surname, $initials, $age, $dob);

    // Execute statement
    $stmt->execute();
    $stmt->close();
}

function generate_random_letters($length) {
    $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= chr(rand(ord('a'), ord('z')));
    }
    return $random;
}


