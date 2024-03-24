<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tunefy</title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="icon" href="../asset/logo1.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
  <section id="dashboard">
    <div class="dashboard">
        <div class="sidebar">
            <img src="../asset/logo.png"> 
            <a class="active" href="/home">Home</a>
            <a href="/form-request">Form Request</a>
            <a href="/shoppingcart">Shopping Cart</a>
            <a href="/history">History</a>
<form id="logout-form" method="POST" action='logout'>
    @csrf
    <button type="submit" class="logout-button">Log out</button>
</form>


        </div>
        <div class="Home">
            <div class="feature">
              
            <img src="../asset/banner.png" alt="">
          </div>
          <h2>Genre : General</h2>
        <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <div class="carousel">
        <div class="container">
          <a href="/genre?type=hiphop"><img src="../asset/hiphop.png" alt="" class="image">
          <div class="overlay">
            <div class="text">HIP HOP</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=rap"><img src="../asset/rap.png" alt="" draggable="false">
          <div class="overlay">
            <div class="text">RAP</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=lofi"><img src="../asset/lofi.png" alt="" class="image">
          <div class="overlay">
            <div class="text">LO-FI</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=piano"><img src="../asset/piano.png" alt="" draggable="false">
          <div class="overlay">
            <div class="text">PIANO</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=orchestra"><img src="../asset/orchestra.png" alt="" draggable="false">
          <div class="overlay">
            <div class="text">ORCHESTRA</div>
          </div>
        </div></a>
      </div>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    <h2>Genre : EDM</h2>
        <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <div class="carousel">
        <div class="container">
          <a href="/genre?type=electrohouse"><img src="../asset/edm1.png" alt="" class="image">
          <div class="overlay">
            <div class="text">House Family : <br>Electro House</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=tropicalhouse"><img src="../asset/edm2.png" alt="" class="image">
          <div class="overlay">
            <div class="text">House Family : <br>Tropical House</div>
          </div>
        </div></a>
        <div class="container">
          <a href="futurebass"><img src="../asset/edm3.png" alt="" draggable="false">
          <div class="overlay">
            <div class="text">Hip hop Family : <br>Future Bass</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=trap"><img src="../asset/edm4.png" alt="" class="image">
          <div class="overlay">
            <div class="text">Hip hop Family : <br>Trap</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=melodicdubstep"><img src="../asset/edm5.png" alt="" draggable="false">
          <div class="overlay">
            <div class="text">Dubstep Family : <br>Melodic Dubstep</div>
          </div>
        </div></a>
        <div class="container">
          <a href="/genre?type=dnb"><img src="../asset/edm6.png" alt="" draggable="false">
          <div class="overlay">
            <div class="text">Dubstep Family : <br>DnB</div>
          </div>
        </div></a>
      </div>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

          </div> 
        </div>
    </div>
    
</body>
</html>