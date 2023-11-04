<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upravit uživatele') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

@can('Uživatelské role a oprávnění')
<form method="post" action="{{route('roles.save')}}">
@csrf
    <table class="table table-striped">
        <tr>
            <td>Název</td>
            <td><input class="form-control" name="name" value="{{ old('name', isset($role->name) ?$role->name : '') }}"></td>
        </tr>
        <tr>
            <td>Oprávnění</td>
            <td>
            @foreach ($permissionsAll as $permAll)

                <input value="{{$permAll->name}}" name="permissions[]" id="checkbox_{{$permAll->id}}" type="checkbox" class="form-control"
                @if (in_array($permAll->name, $permissionsRole))
                 checked="checked"
                @endif
                >
                <label for="checkbox_{{$permAll->id}}">{{$permAll->name}}</label><br>
            @endforeach
            </td>
        </tr>
    </table>

    @isset($role->id)
        <input type="hidden" name="id" value="{{$role->id}}">
        @else
    @endisset

    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Uložit uživatelskou roli</button>
</form>
@else
    Nemáte oprávnění
@endcan


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
