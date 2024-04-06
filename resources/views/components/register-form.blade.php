<form class="flex flex-col gap-y-5 lg:gap-y-8" method="POST" action="{{ route('register.store') }}" novalidate>
    @csrf
    <div class="group">
        <label class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white mb-2.5" for="username">Your Name</label>
        <input class="px-4 py-2 border-base bg-white font-medium leading-8 tracking-tight text-gray-900 placeholder-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" type="text" name="username" id="username" value="{{ old('username') }}" required>
        @error('username')
            <p class="group-[.is-error]:block mt-2 text-xs text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="group">
        <label class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white mb-2.5" for="email">Your Email</label>
        <input class="px-4 py-2 border-base bg-white font-medium leading-8 tracking-tight text-gray-900 placeholder-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <p class="group-[.is-error]:block mt-2 text-xs text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="group">
        <label class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white mb-2.5" for="password">Your Password</label>
        <input class="px-4 py-2 border-base bg-white font-medium leading-8 tracking-tight text-gray-900 placeholder-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" type="password" name="password" id="password" required>
        @error('password')
            <p class="group-[.is-error]:block mt-2 text-xs text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="group">
        <label class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white mb-2.5" for="password_confirmation">Repeat Password</label>
        <input class="px-4 py-2 border-base bg-white font-medium leading-8 tracking-tight text-gray-900 placeholder-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" type="password" name="password_confirmation" id="password_confirmation" required>
        @error('password_confirmation')
            <p class="group-[.is-error]:block mt-2 text-xs text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mt-2">
        <button type="submit" class="inline-flex justify-center py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-accent hover:bg-accent/90 w-full">Create your account</button>
    </div>
</form>
