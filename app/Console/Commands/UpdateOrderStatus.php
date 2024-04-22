<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class UpdateOrderStatus extends Command
{
    protected $signature = 'orders:update-status';
    protected $description = 'Update order statuses based on shipping and completion dates';

    public function handle()
    {
        $today = Carbon::now();

        // Update orders with shipping date reached
        $ordersToShip = Order::where('status', 'pending')
            ->whereDate('possible_shipping_date', '<=', $today)
            ->update(['status' => 'shipping']);

        // Update orders with completion date reached
        $ordersToComplete = Order::where('status', 'shipping')
            ->whereDate('possible_delivery_date', '<=', $today)
            ->update(['status' => 'completed']);

        $this->info('Order statuses updated successfully.');
    }
}
