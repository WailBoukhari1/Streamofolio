<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <nav
            class="mb-7 border-b border-gray-50 pb-6 dark:border-gray-600 sm:mb-8 sm:pb-7 md:mb-10 md:pb-8 lg:mb-12 lg:pb-10 xl:mb-14 xl:pb-12">
                <ul
                    class="flex flex-col flex-wrap gap-y-4 gap-x-6 xl:gap-x-10 font-bold uppercase tracking-tighter sm:flex-row sm:justify-center md:text-lg">
                    <li>
                        <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary"
                            href="{{ route('account-info') }}">Personal Info</a>
                    </li>

                    <li>
                        <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary" href="{{ route('account-shipping') }}">Shipping Details</a>
                    </li>
                    <li>
                        <a class="transition-all text-primary"
                            href="{{ route('account-orders') }}">Orders</a>
                    </li>
                    <li>
                        <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary"
                            href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </nav>
        <div class="container">
            <!-- Page Title -->
            <div class="mb-7">
                <h2
                    class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                    <span class="text-primary">Your</span> Orders
                </h2>
            </div>

            <!-- Table -->
            <div class="">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Head -->
                    <thead class="bg-gray-200 dark:bg-gray-800">
                        <tr>
                            <!-- Header Titles -->
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Products</th>

                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Status</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Payment Method</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Shipping Date</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Delivery Date</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Actions</th>

                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Iterate through orders -->
                        @foreach ($orders as $order)
                            <tr>
                                <!-- Order Details -->
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <!-- List of Ordered Products -->
                                    <ul>
                                        @foreach ($order->items as $item)
                                            <li>{{ $item->name }} (Qty: {{ $item->quantity }}) - ${{ $item->price }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <!-- Display Status Badge -->
                                    @if ($order->status == 'pending')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">Pending</span>
                                    @elseif($order->status == 'processing')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-700 text-white">Processing</span>
                                    @elseif($order->status == 'shipping')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-white">Shipping</span>
                                    @elseif($order->status == 'completed')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">Completed</span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">Cancelled</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $order->payment_method }}
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    {{ $order->possible_shipping_date }}</td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    {{ $order->possible_delivery_date }}</td>
                                <!-- Cancel Order Button -->
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    @if ($order->status == 'completed')
                                        <form action="{{ route('delete.delete', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-primary text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    @elseif ($order->status == 'cancelled')
                                        <form action="{{ route('delete.order', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-primary text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    @elseif ($order->status == 'shipping')
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 opacity-50 cursor-not-allowed text-white font-bold py-2 px-4 rounded"
                                                disabled>Cancel</button>
                                        </form>
                                    @else
                                        <form action="{{ route('cancel.order', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-primary text-white font-bold py-2 px-4 rounded">Cancel</button>
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-main>
