<?php
    class crudMed{
        //create new med and save to db
        public function createMed($brandname,$genericname,$type ,$price,$quantity){
            $connection = mysqli_connect("localhost", "root", "", "pntraining"); // Establishing Connection with Server
            if($brandname != '' || $genericname != '' || $type != '' || $price != '' || $quantity != ''){
                $sql = "INSERT INTO medicines (Brandname, Genericname,type,price,quantity) 
                        VALUES ('$brandname', '$genericname', '$type','$price','$quantity')";
                $query = mysqli_query($connection, $sql);
                echo "<script> location.href='sample.php'; </script>";
                exit;
            }else{
                echo "<p>Insertion Failed <br/> Some Fields are Blank.</p>";
            }
            mysqli_close($connection); // Closing Connection with Server
        }
        // delete a specific medicine
        public function delMed($id){
            $connection = mysqli_connect("localhost", "root", "", "pntraining");
            $sql = "DELETE FROM medicines where id = $id";
            $query = mysqli_query($connection, $sql);
            mysqli_close($connection); 
        }
        public function updateMed($id,$brandname,$genericname,$type ,$price,$quantity){
            $connection = mysqli_connect("localhost", "root", "", "pntraining");
            $sql = "UPDATE medicines SET Brandname = '$id', Genericname = '$genericname',
            type = '$type',price ='$price',quantity ='$quantity' WHERE id = '$id'";
            $query = mysqli_query($connection, $sql);
            mysqli_close($connection); 
        }
    }

?>