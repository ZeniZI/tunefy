<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tunefy</title>
  <link rel="stylesheet" type="text/css" href="../css/request.css">
  <link rel="icon" href="../asset/logo1.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <style>
    .logout-button {
    background-color: #FF317B;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    display: block;
    margin: 0 auto; 
}

.logout-button:hover {
    background-color: #D63061;
}

  </style>
</head>
<body>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

  <section id="dashboard">
    <div class="dashboard">
        <div class="sidebar">
            <img src="../asset/logo.png"> 
            <a  href="/dashboard">Home</a>
            <a class="active" href="/form-request">Form Request</a>
            <a href="/shoppingcart">Shopping Cart</a>
            <a href="/history">History</a>
            <form id="logout-form" method="POST" action='logout'>
    @csrf
    <button type="submit" class="logout-button">Log out</button>
</form>
        </div>
        <div class="header">
          <h2>FORM REQUEST</h2>
        </div>
        <form method="POST" action='add' enctype="multipart/form-data">
            @csrf
        <div class="container">
          <div class="entry">
            <input id="bpm"  name="bpm" type="number"  min="60" max="261" oninput="this.reportValidity()" required>
            <div  class="labelline">BPM*</div>
          </div>
          <div class="entry">
          <select id="instrument"  name="genre" required>
              <option value=""disabled selected hidden></option>
              <option value="HIP HOP">HIP HOP</option>
              <option value="Rap">Rap</option>
              <option value="Lo-fi">Lo-fi</option>
              <option value="Piano">Piano</option>
              <option value="Orchestr">orchestra</option>
              <option value="Electro House">Electro House</option>
              <option value="Tropical House">Tropical House</option>
              <option value="Future Bass">Future Bass</option>
              <option value="Trap">Trap</option>
              <option value="Melodic Dubstep">Melodic Dubstep</option>
              <option value="DnB">DnB</option>
            </select>
            <div class="labelline">Genre</div>
          </div>
          <div class="entry">
            <select id="instrument"  name="instrument" >
              <option value=""disabled selected hidden></option>
              <option value="bebas">Bebas</option>
              <option value="piano">piano</option>
              <option value="tumper">trumpet</option>
              <option value="cello">cello</option>
              <option value="violin">violin</option>
              <option value="saxophone">saxophone</option>
              <option value="flute">flute</option>
              <option value="kalinba">kalimba</option>
              <option value="gamelan">gamelan</option>
              <option value="anklung">angklung</option>
              <option value="synthesizer">synthesizer</option>
            </select>
            <div class="labelline">Main Instrument</div>
          </div>
          <div class="entry">
            <input id="chord" name="chord" type="text">
            <div class="labelline">Chord</div>
          </div>
          <div class="entry">
                      <input type="file" name="audio" accept="audio/*" id="upload"  onchange="displayFileName()" >
            <label for="upload" id="fileLabel">Your Audio </label>
            
          </div>
          <div class="entry">
            <select id="instrument"  name="price" required>
              <option value=""disabled selected hidden></option>
              <option value="30.000">1 week DP: (30.000) total: (200.000)</option>
              <option value="20.000">2 week DP: (20.000) total: (175.000)</option>
              <option value="10.000">3 week DP: (10.000) total: (150.000)</option>
            </select>
            <div class="labelline">Harga</div>
          </div>
          <div class="entry">
            <textarea id="notes"  name="notes" required="false"></textarea>
            <div class="labelline">Notes</div>
          </div>
          
        </div>
        
        <div class="agreement">
          <label for="agreeCheckbox">I agree to the terms and conditions</label>
          <input type="checkbox" id="agreeCheckbox" required>
        </div>
        <div class="submit-row">
          <button class="button" type="submit">Submit</button>
        </div>
    </div>
    </form>
  </section>
  <script>
        function displayFileName() {
            const fileInput = document.getElementById('upload');
            const fileName = document.getElementById('fileLabel');
            fileName.textContent = fileInput.files[0].name;
            fileInput.classList.add('uploaded');


        }
        
    </script>
</body>
</html>
