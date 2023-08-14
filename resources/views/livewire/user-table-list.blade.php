<div>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('flash.banner'))
                <div class="overflow-hidden rounded-md mb-3">
                    <x-jet-banner message="{{ session('flash.banner') }}" class="rounded-md"></x-jet-banner>
                </div>
            @endif
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex items-center justify-end">
                {{-- <livewire:promodiser.export-button :model="\App\Models\Promodisers::class" filetype="csv" /> --}}
                {{-- <livewire:export-button :model="\App\Models\Promodisers::class" filetype="xlsx" filename="promodisers_component" /> --}}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center px-4 py-5">
                    <div class="mr-4">
                        <x-jet-input type="text" class="block mb-1" wire:model="searchTerm" placeholder="Search" />
                    </div> 
                    <div class="flex-none mr-4">
                        <x-jet-label for="roleFilter" class="block mb-1">Role Filter</x-jet-label>
                        <div>
                            <select id="roleFilter" wire:model="selectedRole" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                                <option value="">Default</option>
                                @foreach($roleFilter as $role)
                                <option value="{{ $role['value'] }}">{{ $role['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="flex-none mr-4">
                        <x-jet-label for="letterFilter" class="block mb-1">Alphabetical Letter Filter</x-jet-label>
                        <div>
                            <select id="letterFilter" wire:model="selectedLetter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                                <option value="">Select a letter</option>
                                @foreach(range('A', 'Z') as $letter)
                                    <option value="{{ $letter }}">{{ $letter }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex-none mr-4">
                        <x-jet-label for="letterFilter" class="block mb-1">Location Code Filter</x-jet-label>
                        <div>
                            <select id="outletFilter" wire:model="selectedOutlet" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                                <option value="">Select a outlet</option>
                                @foreach($outletFilters as $outlet)
                                <option value="{{ $outlet['value'] }}">{{ $outlet['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <x-jet-button wire:click="resetDataFilter()">Clear</x-jet-button>
                    </div>
                    <div class="flex-1"></div>         
                    <div class="flex-none">
                        <x-jet-button wire:click="createUser()">Create</x-jet-button>
                    </div>
                </div>
                
                
                
                
                <div class="relative max-w-full overflow-x-scroll">
                    <table class="table-auto overflow-scroll w-full max-w-full px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <thead class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-b sm:rounded-bl-md sm:rounded-br-md">
                            <tr height="50">
                                <th align="center" role="button" wire:click="setSort('firstname', '{{ $sortBy === 'firstname' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>Firstname</span>
                                        @if($sortBy)
                                            @if($sortBy === 'firstname')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th role="button" align="center" wire:click="setSort('lastname', '{{ $sortBy === 'lastname' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>Lastname</span>
                                        @if($sortBy)
                                            @if($sortBy === 'lastname')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th role="button" align="center" wire:click="setSort('email', '{{ $sortBy === 'email' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>Email</span>
                                        @if($sortBy)
                                            @if($sortBy === 'email')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th role="button" align="center" wire:click="setSort('username', '{{ $sortBy === 'username' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>Username</span>
                                        @if($sortBy)
                                            @if($sortBy === 'username')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th role="button" align="center" wire:click="setSort('UserRole', '{{ $sortBy === 'UserRole' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>UserRole</span>
                                        @if($sortBy)
                                            @if($sortBy === 'UserRole')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th role="button" align="center" wire:click="setSort('location_code', '{{ $sortBy === 'location_code' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>Location Code</span>
                                        @if($sortBy)
                                            @if($sortBy === 'location_code')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                {{-- <th role="button" align="center" wire:click="setSort('password', '{{ $sortBy === 'password' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                    <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                        <span>Password</span>
                                        @if($sortBy)
                                            @if($sortBy === 'password')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                    @if($sortDirection === 'ASC')
                                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th> --}}
                                <th align="center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @if($pagination->count() > 0)
                                @foreach($pagination as $user)
                                <tr>
                                    <td class="border-b border-slate-200 p-4 pl-8">{{ $user->firstname}}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->lastname}}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->email}}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->username}}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->UserRole}}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->location_code}}</td>
                                    {{-- <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $user->password}}</td> --}}
                                    <td align="right">
                                        <div class="flex px-4">
                                            <button type="button" wire:click.prevent="editUser({{$user->id}})" class="btn btn-primary ml-2">Edit</a>
                                            <button type="button" wire:click.prevent="deleteConfirmation({{$user->id}})" class="btn btn-danger ml-2">Delete</button>
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
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{  $pagination->links() }}
                </div>
            </div>
        </div>
    </div>

   
    <!-- start: Create -->
    <x-jet-dialog-modal wire:model="showUserCreate">
        <x-slot name="title">
            User Registration Form
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit="addUserData()">
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <div class="w-full mb-3">
                        <x-jet-label for="firstname">Firstname</x-jet-label>
                        <x-jet-input type="text" class="w-full mb-2" id="firstname" wire:model.defer="firstname" />
                        <x-jet-input-error for="firstname" />
                    </div>
                    <div class="w-full mb-3">
                        <x-jet-label for="first_name">Lastname</x-jet-label>
                        <x-jet-input type="text" class="w-full mb-2" id="first_name" wire:model.defer="lastname" />
                        <x-jet-input-error for="lastname" />
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <div class="w-full mb-3">
                        <x-jet-label for="email">Email</x-jet-label>
                        <x-jet-input type="email" class="w-full mb-2" id="email" wire:model.defer="email" size="12" />
                        <x-jet-input-error for="email" />
                    </div>
                    <div class="w-full mb-3">
                        <x-jet-label for="username">Username</x-jet-label>
                        <x-jet-input type="text" class="w-full mb-2" id="username" wire:model.defer="username" size="12" />
                        <x-jet-input-error for="username" />
                    </div>
                </div> 
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <div class="w-full mb-3">
                        <x-jet-label for="UserRole">UserRole</x-jet-label>
                        <select wire:model.defer="UserRole" name="UserRole" class="w-full mb-2 rounded-lg border-gray-300">
                            <option value="">----Select a Type of User----</option>
                            <option value="Sales Representative">Sales Representative</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>                   
                    <div class="w-full mb-3">
                        <x-jet-label for="password">Password</x-jet-label>
                        <x-jet-input type="password" class="w-full mb-2" id="password" wire:model.defer="password" size="12" />
                        <x-jet-input-error for="password" />
                    </div>
                </div>
            </form>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelAdd()" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2" wire:click="storeUserData()" wire:loading.attr="disabled">
                <span>Add</span>
            </x-jet-button>
            <!-- Add this button inside the x-slot name="footer" section -->
            {{-- <x-jet-button class="ml-2" wire:click="storeUserData">Test storeUserData</x-jet-button> --}}

        </x-slot>
    </x-jet-dialog-modal>
    <!-- end: Create -->


    <!-- start: Edit -->
    <x-jet-dialog-modal wire:model="showUserEdit">
        <x-slot name="title">
            Edit User Information Form
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit="editUserData()">
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <div class="w-full mb-3">
                        <x-jet-label for="firstname">Firstname</x-jet-label>
                        <x-jet-input type="text" class="w-full mb-2" id="firstname" wire:model.defer="firstname" />
                        <x-jet-input-error for="firstname" />
                    </div>
                    <div class="w-full mb-3">
                        <x-jet-label for="lastname">Last name</x-jet-label>
                        <x-jet-input type="text" class="w-full mb-2" id="lastname" wire:model.defer="lastname"/>
                        <x-jet-input-error for="lastname"/>
                    </div>
                </div>
                <div class="w-full mb-3">
                    <x-jet-label for="email">Email</x-jet-label>
                    <x-jet-input type="text" class="w-full mb-2" id="email" wire:model.defer="email" size="12" />
                    <x-jet-input-error for="email" />
                </div>
                <div class="w-full mb-3">
                    <x-jet-label for="username">Username</x-jet-label>
                    <x-jet-input type="text" class="w-full mb-2" id="username" wire:model.defer="username" size="12" />
                    <x-jet-input-error for="username" />
                </div>
                <div class="w-full mb-3">
                    <x-jet-label for="UserRole">User Role</x-jet-label>
                    <select wire:model.defer="UserRole" name="UserRole" class="w-full mb-2 rounded-lg border-gray-300">
                        <option value="">----Select a Type of User----</option>
                        <option value="Sales Representative">Sales Representative</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="w-full mb-3">
                    <x-jet-label for="location_code">Location Code</x-jet-label>
                    <select id="outletFilter" wire:model="selectedOutlet" class="w-full mb-2 rounded-lg border-gray-300 hover:rounded-lg focus:rounded-lg">
                        <option value="">Select an outlet</option>
                        @foreach($outletFilters as $outlet)
                        <option value="{{ $outlet['value'] }}">{{ $outlet['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="w-full mb-3">
                    <x-jet-label for="password">Password</x-jet-label>
                    <x-jet-input type="password" class="w-full mb-2" id="password" wire:model.defer="password" size="12" />
                    <x-jet-input-error for="password" />
                </div>
            </form>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelEdit()" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2" wire:click="editUserData()" wire:loading.attr="disabled">
                <span>Edit</span>
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- end: Edit -->

    <!-- start: Delete -->
     <x-jet-confirmation-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            Delete Account
        </x-slot>
    
        <x-slot name="content">
            Are you sure you want to delete the User Information?
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelDelete()" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="confirmDelete()" wire:loading.attr="disabled">
                Confirm
            </x-jet-danger-button>
            
        </x-slot>
    </x-jet-confirmation-modal>
    <!-- end: Delete -->

</div>



