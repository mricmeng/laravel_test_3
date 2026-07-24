</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocoscient</title>
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>Hello Admine name:{{Auth::user()->name}}</h1>
    <div class="bar1">
        <div class="logo-box">
            <a href="">
                <img src="img/logo.jpg" alt="">
            </a>
            <div class="search-box">
                <input type="text" name="" id="" placeholder="Search our shop">
                <div class="btn-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-bar">
        <div class="menu">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-laptop"></i>
                        <span>Laptop</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-desktop"></i>
                        <span>Destop</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-tv"></i>
                        <span>Monitor</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-keyboard"></i>
                        <span>Accessory</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-phone"></i>
                        <span>098 47 46 93</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>CART</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="title-box">
            special products
        </div>
        <div class="item-container">
            <div class="item-box">
                <div class="img-box">
                    <img src="img/1.webp" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/5.jpeg" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/mac air.png" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/mac M1.jpeg" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/mac M1.jpeg" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/mac air.png" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/m4.jpeg" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
            <div class="item-box">
                <div class="img-box">
                    <img src="img/mac M1.jpeg" alt="">
                    <!-- <div class="cover">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div> -->
                </div>
                <div class="txt-box">
                    <h1>MacBook M1</h1>
                    <p>
                        -CPU 1700 <br>
                        -Ram 8g <br>
                        -M1
                    </p>
                    <div class="btn-box">
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            <span>Add Cart</span>
                        </div>
                        <div class="btn btn-fb">
                            <i class="fa-brands fa-square-facebook"></i>
                            <span>Share</span>
                        </div>
                        <div class="btn btn-link">
                            <i class="fa-solid fa-link"></i>
                            <span>Copy</span>
                        </div>
                    </div>
                    <h2 class="price">
                        $999
                    </h2>
                </div>
            </div>
        </div>
    </div>
</body>

</html>