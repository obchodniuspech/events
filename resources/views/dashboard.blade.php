<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Přehled') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @can('Nová událost')

                        <div class="btn-group mb-4">
                            <button onclick="window.location.replace('{{ route('users.new') }}');" type="button"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Nová událost
                            </button>
                            </button>
                        </div>

                    @endcan

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Všechny události</button>
                            </li>
                            @foreach($categories AS $category)

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-{{$category->url}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$category->url}}" type="button" role="tab" aria-controls="pills-{{$category->url}}" aria-selected="false">{{$category->name}}</button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Všechny</div>
                            @foreach($categories AS $category)
                                <div class="tab-pane fade" id="pills-{{$category->url}}" role="tabpanel" aria-labelledby="pills-{{$category->url}}-tab">{{$category->name}}</div>
                            @endforeach
                        </div>


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-sm-offset-2 col-sm-8">
                                    <ul class="event-list">
                                        <li>
                                            <time datetime="2014-07-20">
                                                <span class="day">4</span>
                                                <span class="month">Jul</span>
                                                <span class="year">2014</span>
                                                <span class="time">ALL DAY</span>
                                            </time>
                                            <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                            <div class="info">
                                                <h2 class="title">Independence Day</h2>
                                                <p class="desc">United States Holiday</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                                    <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                                    <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <time datetime="2014-07-20 0000">
                                                <span class="day">8</span>
                                                <span class="month">Jul</span>
                                                <span class="year">2014</span>
                                                <span class="time">12:00 AM</span>
                                            </time>
                                            <div class="info">
                                                <h2 class="title">One Piece Unlimited World Red</h2>
                                                <p class="desc">PS Vita</p>
                                                <ul>
                                                    <li style="width:50%;"><a href="#website"><span class="fa fa-globe"></span> Website</a></li>
                                                    <li style="width:50%;"><span class="fa fa-money"></span> $39.99</li>
                                                </ul>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                                    <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                                    <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <time datetime="2014-07-20 2000">
                                                <span class="day">20</span>
                                                <span class="month">Jan</span>
                                                <span class="year">2014</span>
                                                <span class="time">8:00 PM</span>
                                            </time>
                                            <img alt="My 24th Birthday!" src="https://farm5.staticflickr.com/4150/5045502202_1d867c8a41_q.jpg" />
                                            <div class="info">
                                                <h2 class="title">Mouse0270's 24th Birthday!</h2>
                                                <p class="desc">Bar Hopping in Erie, Pa.</p>
                                                <ul>
                                                    <li style="width:33%;">1 <span class="glyphicon glyphicon-ok"></span></li>
                                                    <li style="width:34%;">3 <span class="fa fa-question"></span></li>
                                                    <li style="width:33%;">103 <span class="fa fa-envelope"></span></li>
                                                </ul>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                                    <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                                    <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <time datetime="2014-07-31 1600">
                                                <span class="day">31</span>
                                                <span class="month">Jan</span>
                                                <span class="year">2014</span>
                                                <span class="time">4:00 PM</span>
                                            </time>
                                            <img alt="Disney Junior Live On Tour!" src="http://www.thechaifetzarena.com/images/main/DL13_PiratePrincess_thumb.jpg" />
                                            <div class="info">
                                                <h2 class="title">Disney Junior Live On Tour!</h2>
                                                <p class="desc"> Pirate and Princess Adventure</p>
                                                <ul>
                                                    <li style="width:33%;">$49.99 <span class="fa fa-male"></span></li>
                                                    <li style="width:34%;">$29.99 <span class="fa fa-child"></span></li>
                                                </ul>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                                    <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                                    <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
