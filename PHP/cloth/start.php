<!DOCTYPE html>
<html>
     <style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
} 
</style>
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li style="float:left"><a class="active" href="#about">About</a></li>
  <li style="float:right"><a class="active" href='index.php'>Login</a></li>
  <li style="float:right"><a class="active" href="index.php">Sign up</a></li>
  </ul>                  
    <head>
            <title>My Cloth Sharing</title>
            <link rel="stylesheet" href="home.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:grey;"> 
                    <h2 style="text-align:center; color:pink;">My Cloth Sharing</h2>
                    <div class="container"> 
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                            <div class="item active">
                                    <img src="images/img1.jpg" alt="Los Angeles" style="height:50%;width:100%;">
                            </div>
                            <div class="item">
                                    <img src="images/img.png" alt="Chicago" style="height:85%;width:100%;">
                            </div>
                            <div class="item">
                                    <img src="images/img2.jpg" alt="New york" style="height:20%;width:100%;">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
    </body>
</html>
    