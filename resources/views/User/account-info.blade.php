<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">
            <form class="grid grid-cols-12 gap-y-7 gap-x-5 md:gap-x-6 lg:gap-x-7.5" action="{{ route('profile.update') }}"
                method="POST" enctype="multipart/form-data">
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
                            class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
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
                            class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
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
                            class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="text" name="first-name" id="first-name"
                            value="{{ old('first-name', Auth::user()->first_name ?? '') }}"
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
                            class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="text" name="last-name" id="last-name"
                            value="{{ old('last-name', Auth::user()->last_name ?? '') }}"
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
                            class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
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
                            class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                            type="password" name="repeat-password" id="repeat-password" value="" placeholder="">
                        @error('repeat-password')
                            <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">{{ $message }}</p>
                        @enderror
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
