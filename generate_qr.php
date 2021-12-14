<?php 
if(isset($_POST['generate_text']))
{

 include('phpqrcode/qrlib.php'); 
 $text1=$_POST['qr_fname'];
 $text2=$_POST['qr_lname'];
 $text3=$_POST['qr_email'];
 $text4=$_POST['qr_address'];
 $text5=$_POST['qr_phone'];
 $folder="images/";
 $ipa="ipaddress";
 $name="$text2$text1$text5";
 $myFile = $name.'.php'; // or .php   
 $file_name=$folder.$name.'.png';

 QRcode::png('http://localhost/qrsite/'.$myFile,$file_name);
 
 $fh = fopen($myFile ,'w'); // or die("error");  
 $stringData ="
 <?php
 include('function.php');
 mail('$text3','ipaddress','getUserIP()');
 ?>

 <!DOCTYPE html>
 <html >
 <head>
     <title>$text1 $text2 qr code</title>
     <link rel='stylesheet' href='style1.css'>
 </head>
 <body>
    <div class='box'>
    <h1><?php
        echo '$text1 ';
        echo '$text2'
        ?>
    </h1>
    <p><?php
        echo '$text3'
        ?>
    </p>
    <p><?php
        echo '$text4'
        ?>
    </p>
    <p><?php
        echo '$text5'
        ?>
    <p>
 </body>
 </html>";   
 fwrite($fh, $stringData);
 fclose($fh);
}else{
  include('phpqrcode/qrlib.php');
  $text="CODE QR POUR LES MALADES D'ALZHEIMER ";
  $folder="images/";
  $file_name="qr.png";
  $file_name=$folder.$file_name;
  QRcode::png($text,$file_name);
}
?>
<html>  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALZHEIMER QR CODE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> CREATE A QR C    ODE </h1>
    <div class="image">
      <?php  echo"<img src='{$file_name}'>
      <br>
      <a href='{$file_name}' download='qrcode'>
      <h2>Download</h2>
      <a/>
      ";?>
    </div>
    <div class="form">
    <form method="post" action="generate_qr.php">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's create your qr code!</div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="text" placeholder=" " name="qr_fname" />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">First name</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" class="input" type="text" placeholder=" " name="qr_lname" />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Last name</label>
      </div>
      <div class="input-container ic2">
        <input id="email" class="input" type="text" placeholder=" " name="qr_email"/>
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</>
      </div>
      <div class="input-container ic2">
        <input id="address" class="input" type="text" placeholder=" " name="qr_address"/>
        <div class="cut "></div>
        <label for="address" class="placeholder">Addresse</>
      </div>
      <div class="input-container ic2">
        <input id="phone" class="input" type="text" placeholder=" " name="qr_phone"/>
        <div class="cut "></div>
        <label for="phone" class="placeholder">Phone</>
      </div>
      <button type="text" class="submit" name="generate_text" value="Generate">SUBMIT</button>
    </form>
    </div>  
    
</body>

</html>