<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    global $connect;
      
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $user = mysqli_query($connect, "SELECT * FROM game WHERE username = '$username'");
    
    if(mysqli_num_rows($user) > 0){
    
        $row = mysqli_fetch_assoc($user);
    
        if($password == $row['password']){
        echo "<script>
        alert('Login Successful')
        document.location.href = 'game2.php'
        </script>";
        }
        else{
        echo "<script>
        alert('Wrong Password')
        document.location.href = 'index.php'
        </script>";
        
        }
    }else{
        echo "<script>
        alert('Username Not Registered')
        document.location.href = 'index.php'
        </script>";
        exit;
    }
    }
?>