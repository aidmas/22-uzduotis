<?php

sleep(10);

header("Content-Type: application/json; charset=UTF-8");
if(strlen($_REQUEST['pass1']) >= 8 && strlen($_REQUEST['pass2']) >= 8){
    if (preg_match("/^[a-zA-Z0-9]*$/",$_REQUEST['pass1']) && !preg_match("/^[a-zA-Z]*$/",$_REQUEST['pass1']) && !preg_match("/^[a-z0-9]*$/",$_REQUEST['pass1']) && !preg_match("/^[A-Z0-9]*$/",$_REQUEST['pass1'])) {
        if ($_REQUEST['pass1'] ==  $_REQUEST['pass2']) {
            $response = [
                success => true,
                token => 'Slaptažodis pakeistas'
            ];
        } else {
            $response = [
                success => false,
                error => 'Slaptažodžiai nesutampa'
            ];
        }
    }
    else{
        $response = [
            success => false,
            error => 'Slaptažodis turi sudaryti didžiosios ir mažosios raidės ir skaičiai'
        ];
    }
}
else{
    $response = [
        success => false,
        error => 'Slaptažodis turi sudaryti bent 8 simboliai'
    ];
}
echo json_encode($response);
