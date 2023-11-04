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

@can('Správa uživatelů')
<form method="post" action="{{route('users.save')}}">
@csrf
    <table class="table table-striped">
        <tr>
            <td>Aktivní uživatel</td>
            <td><input type="checkbox" class="form-control" name="status"
            @isset($user)
                @if (old('status') == 1 || $user->status == 1 && !old('status'))
                    checked="checked"
                @endif
            @endisset
            ></td>
        </tr>
        <tr>
            <td>Jméno a příjmení</td>
            <td><input class="form-control" name="name" value="{{ old('name', isset($user->name) ?$user->name : '') }}"></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input class="form-control" name="email" value="{{ old('email', isset($user->email) ?$user->email : '') }}"></td>
        </tr>
        @isset($user->id)
            <input type="hidden" name="id" value="{{$user->id}}">
        @else
            <tr>
                <td>Heslo</td>
                <td><input class="form-control" type="password" name="password"></td>
            </tr>
        @endisset
        <tr>
            <td>Role uživatele</td>
            <td>
                <select class="form-control" name="roleName">
                    @foreach ($allRoles as $role)
                        <option @if ($role->name == $currentRole) selected="selected"
                        @elseif(!$currentRole && $loop->last)
                        selected="selected"
                        @endif value="{{$role->name}}">{{$role->name}}
                    @endforeach
                </select>
            </td>
        </tr>
    </table>

    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Uložit uživatele</button>
</form>
@else
    Nemáte oprávnění
@endcan


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
