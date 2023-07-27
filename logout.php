<?php 
    // This includes the session_start() to resume the session on this page. It identifies the session that need to be destroyed.
    include_once 'includes/session.php';
?>
<?php
    // session_destroy() destroys the session. Then the header() function redirects to home page.
    session_destroy();
    header("Location: index.php");

?>