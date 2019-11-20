<!DOCTYPE html>
<html>
    <head>
        <meta
        name="google-signin-client_id"
        content="856185366006-bbrto3am0gcfgd0qgrsodl6scame43ma.apps.googleusercontent.com"
        />
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <body>
        <h1>This is the profile page</h1>
        <?php
        echo "profile.php";
        print_r($user);
        ?>
        <a href="#" onclick="signOut();">Sign out</a>

        <div class="g-signin2" type="hidden"></div>
        <script src="./public/js/OAuth.js"></script>
    </body>
</html>


