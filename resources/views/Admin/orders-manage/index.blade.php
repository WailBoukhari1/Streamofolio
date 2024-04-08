    <x-main>
        <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
            <div class="container mx-auto">
                <!-- Page Title -->
                <div class="mb-7">
                    <h2
                        class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                        Admin <span class="text-primary">Orders Management</span>
                    </h2>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Table Head -->
                        <thead class="bg-gray-200 dark:bg-gray-800">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                    Order ID</th>
                                <th
                                    class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                    Customer</th>
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
                                    Total</th>
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
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                        {{ $order->id }}
                                    </td>
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                        {{ $order->user->client->first_name }} {{ $order->user->client->last_name  }} <br>
                                        <small>{{ $order->user->email }}</small>
                                    </td>
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                        <ul>
                                            @foreach ($order->items as $item)
                                            - <li>{{ $item->name }} (Qty: {{ $item->quantity }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                        <!-- Display Status Badge -->              @if ($order->status == 'pending')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">Pending</span>
                                    @elseif($order->status == 'processing')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-700 text-white">Processing</span>
                                    @elseif($order->status == 'completed')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">Completed</span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">Cancelled</span>
                                    @endif                               </td>
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                        {{ $order->payment_method }}
                                    </td>
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                        ${{ $order->total_price_after_discount }}
                                    </td>
                                    <td class="px-6 py-4 text-lg text-gray-900 dark:text-white flex space-x-2">
                                        @if ($order->status == 'pending')
                                            <form action="{{ route('orders-validate', $order->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Validate</button>
                                            </form>
                                        @elseif ($order->status == 'cancelled')
                                            <form action="{{ route('delete.orders', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mark
                                                    as Completed</button>
                                            </form>
                                        @elseif ($order->status == 'completed')
                                            <form action="{{ route('delete.orders', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mark
                                                    as Completed</button>
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
