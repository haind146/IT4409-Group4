<?php
/**
 * Created by PhpStorm.
 * User: Nguyễn Bá Khải
 * Date: 4/27/2018
 * Time: 6:21 PM
 */
require_once('../../Private/initialize.php');
require_once ('../../Private/model/Movie.class.php');
if(!empty($_POST['text'])){
    $arrayObject = Movie::getMoivesbyName($_POST['text']);
    echo json_encode($arrayObject);
}
?>