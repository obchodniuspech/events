<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Log aktivity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

@can('Zobrazit Log aktivity')
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Akce</th>
                <th>Objekt</th>
                <th>Popis</th>
                <th>Detail</th>
                <th>Uživatel</th>
                <th>Datum a čas</th>
            </thead>

            @foreach ($log as $litem)
                <tr>
                    <td>{{$litem->id}}</td>
                    <td>
                        @if ($litem->event == "updated")
                            Úprava
                        @endif
                        @if ($litem->event == "created")
                            Vytvoření
                        @endif
                        @if ($litem->event == "login")
                            Přihlášení
                        @endif
                        @if ($litem->event == "logout")
                            Odhlášení
                        @endif
                    </td>
                    <td>
                        @if ($litem->subject_type == "App\Models\Invoices")
                            Faktura
                        @endif
                        @if ($litem->subject_type == "App\Models\Partners")
                            Obchodní partner
                        @endif
                        @if ($litem->subject_type == "App\Models\Categories")
                            Kategorie
                        @endif
                        @if ($litem->subject_type == "App\Models\User")
                            Uživatel
                        @endif
                        @if ($litem->subject_type == "App\Models\PaymentHistory")
                            Historie plateb
                        @endif
                    </td>
                    <td>{{$litem->description}}</td>
                    <td>
                        <a href="#/" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loadActivityLogDetail({{$litem->id}},'{{$litem->event}}');"><i class="bi bi-eye"></i><a>
                    </td>
                    <td>{{$litem->user_name}}</td>
                    <td>{{date('d.m.Y H:i:s', strtotime($litem->created_at))}}</td>

                </tr>
            @endforeach
        </table>

        {{ $log->withQueryString()->links() }}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail logu <span id="logId"></span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <table class="table table-striped" id="TableLogWithOldAndNew">
            <thead>
                <th>Položka</th>
                <th>Původní hodnota</th>
                <th>Nová hodnota</th>
            </thead>
            <tbody id="logDetailTable"></tbody>
            </table>

            <table class="table table-striped" id="TableLogNew">
            <thead>
                <th>Položka</th>
                <th>Nová hodnota</th>
            </thead>
            <tbody id="logDetailTableCreated"></tbody>
            </table>

            <table class="table table-striped" id="TableLogSimple">
            <thead>
                <th>Položka</th>
                <th>Hodnota</th>
            </thead>
            <tbody id="logDetailTableSimple"></tbody>
            </table>
      </div>

    </div>
  </div>
</div>
@else
    Nemáte oprávnění
@endcan

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
