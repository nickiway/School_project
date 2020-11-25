<?php
$sorting = $_GET["sort"];
switch($sorting){
    case 'price-asc';
    $sorting  = 'cost ASC';
    $sortname = 'By price ascending';
    break;
    
    case 'price-desc';
    $sorting  = 'cost DESC';
    $sortname = 'By price descending';
    break;
    
    case 'alfabet-asc';
    $sorting  = 'city ASC';
    $sortname = 'Alphabetically аscending';
    break;

    case 'alfabet-desc';
    $sorting  = 'city DESC';
    $sortname = 'Alphabetically descending';
    break;

    default:
    $sorting = 'ID_offer ASC';
    $sortname = 'Alphabetically аscending';
    break;

}
?>