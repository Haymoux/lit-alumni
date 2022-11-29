<?php
    session_start();
    ?>
<?php
unset($_SESSION['adm_logged_in']);
unset($_SESSION['adm_first_name']);
unset($_SESSION['adm_last_name']);
unset($_SESSION['adm_user_email']);
unset($_SESSION['adm_user_id']);
unset($_SESSION['adm_user_role']);
session_destroy();

header ('location: ../index.php')

?>