<?php

require_once 'dao.php';
$allcategoryarray = array();
foreach (loadProgramCategory()->fetchAll() as $programCategory){
    $response_array['categoryName'] = $programCategory['Nm_Program_Category'];
    $response_array['categoryId'] = $programCategory['Id_Program_Category'];
    array_push($allcategoryarray, $response_array);
}
echo json_encode($allcategoryarray);