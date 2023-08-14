<x-sidebar-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('User Management List') }}
            </h2>
        </div>
    </x-slot>

    <livewire:user-table-list/>
    {{-- <div class="max-w-7xl mx-auto sm:px-6 py-12 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex items-center space-x-4 px-4 py-5">
                <div class="flex-1"></div>
                <div class="flex-none mr-4">
                    <a href="{{route('users.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <i class="fas fa-plus"></i><b>Create User</b>
                    </a>
                </div>
            </div>
        </div>

        <div class="relative max-w-full overflow-x-scroll">
            <table class="table-auto overflow-scroll w-full max-w-full px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <thead class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-b sm:rounded-bl-md sm:rounded-br-md">
                    <tr>
                        <th align="center" role="button">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Firstname</span>
                            </div>
                        </th>
                        <th align="center" role="button">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Lastname</span>
                            </div>
                        </th>
                        <th role="button" align="center">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Email</span>
                            </div>
                        </th>
                        <th role="button" align="center">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>User Name</span>
                            </div>
                        </th>
                        <th role="button" align="center">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>User Role</span>
                            </div>
                        </th>
                        <th role="button" align="center">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Location Code</span>
                            </div>
                        </th>
                        <th role="button" align="center">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Actions</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @if($paginatedUsers->count() > 0)
                        @foreach($paginatedUsers as $user)
                            <tr>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->firstname }}</td>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->lastname }}</td>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->email }}</td>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->username }}</td>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->UserRole }}</td>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->location_code }}</td>
                                <td align="right">
                                    <div class="flex px-4">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary ml-2">Edit</a>
                                        <form method="POST" class="btn btn-danger ml-2" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-2" type="submit">
                                                <a class="btn btn-danger ml-2">Delete</a>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr height="50">
                            <td colspan="6">
                                <center>No Users found.</center>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                {{ $paginatedUsers->links() }}
            </div>
        </div>
    </div> --}}
</x-sidebar-layout>
