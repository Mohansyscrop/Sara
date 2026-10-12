@extends('layouts.admin')

@section('title', 'Contact Enquiries')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059;">Dashboard</a></li>
    <li class="breadcrumb-item active text-muted" aria-current="page">Enquiries</li>
@endsection

@section('content')

    <div class="card-custom p-3 mb-4">
        <form action="{{ route('admin.contacts.index') }}" method="GET">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-12 col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control form-control-sm border-start-0 ps-0" placeholder="Search client name, email, phone, message..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-gold">Search</button>
                    </div>
                </div>

                <div class="col-12 col-md-5 d-flex gap-2">
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">All Statuses</option>
                        @foreach($statuses as $st)
                            <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>

                    <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}" onchange="this.form.submit()" title="Filter by date">

                    @if(request()->hasAny(['search', 'status', 'date']))
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-secondary text-nowrap" title="Clear Filters">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    @endif
                </div>

                <div class="col-12 col-md-2 text-md-end text-muted small">
                    Showing <strong>{{ $contacts->total() }}</strong> total enquiries
                </div>
            </div>
        </form>
    </div>

    <div class="card-custom">
        <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th>Date &amp; Time</th>
                        <th>Client Details</th>
                        <th>Subject</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>
                                <div class="fw-semibold text-dark small">{{ $contact->created_at->format('M d, Y') }}</div>
                                <div class="text-muted" style="font-size: 0.75rem;">{{ $contact->created_at->format('h:i A') }}</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $contact->name }}</div>
                                <div class="small" style="color: #b58d43;"><i class="bi bi-envelope me-1"></i> {{ $contact->email }}</div>
                                @if($contact->phone)
                                    <div class="text-muted small"><i class="bi bi-telephone me-1"></i> {{ $contact->phone }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="text-dark small fw-medium">{{ $contact->subject ?? 'General' }}</div>
                                <div class="text-muted small text-truncate" style="max-width: 250px;">
                                    {{ $contact->message }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border small">
                                    {{ $contact->contact_method ?? 'WhatsApp' }}
                                </span>
                            </td>
                            <td>
                                @if($contact->status == 'New')
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">New</span>
                                @elseif($contact->status == 'In Progress')
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25" style="color: #b58d43 !important;">In Progress</span>
                                @elseif($contact->status == 'Contacted')
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25">Contacted</span>
                                @elseif($contact->status == 'Resolved')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Resolved</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Closed</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-outline-warning" style="border-color: #c5a059; color: #a17c38;" title="View / Respond">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    @can('delete contacts')
                                    <button type="button" class="btn btn-outline-danger" title="Delete" onclick="confirmDeleteEnquiry('{{ $contact->id }}', '{{ addslashes($contact->name) }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @endcan
                                </div>

                                <form id="del-contact-{{ $contact->id }}" action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block text-warning opacity-50 mb-2" style="color: #c5a059 !important;"></i>
                                No customer enquiries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($contacts->hasPages())
            <div class="card-footer bg-transparent border-top p-3 d-flex justify-content-center" style="border-color: #f3f4f6;">
                {{ $contacts->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection

@push('scripts')
<script>
    function confirmDeleteEnquiry(id, name) {
        if (confirm(`Delete enquiry from "${name}"?`)) {
            document.getElementById(`del-contact-${id}`).submit();
        }
    }
</script>
@endpush
