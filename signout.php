<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");

=======
<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../signin.php");

>>>>>>> fc641ee (update project)
?>