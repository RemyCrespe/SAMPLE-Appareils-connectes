<!DOCTYPE html>

<head>
   <title>Sampl'é</title>
   <meta charset="utf-8" />
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <link rel="stylesheet" href="../css/Home.css" />
   <link rel="icon" href="../images/logo.ico"/>
   <script src="../js/responsive.js"></script>
    <script src="../js/states.js"></script>
</head>

<body>
	<h1>Sampl'é</h1>
	<img id="logo" src="../images/logo.png" alt="image" title="icon_login"/>
    <br/>
	<h2>Identité : <a id="Name" href="/user"><?php echo  $params['app']->getSessionParameters('user')['username']; ?></a></h2>

    <script type="text/javascript">
        var objectList = <?php echo $params['objectList'] ?>;
    </script>

	<img src="../images/AmR.png" id="AM" onclick="changeState('AM', ['AmR.png', 'AmG.png'], objectList[0]);" />
	<img src="../images/Cam.png" id="CAM" onclick="window.location.replace('/home/camera')"/>




    <script type="text/javascript">start(objectList);</script>

	<!--<a href="/Favorites.php"><img src="../images/PLUS.png" id="Favoris"></a>-->

    
</body>

<footer>
	<form action="/">
        <br/>
        <button type="login">Déconnecter</button>
    </form>
</footer>

</html>

