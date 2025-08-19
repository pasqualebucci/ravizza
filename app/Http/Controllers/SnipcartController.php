<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class SnipcartController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Log::info('Snipcart webhook received', [
            'headers' => $request->headers->all(),
            'payload' => $request->all()
        ]);

        $payload = $request->all();
        
        // Handle different event types
        switch ($payload['eventName']) {
            case 'order.completed':
                return $this->handleOrderCompleted($payload);
        }

        return response()->json(['success' => true]);
    }

    private function handleOrderCompleted($payload)
    {
        Log::info('Processing completed order', ['payload' => $payload]);

        try {
            $user = User::where('email', $payload['content']['email'])->first();
            
            $order = Order::create([
                'user_id' => $user ? $user->id : null,
                'snipcart_order_id' => $payload['content']['token'],
                'email' => $payload['content']['email'],
                'total' => $payload['content']['total'],
                'status' => $payload['content']['status'],
                'billing_address' => json_encode($payload['content']['billingAddress']),
                'shipping_address' => json_encode($payload['content']['shippingAddress']),
                'items' => json_encode($payload['content']['items']),
            ]);

            Log::info('Order created successfully', ['order_id' => $order->id]);
            return response()->json(['success' => true, 'order_id' => $order->id]);

        } catch (\Exception $e) {
            Log::error('Failed to create order', [
                'error' => $e->getMessage(),
                'payload' => $payload
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
