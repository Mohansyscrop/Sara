@extends('layouts.app')

@section('title', "Page Not Found | Sara's Boutique")

@section('content')
    <section class="py-5 text-center my-5" style="min-height: 50vh; display: flex; align-items: center;">
        <div class="container">
            <div class="reveal-scale">
                <span class="fs-1 text-gold mb-2 d-block"><i class="bi bi-flower1"></i></span>
                <h1 class="display-3 font-serif fw-bold text-dark mb-3" style="font-family: var(--heading-font);">404</h1>
                <h3 class="font-serif text-gold mb-3" style="font-family: var(--heading-font);">Ensemble Not Found</h3>
                <p class="text-muted mx-auto mb-4" style="max-width: 500px;">
                    The couture piece or page you are looking for may have been moved, updated, or is no longer available in our collection.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-dark rounded-pill px-4 py-2">
                        <i class="bi bi-house me-1"></i> Return Home
                    </a>
                    <a href="{{ route('collections') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                        <i class="bi bi-bag me-1"></i> Explore Collections
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
