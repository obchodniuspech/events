
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail události') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="event-schedule-area-two bg-color pad100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">

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
                                                    @isset($event)
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
                                                                        <h3><a href="#">{{$event->name}}</a></h3>
                                                                        <div class="meta">
                                                                            <div class="organizers">
                                                                                <a href="#">{{$event->user->name}}</a>
                                                                            </div>
                                                                            <div class="categories">
                                                                                <a href="#">{{$event->categoryInfo->name}}</a>
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

                                                                    @can('Nová událost')

                                                                        <div class="primary-btn">
                                                                            <a class="btn btn-primary" target="_blank" href="{{route('events.edit', ['id' => $event->id])}}"><i class="bi bi-pencil-square"></i> Upravit</a>
                                                                        </div>

                                                                    @endcan

                                                                        <div class="primary-btn mt-1">
                                                                            <a class="btn btn-primary" target="_blank" href="{{route('events.edit', ['id' => $event->id])}}">.ics</a>
                                                                        </div>
                                                                </td>
                                                            </tr>
                                                    @endisset
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


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
