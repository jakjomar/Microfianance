<?php
        error_reporting(0);
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

                 $sql = "SELECT * FROM member where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || id LIKE '%$search%' ||  gender LIKE '%$search%' ||  barangay LIKE '%$search%' ||  municipality LIKE '%$search%' ||  province LIKE '%$search%' order by lastname asc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
             
               <th>User ID</th>
               <th>Name</th>
               <th>Savings</th>
               <th>Contact</th>
               <th>Email</th>


               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                          
                         <td>'.$row["id"].'</td>
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>

                         <td>'.$row["savings"].'</td>
                         <td>'.$row["contact"].'</td>
                          <td>'.$row["email"].'</td>
                         
                        
                    </tr>
               ';

          }

               $output .='</table>';
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename = Savings.xls');
               echo $output;
     }
}else{
           $search = $_GET['search_export'];
              $sql = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search' order by lastname asc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
             
               <th>User ID</th>
               <th>Name</th>
               <th>Savings</th>
               <th>Contact</th>
               <th>Email</th>


               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                          
                         <td>'.$row["id"].'</td>
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>

                         <td>'.$row["savings"].'</td>
                         <td>'.$row["contact"].'</td>
                          <td>'.$row["email"].'</td>
                         
                        
                    </tr>
               ';

          }

               $output .='</table>';
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename = Savings.xls');
               echo $output;
     }

}
     ?>