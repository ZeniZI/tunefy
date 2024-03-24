<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunefy</title>
    <link rel="icon" href="../asset/logo1.png">
    <link rel="stylesheet" href="/css/history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="../js/scripthistory.js" defer></script>
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
    background: none:
}

.logout-button:hover {
    background-color: #D63061;
}

  </style>
</head>
<body>
    <section id="dashboard">
        <div class="dashboard">
            <div class="sidebar">
                <img src="../asset/logo.png" alt="Tunefy Logo">
                <a  href="/home">Home</a>
                <a href="/form-request">Form Request</a>
            <a href="/shoppingcart">Shopping Cart</a>
            <a class="active" href="/history">History</a>
            <form id="logout-form" method="POST" action='logout'>
    @csrf
    <button type="submit" class="logout-button">Log out</button>
</form>
            </div>
            <div class="header">
                <h5>History of Transaction</h5>
                <!--
                <div class="searchbar">
                    <input type="text" id="search" name="search" placeholder="Search...">
                    <i class="fas fa-magnifying-glass"></i>
                </div> -->
            </div>
            <div class="history">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'Semua')">Semua Request</button>
                    <button class="tablinks" onclick="openCity(event, 'BelumBayar')">Request</button>
                    <button class="tablinks" onclick="openCity(event, 'Proses')">Proses Request</button>
                    <button class="tablinks" onclick="openCity(event, 'demo')">Demo </button>
                    <button class="tablinks" onclick="openCity(event, 'Selesai')">Request Selesai</button>
                    <button class="tablinks" onclick="openCity(event, 'Dibatalkan')">Ditolak</button>
                    <button class="tablinks" onclick="openCity(event, 'Ready')">Music Order</button>
                </div>
                <div id="Semua" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_history as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                        <h1>{{ $requesting->genre }}</h1>
                                            <h3>{{ $requesting->instrument }}</h3>
                                            <h3>{{ $requesting->bpm }}</h3>
                                        </div>
                                        <div>
                                            <h2>{{ $requesting->proccess }}</h2>
                                            <h4>Harga : Rp {{ $requesting->price }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="display:none;" id="BelumBayar" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_history->where('proccess', 'request') as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                        <h1>{{ $requesting->genre }}</h1>
                                            <h3>{{ $requesting->instrument }}</h3>
                                            <h3>{{ $requesting->bpm }}</h3>
                                        </div>
                                        <div>
                                            <h2>BelumBayar</h2>
                                            <h4>DP : Rp {{ $requesting->price }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="display:none;" id="Proses" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_history->where('proccess', 'processing') as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                            <h1>{{ $requesting->genre }}</h1>
                                            <h3>{{ $requesting->instrument }}</h3>
                                            <h3>{{ $requesting->bpm }}</h3>
                                        </div>
                                        <div>
                                            <h2>{{ $requesting->proccess }}</h2>
                                            <h4>Pembayaran Akhir :{{ $requesting->price }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="display:none;" id="demo" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_history->where('proccess', 'demo') as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                            <h1>{{ $requesting->genre }}</h1>
                                            <h3>{{ $requesting->instrument }}</h3>
                                            <h3>{{ $requesting->bpm }}</h3>
                                        </div>
                                        <div>
                                            <h2>{{ $requesting->proccess }}</h2>
                                            <a href="{{$requesting->link}}"><button><h2>link download demo</h2></button></a>
                                            <a href="/shoppingcart"><button><h2>Bayar</h2></button></a>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="display:none;" id="Selesai" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_history->where('proccess', 'done') as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                            <h1>{{ $requesting->genre }}</h1>
                                            <h3>{{ $requesting->instrument }}</h3>
                                            <h3>{{ $requesting->bpm }}</h3>
                                        </div>
                                        <div>
                                            <h2>{{ $requesting->proccess }}</h2>
                                            <a href="{{$requesting->link}}"><button><h2>download</h2></button></a>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="display:none;" id="Dibatalkan" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_history->where('proccess', 'tolak') as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                            <h1>{{ $requesting->genre }}</h1>
                                            <h3>{{ $requesting->instrument }}</h3>
                                            <h3>{{ $requesting->bpm }}</h3>
                                        </div>
                                        <div>
                                            <h2>Dibatalkan</h2>
                                            <h4>{{ $requesting->id }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="display:none;" id="Ready" class="tabcontent">
                    <table>
                        <tbody>
                            @foreach($user_buy->where('proccess', 'ordered') as $requesting)
                            <tr>
                                <div class="item">
                                    <div class="image">
                                        <img src="../asset/pianoitem.png" alt="" class="img" draggable="false">
                                    </div>
                                    <div class="item-info">
                                        <div>
                                            <h1>{{ $requesting->title }}</h1>
                                            <h3>waktu :{{ $requesting->time }}</h3>
                                            <h3>{{ $requesting->genre }}</h3>
                                        </div>
                                        <div>
                                            <h3>Harga</h3>
                                            <h3>Rp : {{$requesting->price}}</h3>
                                        </div>
                                        <div>
                                            <h2>Sedang diproses ,Lagu akan Dikirim Melalui Email Anda</h2>
                                            <h3>hubungi tunefyproduction@gmail.com jika ada kendala</h3>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
