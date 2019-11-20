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
    </section>
    <section id='input'>
    <input type="text" id="title" name="title" onkeypress="if(event.keyCode==13){searchMovie(); return false;}" />

    </section>
    <script src="./public/js/OAuth.js"></script>
    <script src="./public/js/movieDB.js"></script>
  </body>
</html>
