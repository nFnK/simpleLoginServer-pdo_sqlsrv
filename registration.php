<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php
  require('db.php');
  if (isset($_POST['username'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $username = stripslashes($username);
    $email = stripslashes($email);
    $password = stripslashes($password);
    $phone = stripslashes($phone);

    try{
      $STH = $db->prepare("INSERT INTO users (username, password, email, phone) values ('$username', '".md5($password)."', '$email', '$phone')");
      $STH->execute();
      echo "<div class='form'> <h3>Você foi Registrado com Sucesso.</h3> <br/> <a href='login.php'>Login</a></div>";
    }catch(PDOException $e) {
      echo $e->getMessage();
    }

  }else{
    ?>
    <div class="form">
      <h1>Registro</h1>
      <form name="registro" action="" method="post">
        <input type="text" name="username" placeholder="Nome" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="text" name="phone" placeholder="Telefone" required />
        <input type="password" name="password" placeholder="Senha" required />
        <input type="submit" name="submit" value="Registrar" />
      </form>
    </div>
    <?php
  }
  ?>
</body>
</html>
