<?php

        $host =  "localhost";
        $username ="root";
        $password ="";
        $db = "microfinance1";

        $conn =  new mysqli($host, $username, $password, $db);

        if($conn->connect_error){
            echo $conn->connect_error;

        }
        include_once("connection.php");
        $conn = connection();
        $output='';
        $blank = "";
        $search = $_GET['search_export'];
        if($search == $blank){

         $sql = "SELECT * FROM deposit where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%' || id LIKE '%$search%' || depositdate LIKE '%$search%' || barangay LIKE '%$search%' || municipality LIKE '%$search%' || province LIKE '%$search%' order by id desc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
          
              <th>Date</th>
              <th>Transaction ID</th>
               <th>User ID</th>
               <th>Name</th>
               <th>Amount</th>

               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                       
                          <td>'.$row["depositdate"].'</td>
                           <td>'.$row["id"].'</td>
                         <td>'.$row["userid"].'</td>
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>
                         <td>'.$row["depositamount"].'</td>
                         
                        
                    </tr>
               ';

          }

               $output .='</table>';
               // header('Content-Type: application/xls');
               // header('Content-Disposition: attachment; filename = Deposit-Record.xls');
               echo $output;
     }
}else{
    $search = $_GET['search_export'];
    $sql =  "SELECT * FROM deposit where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' || id LIKE '$search' || depositdate LIKE '$search' || barangay LIKE '$search' || municipality LIKE '$search' || province LIKE '$search' order by id desc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
          
              <th>Date</th>
              <th>Transaction ID</th>
               <th>User ID</th>
               <th>Name</th>
               <th>Amount</th>

               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                       
                          <td>'.$row["depositdate"].'</td>
                           <td>'.$row["id"].'</td>
                         <td>'.$row["userid"].'</td>
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>
                         <td>'.$row["depositamount"].'</td>
                         
                        
                    </tr>
               ';

          }

               $output .='</table>';
               // header('Content-Type: application/xls');
               // header('Content-Disposition: attachment; filename = Deposit-Record.xls');
               echo $output;

}
}
     ?>