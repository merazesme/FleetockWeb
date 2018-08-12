<?php
  session_start();
  if (isset($_SESSION['idUsuario']))
  { session_destroy();
    echo "<script type='text/javascript'>window.location.href = '../login.php';</script>"; 
  }
?>
