<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\DoctorPatientConnection;

class CheckDoctorPatientConnection
{
    public function handle($request, Closure $next)
    {
        $patientId = $request->route('patientId');

        $hasAccess = DoctorPatientConnection::where('doctor_id', auth()->id())
            ->where('patient_id', $patientId)
            ->where('status', 'active')
            ->exists();

        if (!$hasAccess) {
            abort(403, 'You do not have access to this patient data');
        }

        return $next($request);
    }
}
