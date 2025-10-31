@extends('app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Confirm Connection</h4>
            </div>
            <div class="card-body">
                <p>Connect with patient:</p>
                <h5>{{ $patient->name }}</h5>
                <p>Email: {{ $patient->email }}</p>

                <form method="POST" action="{{ route('doctor.confirm', $token) }}">
                    @csrf
                    <button type="submit" class="btn btn-success">Confirm Connection</button>
                    <a href="{{ route('doctor.patients') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
