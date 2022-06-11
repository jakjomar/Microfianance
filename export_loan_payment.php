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


         $sql = "SELECT * FROM loanpayment where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || userid LIKE '%$search%' || status LIKE '%$search%' || loantype LIKE '%$search%' || loandate LIKE '%$search%' || id LIKE '%$search%' || barangay LIKE '$search' || municipality LIKE '$search' || province LIKE '$search' order by lastname asc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
              <th>Loan Date</th>
              <th>Loan ID</th>
               <th>User ID</th>
               <th>Name</th>
               <th>Loan Type</th>
               <th>Months</th>
               <th>Interest</th>
               <th>Loan Amount</th>
               <th>Total Payable</th>
               <th>Balance</th>
               <th>Status</th>
               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                        <td>'.$row["loandate"].'</td>
                         <td>'.$row["id"].'</td>
                         <td>'.$row["userid"].'</td>
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>
                         <td>'.$row["loantype"].'</td>
                         <td>'.$row["months"].'</td>
                         <td>'.$row["interest"].' %</td>
                         <td>'.$row["amount"].'</td>
                         <td>'.$row["totalpayableamount"].'</td>
                         <td>'.$row["totalbalance"].'</td>
                         <td>'.$row["status"].'</td>
                        
                    </tr>
               ';

          }

               $output .='</table>';
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename = Loan-Payment.xls');
               echo $output;
     }
  }else{
    $search = $_GET['search_export'];
    $sql ="SELECT * FROM loanpayment where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || userid LIKE '$search' || status LIKE '$search' || loantype LIKE '$search' || loandate LIKE '$search' || id LIKE'$search' || barangay LIKE '$search' || municipality LIKE '$search' || province LIKE '$search' order by lastname asc";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
     {
          $output .= '
          <table>
          <tr>
              <th>Loan Date</th>
              <th>Loan ID</th>
               <th>User ID</th>
               <th>Name</th>
               <th>Loan Type</th>
               <th>Months</th>
               <th>Interest</th>
               <th>Loan Amount</th>
               <th>Total Payable</th>
               <th>Balance</th>
               <th>Status</th>
               
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result))
          {
               $output .= '
                    <tr>
                        <td>'.$row["loandate"].'</td>
                         <td>'.$row["id"].'</td>
                         <td>'.$row["userid"].'</td>
                         <td>'.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</td>
                         <td>'.$row["loantype"].'</td>
                         <td>'.$row["months"].'</td>
                         <td>'.$row["interest"].' %</td>
                         <td>'.$row["amount"].'</td>
                         <td>'.$row["totalpayableamount"].'</td>
                         <td>'.$row["totalbalance"].'</td>
                         <td>'.$row["status"].'</td>
                        
                    </tr>
               ';

          }

               $output .='</table>';
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename = Loan-Payment.xls');
               echo $output;
     }
  }
     ?>