<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <div class="container mx-auto">
            <!-- Page Title -->
            <div class="mb-7">
                <h2 class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                    Admin <span class="text-primary">User Management</span>
                </h2>
            </div>

            <!-- User Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Head -->
                    <thead class="bg-gray-200 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Name</th>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Email</th>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Iterate through users -->
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Ban</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-main>
