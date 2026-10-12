@extends('layouts.admin')

@section('title', 'Boutique Settings')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-gold text-decoration-none">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Settings</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif;">Boutique Settings &amp; Global Store Config</h3>
            <p class="text-muted small mb-0">Manage store identity, contact concierge, promotional banners, and currencies.</p>
        </div>
    </div>

    <div class="card-custom p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <h5 class="text-gold font-serif mb-3 border-bottom border-light-subtle pb-2">
                <i class="bi bi-shop me-2"></i>Store Brand &amp; Identity
            </h5>
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-medium text-dark">Store Brand Name</label>
                    <input type="text" class="form-control" name="store_name" value="{{ $settings['store_name'] }}">
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label fw-medium text-dark">Store Tagline / Subtitle</label>
                    <input type="text" class="form-control" name="store_tagline" value="{{ $settings['store_tagline'] }}">
                </div>
            </div>

            <h5 class="text-gold font-serif mb-3 border-bottom border-light-subtle pb-2">
                <i class="bi bi-headset me-2"></i>Helpline &amp; Concierge Contacts
            </h5>
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-4">
                    <label class="form-label fw-medium text-dark">Helpline Phone Number</label>
                    <input type="text" class="form-control" name="helpline_phone" value="{{ $settings['helpline_phone'] }}">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label fw-medium text-dark">WhatsApp Concierge Number</label>
                    <input type="text" class="form-control" name="whatsapp_phone" value="{{ $settings['whatsapp_phone'] }}">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label fw-medium text-dark">Concierge Email</label>
                    <input type="email" class="form-control" name="contact_email" value="{{ $settings['contact_email'] }}">
                </div>
                <div class="col-12">
                    <label class="form-label fw-medium text-dark">Flagship Store Physical Address</label>
                    <input type="text" class="form-control" name="store_address" value="{{ $settings['store_address'] }}">
                </div>
            </div>

            <h5 class="text-gold font-serif mb-3 border-bottom border-light-subtle pb-2">
                <i class="bi bi-stars me-2"></i>Promotional Top Announcement Bar
            </h5>
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-4">
                    <label class="form-label fw-medium text-dark">Active Promo Coupon Code</label>
                    <input type="text" class="form-control" name="promotional_code" value="{{ $settings['promotional_code'] }}">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label fw-medium text-dark">Promotion Discount Highlight</label>
                    <input type="text" class="form-control" name="promotional_discount" value="{{ $settings['promotional_discount'] }}">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label fw-medium text-dark">Base Currency</label>
                    <input type="text" class="form-control" name="currency" value="{{ $settings['currency'] }}">
                </div>
            </div>

            <div class="d-flex justify-content-end pt-3 border-top border-light-subtle">
                <button type="submit" class="btn btn-gold">
                    <i class="bi bi-check2-circle me-1"></i> Save Configuration Settings
                </button>
            </div>
        </form>
    </div>

@endsection
