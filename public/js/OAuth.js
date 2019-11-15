/** GMAIL OAuth 
 * <!-- 
        ClientID : 856185366006-bbrto3am0gcfgd0qgrsodl6scame43ma.apps.googleusercontent.com
        ClientSecret : uhSGdLJwOM0fJtsP_oF9R_6V
        Save the credentials and download from google project library!
      -->
 * 
 * 
*/
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log("Name: " + profile.getName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail()); // This is null if the 'email' scope is not present.
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


function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
  if (response.status === 'connected') {   // Logged into your webpage and Facebook.
    testAPI();  
  } else {                                 // Not logged into your webpage or we are unable to tell.
    document.getElementById('status').innerHTML = 'Please log ' +
      'into this webpage.';
  }
}


function checkLoginState() {               // Called when a person is finished with the Login Button.
  FB.getLoginStatus(function(response) {   // See the onlogin handler
    statusChangeCallback(response);
  });
}


window.fbAsyncInit = function() {
  FB.init({
    appId      : '2058147720954256',
    cookie     : true,                     // Enable cookies to allow the server to access the session.
    xfbml      : true,                     // Parse social plugins on this webpage.
    version    : 'v5.0'           // Use this Graph API version for this call.
  });


  FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
    statusChangeCallback(response);        // Returns the login status.
  });
};


(function(d, s, id) {                      // Load the SDK asynchronously
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function testAPI() {            

  FB.api('/me', {fields: 'email, name'}, function(response) {
    document.getElementById('status').innerHTML =
      'Thanks for logging in, ' + response.name + '!' + 'Your email address is ' + response.email;
    
    FBdata = {
      "name": response.name,
      "email": response.email,
      "socialM" : "FB",
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?action=loginUser');//trying to globalize the action between FB and GMAIL
    xhr.onreadystatechange = function() { //폴백

			if (xhr.readyState == 4 && xhr.status == 200) {
        //todo
        console.log(xhr.responseText);
          window.location.href= "index.php?action=viewProfile&userId=";
			}
    }
    xhr.send(JSON.stringify(FBdata));



  });
}
