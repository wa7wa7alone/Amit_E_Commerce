@include('user.layouts.head')
@include('user.layouts.nav')
@section('title', 'Home')


<body>

    <section class="slideshow-container">

        <div class="mySlides fade1 ">
            <img class="img-slider" src="{{ URL('images/1.png') }}" style="width:100%">
        </div>

        <div class="mySlides fade1">
            <img class="img-slider"src="https://img.freepik.com/free-photo/black-woman-trendy-grey-leather-jacket-posing-beige-background-studio-winter-autumn-fashion-look_273443-141.jpg?w=2000"
                style="width:100%">
        </div>

        <div class="mySlides fade1">
            <img class="img-slider"
                src="https://thumbs.dreamstime.com/b/fashion-pretty-cool-young-girl-shopping-bags-wearing-black-hat-white-pants-over-colorful-orange-background-79063329.jpg"
                style="width:100%">
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next1" onclick="plusSlides(1)">❯</a>

    </section>

    <section class="d-flex justify-content-center mb-5">
        <div class="" style="padding: 50px 0 0 0; margin: 0 60px 0 0; width:40%">
            <div>
                <img width="800px" src="{{ URL('images/image2.png') }}" alt="">
            </div>
            <div style="padding-top:30px ">
                <h3 style="color: #b41bb1">Hot Collection</h3>
                <h1>New Trend For Woman</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, obcaecati inventore delectus
                    praesentium voluptatibus natus id nemo veniam saepe aliquam accusamus quo pariatur dolorem mollitia,
                    doloribus omnis quibusdam quas reprehenderit.</p>
                <button class="btn btn-outline-dark" style="margin-top: 40px">Shop Now</button>
            </div>

        </div>
        <div class="p-5">

            <div class="pb-5 "><img width="600px" src="{{ URL('images/2.jpg') }}" alt=""></div>
            <div><img width="600px" src="{{ URL('images/Layer 3.png') }}" alt=""></div>

        </div>
    </section>

    {{-- Featured Items --}}
    <section>
        <div class="d-flex justify-content-center flex-wrap">
            <div style="border-top: #949494 4px solid; width:40%; padding:30px;"></div>
            <h2 style="margin:-20px 0 40px 0;">Featured Items</h2>
            <div style="border-top: #717171 4px solid; width:40%; maring-top:10px;height:70px;"></div>
        </div>

        <div class="navbar navbar-expand-lg" style="justify-content: space-around; font-size:20px">
            <ul class="navbar-nav" style="justify-content: space-between">
                <li class="nav-item"> <a style="margin: 0 30px 30px" class="nav-link" href="">All</a></li>
                <li class="nav-item"> <a style="margin: 0 30px 30px" class="nav-link" href="">Men</a></li>
                <li class="nav-item"> <a style="margin: 0 30px 30px" class="nav-link" href="">Women</a></li>
                <li class="nav-item"> <a style="margin: 0 30px 30px" class="nav-link" href="">Kids</a></li>
            </ul>
        </div>


        <div class="d-flex justify-content-center flex-wrap ">
            {{-- Card --}}
            @include('user.layouts.ProductCard')
        </div>
    </section>
    <div>
        <img style="margin:0 0 60px 0; padding:0 " width="100%" id="view-item" src="{{ URL('images/4.png') }}"
            alt="Snow">

    </div>
    {{-- Trending Item --}}
    <section>
        <div class="d-flex justify-content-center">
            <div style="border-top: #949494 4px solid; width:40%; padding:30px;"></div>
            <h2 style="margin:-20px 0 40px 0;">Trending Item</h2>
            <div style="border-top: #949494 4px solid; width:40%; padding:30px;"></div>
        </div>

        <div class="d-flex justify-content-center flex-wrap ">
            {{-- Card --}}
            @auth

    @foreach ($trends as $trend)
        <div style="position: relative; width:355px; padding: 0 50px 50px">
            <img id="view-item" width="270" height="405"
                src="{{ url('storage/' . str_replace('public', '', $trend->image)) }}" alt="{{ $trend->name }}">
            <div class="bg-dark text-white" style="position:absolute; top: 0px; right:43px;">$ {{ $trend->price }}.00</div>
            <div id="view-image-icon">
                <a style="color: #000000" href=""><i class="fas fa-eye fa-4x"></i></a>
            </div>
            <h2>{{ $trend->name }}</h2>
            <div class="mb-3" style="width: 355px">
                <span style="color: #b41bb1" class="fa fa-xl fa-star "></span>
                <span style="color: #b41bb1" class="fa fa-xl fa-star "></span>
                <span style="color: #b41bb1" class="fa fa-xl fa-star "></span>
                <span class="fa fa-xl fa-star"></span>
                <span class="fa fa-xl fa-star"></span>
            </div>
            <div class="d-flex justify-content-between" style="max-width:271px;">

                <form action="{{ url('addcart', $trend->id) }}" method="POST">

                    <a id="item-shape-hover" href=""><i id="inside-item-shape-hover" style=""
                            class="fa-solid fa-heart fa-xl"></i></a>
                </form>
                <form action="{{ route('user.addcart' , $trend->id ) }}" method="POST">
                    @csrf
                    <a id="item-shape-hover" href="{{ route('user.addcart' , $trend->id ) }}"><i id="inside-item-shape-hover"
                            class="fa-solid fa-cart-shopping fa-xl"></i></a>
                </form>
                <form action="{{ url('addcart', $trend->id) }}" method="POST">

                    <a id="item-shape-hover" href=""><i id="inside-item-shape-hover" class="fa fa-share-alt fa-xl"
                            aria-hidden="true"></i>
                    </a>
                </form>

            </div>

        </div>
    @endforeach
