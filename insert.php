<?php
    $connection = mysqli_connect("localhost", "root", "", "pntraining"); // Establishing Connection with Server
    // print_r($_POST);
    if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($username != '' || $email != '' || $password != ''){
            //Insert Query of SQL
            $sql = "INSERT INTO account (username, email, password) 
                    VALUES ('$username', '$email', '$password')";
            $query = mysqli_query($connection, $sql);
            //echo "<span>Data Inserted successfully.</span>";
            echo "<script> location.href='sample.php'; </script>";
            exit;
        }else{
            echo "<p>Insertion Failed <br/> Some Fields are Blank.</p>";
        }
    }
    mysqli_close($connection); // Closing Connection with Server
?>