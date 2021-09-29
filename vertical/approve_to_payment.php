<?php 

$query = "SELECT * FROM users WHERE user_id = '$request_id'";
            $result = mysqli_query($conn, $query);

            
            while($data = mysqli_fetch_assoc($result))
            {
                $username = $data['username'];
                $user_id = $data['user_id'];
                $pay_status = "unpaid";
                $amount = 15000;

                $query = "INSERT INTO payments(username, user_id, amount) values('$username','$user_id','$amount')";
                $result = mysqli_query($conn, $query);
                header("Location:users.php");
            }


    ?>