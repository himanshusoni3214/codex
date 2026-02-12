<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        return Consultation::with(['tier', 'customer'])->paginate(25);
    }

    public function show(Consultation $consultation)
    {
        return $consultation->load(['tier', 'customer']);
    }

    public function update(Request $request, Consultation $consultation)
    {
        $data = $request->validate([
            'status' => ['nullable', 'string'],
            'appointment_at' => ['nullable', 'date'],
            'consultation_tier_id' => ['nullable', 'exists:consultation_tiers,id'],
            'assigned_to_user_id' => ['nullable', 'exists:users,id'],
            'notes' => ['nullable', 'string'],
        ]);

        $consultation->update($data);

        return $consultation->refresh();
    }
}
