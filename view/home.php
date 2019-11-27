<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to High5ive</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- <link href="../public/css/style.css" rel="stylesheet"> -->

    
<style>
    body {
        background: #fff;
        color: #444;
        font-family: "Open Sans", sans-serif;
    }

    a {
        color: #1bb1dc;
        transition: 0.5s;
    }

    a:hover,
    a:active,
    a:focus {
        color: #0a98c0;
        outline: none;
        text-decoration: none;
    }

    p {
        padding: 0;
        margin: 0 0 30px 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        margin: 0 0 20px 0;
        padding: 0;
    }

    /**
        # Header
    */

    #header{
        height: 110px;
        transition: all 0.5s;
        z-index: 997;
        transition: all 0.5s;
        padding: 20px 0;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        transition: all 0.5s;
        z-index: 997; 
    }

    #header .logo img {
        padding: 0;
        margin: 7px 0;
        max-height: 26px;
    }

    .main-pages {
        margin-top: 60px;
    }

    #intro {
        width: 100%;
        height: 100vh;
        position: relative;
        background: #f5f8fd url("../img/intro-bg.jpg") center top no-repeat;
        background-size: cover;
    }






    
</style>
</head>
<body>
    <header id="header">
        <div class="logo">
            <a href="#intro" class="scrollto"><img id="logoImg" src="../public/img/high5ive.png"></a>
        </div>

        <nav>
            <ul>
                <li class="active"><a href="#intro">HOME</a></li>
                <li><a href="about">ABOUT</a></li>
                <li><a href="team">TEAM</a></li>
                <li><a href="signUp">SIGN UP</a></li>
                <li><a href="signIn">SIGN IN</a></li>
                <li><a href="footer">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <section id="intro" class="#">
        <div class="container">
            <div class="">

            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="">
                    <img src="../public/img/serviceIntro.png" alt=""> 
                </div>
            </div>
            <h2>About High5ive</h2>
            <h3>
                <p>Welcome to High5ive, the lit list app where you rank your top five movies, books, & more! </p>
                <p>Pick your five faves, share them with your friends, & show the world your excellent taste!</p>
            </h3>      
        </div>
    </section><!--#about-->

    <section id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="#">
                    <h3 class="cta-title">Call To Action</h3>
                    <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="cta-btn-container">
                    <a class="cta-btn" href="#">SIGN UP</a>
                </div>
            </div>
        </div>
    </section><!--#call to action-->

    <!--TEAM section-->
    <section id="features">
        <div class="container">
            <div class="section-header">
                <h3>Team</h3>
                <p>High5ive was brought to life by five cool coders in Seoul, South Korea.</p>
                <p>We are movie mavens, book barons, web workers, budding billionaires & magnificently modest.</p>
            </div>

            <div class="row">
                <div class="fadeInUp">
                    <div class="member">
                        <img src="../public/img/default.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Charlie</h4>
                                <span>dummy text</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fadeInUp">
                    <div class="member">
                        <img src="../public/img/default.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>James</h4>
                                <span>dummy text</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fadeInUp">
                    <div class="member">
                        <img src="../public/img/default.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Jee-Soo</h4>
                                <span>dummy text</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fadeInUp">
                    <div class="member">
                        <img src="../public/img/default.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Lindsey</h4>
                                <span>dummy text</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fadeInUp">
                    <div class="member">
                        <img src="../public/img/default.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Steve</h4>
                                <span>dummy text</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!--#TEAM-->

    <!--FOOTER section-->
    <footer>
        <p>copyright etc..........? contact?</p>
    </footer>

    
</body>
</html>