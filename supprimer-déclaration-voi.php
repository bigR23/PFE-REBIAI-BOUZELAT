<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_SESSION['nomadmin'])){
    $ad=$_SESSION['nomadmin'];
    
    $ID=intval($_GET['id']);
    $justificatif=$_GET['just'];
    $photo=$_GET['photo'];
    $table=$_GET['table'];
    $requser=$pdo->prepare("SELECT * FROM membres WHERE id=$ID");
   $requser->execute();
 $userinfo=$requser->fetch();
   $mail=$userinfo['mail'];
    if(isset($_POST['btnsup'])){

        if($table=="voiture"){
            $numchassis=$_GET['numchassis'];
        $reqsup=$pdo->prepare("DELETE FROM voiture WHERE id= ? AND num_chassis= ?");
        $reqsup->execute(array($ID,$numchassis));
        $justname ="justificatifs-voiture/";
        $photoname ="voitures-déclarés/";
        $justname .= $justificatif;
        $photoname .= $photo;
        if(file_exists($justname) AND file_exists($photoname)){
        unlink( $justname)AND unlink($photoname);
  
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
			<p style="font-size:1.2em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;"> Votre déclaration de voiture a était <strong style="color:red">rejeté</strong> pour le motif suivant :</p>
		<p style="font-size:1.3em;color:#fff ;margin: 20px 0px;text-shadow:0 0 4px #000000;">'.$motif.'</p>
<br />
		</div>
	</body>
</html>
';


mail($mail, "réponse à votre demande de déclaration !", $message, $header);
   }
   header("Location:admin-voiture.php?msg=déclaration-supprimée&nomadmin=".$ad);
   }
}
?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Admin</title>  

 <style type="text/css">
     
     button { animation: ba .5s;
   height:45px;width: 200px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin:60px;
   left:130px;
   border:none;
   border-radius: 30px 15px;
   position: relative;
   overflow: hidden;
   background:linear-gradient(to bottom,#0582e7,#022f53);
   text-align: center;
   font-size: 18px;
   color: #ddd;
   transition: .3s;
   z-index: 0;
   font-family: inherit;
   color:rgba(220, 220, 220, 0.938);
  }
  
  button::before {
   content: '';
   width: 0;
   height: 300px;
   position: absolute;
   top: 50%;
   left: 50%;
   color: white;
   transform: translate(-50%, -50%) rotate(45deg);
   background:linear-gradient(to bottom,#0582e7,#022f53);
   box-shadow:0 0 10px white;
   transition: 1s ;
   display: block;
   z-index: -1;
  }
  
  button:hover::before {cursor: pointer;box-shadow:0 0 10px white;
   width: 105%;
  }
  
  button:hover {cursor: pointer; 
    box-shadow:0 0 10px white;
    transition: 0.6s;
  }  
  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
    
  }  .banner{
    position:relative;
    width: 100%;
    min-height: 100vh;
    padding: 0 80px;
    display: flex; 
    background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
   
  }

  
  header{
    position:fixed;
    top:0;
    left: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 50px;
  }

  header .re{
    font-size:1.5em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }
  .banner h2{
    position:absolute;
    top:0;
    left: 0;
    animation: blurFadeIn .6s;
    color: #fff;
    text-shadow: 0 0 8px black;
    font-size:2em;
    margin: 70px 60px;
    padding: 20px;
  }
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
  
  .container{width: 100%;display: flex;justify-content: space-between;flex-wrap: wrap;margin-top:150px;position: relative;}
    
     @keyframes ba {
       0% { scale: 0.3; opacity: 0;}
      100%{ scale: 1;opacity: 1;}
     }
   
.content{
   text-align:center;
   margin-top:160px;
    margin-left:auto;
    margin-right:auto;
}
.content img {transition:.5s;}
img:hover {
    scale:1.2;
    transition:.5s;
   
}
form{height:45px;width: 230px;position:relative;right:30px;}
p{margin:20px;
 font-weight: 700;
  font-size:1.3em;
  color:#fff;
  text-shadow:0 0 4px black;
  text-decoration:none;}
#motif{
    margin-left:auto;
    margin-right:auto;
    text-align:center;
     background:linear-gradient(to bottom left,#0582e7,#022f53);
  border: #0091FF solid 2px ;
  border-radius: 60px;
 
      outline: none;
      padding: 10px 0;
      font-size: 18px;
      font-weight: 300;
      color: #fff;
      border-radius:30px;
}
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="admin-voiture.php?nomadmin=<?=$ad?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    </header>

    <h2> supprimer déclaration &emsp;<i id ="icon"class="fa-solid fa-clipboard-list"></i></h2>

     <div class="content">
       <p>voulez vous vraiment supprimer cette déclaration ? </p>
       <form method="POST" action="">
<textarea name="motif" id="motif" cols="70" rows="8" placeholder="motif de refus de la déclaration"></textarea>
<button type="submit"name="btnsup">Supprimer</button></form> 
	
</form>
      



</div>

     </section>

</body>
</html>
<?php } ?>