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
         $sql = "SELECT * FROM loanuserpayment where loanid LIKE '%$search%' || lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%' || id LIKE '%$search%' || status LIKE '%$search%' || loantype LIKE '%$search%' || gender LIKE '%$search%' || lasttransaction LIKE '%$search%' || barangay LIKE '%$search%' ||  municipality LIKE '%$search%' ||  province LIKE '%$search%' order by id desc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
              <th>Date</th>
             
               <th>User ID</th>
               
               <th>Fullname</th>
               <th>Loan ID</th>
               <th>Loan Type</th>
               <th>Months</th>
               <th>Interest</th>
               <th>Loan Amount</th>
               <th>Total Payable</th>
               <th>Pay Amount</th>
               <th>Balance</th>
               <th>Status</th>
               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                        <td>'.$row["lasttransaction"].'</td>
                        
                         <td>'.$row["userid"].'</td>

                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>
                          <td>'.$row["loanid"].'</td>
                         <td>'.$row["loantype"].'</td>
                         <td>'.$row["months"].'</td>
                         <td>'.$row["interest"].' %</td>
                         <td>'.$row["amount"].'</td>
                         <td>'.$row["totalpayableamount"].'</td>
                         <td>'.$row["payment"].'</td>
                         <td>'.$row["totalbalance"].'</td>
                         <td>'.$row["status"].'</td>
                        
                    </tr>
               ';

          }

               $output .='</table>';
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename = Loan-Transaction.xls');
               echo $output;
     }
   }else{
    $search = $_GET['search_export'];
    $sql = "SELECT * FROM loanuserpayment where loanid LIKE '$search' || lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' || id LIKE '$search' || status LIKE '$search' || loantype LIKE '$search' || gender LIKE '$search' || lasttransaction LIKE '$search' || barangay LIKE '$search' || municipality LIKE '$search' || province LIKE '$search' order by id asc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
              <th>Date</th>
              
               <th>User ID</th>
               
               <th>Fullname</th>
               <th>Loan ID</th>
               <th>Loan Type</th>
               <th>Months</th>
               <th>Interest</th>
               <th>Loan Amount</th>
               <th>Total Payable</th>
               <th>Pay Amount</th>
               <th>Balance</th>
               <th>Status</th>
               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                        <td>'.$row["lasttransaction"].'</td>
                         <td>'.$row["userid"].'</td>
                         
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>
                          <td>'.$row["loanid"].'</td>
                         <td>'.$row["loantype"].'</td>
                         <td>'.$row["months"].'</td>
                         <td>'.$row["interest"].' %</td>
                         <td>'.$row["amount"].'</td>
                         <td>'.$row["totalpayableamount"].'</td>
                         <td>'.$row["payment"].'</td>
                         <td>'.$row["totalbalance"].'</td>
                         <td>'.$row["status"].'</td>
                        
                    </tr>
               ';

          }

               $output .='</table>';
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename = Loan-Transaction.xls');
               echo $output;
     }
   }

     ?>