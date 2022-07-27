<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="0;url=pages/index.php">
        <title> </title>
        <script language="javascript">
            window.location.href = "pages/login.php"
        </script>
    </head>
    <body>
        <?php
        session_start();
        session_destroy();
        session_unset();
        ?>

        Go to <a href="pages/login.php">/pages/login.php</a>
    </body>
</html>