@endauth
        </div>

        <div class="d-flex justify-content-center">
            <form action="{{url('home')}}" method="POST">
                @csrf
                @method('POST')
            <button class="btn btn-outline-dark mb-5" style="width: 180px; height:50px ;"><a class="nav-link"
                    href="">LOAD MORE</a></button>
                </form>
        </div>

        <div>
            <img style="margin:60px 0 60px 0; padding:0;" width="100%" id="view-item" src="{{ URL('images/5.png') }}"
                alt="Snow">
        </div>

    </section>

    {{-- Latest Blog --}}
    <section>
        <div class="d-flex justify-content-center">
            <div style="border-top: #949494 4px solid; width:43%; padding:30px;"></div>
            <h2 style="margin:-20px 0 30px 0;">Latest Blog</h2>
            <div style="border-top: #949494 4px solid; width:43%; padding:30px;"></div>
        </div>
        <div class="d-flex justify-content-center p-5">

            <div style="width: 500px; margin-left:30px;"> <img width="450px"
                    src="https://www.standout.co.uk/blog/wp-content/uploads/2022/04/AdobeStock_370553346-scaled.jpeg"
                    alt="">
                <h1 class="mt-2">Some Headline Here</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quas debitis assumenda? Rem,
                    eaque maxime fugit voluptates sequi, non praesentium nulla commodi enim optio, iste perspiciatis
                    impedit tempore quisquam eligendi.</p> <button class="btn btn-outline-dark">Read More</button>
            </div>
            <div style="width: 500px; margin-left:30px;"> <img width="450px"
                    src="https://www.standout.co.uk/blog/wp-content/uploads/2022/04/AdobeStock_370553346-scaled.jpeg"
                    alt="">
                <h1 class="mt-2">Some Headline Here</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quas debitis assumenda? Rem,
                    eaque maxime fugit voluptates sequi, non praesentium nulla commodi enim optio, iste perspiciatis
                    impedit tempore quisquam eligendi.</p> <button class="btn btn-outline-dark">Read More</button>
            </div>
            <div style="width: 500px; margin-left:30px;"> <img width="450px"
                    src="https://www.standout.co.uk/blog/wp-content/uploads/2022/04/AdobeStock_370553346-scaled.jpeg"
                    alt="">
                <h1 class="mt-2">Some Headline Here</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quas debitis assumenda? Rem,
                    eaque maxime fugit voluptates sequi, non praesentium nulla commodi enim optio, iste perspiciatis
                    impedit tempore quisquam eligendi.</p> <button class="btn btn-outline-dark">Read More</button>
            </div>

        </div>
    </section>

    {{-- Shop By Brand --}}
    <section>
        <div class="d-flex justify-content-center mt-5">
            <div style="border-top: #949494 4px solid; width:40%; padding:30px;"></div>
            <h2 style="margin:-20px 0 40px 0;">Shop By Brand</h2>
            <div style="border-top: #717171 4px solid; width:40%; maring-top:10px;height:70px;"></div>
        </div>

        <div class="d-flex justify-content-around">
            <div><img width="250px" src="https://cdn-icons-png.flaticon.com/512/24/24427.png" alt=""></div>
            <div><img width="250px" src="https://cdn-icons-png.flaticon.com/512/24/24427.png" alt=""></div>
            <div><img width="250px" src="https://cdn-icons-png.flaticon.com/512/24/24427.png" alt=""></div>
            <div><img width="250px" src="https://cdn-icons-png.flaticon.com/512/24/24427.png" alt=""></div>
        </div>

    </section>


    @extends('user/layouts/footer')

    </html>

    <script src="js/script.js"></script>
