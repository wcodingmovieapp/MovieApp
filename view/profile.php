<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Wireframe</title>
</head>
<body>

<style>
/*Body stuff, I think? */
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
    width: 90%; //changed from 100%
    margin:  0;
    padding: 30px 5%; //30px padding vertically, 5% horizontally (5% on left and right side)
}

/*This is the page content, I think? */
.content {padding:22px;
         text-align: center;
         background-color: grey;
         min-height: 100vh;
         }

</style>
<?php
 echo "profile.php";
        print_r($user);
        ?>
<div class="header">
<form align="right" name="logout" method="post" action="log_out.php" style="black">
<label class="logoutLblPos">
<input name="submit2" type="submit" id="submit2" value="logout">
</label>
</form>
<h1><?=$user['username']?></h1>
<!-- <p>at button James404NotFound</p> -->
</div>

<div class="content">
<div class="choice" draggable="true"><p> Chungking Express </p></div>
<div class="choice" draggable="true"><p> Chungking Mansions </p></div>
<div class="choice" draggable="true"><p> Mansions Express </p></div>
<div class="choice" draggable="true"><p> Express Mansions </p></div>
<div class="choice" draggable="true"><p> Chungking Chungking </p></div>

</div>


<input type="text" name="title" id="title" />
<input type="submit" name="submit" value="search" onclick="fetchData()" />

<script src="./public/js/movieDB.js"></script>
</body>
</html>
