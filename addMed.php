<?php

    $connection = mysqli_connect("localhost", "root", "", "pntraining"); // Establishing Connection with Server
    // print_r($_POST);
    if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $brandname = $_POST['brandname'];
        $genericname = $_POST['genericname'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        if($brandname != '' || $genericname != '' || $type != '' || $price != '' || $quantity != ''){
            $sql = "INSERT INTO medicines (Brandname, Genericname,type,price,quantity) 
                    VALUES ('$brandname', '$genericname', '$type','$price','$quantity')";
            $query = mysqli_query($connection, $sql);

            echo "<script> location.href='sample.php'; </script>";
            exit;
        }else{
            echo "<p>Insertion Failed <br/> Some Fields are Blank.</p>";
        }
    }
    mysqli_close($connection); // Closing Connection with Server
?>