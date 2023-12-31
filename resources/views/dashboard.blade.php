
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
                            <button onclick="window.location.replace('{{ route('events.edit') }}');" type="button"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Nová událost
                            </button>
                            </button>
                        </div>

                    @endcan


                        <div class="event-schedule-area-two bg-color pad100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav custom-tab" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-bs-toggle="pill" data-bs-target="#events-home-tab" type="button" role="tab" aria-controls="events-home-tab" aria-selected="false">Všechny události</a>
                                            </li>

                                            @foreach($categories AS $category)
                                                <li class="nav-item">
                                                    <a class="nav-link" id="{{$category->id}}-tab}" data-bs-toggle="pill" data-bs-target="#events-{{$category->id}}-tab" type="button" role="tab" aria-controls="events-{{$category->id}}-tab" aria-selected="false">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                                <div class="tab-pane fade show active" id="events-home-tab" role="tabpanel" aria-labelledby="events-home-tab">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" scope="col">Datum</th>
                                                                <!--<th scope="col">Obrázek</th>-->
                                                                <th scope="col">Informace</th>
                                                                <th scope="col">Místo</th>
                                                                <th class="text-center" scope="col">Akce</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @isset($events)
                                                                @foreach($events AS $event)
                                                                    <tr class="inner-box">
                                                                        <th scope="row">
                                                                            <div class="event-date">
                                                                                <span>{{\Carbon\Carbon::parse($event->ends)->format("d")}}.</span>
                                                                                <p>{{\Carbon\Carbon::parse($event->ends)->locale('cs')->translatedFormat("F")}}</p>
                                                                            </div>
                                                                        </th>
                                                                        <!--<td>
                                                                            <div class="event-img">
                                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                                            </div>
                                                                        </td>-->
                                                                        <td>
                                                                            <div class="event-wrap">
                                                                                <h3><a href="{{route('events.detail', ['id' => $event->id])}}">{{$event->name}}</a></h3>
                                                                                <div class="meta">
                                                                                    <div class="organizers">
                                                                                        <a href="#"><i class="bi bi-person"></i> {{$event->user->name}}</a>
                                                                                    </div>
                                                                                    <div class="categories">
                                                                                        <a href="#"><i class="bi bi-tag"></i> {{$event->categoryInfo->name}}</a>
                                                                                    </div>
                                                                                    <br>
                                                                                    @if ($event->share_enable)
                                                                                        <b><i class="bi bi-globe2"></i> Událost je veřejná</b>
                                                                                    @endif
                                                                                    <div class="time">
                                                                                        <span>{{\Carbon\Carbon::parse($event->starts)->format("d.m.Y H:i:s")}}</span>
                                                                                        <br>
                                                                                        <span>{{\Carbon\Carbon::parse($event->ends)->format("d.m.Y H:i:s")}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="r-no">
                                                                                <span>{{$event->where}}</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="primary-btn">
                                                                                <a class="btn btn-primary" target="_blank" href="{{route('events.detail', ['id' => $event->id])}}"><i class="bi bi-box-arrow-up-right"></i> Detail</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endisset
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                        @foreach($categories AS $category)
                                            <div class="tab-pane fade" id="events-{{$category->id}}-tab" role="tabpanel" aria-labelledby="{{$category->id}}-tab">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center" scope="col">Datum</th>
                                                            <!--<th scope="col">Obrázek</th>-->
                                                            <th scope="col">Informace</th>
                                                            <th scope="col">Místo</th>
                                                            <th class="text-center" scope="col">Akce</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @isset($eventsGrouped[$category->id])
                                                            @foreach($eventsGrouped[$category->id] AS $event)
                                                                <tr class="inner-box">
                                                                    <th scope="row">
                                                                        <div class="event-date">
                                                                            <span>{{\Carbon\Carbon::parse($event->ends)->format("d")}}.</span>
                                                                            <p>{{\Carbon\Carbon::parse($event->ends)->locale('cs')->translatedFormat("F")}}</p>
                                                                        </div>
                                                                    </th>
                                                                    <!--<td>
                                                                        <div class="event-img">
                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                                        </div>
                                                                    </td>-->
                                                                    <td>
                                                                        <div class="event-wrap">
                                                                            <h3><a href="{{route('events.detail', ['id' => $event->id])}}">{{$event->name}}</a></h3>
                                                                            <div class="meta">
                                                                                <div class="organizers">
                                                                                    <a href="#"><i class="bi bi-person"></i> {{$event->user->name}}</a>
                                                                                </div>
                                                                                <div class="categories">
                                                                                    <a href="#"><i class="bi bi-tag"></i> {{$event->categoryInfo->name}}</a>
                                                                                </div>
                                                                                <br>
                                                                                @if ($event->share_enable)
                                                                                    <b><i class="bi bi-globe2"></i> Událost je veřejná</b>
                                                                                @endif
                                                                                <div class="time">
                                                                                    <span>{{\Carbon\Carbon::parse($event->starts)->format("d.m.Y H:i:s")}}</span>
                                                                                    <br>
                                                                                    <span>{{\Carbon\Carbon::parse($event->ends)->format("d.m.Y H:i:s")}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="r-no">
                                                                            <span>{{$event->where}}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="primary-btn">
                                                                            <a class="btn btn-primary" target="_blank" href="{{route('events.detail', ['id' => $event->id])}}"><i class="bi bi-box-arrow-up-right"></i> Detail</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        @endforeach
                                        </div>

                                        <div class="primary-btn text-center">
                                            <a href="#" class="btn btn-primary">Download Schedule</a>
                                        </div>
                                    </div>
                                    <!-- /col end-->
                                </div>
                                <!-- /row end-->
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
