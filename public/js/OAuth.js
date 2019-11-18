/** GMAIL OAuth 
 * <!-- 
        ClientID : 856185366006-bbrto3am0gcfgd0qgrsodl6scame43ma.apps.googleusercontent.com
        ClientSecret : uhSGdLJwOM0fJtsP_oF9R_6V
      -->
 * 
 * 
*/

function onSignIn(googleUser) {
  //get profile info

  var profile = googleUser.getBasicProfile();

  //get user token
  // var id_token = googleUser.getAuthResponse().id_token;

  //get user data
  var profileData = {
    // access_token: id_token,
    google_id: profile.getId(),
    username: profile.getGivenName(),
    password: "googleconnexion",
    image_url: profile.getImageUrl(),
    email: profile.getEmail(),
    socialM: "gmail",
    action: "loginUser"
  };
  console.log(profileData);
  //trigger ajax on successful sign-in
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php");
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log("Signed in as: " + xhr.responseText);
      //window.location.href = "index.php?action=viewProfile&userId=";
    }
  };

  xhr.send(JSON.stringify(profileData));

  //on google auth failure
  // function onFailure(error) {
  //   //change to throw exception later
  //   console.log(error);
  // }

  //when token is verified, how do we know successful?
  // xhr.send("idtoken=" + id_token);
  //Once token verified, check if user is in db and create session
  //Else if not in db, create user in the db and then create session
}

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function() {
    console.log("User signed out.");
  });
}

/**
 * FACEBOOK LOGIN API
 */

function statusChangeCallback(response) {
  // Called with the results from FB.getLoginStatus().
  if (response.status === "connected") {
    // Logged into your webpage and Facebook.
    testAPI();
  } else {
    // Not logged into your webpage or we are unable to tell.
    document.getElementById("status").innerHTML =
      "Please log " + "into this webpage.";
  }
}

function checkLoginState() {
  // Called when a person is finished with the Login Button.
  FB.getLoginStatus(function(response) {
    // See the onlogin handler
    statusChangeCallback(response);
  });
}

window.fbAsyncInit = function() {
  FB.init({
    appId: "2798143063608176",
    cookie: true, // Enable cookies to allow the server to access the session.
    xfbml: true, // Parse social plugins on this webpage.
    version: "v5.0" // Use this Graph API version for this call.
  });

  FB.getLoginStatus(function(response) {
    // Called after the JS SDK has been initialized.
    statusChangeCallback(response); // Returns the login status.
  });
};

// (function(d, s, id) {
//   // Load the SDK asynchronously
//   var js,
//     fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s);
//   js.id = id;
//   js.src = "https://connect.facebook.net/en_US/sdk.js";
//   fjs.parentNode.insertBefore(js, fjs);
// })(document, "script", "facebook-jssdk");

function testAPI() {
  FB.api("/me", { fields: "email, name" }, function(response) {
    document.getElementById("status").innerHTML =
      "Thanks for logging in, " +
      response.name +
      "!" +
      "Your email address is " +
      response.email;

    FBdata = {
      username: response.name,
      email: response.email,
      socialM: "FB"
    };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?action=loginUser"); //trying to globalize the action between FB and GMAIL
    xhr.onreadystatechange = function() {
      //폴백

      if (xhr.readyState == 4 && xhr.status == 200) {
        //todo
        console.log(xhr.responseText);
        window.location.href = "index.php?action=viewProfile&userId=";
      }
    };
    xhr.send(JSON.stringify(FBdata));
  });
}
