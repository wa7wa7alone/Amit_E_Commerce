@auth

    @foreach ($products as $product)
        <div style="position: relative; width:355px; padding: 0 50px 50px">
            <img id="view-item" width="270" height="405"
                src="{{ url('storage/' . str_replace('public', '', $product->image)) }}" alt="{{ $product->name }}">
            <div class="bg-dark text-white" style="position:absolute; top: 0px; right:43px;">$ {{ $product->price }}.00</div>
            <div id="view-image-icon">
                <a style="color: #000000" href=""><i class="fas fa-eye fa-4x"></i></a>
            </div>
            <h2>{{ $product->name }}</h2>
            <div class="mb-3" style="width: 355px">
                <span style="color: #b41bb1" class="fa fa-xl fa-star "></span>
                <span style="color: #b41bb1" class="fa fa-xl fa-star "></span>
                <span style="color: #b41bb1" class="fa fa-xl fa-star "></span>
                <span class="fa fa-xl fa-star"></span>
                <span class="fa fa-xl fa-star"></span>
            </div>
            <div class="d-flex justify-content-between" style="max-width:271px;">


                    <form action="{{ route('user.addfavorite', $product->id) }}" method="POST">
                        @csrf
                        <a id="item-shape-hover" href="{{ route('user.addfavorite', $product->id) }}"><i
                                id="inside-item-shape-hover" style="" class="fa-solid fa-heart fa-xl"></i></a>
                    </form>



                    <form action="{{ route('user.addcart', $product->id) }}" method="POST">
                        @csrf
                        <a id="item-shape-hover" href="{{ route('user.addcart', $product->id) }}"><i
                                id="inside-item-shape-hover" class="fa-solid fa-cart-shopping fa-xl"></i></a>
                    </form>


                <form action="{{ url('addcart', $product->id) }}" method="POST">

                    <a id="item-shape-hover" href=""><i id="inside-item-shape-hover" class="fa fa-share-alt fa-xl"
                            aria-hidden="true"></i>
                    </a>
                </form>

            </div>

        </div>
    @endforeach
@endauth
