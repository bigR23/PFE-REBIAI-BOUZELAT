<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_POST['connexion']))
{

	if(!empty($_POST['nomadmin'])AND !empty($_POST['motdepasseadmin'])){
			$nomadmin=sha1($_POST['nomadmin']);
	$motdepasseadmin=sha1($_POST['motdepasseadmin']);
		$reqadmin=$pdo->prepare("INSERT INTO administration (nomadmin,motdepasseadmin) VALUES(?,?) ");
		$reqadmin->execute(array($nomadmin,$motdepasseadmin));
		
}else $erreur="completer"

?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace Admin</title>
  <link rel="stylesheet" href="css/all.css"/>
  <link rel="shortcut icon" href="S.PNG"/>
</head>
<style type="text/css">
*{
  margin: 0%;
  padding: 0%;
  box-sizing: border-box;
  font-family: sans-serif;
}
body{
  display:flex;
  justify-content:center;
  align-items: center;
  min-height: 100vh;
  background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
  overflow: hidden;
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

 
  header h2{
    font-size:1.5em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }
 
  form {
     
     position: relative;
     width: 40%;
    margin:auto;
     text-align: center;
     height:380px;
     margin:auto;
     padding:30px;
     border: #0091FF 3px solid;
     background:linear-gradient(to bottom left,#0582e7,#022f53);
     border-radius: 80px;
     box-shadow: 0 0 7px black;
   
   }
   form .inputbx input{
       position:relative;
       text-align:center;
       margin-top:20px;
    margin-bottom:50px;
         width: 70%;
         background-color: transparent;
         box-shadow: none;
         border: none;
         outline: none;
         padding: 10px 0;
         font-size: 18px;
         font-weight: 300;
         color: #fff;
         border-bottom:  2px solid #fff;
       }
       form .inputbx input::placeholder{color: #fff;}
   button {
   height:40px;width: 280px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin:0px;
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

@keyframes transition{
     from{ 
        opacity: 0;
        scale:0;
        transform: translateX(400px);
     }

     to {
      opacity: 1;
      scale:1;
      transform: translateX(0);
     }
   }
   .alerte p { color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black; animation:op .8s;}

   @keyframes op{
  0%{
     opacity:0;
   }
   100%{
     opacity:1;
   }
 }
</style>
<body>
  <header>
<h2> Espace Admin </h2>
<div class="alerte">
 <?php if(isset($erreur)){
echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
}
?> 
      </div>
    </header>
        
    <br>
    <form name="formaadd" method="post" action="" >
    <div class="inputbx">
<input type="text" name="nomadmin" placeholder="nom d'admin"/>
</div>
<div class="inputbx">
      <input type="text" name="motdepasseadmin"  placeholder="mot de passe">
    </div>
<button  type="submit" name="connexion">connecter en tant qu'admin </button>
</form>

</body>
</html>
<?php }?>