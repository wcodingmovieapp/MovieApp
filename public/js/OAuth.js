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
