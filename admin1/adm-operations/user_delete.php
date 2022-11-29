<?php

    include ('../../includes/db-conn.php');
    session_start();


    if (isset($_SESSION['adm_logged_in'])){
       
    }
    else{
        header ("location: ../index.php");
        exit;
    }
    
?>

                                        
                                        
                                        
                                        
                                        
                                        
<?php

        $idd = $_GET['id']; //
     echo $idd;
        
exit();
  

 ?>
