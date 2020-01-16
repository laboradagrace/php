<?php
// Process delete operation after confirmation
$connection = mysqli_connect("localhost", "root", "", "pntraining");
if(isset($_POST["id"]) && !empty($_POST["id"])){

    $sql = "DELETE FROM medicines WHERE id = ?";
    
    if($stmt = mysqli_prepare($connection, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: sample.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($connection);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        //header("location: error.php");
        exit();
    }
}

?>
