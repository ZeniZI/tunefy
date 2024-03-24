<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunefy</title>
    <link rel="icon" href="../asset/logo1.png">
    <link rel="stylesheet" href="../css/cart.css">
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
            <a href="/form-request">form Request</a>
            <a class="active" href="/shoppingcart">Shopping Cart</a>
            <a href="/history">history</a>
            <form id="logout-form" method="POST" action='logout'>
    @csrf
    <button type="submit" class="logout-button">Log out</button>
</form>
        </div>
        <div class="header">
            <h5>Shopping Cart</h5>
        </div>
        <table>
            <thead>
            <tr>
                <th class="wider-column">Products</th>
                <th>Details</th>
                <th>Harga</th>
               <th class="action-column">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($user_cart_request as $request)
                <div class="table-rows">
                    <tr>
                        <td class="wider-column">
<img src="../asset/pianoitem.png" alt="" class="image">
                            <div class="product-info">
                                <h1>{{$request->genre}}</h1>
                                <h2>BPM : {{$request->bpm}}</h2>
                            </div>
                        </td>
                        <td>
                            <h2>Chord : {{$request->chord}}</h2>
                            <h2>Instrument : {{$request->instrument}}</h2>
                    </td>
                        <td>Harga RP {{$request->price}}</td>
                        <td class="action-column">
                        <form action='historydelete' method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="item_id" value="{{ $request->id }}">
                            <button class="btn success">Hapus</button>
</form>
                            <form action="/receipt" method="POST">
                            @csrf
                            <input type="hidden" name="item_id" value="{{   $request->id }}">
                            <button class="btn success">Bayar</button>
                        </form>
                        </td>
                    </tr>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
</body>
</html>