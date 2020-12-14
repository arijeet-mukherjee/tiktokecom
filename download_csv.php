<?php
session_start();
include_once('conn.php');

$data = array(
     '0' => array('Name'=> 'user1', 'Status' =>'complete', 'Priority'=>'Low', 'Salary'=>'001'),
     '1' => array('Name'=> 'user2', 'Status' =>'inprogress', 'Priority'=>'Low', 'Salary'=>'111'),
     '2' => array('Name'=> 'user3', 'Status' =>'hold', 'Priority'=>'Low', 'Salary'=>'333'),
     '3' => array('Name'=> 'user4', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'444'),
     '4' => array('Name'=> 'user5', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'777'),
     '5' => array('Name'=> 'user6', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'777')
    );
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

function ExportFile($records) {
    $heading = false;
    if(!empty($records))
      foreach($records as $row) {
        if(!$heading) {
          // display field/column names as a first row
          echo implode("\t", array_keys($row)) . "\n";
          $heading = true;
        }
        echo implode("\t", array_values($row)) . "\n";
      }
    exit;
}

function ExportCSVFile($records) {
    // create a file pointer connected to the output stream
    $fh = fopen( 'php://output', 'w' );
    $heading = false;
        if(!empty($records))
          foreach($records as $row) {
            if(!$heading) {
              // output the column headings
              fputcsv($fh, array_keys($row));
              $heading = true;
            }
            // loop over the rows, outputting them
             fputcsv($fh, array_values($row));
              
          }
          fclose($fh);
}


    $fileName = "oder_completed_data-" . date('Ymd') . ".csv"; 
 
// Headers for download 
    
 
    $flag = false; 
    $fields = array('INDEX','ODER ID.','UID', 'TRUCK UID', 'SOURCE', 'DESTINATION', 'PRICE', 'TIME');
    $excelData = implode("\t", array_values($fields)) . "\n"; 
    include_once('conn.php');
    $ref_new="odersCompleted/";
    $fetchdata=$database->getReference($ref_new)->getValue();
    if($fetchdata >0){
     $i=0;

                   foreach ($fetchdata as $key => $row_new) {
                                    $i++;
                              
                                ?>
    $datanew=array($i,$row_new['oderId'],$row_new['uid'],$row_new['truck_uid'],$row_new['source'],$row_new['destination'],$row_new['price'],$row_new['time']);
                               //array_walk($datanew, 'filterData'); 
                                $excelData .= implode("\t", array_values($datanew)) . "\n";
                            <?php }

   // downloadCSV($data);
    //
    }
    header("Content-Disposition: attachment; filename=\"$fileName\""); 
    header("Content-Type: application/vnd.ms-excel"); 
    //header("Location: completed_orders.php");
exit;


 