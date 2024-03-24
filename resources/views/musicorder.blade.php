
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunefy</title>
    <link rel="stylesheet" href="../css/receipt.css">
    <link rel="icon" href="../asset/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <section id="dashboard">
        <div class="dashboard">
            <div class="sidebar">
                <img src="../asset/logo.png" alt="Tunefy Logo">
                <a class="active" href="#home">Home</a>
                <a href="/form-request">Form Request</a>
                <a href="/shoppingcart">Shopping Cart</a>
                <a href="#review">History</a>
            </div>
            <div class="header">
                <h2></h2>
            </div>
            <div class="receipt">
                <div class="headreceipt">
                    <img src="../asset/logo2.png" alt="" class="logo">
                    <h4>Thank You for Your Purchase!</h4>
                    <h5>Hi Ashifa! We have received your order!</h5>
                </div>
                <h1>Confirmation</h1>
                <table>
                <tbody>
                @foreach($idcard as $item)
                <div class="order-details">
                    <div class="order-info">
                        <h4>Music Id</h4>
                        <h5>{{ $item->id }}</h5>
                    </div>    
                    <div class="order-info">
                        <h4>Title</h4>
                        <h5>{{ $item->title }}</h5>
                    </div>
                    </div>
                </div>
                <div class="summary">
                    <h1>Summary</h1>
                    <div class="order-info">
                        <h4>genre</h4>
                        <h5>{{ $item->genre }}</h5>
                    </div>
                    </div>
                    <div class="order-info">
                        <h4>Time</h4>
                        <h5>{{ $item->time }}</h5>
                    </div>

                    <hr>
                    <div class="total">
                        <h1>Total</h1>
                        <h1>{{ $item->price }}</h1>
                    </div>
                </div>
                </tbody>
                </table>
                @endforeach
            </div>
            <div class="scan">
                @foreach($idcard as $item)
                <h2>PAYMENT</h2>
                <img src="../asset/sqrcode.png" alt="" class="image">
                <div>
                <form method="POST" action="musicorder" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="proccess" value="{{ $item->proccess }}">
                <input type="hidden" name="iditem" value="{{ $item->id }}">
                <input type="hidden" name="price" value="{{ $item->price }}">
                    <input type="file" name="pay" id="upload" onchange="displayFileName()" required>
                    <label for="upload" id="fileLabel">Upload Payment Here</label>
                </div>
                <button class="button" type="submit">submit</button>
                <a href="/home" class="cancel">cancel</a>
                @endforeach
</form>
            </div>
        </div>
    </section>

    <script>
        function displayFileName() {
            const fileInput = document.getElementById('upload');
            const fileName = document.getElementById('fileLabel');
            fileName.textContent = fileInput.files[0].name;
        }
    </script>
</body>
</html>
