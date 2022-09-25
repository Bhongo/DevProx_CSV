<?php
/**
 * Developer: Bhongolethu Sinxo
 * Date Created: 2022-09-09
 * Last Modified: 2022-09-25
 * Project: DevProx CSV Challenge
 * Description: Array Data for CSV
 * 
 **/ 
?>
<?php

include_once("includes/functions.php");

$firstNameCollection = array("Harry","Bruce","Carolyn","Lukhanyo","Randy","Siya","Lois","Jesse","Ernest","Lood",
                        "Henry","Makazole","Frank","Shirley", "Vuyo", "Viwe", "Bhongo", "Lee", "Ninja", "Neo");

$lastNameCollection = array("Nxele","Xulu","Debra","Zembe","Gerald","Kolisi","Raymond","Carter","Selepe","Fassi",
                    "Joseph","Nelson","Carlos","Am","Ralph","Clark","Jean","Alexander","Stephen","Mapimpi");

$final_array = array();

$min = strtotime("47 years ago");
$max = strtotime("18 years ago");
$rand_time = mt_rand($min, $max);
$birth_date = date('d-m-Y', $rand_time);

$age =  ageCalculator($birth_date);

if(isset($_POST["submit"])){

    $csv_rows = intval($_POST["rows"]);

    //while(count($fullNameCollection) <= 100) {
    while(count($final_array) < $csv_rows) {

        // $chars = 'bcdfghjklmnprstvwxzaeiou';
        // $uniqueCode = uniqid();

        $newFirstName = $firstNameCollection[rand(0, count($firstNameCollection)-1)];
        $newLastName = $lastNameCollection[rand(0, count($lastNameCollection)-1)];
        $initals = $newFirstName[0];

        
        $birth_date= date('d-m-Y', strtotime($birth_date. ' + 1 year'));
        $age =  ageCalculator($birth_date);

        //$randChars = generate_random_letters(6);
        //$randChars2 = generate_random_letters(7);

        #$final_array[] = array_unique([$newFirstName."_".$randChars, $newLastName."_".$randChars2, $initals, $age, $birth_date]);
        $final_array[] = array_unique([$newFirstName, $newLastName, $initals, $age, $birth_date]);
    
    }  
    downloadCSV_Output($final_array);  
    header("Location:index.php?successful");
    // echo "<pre>";
    //     print_r($final_array);
    // echo "</pre>";
}
