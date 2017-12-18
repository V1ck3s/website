<?php
    session_start();
    session_unset();
	session_destroy();
	include("../Vue/vue_deconnexion.php")
?>