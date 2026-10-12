@extends('layouts.admin')

@section('title', 'Enquiry Details: ' . $contact->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}" class="text-decoration-none" style="color: #c5a059;">Enquiries</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Enquiry #{{ $contact->id }}</li>
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="font-serif text-dark m-0" style="font-family: 'Cinzel', serif; font-weight: 600;">Enquiry from {{ $contact->name }}</h3>
            <p class="text-muted small mb-0">Received on {{ $contact->created_at->format('M d, Y \a\t h:i A') }} ({{ $contact->created_at->diffForHumans() }})</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
            <i class="bi bi-arrow-left me-1"></i> Back to Enquiries
        </a>
    </div>

    <div class="row g-4">
        <!-- Left Column: Message Content -->
        <div class="col-12 col-lg-8">
            <div class="card-custom p-4 mb-4">
                <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                    <i class="bi bi-chat-left-quote me-1"></i> Client Message
                </h5>

                <div class="mb-3">
                    <strong class="text-muted small d-block">Subject:</strong>
                    <div class="fs-5 text-dark fw-bold">{{ $contact->subject ?? 'General Inquiry' }}</div>
                </div>

                <div class="mb-4">
                    <strong class="text-muted small d-block mb-1">Message Body:</strong>
                    <div class="p-3 rounded-3 bg-light border text-dark" style="border-color: #e5e7eb !important; white-space: pre-wrap; font-size: 0.95rem; line-height: 1.6;">
                        {{ $contact->message }}
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 pt-2">
                    @if($contact->email)
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject ?? 'Sara\'s Boutique Inquiry') }}" class="btn btn-outline-secondary btn-sm bg-white" style="border-color: #d1d5db;">
                            <i class="bi bi-envelope me-1"></i> Reply via Email
                        </a>
                    @endif
                    @if($contact->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="btn btn-outline-success btn-sm bg-white">
                            <i class="bi bi-whatsapp me-1"></i> Chat on WhatsApp
                        </a>
                        <a href="tel:{{ $contact->phone }}" class="btn btn-outline-info btn-sm bg-white">
                            <i class="bi bi-telephone me-1"></i> Call Client
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column: Status & Concierge Notes -->
        <div class="col-12 col-lg-4">
            <div class="card-custom p-4 mb-4">
                <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                    <i class="bi bi-person-lines-fill me-1"></i> Client Details
                </h5>

                <ul class="list-unstyled text-dark small mb-0">
                    <li class="mb-2"><strong>Name:</strong> {{ $contact->name }}</li>
                    <li class="mb-2"><strong>Email:</strong> <a href="mailto:{{ $contact->email }}" style="color: #b58d43;">{{ $contact->email }}</a></li>
                    <li class="mb-2"><strong>Phone:</strong> {{ $contact->phone ?? 'Not provided' }}</li>
                    <li class="mb-2"><strong>Preferred Channel:</strong> <span class="badge bg-light text-secondary border">{{ $contact->contact_method ?? 'WhatsApp' }}</span></li>
                    <li><strong>Submitted:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</li>
                </ul>
            </div>

            <div class="card-custom p-4">
                <h5 class="font-serif mb-3 border-bottom pb-2" style="font-family: 'Cinzel', serif; color: #b58d43; border-color: #f3f4f6 !important; font-weight: 600;">
                    <i class="bi bi-clipboard-check me-1"></i> Status &amp; Admin Notes
                </h5>

                <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="status" class="form-label">Workflow Status</label>
                        <select name="status" id="status" class="form-select">
                            @foreach($statuses as $st)
                                <option value="{{ $st }}" {{ $contact->status == $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Internal Concierge Notes</label>
                        <textarea name="admin_notes" id="admin_notes" rows="4" class="form-control" placeholder="Add private notes about callback, bridal sizing request, bespoke requirements...">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-gold w-100 shadow-sm">
                        <i class="bi bi-check2 me-1"></i> Update Status &amp; Notes
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
