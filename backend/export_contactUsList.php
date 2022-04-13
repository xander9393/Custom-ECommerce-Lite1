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
$fileName = "Contact-Us-List-" . date('Ymd') . ".xls";

// Column names 
$fields = array('SR.N.', 'NAME', 'EMAIL', 'CONTACT NO.', 'CONCERN', 'DATE');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Get records from the database 
$query = $con->query("SELECT * FROM tbl_contactus");
if ($query->num_rows > 0) {
    // Output each row of the data 
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        $i++;
        $rowData = array($i, $row['name'], $row['email'], $row['contact_no'], $row['concern'], $row['date']);
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
