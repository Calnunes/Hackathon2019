<?php
$studentname = $_POST['name'];
$class = $_POST['class'];
$dept = $_POST['dept'];
$topic = $_POST['topic'];
$domain = $_POST['domain'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$ppt = $_POST['ppt'];
$github = $_POST['github'];
$paper = $_POST['paper'];

if(!empty($studentname) || !empty($class) ||!empty($dept) ||!empty($topic) ||!empty($domain) ||!empty($city) ||!empty($state) ||!empty($zip) ||!empty($ppt) ||!empty($github) ||!empty($paper))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Project Nation";

    $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('Connect Error: '.mysqli_connect_errno().mysqli_connect_error());
    }
    else{
        $INSERT= "INSERT Into register(studentname, class, dept, topic, domain, city, state, zip, ppt, github, paper) values(?,?,?,?,?,?,?,?,?,?,?)";
    
        $stmt= $conn->prepare($INSERT);
        $stmt->bind_param("sssssssisss", $studentname, $class, $dept, $topic, $domain, $city, $state, $zip, $ppt, $github, $paper);
        $stmt->execute();
        echo "New Record Inserted successfully"; 

    }
    $stmt->close();
    $conn->close();
} else{
    echo "All fields are required!";
    die;
}

?>