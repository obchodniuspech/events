<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nová / upravit událost') }}
        </h2>
    </x-slot>

    @can('Nová událost')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form method="post" id="eventForm" action="{{ route('events.save') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h1>Název</h1>
                                <input name="name" required="required" type="text" class="form-control" id="invoiceId" aria-describedby="titleHelp" value="">
                            </div>

                            <div class="col-12 mt-4">
                                <h1>Místo</h1>
                                <input name="where" type="text" class="form-control" id="where" aria-describedby="titleHelp" value="">
                            </div>

                            <div class="row mt-4">

                                <div class="col-6">
                                    <h1>Datum a čas od</h1>

                                    <input
                                        type="datetime-local"
                                        id="meeting-time"
                                        name="starts"
                                        value="{{$datetimeFrom}}"
                                        class="form-control">

                                </div>

                                <div class="col-6">
                                    <h1>Datum a čas do</h1>

                                    <input
                                        type="datetime-local"
                                        id="meeting-time"
                                        name="ends"
                                        value="{{$datetimeTo}}"
                                        class="form-control">

                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <h1>Kategorie</h1>
                                <select name="category" id="category" data-live-search="true" style="width: 100%;">
                                    @foreach ($categories AS $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mt-4">
                                <h1 class="mb-2">Nastavení</h1>
                                <input style="border: 1px solid black; margin-right: 10px;" id="radio3" type="checkbox" name="share_enable" value="1">
                                <label for="radio3">
                                    Zveřejnit akci pro všechny (odebrat utajení, povolit sdílení)
                                </label>
                                <br>
                                <input style="border: 1px solid black; margin-right: 10px;" id="comments_enable" type="checkbox" name="comments_enable" value="1">
                                <label for="comments_enable">
                                    Povolit komentáře u akce
                                </label>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row">
                                    <h1 class="mb-4">Popis</h1>
                                    <input type="hidden" name="description">
                                    <!-- Create the editor container -->
                                    <div id="editor" style="height: 400px;">
                                        <p>Hello World!</p>
                                        <p>Some initial <strong>bold</strong> text</p>
                                        <p><br></p>
                                    </div>
                                    <!-- Initialize Quill editor -->
                                    <script>
                                        var quill = new Quill('#editor', {
                                            theme: 'snow',
                                        });

                                        var form = document.querySelector('#eventForm');
                                        form.onsubmit = function() {
                                            // Populate hidden form on submit
                                            var description = document.querySelector('input[name=description]');
                                            var html = quill.root.innerHTML;
                                            //description.value = JSON.stringify(quill.getContents());
                                            description.value = html;

                                            console.log("Submitted", $(form).serialize(), $(form).serializeArray());

                                            form.submit();
                                        };

                                    </script>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Uložit</button>

                    </form>


                </div>
            </div>
        </div>
    </div>


    @endcan

</x-app-layout>
