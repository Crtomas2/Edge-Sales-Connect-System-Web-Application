<x-sidebar-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Edit User
        </h2>
    </x-slot>

    {{-- div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div> --}}

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{route('users.update',$user->id)}}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="firstname" class="block font-medium text-sm text-gray-700">Firstname</label>
                            <input type="text" firstname="firstname" id="firstname" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('firstname', '') }}" />
                            @error('firstname')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="lastname" class="block font-medium text-sm text-gray-700">Lastname</label>
                            <input type="text" lastname="lastname" id="lastname" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('lastname', '') }}" />
                            @error('lastname')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="username" class="block font-medium text-sm text-gray-700">User Name</label>
                            <input type="username" name="username" id="username" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('username', $user->username) }}" />
                            @error('username')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="UserRole" class="block font-medium text-sm text-gray-700">User Role</label>
                            <select name="UserRole" class="block mt-1 w-full border-gray-300 focus-border-gray-300 focus-ring focus-ring-200 focus-ring-opacity-50 rounded-md shadow-sm">
                                <option value="">--Select a Type of User--</option>
                                <option value="Sales Representative">Sales Representative</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-sidebar-layout>