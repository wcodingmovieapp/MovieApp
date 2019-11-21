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
    
    <style>
    #socialLogin{
      display: "inline";
    }
    </style>
  </head>
  <body>

 
    <section id='signIn'>
        <div id='normalLogin'>
            <!-- Steve -->
          <!-- Note to Nanee: Delete below test form when pull Steve's code here -->
          <?php
           if(isset ($_REQUEST['errors']) AND $_REQUEST['errors'] == true) {
               if($_REQUEST['errors'] == "success") {
                echo "
                <div id='successSubscribe'>
                    <span>Thank you for subscribing. Please log in now </span>
                </div> ";
               } else {
                $errors = (array) json_decode($_REQUEST['errors']);
               }
              
           }
        ?>
          <form name="myForm" id="myForm" method="POST" action="./index.php?action=loginUser">
            <label>Username: <input name="username" id="loginusername" type="text"/></label><br></br>
            <label>Password: <input name="password" id="loginpassword" type="password"/></label><br></br>
            <button name="submit" id="submit" type="submit">Login</button>
          </form>
        </div>

        
        <div id='socialLogin'>
          <div id="facebook">
          <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
          </fb:login-button>

          <div id="status">
          </div>
        </div>
          


          







            <div id="gmail">
                <!-- Nanee -->
                
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <a href="#" onclick="signOut();">Sign out</a>
            </div>
        </div>
    
    </section>

    <section id='signUp'>
        <!-- Charlie -->
        <form  action="index.php?action=subscribeUser" method="POST" id="registration">
            <label for="username">Username: </label><input type="text" id="username" placeholder="Your Username" name="username" autocomplete="off" ><br>
            <span class="tooltip">Username required and must be greater than 5 characters in length.</span>
                <?php
                    if (isset($errors['user_required'])) {
                        echo "User required";
                    } elseif(isset($errors['used'])) {
                        echo "User already used";
                    }
                ?>
            <br>
            <label for="email">Email: </label><input type="text" id="email" placeholder="Your Email" name="email" autocomplete="off" ><br>
            <span class="tooltip">Email required and must be valid email.</span>
                <?php
                    if (isset($errors['email_required'])) {
                        echo "Email required";
                    } elseif(isset($errors['email_invalid'])) {
                        echo "Email invalid";
                    }
                ?>
            <br>
            <label for="password">Password: </label><input type="password" id="password" placeholder="Your Password" name="password" autocomplete="off"><br><br>
            <span class="tooltip">The password is required with 8 charachters (at least one uppercase and one lowercase and digit.</span>
                <?php
                    if (isset($errors['password_required'])) {
                        echo "Password required";
                    } elseif(isset($errors['password_length'])) {
                        echo "Password too short";
                    } elseif(isset($errors["password_character"])) {
                        echo "Password requirements not met - Lowercase, Uppercase, Digit";
                    }
                ?>
            <br>
            <label for="confirm">Confirm Password: </label><input type="password" id="confirm" placeholder="Confirm Password" name="confirm" autocomplete="off"><br>
            <span class="tooltip">The password confirmation has to be the same as the original one.</span>
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
    <script src="./public/js/validation.js"></script>
  </body>
</html>
