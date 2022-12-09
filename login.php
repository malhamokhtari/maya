<?php
    include('connect.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from login where username = '$username' and password = '$password'";
        $result = pg_query($conn, $sql);
        $row = pg_fetch_array($result);
        $count = pg_num_rows($result);

        if($count == 1){
            header("Location: index.php");
        }
        else{
            echo  '<script>
                        window.location.href = "index1.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }
    }
    ?>

