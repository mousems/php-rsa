<?php


if (isset($_POST['de'])) {
  
    $privKey=$_POST['privatekey'];
    $pubKey=$_POST['pubkey'];
    $text=base64_decode($_POST['de']);
    openssl_private_decrypt($text, $text, $privKey);

}else{
  

    $config = array(
        "digest_alg" => "sha512",
        "private_key_bits" => 1024,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );
        
    // Create the private and public key
    $res = openssl_pkey_new($config);

    // Extract the private key from $res to $privKey
    openssl_pkey_export($res, $privKey);

    // Extract the public key from $res to $pubKey
    $pubKey = openssl_pkey_get_details($res);
    $pubKey = $pubKey["key"];
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
  <title>PHPRSA - Decrypt</title>
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

      <form action="index2.php" method="post">
      <div class="row">
        <div class="col-lg-6">
          <h3>Your friend need your public to encrypt data.</h2>
          <h3>Then you decrypt data via this page.</h2>
          <label for="pubkey">Public Key</label><br/>
          <small>
            <textarea id="input" name="pubkey" rows="5" style="width:100%"><?=$pubKey;?></textarea></small>
        </div>
      </div>
      <div class="row"><br/></div>
      <div class="row">
        <div class="col-lg-4">
            <label for="input">Text to decrypt:</label><br/>
            <textarea id="input" name="de" rows="15" style="width: 100%" rows="4"><?=$text;?></textarea>
            <button id="execute" class="btn btn-primary">Decrypt</button>
            <input type="hidden" name="privatekey" value="<?=$privKey?>">
        </div>
      </div>
      </form>
    </div>
  </div>
  <p>by mousems</p>
</div>
</body>
</html>
