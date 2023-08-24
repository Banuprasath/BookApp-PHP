<!DOCTYPE html>
<html>

<head>
    <title>Book Bazaar - Buy and Sell Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
         body {
            background-color: #f8f9fa;
            background-image: url('back.jpg');
            background-size: cover;
        }

        .jumbotron {
            background-image: url('back.jpg');
            background-size: cover;
            color: white;

            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        .importance-section {
            background-color: white;
            padding: 50px 0;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .carousel-inner {
            background-color: #f8f9fa;

        }

        /* Center Buy and Sell buttons */
        .centered-buttons {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 20px 0;

        }

        #sell {

            text-align: center;
            font-size: 20px;
            padding: 20px;
            border-radius: 10px;


        }

        p {

            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php include("../navbar/navbar.php"); ?>
    <div class="jumbotron text-center">
        <h1>Welcome to Book Bazaar</h1>
        <h5>Discover a wide selection of books for buying and selling!</h5>
    </div>

    <div class="container" id="buy">
        <!-- <h2 class="text-center mb-4">Buy Books</h2> -->
        <!-- Book cards section... -->
    </div>
   <br><br><br>
    <div class="container" id="sell">
        <h2 class="text-center mb-4">Sell Books</h2>
        <p class="text-center">Ready to sell your books? Join Book Bazaar and start listing your books for sale!</p>
        <div class="centered-buttons">
            <a href="/BOOKAPP/index.html" class="btn btn-secondary btn-lg">Start Selling</a>&nbsp;&nbsp;&nbsp;
            <a href="/BOOKAPP/Dashboard/view.php" class="btn btn-primary btn-lg">Buy Books</a>
        </div>
    </div>

    <!-- <div class="container mt-5">
        <h2 class="text-center mb-4">Famous Quotes About Books</h2>
        <div id="quoteCarousel" class="carousel slide" data-ride="carousel">
        Carousel items...

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="card text-center">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>"A room without books is like a body without a soul."</p>
                        <footer class="blockquote-footer">Cicero</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="card text-center">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>"The more that you read, the more things you will know. The more that you learn, the
                            more places you'll go."</p>
                        <footer class="blockquote-footer">Dr. Seuss</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div> -->
    <br>
    <br>
    <br>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p>Email: banuprasath@gmail.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
            <div class="col-md-4">
                <h4>Follow Us</h4>
                <i class="fa fa-github"></i><a href="#" class="text-white" style="margin-right: 10px;"> GitHub</a><br>
                <i class="fa fa-linkedin"></i><a href="#" class="text-white" style="margin-right: 10px;">  Linked In</a><br>
                <i class="fa fa-instagram" aria-hidden="true"></i> <a href="#" class="text-white">Instagram</a>
            </div>
            <div class="col-md-4">
                <h4>Share</h4>
                <a href="#" class="text-white" style="margin-right: 10px;">Share via Email</a><br>
                <a href="#" class="text-white">Share on Social Media</a>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>