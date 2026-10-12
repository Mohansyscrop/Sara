@extends('layouts.app')

@section('title', "Access Forbidden | Sara's Boutique")

@section('content')
    <section class="py-5 text-center my-5" style="min-height: 50vh; display: flex; align-items: center;">
        <div class="container">
            <div class="reveal-scale">
                <span class="fs-1 text-danger mb-2 d-block"><i class="bi bi-shield-x"></i></span>
                <h1 class="display-3 font-serif fw-bold text-dark mb-3" style="font-family: var(--heading-font);">403</h1>
                <h3 class="font-serif text-gold mb-3" style="font-family: var(--heading-font);">Access Restricted</h3>
                <p class="text-muted mx-auto mb-4" style="max-width: 500px;">
                    You do not have the required administrative permissions to access this boutique portal section.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-dark rounded-pill px-4 py-2">
                        <i class="bi bi-house me-1"></i> Return Home
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                            <i class="bi bi-speedometer2 me-1"></i> Go to Dashboard
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection
