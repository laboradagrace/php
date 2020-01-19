<?php
    include("crudMed.php");
    include("Account.php");
    //Account 
    $account = new Account("admin","admin","admin");
    if(isset($_POST['submitAccount'])){ 
        $un = $_POST['username'];
        $email = $_POST['email'];
        $ps = $_POST['password'];
        $account->createAccount($un,$email,$ps);
    }
    if(isset($_POST['login'])){ 
        $username = $_POST['username'];
        $password = $_POST['password'];
        session_start();
        $account->loginAuth($username,$password);
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        
    }
    if(isset($_POST['logout'])){
        session_destroy();
        setcookie("user", "", time() - 3600);
        echo "<script> location.href='login.php'; </script>";
    }

    //Medicine CRUD
    $crud = new crudMed();
    if(isset($_POST["submit"])){
        $FormData = $_POST["medForm"];
        $crud->createMed($FormData["brandname"],$FormData["genericname"],$FormData["type"],$FormData["price"],$FormData["quantity"]);
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $crud->delMed($id);
        echo "<script> location.href='Medtable.php'; </script>";
    }
    
    
    if(isset($_POST["idE"])){  
        $id = $_GET["idE"];
        $bn = $POST["brandname"];
        $gn = $POST["genericname"];
        //$Form = $_GET["Form"];
        //$crud->updateMed($Form["id"],$Form["brandname"],$Form["genericname"],$Form["type"],$Form["price"],$Forms["quantity"]);
        echo "<script> location.href='Medtable.php'; </script>";
       // }
        
    }
?>