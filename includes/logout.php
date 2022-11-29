<?php
    session_start();
    ?>
<?php
unset($_SESSION['logged_in']);
unset($_SESSION['name']);
unset($_SESSION['address']);
unset($_SESSION['user_email']);
unset($_SESSION['user_id']);
unset($_SESSION['number']);
unset($_SESSION['department']);
unset($_SESSION['sch_set']);
session_destroy();

header ('location: ../index.php')

?>