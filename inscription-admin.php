<?php $pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");


if(isset ($_POST['btn-inscription'])){

   if   (!empty($_POST['nom'])and!empty($_POST['motdepasse'])) 
   {
      $nom=sha1($_POST['nom']);
     
     $mdp=sha1($_POST['motdepasse']);
 
     $inserer=$pdo->prepare("INSERT INTO administration(nomadmin,motdepasseadmin) VALUES(?,?)");
      $inserer->execute(array($nom,$mdp));
       $message2="votre compte a été bien créé  connectez vous !
        <a style=\" color:skyblue;text-decoration:none;\" href=\"connexion.php\"> Me connecter </a> ";
                
             }else echo "3ammer koullech";         

            }
            ?>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <title>test</title>  
 


<form method="post">
<input type="text" placeholder="nom"  name="nom"/>
<input type="password" placeholder="mot de passe" name="motdepasse"/>

<input type="Submit" name="btn-inscription"/>
</form>

<a href="connexion-admin.php"> me connecter</a>
</body>
</html>
