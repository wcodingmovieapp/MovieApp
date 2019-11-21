<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Wireframe</title>
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

<?php print_r($dataMovie); ?>
<di<div id="content" style="background-color: powderblue;">
    <div id="card0" class="cards" style="background-color:yellow;">
         <div id="poster1" class="posters" style="background-color:green;">
            <img src="<?php echo $dataMovie[0]['poster']?>">
        </div>
        <div id="info1" class="movieInfo" style="background-color: white;">
            <p>Title: <?=$dataMovie[0]['title'];?></p>
            <p>Director: <?=$dataMovie[0]['director'];?></p>
            <p>Actors: <?=$dataMovie[0]['actors'];?></p>
        </div>
    </div>
    <?php
        $noMovies = 3;
        $divCard='<div id="card';//[ex]'<div id="card
        $classCard='class="cards">';//[ex]'<div id="card0" class="cards">
        $divPoster='';
            for($id=0; $id<$noMovies; $id++){
                // echo $divCard.'"'$id.$classCard.
            }
    ?>



        <script src="./public/js/movieDB.js"></script>
    </body>
</html>


