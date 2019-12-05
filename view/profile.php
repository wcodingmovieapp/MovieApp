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
</head>

<body>


<header>

        <div class="header">
                <!--Log out-->
                <form align="right" name="logout" method="post" action="index.php?action=logoutUser" style="black">
                    <label class="logoutLblPos">
                    <input name="submit2" type="submit" id="submit2" value="logout">
                    </label>
                </form>

                <!--Profile image update-->
                <form id="uploadImgForm" action="index.php?action=uploadProfileImg" method="POST" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="profileImg" id="profileImg"/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                    <input type="submit" value="Upload image" name="uploadBtn" value="SAVE"/>
                </form>


                <div class="user-profile">
                
                
                <img src="./public/img/default.jpg"></div>
                <h1><?=$user['username']?></h1>
                <!-- <p>at button James404NotFound</p> -->
        </div> <!--header closed-->
</header>



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
                        </div>';
                }
            ?>
            
       
                <div id="cardPlus" class="input-card" draggable="false">
                        <br><br><br><br><!--vertical align: middle... was not working-->
                        <h1>+</h1>
                        <h1>ADD</h1>
                        <input type="text" name="title" id="title"/>
                        <input type="submit" value="search" onclick="fetchData(<?=$user['id']?>)" />
            </div>
        <div class="button-container">
				<input class="button" id="edit" type="button" value="Edit" name="edit" />
				<input class="button" id="save" type="button" value="Save" />
	    </div>


        </div>
        
        <script type="text/javascript">var userId = '<?php echo $session_userId; ?>';</script>
        <script src="./public/js/movieDB.js"></script>
        <script src="./public/js/drag_and_drop.js"></script>
        <script src="./public/js/ranking.js"></script>
    </body>
</html>


            