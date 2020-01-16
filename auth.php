<?php
    $connection = mysqli_connect("localhost", "root", "", "pntraining"); // Establishing Connection with Server
    // print_r($_POST);
    if(isset($_POST['login'])){ // Fetching variables of the form which travels in URL
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username != '' || $password != ''){
            $sql = "SELECT * FROM account";
            $query = mysqli_query($connection, $sql);
        
            if($query){
                if(mysqli_num_rows($query) > 0){        
                    while($row = mysqli_fetch_array($query)){
                        if($username == $row["username"] && $password == $row["password"]){
                            
                            echo "<script> location.href='sample.php'; </script>";
                        }
                        else{
                            echo "<p>Account not found</p>";
                        }
                    }
                    
                } else{
                    echo "No records matching your query were found.";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            }
    
            
        }
    }
            
            // Close connection
            mysqli_close($connection);
?>