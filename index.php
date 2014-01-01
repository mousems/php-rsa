<?php


if (isset($_POST['publickey'])) {
  
    $pubKey=$_POST['publickey'];
    openssl_public_encrypt($_POST['en'], $text, $pubKey);
    $text=base64_encode($text);
}else{
  
    // Extract the public key from $res to $pubKey
    $pubKey = "";
    $text = "";

    // Encrypt the data to $encrypted using the public key
    //openssl_public_encrypt($data, $encrypted, $pubKey);

    // Decrypt the data using the private key and store the results in $decrypted
    //openssl_private_decrypt($encrypted, $decrypted, $privKey);


}

?>

<!DOCTYPE html>
<html>
<head>
  <title>PHPRSA - Encrypt</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>  
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    body {
      padding-top: 70px;
    }
  </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">PHP RSA</a>
    <ul class="nav navbar-nav">
      <li>
        <a href="index.php">Encrypt</a>
      </li>
      <li>
        <a href="index2.php">Decrypt</a>
      </li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-10">

      <form action="index.php" method="post">
      <div class="row">
        <div class="col-lg-6">
          <h3>To encrypt data , Please input public key</h2>
          <label for="pubkey">Public Key</label><br/>
          <small>
            <textarea id="input" name="publickey" rows="15" style="width:100%"><?=$pubKey;?></textarea></small>
        </div>
      </div>
      <div class="row"><br/></div>
      <div class="row">
        <div class="col-lg-4">
            <label for="input">Text to encrypt:</label><br/>
            <textarea id="input" name="en" style="width: 100%" rows="4"><?=$text;?></textarea>
            <button id="execute" class="btn btn-primary">Encrypt</button>
          
        </div>
      </div>
      </form>
    </div>
  </div>
  <p>by mousems</p>
</div>
</body>
</html>
