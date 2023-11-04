<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Uživatelské role a oprávnění') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

@can('Uživatelské role a oprávnění')

<div class="btn-group">
      <button onclick="window.location.replace('{{ route('roles.new') }}');" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Nová role</button>
      </button>
</div>


            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Akce</th>
                </thead>

                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                        @if ($role->id != 1)
                            <a href="{{route('roles.edit', ['id' => $role->id])}}">Upravit</a>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </table>

            {{ $roles->withQueryString()->links() }}
 @else
     Nemáte oprávnění
 @endcan


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
