<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_POST['submit'])){
  
        $text=$_POST['text'];
       mail("rebiaiachref@gmail.com","salut its meee",$text,"ObjectsDetector.com");
    }
   

    ?>
    <form method="post" action="">
        <textarea name="text" rows="5" cols="30"></textarea>
        <input type="submit" value="envoyer mail!" name="submit"/>

    </form>
</body>
</html>