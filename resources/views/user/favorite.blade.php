@include('user.layouts.head')
@include('user.layouts.nav')

<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css"
    integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

<div class="container">
    <div class="row">

        <div class="col">
            <h1 class="font-weight-bold mt-5 mb-4 text-center">Favorites</h1>
            <div class="osahan-account-page-right shadow-lg bg-white p-4 ">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade  active show" id="favourites" role="tabpanel"
                        aria-labelledby="favourites-tab">
                        <div class="row">

                                @include('user.layouts.FavoriteCard')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@extends('user/layouts/footer')
@section('title', 'favorite')
