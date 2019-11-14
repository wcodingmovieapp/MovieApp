<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8" />
    <meta
      name="google-signin-client_id"
      content="856185366006-bbrto3am0gcfgd0qgrsodl6scame43ma.apps.googleusercontent.com"
    />
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <section id='signIn'>
        <div id='normalLogin'>
            <!-- Steve -->
        </div>
        <div id='socialLogin'>
            <div id="fb">
                <!-- Jee-Soo -->
            </div>
            <div id="gmail">
                <!-- Nanee -->
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <!-- <a href="#" onclick="signOut();">Sign out</a> -->
            </div>
        </div>
    
    </section>

    <section id='signUp'>
        <!-- Charlie -->
        <?php
            if (isset($_GET['errors'])) {
            $errors = json_decode($_GET['errors'], true);
            print_r($errors);
        }
        ?>

        <form  action=".php" method="POST" id="registration">
            <label for="user">Username: </label><input type="text" id="user" name="user" autocomplete="off"><br>
                <?php
                    if (isset($errors['user_required'])) {
                        echo "User required";
                    } elseif(isset($errors['used'])) {
                        echo "User already used";
                    }
                ?>
            <br>
            <label for="email">Email: </label><input type="text" id="email" name="email" autocomplete="off"><br>
                <?php
                    if (isset($errors['email_required'])) {
                        echo "Email required";
                    } elseif(isset($errors['email_invalid'])) {
                        echo "Email invalid";
                    }
                ?>
            <br>
            <label for="password">Password: </label><input type="password" id="password" name="password" autocomplete="off" pattern=".{8,12}" required title="8 to 12 characters"><br><br>
            <label for="confirm">Confirm Password: </label><input type="password" id="confirm" name="confirm" autocomplete="off" pattern=".{8,12}"><br>
                <?php
                    if (isset($errors['pwd_not_match'])) {
                        echo "Passwords do not match";
                    }
                ?>
            <br>
            <input type="submit" value="Sign Up!"><br><br>
        </form>
    </section>
    <script src="./public/js/OAuth.js"></script>
  </body>
</html>
