<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">
            <form class="grid grid-cols-12 gap-y-7 gap-x-5 md:gap-x-6 lg:gap-x-7.5"
                action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="col-span-full lg:col-span-4 flex flex-col">
                    <h5 class="font-bold text-gray-900 dark:text-white uppercase text-sm mb-3 tracking-tighter">Profile
                        Photo</h5>
                    <div class="flex gap-x-7.5 mb-3 items-start">
                        <figure>
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Client Avatar">
                            @else
                                <img src="{{ asset('assets/img/main/samples/user-4-80x80.jpg') }}" alt="Client Avatar">
                            @endif
                        </figure>
                        <label
                            class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center py-3 px-5 lg:py-3.5 lg:px-9 text-sm text-gray-625 ring-1 ring-inset ring-gray-625 bg-transparent hover:bg-primary hover:text-white hover:ring-0 cursor-pointer tracking-tighter"
                            for="user-profile-img">
                            Browse...
                            <input class="hidden" type="file" name="user-profile-img" id="user-profile-img">
                        </label>
                    </div>
                    <div class="text-xs uppercase">100x100px minimum resolution</div>
                </fieldset>
                <div
                    class="col-span-full lg:col-span-8 grid grid-cols-1 lg:grid-cols-2 gap-y-7 gap-x-5 md:gap-x-6 lg:gap-x-7.5">
                    <div>
                        <label
                            class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                            for="email">Your Email</label>
                        <input
                            class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                            placeholder="Enter your email">
                        @error('email')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                            for="username">Your Username</label>
                        <input
                            class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="text" name="username" id="username"
                            value="{{ old('username', Auth::user()->username) }}" placeholder="Enter your username">
                        @error('username')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                            for="first-name">First Name</label>
                        <input
                            class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="text" name="first-name" id="first-name"
                            value="{{ old('first-name', Auth::user()->client->first_name ?? '') }}"
                            placeholder="Enter your first name">
                        @error('first-name')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                            for="last-name">Last Name</label>
                        <input
                            class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="text" name="last-name" id="last-name"
                            value="{{ old('last-name', Auth::user()->client->last_name ?? '') }}"
                            placeholder="Enter your last name">
                        @error('last-name')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                            for="change-password">Change Password</label>
                        <input
                            class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="password" name="change-password" id="change-password" value="" placeholder="">
                        @error('change-password')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                            for="repeat-password">Repeat Password</label>
                        <input
                            class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="password" name="repeat-password" id="repeat-password" value="" placeholder="">
                        @error('repeat-password')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-full">
                        <h5 class="font-bold text-gray-900 dark:text-white uppercase text-sm mb-3 tracking-tighter">
                            Admin Settings</h5>
                        <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 gap-x-4">

                            <!-- Twitch Username -->
                            <div class="mb-4">
                                <label class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                    for="twitch-username">Twitch Username</label>
                                <input
                                    class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                    type="text" name="twitch-username" id="twitch-username"
                                    placeholder="Enter Twitch username">
                                @error('twitch-username')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Aliase -->
                            <div class="mb-4">
                                <label class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                    for="aliase">Aliase</label>
                                <input
                                    class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                    type="text" name="aliase" id="aliase" placeholder="Enter aliase">
                                @error('aliase')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <h5
                                    class="font-bold text-gray-900 dark:text-white uppercase text-sm mb-3 tracking-tighter">
                                    Bio</h5>
                                <!-- Bio Image -->
                                <div class="mb-4">
                                    <label
                                        class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                        for="bio-image">Bio Image</label>
                                    <input
                                        class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                        type="file" name="bio-image" id="bio-image">
                                    @error('bio-image')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label
                                        class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                        for="bio">Bio</label>
                                    <textarea
                                        class="w-full h-24 py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                        name="bio" id="bio" placeholder="Enter bio"></textarea>
                                    @error('bio')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <h5
                                    class="font-bold text-gray-900 dark:text-white uppercase text-sm mb-3 tracking-tighter">
                                    Schedule</h5>
                                <div class="grid grid-cols-1 md:grid-cols-7 gap-y-4 gap-x-4">
                                    <!-- Monday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Monday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('monday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Tuesday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Tuesday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('tuesday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Wednesday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Wednesday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('wednesday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Thursday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Thursday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('thursday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Friday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Friday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('friday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Saturday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Saturday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('saturday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Sunday -->
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-bold tracking-tight text-gray-900 dark:text-white mb-1"
                                            for="monday-schedule">Sunday</label>
                                        <input
                                            class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-accent dark:bg-gray-800 dark:text-white"
                                            type="time" name="monday-schedule" id="monday-schedule">
                                        @error('sunday-schedule')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-start-2 pt-2 flex justify-end">
                        <button type="submit"
                            class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90">
                            Save all changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main>
