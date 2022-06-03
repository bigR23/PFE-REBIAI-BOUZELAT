<?php
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_GET['pseudo'],$_GET['key']) AND !empty($_GET['pseudo'])AND !empty($_GET['key'])){
    $pseudo=htmlspecialchars(urldecode($_GET['pseudo']));
    $key=$_GET['key'];
    $requser=$pdo->prepare("SELECT * FROM membres WHERE pseudo=? AND confirmkey =? AND confirme='NON'");
    $requser->execute(array($pseudo,$key));
    $userexist=$requser->rowCount();
    if( $userexist==1){
        $updateuser=$pdo->prepare("UPDATE membres SET confirme='OK' WHERE pseudo =? AND confirmkey =?");
        $updateuser->execute(array($pseudo,$key));
        $erreur1="votre compte a été bien confirmé !";
    }else{
        $erreur2="compte est déja confirmé  !";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css"/>
    <title>confirmation</title>
<style>
     *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
    
  }
    body{
        position:relative;
    width: 100%;
    min-height: 100vh;
    padding: 0 80px;
    display: flex; 
    background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
    text-align:center;

    }
    h2{
        margin:auto;
        color: #fff;
    text-shadow: 0 0 8px black;
    font-size:3em;
 
    }
</style>
</head>

<body>


  
 <?php if (isset($erreur1)){?>  
     <audio autoplay style="display:none">
  <source src="audio/confirmer.mp3">
</audio>
<h2>
<?php echo $erreur1.' <i class="fa-solid fa-circle-check"style="color:rgb(0,236,173);"></i>';
  }?> </h2>
  <?php   if (isset($erreur2)){?>  <h2>
<?php echo $erreur2;}'<h2>'?>
                

    
</body>
</html>