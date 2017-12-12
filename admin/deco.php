<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration du projet-recettes.tk</title>
<link rel="stylesheet" href="css/deco.css" type="text/css" />
<script language="javascript">
function redirection(page)
  {window.location=page;}
setTimeout('redirection("../admin.htm")',2000);
</script>
</head>

<body>
<?php
// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();

echo'<p><DIV id=message style ="position: absolute; top:12em; left:16em; font-size:18pt; color: black">Vous avez été déconnecté de la section administrateur</div><p>';
?> 

</body>
</html>