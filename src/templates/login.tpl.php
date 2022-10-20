<?php
    include 'partials/header.tpl.php';
    include 'partials/nav.tpl.php';
?>
LOGIN
  <form action="?url=logaction" method="POST">
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Contraseña">
    <button type="submit">Login</button>
  </form>  
</html>