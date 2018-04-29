<?php
require_once 'DB_Driver.php';
require_once 'User_Required.php';
require_once 'ProcessData.php';

$DBconnector = new DB_Driver();
$UserRequired = new User_Required();
$ProcessData = new ProcessData();

# Init()
$UserRequired->setRequired(50000,70000,'2018-04-15 17:00:00','2018-04-15 20:30:00','romance,drama',4.1,40,array('VTC','BK Studio','Marvel'));
$arrayRequired = $UserRequired->getUserRequired();

# Get data 
$result = $DBconnector->getData($arrayRequired['min_price'],$arrayRequired['max_price'],$arrayRequired['start_time'],$arrayRequired['end_time'],null,null,null,null);

# Matrixalization
$DSSTable = array();
foreach($result as $row){
    $key = $row['ticket_id'];
    $value = array_slice($row,1,6);
    $DSSTable[$key] = $value;
}
# SHOW REQUIRED
print_r($arrayRequired);

# Make a copy of DSSTable named DSSTable_copied
$DSSTable_coppied = $DSSTable;

# After Generation
$price_arr = array();
$time_arr = array();
$genre_arr = array();
$rating_arr = array();
$seat_no_arr = array();
$producer_arr = array();

foreach ($DSSTable as $key => $value) {
    $price_arr[] = $value['price'];
    $time_arr[]  = $value['start_time'];
    $genre_arr[] = $value['genre'];
    $rating_arr[] = $value['rating'];
    $seat_no_arr[] = $value['seat_no'];
    $producer_arr[] = $value['producer'];
}

# Get value from process
$priceAP = $ProcessData->price_process($arrayRequired['min_price'],$price_arr);
$timeAP  = $ProcessData->time_process($arrayRequired['start_time'],$time_arr);
$genreAP = $ProcessData->genre_process($arrayRequired['genre'],$genre_arr);
$ratingAP = $ProcessData->rating_process($arrayRequired['rating'],$rating_arr);
$seat_noAP = $ProcessData->seat_no_process($arrayRequired['seat_no'],$seat_no_arr,27);
$producerAP = $ProcessData->producer_process($arrayRequired['producer'],$producer_arr);

$index = 0;
foreach ($DSSTable as $key => $value) {
    $DSSTable[$key]['price'] = $priceAP[$index];
    $DSSTable[$key]['start_time'] = $timeAP[$index];
    $DSSTable[$key]['genre'] = $genreAP[$index];
    $DSSTable[$key]['rating'] = $ratingAP[$index];
    $DSSTable[$key]['seat_no'] = $seat_noAP[$index];
    $DSSTable[$key]['producer'] = $producerAP[$index];
    $index ++;
}
// USE TO SHOW
//Colect keys of DSSTable, They are options
$keys = array_keys($DSSTable);
$column = array('price','start_time','genre','rating','seat_no','producer');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        table,th,td {
            border: 1px solid gray;
        }
        .left {
            float: left;
            text-align: center;
            margin: 2px 10px;
            display: inline;
        }
        .right {
            float: left;
            text-align: center;
            margin: 2px 10px;
            display: inline;
        }
    </style>
</head>
<body>
<div>
<div class="left">
    <table>
        <tr>
            <?php
            echo "<th>Key</th>";
            foreach($column as $col){
                echo "<th>$col</td>";
            }
            ?>
        </tr>
        <?php
        foreach($keys as $key){
            echo "<tr>";
            echo "<td>".$key."</td>";
            $row = $DSSTable[$key];
            foreach($row as $col){
                echo "<td>".$col."</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>
<div class="right">
    <table>
        <tr>
            <?php
            foreach($column as $col){
                echo "<th>$col</td>";
            }
            ?>
        </tr>
        <?php
        foreach($keys as $key){
            echo "<tr>";
            $row = $DSSTable_coppied[$key];
            foreach($row as $col){
                echo "<td>".$col."</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>
</div>
</body>
</html>