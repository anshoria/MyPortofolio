<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'template_id' => 'required|exists:projects,id',
            'template_name' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'business_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);
        
        $project = Projects::find($validated['template_id']);
        $validated['final_price'] = $project->final_price; // Tambahkan price ke data

        $order = Order::create($validated);

        // Format nomor telepon
        $phone = config('services.fonnte.phone');

        // Kirim pesan WhatsApp via Fonnte
        try {
            $response = Http::withHeaders([
                'Authorization' => config('services.fonnte.token')
            ])->withoutVerifying()
            ->post('https://api.fonnte.com/send', [
                'target' => $phone,
                'message' => $this->generateMessage($request->template_name, $validated),
            ]);

            if ($response->failed()) {
                throw new \Exception('Failed to send WhatsApp message');
            }

            session()->flash('success', 'Thank you for your order! I will process it shortly. 🙏');

            return response()->json([
                'message' => 'Order submitted successfully',
                'order' => $order
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order created but failed to send WhatsApp message',
                'order' => $order
            ], 201);
        }
    }

    private function generateMessage($templateName, $data)
    {
        $price = number_format($data['final_price'], 0, ',', '.'); // Format price
        return "🎯 *New Template Order*\n\n" .
               "Template: *{$templateName}*\n" .
               "Price: *Rp{$price}*\n\n" .
               "😎 *Pelanggan*\n" .
               "Name: *{$data['name']}*\n" .
               "Email: *{$data['email']}*\n" .
               "Phone: *{$data['phone']}*\n" .
               "Business: *" . ($data['business_name'] ?? 'Not provided') . "*\n" .
               "Notes: *" . ($data['notes'] ?? 'No additional notes') . "*\n\n" .
               "New order received!";
    }
}