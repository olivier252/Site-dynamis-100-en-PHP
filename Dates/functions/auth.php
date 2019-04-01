<?php

function set_Connex():bool {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return !empty($_SESSION['connex']);
}

function connex_User():void {
	if(!set_Connex()) {
    header('location: login.php');
	exit();
	}
}