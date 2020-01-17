<?php
    include("crudMed.php");
    $crud = new crudMed();
    if(isset($_POST["submit"])){
        $FormData = $_POST["medForm"];
        $crud->createMed($FormData["brandname"],$FormData["genericname"],$FormData["type"],$FormData["price"],$FormData["quantity"]);
    }
    $id = $_GET['id'];
    $crud->delMed($id);
    echo "<script> location.href='sample.php'; </script>";
    $editId = $_GET['EditId'];
    if(isset($_POST["editMed"])){
        $FormData = $_POST["Form"];
        $crud->updateMed($editId,$Form["brandname"],$Form["genericname"],$Form["type"],$Form["price"],$Forms["quantity"]);
    }
?>