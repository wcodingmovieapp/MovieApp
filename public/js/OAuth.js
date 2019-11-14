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
  console.log("ID: " + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log("Name: " + profile.getName());
  console.log("Image URL: " + profile.getImageUrl());
  console.log("Email: " + profile.getEmail()); // This is null if the 'email' scope is not present.

  //get user token
  var id_token = googleUser.getAuthResponse().id_token;
  //send ID token to server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "https://yourbackend.example.com/tokensignin");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    console.log("Signed in as: " + xhr.responseText);
  };
  xhr.send("idtoken=" + id_token);
}
function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function() {
    console.log("User signed out.");
  });
}
