<?php
if (empty($_SESSION)) {
  session_start();
  if (!empty($_SESSION["mensagem"])) {
    echo $_SESSION["mensagem"];
    $_SESSION["mensagem"] = null;
  }
} ?>

<form action="./funcoes/fazerLogin.php" method="POST">
  <p>emaill
    <input name="email" type="text">
  </p>
  <p>senha
    <input name="senha" type="password">
  </p>
  <button type="submit">Enviar</button>
</form>