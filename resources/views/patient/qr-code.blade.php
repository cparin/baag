@extends('app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h4>Share with Doctor</h4>
            </div>
            <div class="card-body">
                <p>Show this QR code to your doctor to grant access</p>
                <div class="my-4">
                    {!! $qrCode !!}
                </div>
                <p class="text-muted">
                    Expires at: {{ $expiresAt->format('H:i:s') }}
                </p>
                <button onclick="window.location.reload()" class="btn btn-primary">
                    Generate New QR Code
                </button>
            </div>
        </div>
    </div>
@endsection
