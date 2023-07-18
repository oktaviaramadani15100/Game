<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $id = rand(10000, 100000); 
    var_dump($id);
    $fullname = $_POST['fullname'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $created_at = date("Y-m-d");

    $sql = "INSERT INTO `game`(`id`, `fullname`, `username`, `password`, `created_at`) VALUES ('$id','$fullname','$username','$password','$created_at')";

    $query = mysqli_query($connect, $sql);

    if($query){
        header('Location: index.php');
    }else{
        header('Location: simpan.php?status=gagal');
    }
} 

?>