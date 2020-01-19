<?php
    class Account{
        public $username;
        public $email;
        public $password;

        public function __construct($username,$email,$password){
            $this->$username = $username;
            $this->$email = $email;
            $this->$password = $password;

        }

        //methods
        //create account then insert to db
        public function createAccount($un,$email,$ps){
            $connection = mysqli_connect("localhost", "root", "", "pntraining");
                if($un != '' || $email != '' || $ps != ''){
                    //Insert Query of SQL
                    $sql = "INSERT INTO account (username, email, password) 
                            VALUES ('$un', '$email', '$ps')";
                    $query = mysqli_query($connection, $sql);
                    //echo "<span>Data Inserted successfully.</span>";
                    echo "<script> location.href='login.php'; </script>";
                    exit;
                }else{
                    echo "<p>Insertion Failed <br/> Some Fields are Blank.</p>";
                }
            mysqli_close($connection); // Closing Connection with Server
        }

        public function loginAuth($un,$ps){
            $connection = mysqli_connect("localhost", "root", "", "pntraining"); // Establishing Connection with Server
                if($un != '' || $ps != ''){
                    $sql = "SELECT * FROM account";
                    $query = mysqli_query($connection, $sql);   
                    if($query){
                        if(mysqli_num_rows($query) > 0){        
                            while($row = mysqli_fetch_array($query)){
                                if($un == $row["username"] && $ps== $row["password"]){    
                                    echo "<script> location.href='Medtable.php'; </script>";
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
            mysqli_close($connection);
        }

        

    }
?>