@extends('layouts.admin')


@section('content')
    <div class="container my-5 text-center">
        <div class="row pb-3">
            <div class="col">
                <div class="row">
                    <div class="col"><i class="fa-solid fa-envelope"></i></div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>E-Mail</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">marcomm@visitigamedia.com</div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col"><i class="fa-solid fa-phone"></i></div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Phone</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">marcomm@visitigamedia.com</div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col"><i class="fa-solid fa-location-dot"></i></div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Address</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">Jl. Setra Dago Barat No.9, Bandung</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=jalan setra dago no2&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                            href="https://sprunkin.com/">Sprunki Game</a></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 400px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 400px;
                        }

                        .gmap_iframe {
                            height: 400px !important;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
@endsection
