 <?php 
                                
         $count_query = "SELECT * from approvals";

        $result1 = mysqli_query($conn, $count_query);

         $rows_count = mysqli_num_rows($result1) ;
                                
?>