<link rel="stylesheet" href="./css/global.css" />
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>

<div class="sidebar">
    <div class="logo">
        <img src="./asset/logo.svg" alt="" />
    </div>
    @if(Auth::id())
    <?php
    $usertype = Auth()->user()->usertype;

    if($usertype == 'client') {
        ?>
        <div class="menu">
            <a href="/dashboard">Home</a>
            <a href="/form-request" class="a-order">Form Request</a>
            <a href="/shoppingcart">Shopping Cart</a>
            <a href="/history" class="a-order">History</a>
        </div>
        <?php
    }
     elseif($usertype == 'admin') {
        ?>
        <div class="menu">
            <a href="/dashboard">Dashboard</a>
            <a href="/orders" class="a-order">Orders</a>
            <a href="/music-list">MUsic List</a>
        </div>
        <?php
    } 
        
    ?>
@endif

</div>

<div class="page"></div>

<script src="./js/global.js"></script>
