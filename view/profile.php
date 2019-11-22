<!DOCTYPE html>
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

    <link rel="stylesheet" href="../styles/style.css">
</head>
<style>
#content {
    display: flex;
    flex-direction: column;
    width: 90%;
    margin: auto;
}


.cards {
    display: flex;
    margin: auto;
    width: 30%;
    justify-content: center;
    padding: 2%;
    border: 1px solid powderblue;
    margin-top: 2%;
}

.movieInfo {
    padding: 5%;
}




body{
    font-family: Arial;
    margin: 0;
}

/*This is the header, I think? */
.header {
    padding: 50px;
    text-align: center;
    background-color: black;
    color: white;
    font-size: 25px;
    width: 90%; 
    margin:  0;
    padding: 30px 5%;
}

/*This is the page content, I think? */
.content {
    padding:22px;
    text-align: center;
    background-color: grey;
    min-height: 100vh;
}

#cardPlus button {
    padding: 10%;
    font-size: 1.5em;
}

</style>
<body>



<div class="header">
    <form align="right" name="logout" method="post" action="log_out.php" style="black">
        <label class="logoutLblPos">
            <input name="submit2" type="submit" id="submit2" value="logout">
        </label>
    </form>
    <h1><?=$user['username']?></h1>
</div>
<a href="#" onclick="signOut();">Sign out</a>
        <div class="g-signin2" type="hidden"></div>
        <script src="./public/js/OAuth.js"></script>

<?php
        $noMovies = count($dataMovie);
        $divCard='<div id="card';//[ex]'<div id="card
        $classCard='class="cards">';//[ex]'<div id="card0" class="cards">
        $divPoster=' <div id="poster';
        $classPoster='class="posters">';
        $tagImg = ' <img src="';
        $divInfo='<div id="info';
        $classInfo='class="movieInfo">';
        $tagTitle='<h3>Title: ';
        $tagDirector='<h3>Director: ';
        $tagActors='<h3>Actors: ';
            for($id=0; $id<$noMovies; $id++){
                echo
                $divCard.$id.'"'.$classCard.$divPoster.$id.'"'.$classPoster.$tagImg.$dataMovie[$id]['poster'].'"></div>'.$divInfo.$id.'"'.$classInfo.$tagTitle.$dataMovie[$id]['title'].'</h3>'.$tagDirector.$dataMovie[$id]['director'].'</h3>'.$tagActors.$dataMovie[$id]['actors'].'</h3></div></div>';
            }
?>
  <div id="cardPlus" class="cards">
         <button type="button" >Add Movie</button>
    </div>

<input type="text" name="title" id="title" />
<input type="submit" name="submit" value="search" onclick="fetchData('<?=$user['id']?>' )" />
<script>
        function deleteChild(parentElt) {
            //e.firstElementChild can be used.
            var child = parentElt.lastElementChild;
            while (child) {
                parentElt.removeChild(child);
                child = parentElt.lastElementChild;
            }
        }
</script>   
<script src="./public/js/movieDB.js"></script>
    </body>
</html>


            