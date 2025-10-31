<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorPatientConnection;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DoctorPatientConnectionController extends Controller
{
    // Patient generates QR code
    public function generateQrCode()
    {
        // Get user ID from session instead of auth()->id()
        $userId = session()->get('profile')->id ?? null;

        if (!$userId) {
            return redirect('/auth')->with('error', 'Please login first');
        }

        $token = Str::random(32);

        $connection = DoctorPatientConnection::create([
            'token' => $token,
            'patient_id' => $userId,
            'expires_at' => now()->addMinutes(15),
        ]);

        $qrUrl = route('doctor.connect', ['token' => $token]);

        return view('patient.qr-code', [
            'qrCode' => QrCode::size(300)->generate($qrUrl),
            'token' => $token,
            'expiresAt' => $connection->expires_at
        ]);
    }

    // Doctor scans QR code
    public function connectDoctor($token)
    {
        $connection = DoctorPatientConnection::where('token', $token)
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->firstOrFail();

        return view('doctor.confirm-connection', [
            'patient' => $connection->patient,
            'token' => $token
        ]);
    }

    // Doctor confirms connection
    public function confirmConnection(Request $request, $token)
    {
        $userId = session()->get('profile')->id ?? null;

        if (!$userId) {
            return redirect('/auth')->with('error', 'Please login first');
        }

        $connection = DoctorPatientConnection::where('token', $token)
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->firstOrFail();

        $connection->update([
            'doctor_id' => $userId,
            'status' => 'active'
        ]);

        return redirect()->route('doctor.patients')->with('success', 'Successfully connected with patient');
    }

    // View connected patients (for doctor)
    public function myPatients()
    {
        $userId = session()->get('profile')->id ?? null;

        if (!$userId) {
            return redirect('/auth')->with('error', 'Please login first');
        }

        $connections = DoctorPatientConnection::where('doctor_id', $userId)
            ->where('status', 'active')
            ->with('patient')
            ->get();

        return view('doctor.patients', compact('connections'));
    }

    // Revoke access
    public function revokeAccess($connectionId)
    {
        $userId = session()->get('profile')->id ?? null;

        if (!$userId) {
            return redirect('/auth')->with('error', 'Please login first');
        }

        $connection = DoctorPatientConnection::findOrFail($connectionId);

        if ($connection->patient_id === $userId || $connection->doctor_id === $userId) {
            $connection->update(['status' => 'revoked']);
            return back()->with('success', 'Connection revoked successfully');
        }

        abort(403);
    }
}
