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

    <!-- <link rel="stylesheet" href="../styles/style.css"> -->

<style>

    body{
            display: grid;
            background-color: #FF4D49;
            font-family: Lato, sans-serif;
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

.cards{
        position: relative;
        margin: auto;
        margin-top: 50px;
        overflow: hidden;
        width: 520px;
        height: 350px;
        background: #F5F5F5;
        border-radius: 20px 20px;
    }
.posters{
           
        }
 
        h1{
            font-size: 1.2em;
            color: #383839;
            margin-top: 05px;
        }
 
        img{
            width: 180px;
            margin: 40px;
        }
 
        .children-container{
            position: absolute;
            width: 50%;
            height: 100%;
            top: 20%;
            left: 50%;
        }
 
        button{
            font-size: 0.7em;
            background: darken(#E0C9CB);
            padding: 10px;
            display: inline-block;
            outline: 0;
            border: 0;
            margin: -1px;
            border-radius: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
 
            &:hover {
              background: #BA7E7E;
              transition: all .4s ease-in-out;
            }
            
        }
 
        .like{
            width: 22%;
        }
        
        .delete {
            width: 67%;
        }
        
        #cardPlus {
             text-align: center;
             cursor: pointer;
            }
    }
    .button-container {
    display: flex;
    justify-content: center;


    }

    .button {
    width: 100px;
    height: 80px;
    }

    #delete {
    position: absolute;
    right: 20px;
    top: 20px;
    width: 50px;
    height: 50px;
    }

    .lists {
	display: flex;
	justify-content: center;
	flex: 1;
	width: 100%;
	overflow-x: scroll;
	padding-top: 10%;
}

.lists .list {
	display: flex;
	flex-flow: column;
	flex: 1;
	width: 100%;
	min-width: 250px;
	max-width: 600px;
	height: 100%;
	min-height: 150px;
	background-color: rgba(0, 0, 0, 0.1);
	margin: 0 15px;
	padding: 8px;
	transition: all 0.2s linear;

}

.lists .list .list-item {
	background-color: #F3F3F3;
	border-radius: 8px;
	padding: 15px 20px;
	text-align: center;
	margin: 4px 0px;
	height: 140px;
}

.input-card{
    position: relative;
    margin: auto;
    margin-top: 50px;
    overflow: hidden;
    width: 520px;
    height: 350px;
    background: #F5F5F5;
    border-radius: 20px 20px;    
}

</style>
</head>

<body>


        <div class="header">
                <form align="right" name="logout" method="post" action="index.php?action=logoutUser" style="black">
                    <label class="logoutLblPos">
                    <input name="submit2" type="submit" id="submit2" value="logout">
                    </label>
                </form>
                <h1><?=$user['username']?></h1>
                <!-- <p>at button James404NotFound</p> -->
        </div> <!--header closed-->




        <div id="content">
            <div class="lists">
            <div class="list">
            <?php
                //String Interpolation......later???(I couldn't find how to use it.)
                $noMovies = count($dataMovie);
                for($id=0; $id<$noMovies; $id++){
                    echo '<div id="card'.$id.'" class="cards">
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
    </body>
</html>


            