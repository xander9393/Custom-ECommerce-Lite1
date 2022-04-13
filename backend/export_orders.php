<?php
// Include the database config file 
require_once '../includes/db.php';

// Filter the excel data 
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Excel file name for download 
$fileName = "Orders-List-" . date('Ymd') . ".xls";

// Column names 
$fields = array('SR.N.', 'CUSTOMER ID', 'LASTNAME', 'FIRSTNAME', 'ADDRESS', 'CITY', 'POSTAL CODE', 'REGION', 'PHONE NO.', 'TOTAL', 'PAYMENT METHOD', 'ORDER DATE', 'ORDER STATUS');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Get records from the database 
$query = $con->query("SELECT * FROM orders");
if ($query->num_rows > 0) {
    // Output each row of the data 
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        $i++;
        $rowData = array($i, $row['customer_id'], $row['lname'], $row['fname'], $row['address'], $row['city'], $row['postal'], $row['region'], $row['country'], $row['phone'], $row['total'], $row['payment_method'], $row['order_date'], $row['order_status']);
        array_walk($rowData, 'filterData');
        $excelData .= implode("\t", array_values($rowData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}

// Headers for download 
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");

// Render excel data 
echo $excelData;

exit;
