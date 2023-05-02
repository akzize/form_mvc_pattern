<?php

require('model/database.php');
require('model/city_db.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$city = htmlspecialchars($_POST['city']);
if (!$city) {
    $city = htmlspecialchars($_GET['city']);
}
$countryCode = htmlspecialchars($_POST['countrycode']);
$district = htmlspecialchars($_POST['district']);
$population = htmlspecialchars($_POST['population']);

$action = htmlspecialchars($_POST['action']);
if (!$action) {
    $action = htmlspecialchars($_GET['action']);
    if (!$action) {
        $action = 'select';
    }
}


switch ($action){
    case 'select':
        if ($city){
            $results = get_cities($city);
            if ($results){
            include 'view/update_delete_form.php';
            }else{
                $error_msg = "Oops! The result is empty :\\";
                include "view/error.php";
            }
        }else{
        include 'view/select_insert_form.php';
        }
        break;
    case 'insert':
        if ($city && $district && $population && $countryCode){
            $results = insert_city($city, $district, $population, $countryCode);
//            include 'view/update_delete_form.php';
            header("Location: .?action=select&city={$city}");
        }else{

            $error_msg = 'Error: Please check the fields !!';
            include 'view/error.php';
        }
        break;
    case 'update':
        if ($id && $city && $district && $population && $countryCode){
            $results = update_city($id, $city, $district, $population, $countryCode);
            if ($results){
            header("Location: .?action=select&city={$city}");
            }
        }else{
            $error_msg = 'Error: Please check the fields !!';
            include 'view/error.php';
        }
        break;
    case 'delete':
        if ($id){
            $results = delete_city($id);
            if ($results){
                header("Location: .?deleted=1");
            }
        }
        break;
    default:
            $error_msg = 'Error: Please check the fields !!';
            include 'view/error.php';

}