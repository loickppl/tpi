<?php
session_start();
require_once 'dao.php';
$allFitArray = array();
foreach (LoadFitnessCustomer()->fetchAll() as $fitness){
    $response_array['idFit']= $fitness['Id_Fitness'];
    $response_array['nameFit']= $fitness['Nm_Fitness'];
    array_push($allFitArray, $response_array);
}
 echo json_encode($allFitArray);
 
 
 
 
 
 
 
 
 
 
 
// 
// function loadFitnessCustomer() {
//                                $.ajax({
//                                    type: 'POST',
//                                    url: 'loadFitnessAjax.php',
//                                    data: {},
//                                    dataType: 'json',
//                                    success: function (data) {
//                                        data.forEach(function (fit) {
//                                            $('#fitClient').append(new Option(fit.nameFit, fit.idFit));
//                                            $('#fitClient').selectpicker('refresh');
//                                        });
//                                        loadFitnessAsCustomer();
//                                    },
//                                    error: function (jqXHR) {
//                                        $('#fitClient').html(jqXHR.toString());
//                                    }
//                                });
//                            }