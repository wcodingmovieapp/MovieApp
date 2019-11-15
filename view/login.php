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
          <!-- Note to Nanee: Delete below test form when pull Steve's code here -->
          <form name="myForm" id="myForm" method="POST" action="./index.php?action=profile">
            <label>Username: <input name="username" id="username" type="text"/></label><br></br>
            <label>Password: <input name="password" id="password" type="password"/></label><br></br>
            <button name="submit" id="submit" type="submit">Login</button>
          </form>
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
    </section>
    <script src="./public/js/OAuth.js"></script>
  </body>
</html>
