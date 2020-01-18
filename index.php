<?php
    include("crudMed.php");
    $crud = new crudMed();
    if(isset($_POST["submit"])){
        $FormData = $_POST["medForm"];
        $crud->createMed($FormData["brandname"],$FormData["genericname"],$FormData["type"],$FormData["price"],$FormData["quantity"]);
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $crud->delMed($id);
        echo "<script> location.href='sample.php'; </script>";
    }
    
    
    if(isset($_GET["idE"])){  
        //$editId = $_GET["EditId"];
        $Form = $_GET["Form"];
        $crud->updateMed($Form["id"],$Form["brandname"],$Form["genericname"],$Form["type"],$Form["price"],$Forms["quantity"]);
        //echo "<script> location.href='sample.php'; </script>";
       // }
        
    }
?>