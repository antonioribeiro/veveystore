@extends('templates.686.layout')

@section('main-container')
    @include('partials.menu')



<!-- Header -->

<div class="row">

    <div class="span4">

        <p class="logo">
            <span class="entypo heart"></span> 686 Tees
        </p>

    </div>

    <div class="span4">

        <p class="strapline">
            The finest quality stylish tees<br />
            <span>Made with love here in the UK</span>
        </p>

    </div>

    <div class="span4">

        <div class="row">

            <div class="span2 offset2 mini-basket">

                <p class="mini-basket-title"><a href="basket.html"><span class="entypo cart"></span> Basket</a></p>

                <div class="row">

                    <div class="span1">
                        <p class="mini-basket-summary">
                            Price<br />
                            <span>&pound;0.00</span>
                        </p>
                    </div>

                    <div class="span1">
                        <p class="mini-basket-summary">
                            Items<br />
                            <span>0</span>
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Menu -->

<div class="row">

    <div class="span12">

        <ul class="main-nav clearfix">

            <li class="active"><a href="index.html">New</a></li>
            <li><a href="products-men.html">Men's</a></li>
            <li><a href="products-women.html">Women's</a></li>

        </ul>

    </div>

</div>

<!-- Body -->

<div class="row">

    <div class="span12">

        <h1>New Products</h1>

    </div>

</div>

<!-- Product Listing -->

<div class="row">

    <div class="span4 product-listing">

        <p class="title"><a href="product.html">Ibiza Lips</a></p>

        <a href="product.html"><img class="image" src="templates/686project.com/assets/img/product-1.jpg" alt="Ibiza Lips" /></a>

        <p class="price">
            &pound; 9.99
            <a class="btn btn-addcart btn-primary" href="basket.html"><span class="entypo cart"></span></a><a class="btn btn-view btn-grey" href="product.html"><span class="entypo search"></span></a>
        </p>

    </div>

    <div class="span4 product-listing">

        <p class="title"><a href="product.html">Ibiza Banana</a></p>

        <a href="product.html"><img class="image" src="templates/686project.com/assets/img/product-2.jpg" alt="Ibiza Banana" /></a>

        <p class="price">
            &pound; 9.99
            <a class="btn btn-addcart btn-primary" href="basket.html"><span class="entypo cart"></span></a><a class="btn btn-view btn-grey" href="product.html"><span class="entypo search"></span></a>
        </p>

    </div>

    <div class="span4 product-listing">

        <p class="title"><a href="product.html">I Was There</a></p>

        <a href="product.html"><img class="image" src="templates/686project.com/assets/img/product-3.jpg" alt="I Was There" /></a>

        <p class="price">
            &pound; 9.99
            <a class="btn btn-addcart btn-primary" href="basket.html"><span class="entypo cart"></span></a><a class="btn btn-view btn-grey" href="product.html"><span class="entypo search"></span></a>
        </p>

    </div>

</div>

<div class="row">

    <div class="span4 product-listing">

        <p class="title"><a href="product.html">A Life Style</a></p>

        <a href="product.html"><img class="image" src="templates/686project.com/assets/img/product-4.jpg" alt="A Life Style" /></a>

        <p class="price">
            &pound; 9.99
            <a class="btn btn-addcart btn-primary" href="basket.html"><span class="entypo cart"></span></a><a class="btn btn-view btn-grey" href="product.html"><span class="entypo search"></span></a>
        </p>

    </div>

    <div class="span4 product-listing">

        <p class="title"><a href="product.html">Amnesia Community</a></p>

        <a href="product.html"><img class="image" src="templates/686project.com/assets/img/product-5.jpg" alt="Amnesia Community" /></a>

        <p class="price">
            &pound; 9.99
            <a class="btn btn-addcart btn-primary" href="basket.html"><span class="entypo cart"></span></a><a class="btn btn-view btn-grey" href="product.html"><span class="entypo search"></span></a>
        </p>

    </div>

    <div class="span4 product-listing">

        <p class="title"><a href="product.html">Carnal</a></p>

        <a href="product.html"><img class="image" src="templates/686project.com/assets/img/product-6.jpg" alt="Carnal" /></a>

        <p class="price">
            &pound; 9.99
            <a class="btn btn-addcart btn-primary" href="basket.html"><span class="entypo cart"></span></a><a class="btn btn-view btn-grey" href="product.html"><span class="entypo search"></span></a>
        </p>

    </div>

</div>

<div class="row footer">

    <div class="span6">

        <ul class="footer-nav">
            <li><a href=""><img src="templates/686project.com/assets/flags/gb.png" alt="GBP" /></a> &nbsp; <a href=""><img src="templates/686project.com/assets/flags/us.png" alt="USD" /></a> &nbsp; <a href=""><img src="templates/686project.com/assets/flags/europeanunion.png" alt="Euro" /></a></li>
            <li><a href="content.html">Terms &amp; Conditions</a></li>
            <li><a href="content.html">Delivery Information</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>

    </div>

    <div class="span6 footer-right">

        <p>
            &copy; 686 Tees
        </p>

    </div>

</div>
@stop
