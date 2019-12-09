<!DOCTYPE html>
<?php $session_userId = (isset($_SESSION['userId']))?$_SESSION['userId']:'';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
            name="google-signin-client_id"
            content="856185366006-bbrto3am0gcfgd0qgrsodl6scame43ma.apps.googleusercontent.com"
            />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Wireframe</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" href="./view/profile.css">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</head>

<body>

<div class="header-container">

<div class="header">
        <form align="right" name="logout" method="post" action="index.php?action=logoutUser" style="black">
            <label class="logoutLblPos">
            <input name="submit2" type="submit" id="submit2" value="logout">
            </label>
        </form>
        <h1><?=$user['username']?></h1>
</div> <!--header closed-->

</div>

<div id="profileDiv">
    
                <img src='<?=$user['imageurl']?> 'alt="profile image" id="profile-image"/>
                <div id="image-form-container">
                <form name="imgForm"method="POST" action="index.php?action=uploadImg" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                    <label for="my-file" class="input-file-trigger">Edit Profile</label>
                    <input type="file" name="profileImg" class="input-file" id="my-file" onchange="submitFile()"/><br />
                    <!-- <input type='submit' name='submitBtn' value="SUBMIT" /> -->
                </form>
                </div>
            </div>


<div id="content">

<div class="lists">
<div class="list">
<?php
    //String Interpolation......later???(I couldn't find how to use it.)
    $noMovies = count($dataMovie);
    for($id=0; $id<$noMovies; $id++){
        echo '<div id="'.$id.'" class="cards">
        <input type="button" class="delete" name="delete" id="delete" value="X" disabled="true" />
                <span><h1>'.$dataMovie[$id]["title"].'</h1></span>
                <img src="'.$dataMovie[$id]["poster"].'" />
                <br /><br />
                <div id="info'.$id.'" class="children-container">
                    <p>Director: '.$dataMovie[$id]["director"].' <br>
                    Actors: '.$dataMovie[$id]["actors"].'
                    </p>
                    </div>
                <span class="hand-logo" id="handOpen"><i class="far fa-hand-paper"></i></span>
                <span class="hand-logo" id="handClosed"><i class="far fa-hand-rock"></i></span>
            </div>';
    }
?>

       
<div id="cardPlus" class="input-card" draggable="false">
  
        <h1>Add a Movie</h1>
        <input type="text" name="title" id="title" class="input-box"/>
        <input type="submit" value="search" id="search" onclick="fetchData(<?=$user['id']?>)" />
    <div class="button-container">
        <input class="button" id="edit" type="button" value="Edit" name="edit" />
        <input class="button" id="save" type="button" value="Save" />
    </div>
</div>

        </div>
        <div id="autocomplete"></div>
       
        <script src="./public/js/ranking.js"></script>
        <script type="text/javascript">var userId = '<?php echo $session_userId; ?>';</script>
        <script src="./public/js/movieDB.js"></script>
        <script src="./public/js/drag_and_drop.js"></script>
        <script src="./public/js/autocomplete.js"></script>
    </body>

    <script>
        function submitFile(){
            if(document.imgForm.profileImg.value !=""){
                document.imgForm.action = "index.php?action=uploadImg";
                document.imgForm.submit();
            }
        }
    </script>
</html>


            