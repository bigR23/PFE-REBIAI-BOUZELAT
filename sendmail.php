<?php
if(isset($_POST['mailform']))
{
$header="MIME-Version: 1.0\r\n";
$header.='From:"ObjectsDetector.com"<support@objectsdetector.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
$motif=$_POST['motif'];
$message='
<html>
<head>
<link rel="stylesheet" href="css/all.css"/>
</head>
		<div style="background:linear-gradient(to bottom right,#0582e7,#022f53); border: #0091FF solid 3px ;
		border-radius: 40px;
		padding:30px;
		box-shadow: 0 0 10px #151415;
		font-family: sans-serif" 
		align="center">
			<br />
			<p style="font-size:1.2em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;"> Votre demande a était <strong style="color:red">rejeté</strong> pour le motif suivant :</p>
		<p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$motif.'</p>
<br />
		</div>
	</body>
</html>
';


mail("tnroro7@gmail.com", "réponse à votre demande de déclaration !", $message, $header);
}
?>
<form method="POST" action="">
<textarea name="motif" id="motif" cols="30" rows="10"></textarea>

	<input type="submit" value="envoyer mail!" name="mailform"/>
</form>