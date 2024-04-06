<form class="flex flex-col gap-y-6 lg:gap-y-8" method="POST" action="{{ route('login.store') }}">
    @csrf
    <div>
        <label class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5" for="login-user-email">Your Email</label>
        <input class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" type="email" name="email" id="login-user-email" value="{{ old('email') }}" placeholder="">
        @error('email')
            <p class="group-[.is-error]:block mt-2 text-xs text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5" for="login-user-password">Your Password</label>
        <input class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" type="password" name="password" id="login-user-password" value="" placeholder="">
        @error('password')
            <p class="group-[.is-error]:block mt-2 text-xs text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex justify-between flex-wrap gap-y-4">
        <div>
            <label class="flex items-center gap-x-3 hover:cursor-pointer" for="remember-me">
                <input name="remember-me" id="remember-me" type="checkbox" class="h-4 w-4 border-gray-600 bg-white checked:border-primary checked:bg-white checked:text-primary checked:hover:border-primary checked:hover:bg-white dark:border-gray-600 dark:bg-gray-900 dark:checked:border-primary dark:checked:hover:border-primary dark:checked:hover:bg-gray-900">
                <span class="text-xs font-bold uppercase text-gray-900 dark:text-white">Remember Me</span>
            </label>
        </div>
        <a href="{{ route('password.email') }}" class="text-xs font-bold uppercase text-primary dark:text-white hover:text-primary dark:hover:text-primary transition-colors">Forgot Password?</a>
    </div>
    <div class="mt-2">
        <button type="submit" class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90 w-full">Login to your account</button>
    </div>
</form>
