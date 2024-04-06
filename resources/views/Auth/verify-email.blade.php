<!-- verify-email.blade.php -->

<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">
            <div class="p-8 md:p-10 lg:p-14 xl:p-[60px] bg-white shadow-3xl dark:bg-gray-700 text-gray-900 dark:text-white">
                <h2 class="text-2xl font-bold mb-6">Verify Your Email Address</h2>
                <p>An email has been sent to you with a verification link. Please check your email and click on the link to verify your email address.</p>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center mt-6 px-4 py-2 bg-primary text-white text-sm font-semibold uppercase tracking-wide rounded hover:bg-primary-dark focus:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-dark">Resend Verification Email</button>
                </form>
            </div>
        </div>
    </div>
</x-main>
