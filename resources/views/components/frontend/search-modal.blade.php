<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content search-modal-content p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="modal-title font-serif text-white m-0" style="font-family: var(--heading-font, 'Cormorant Garamond', serif);">Search Collection</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('collections') }}" method="GET" class="position-relative">
                <input type="text" name="search" class="form-control search-input"
                    placeholder="Search silk gowns, churidars, anarkalis, fabrics..."
                    value="{{ request('search') }}" autofocus>
                <button type="submit" class="btn position-absolute top-50 end-0 translate-middle-y me-2 border-0 bg-transparent text-warning" aria-label="Submit search">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <div class="mt-3">
                <span class="small text-white-50 d-block mb-1">Popular Searches:</span>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('collections', ['search' => 'Anarkali']) }}" class="badge bg-secondary bg-opacity-50 text-white text-decoration-none">Anarkali</a>
                    <a href="{{ route('collections', ['fabric' => 'Pure Mulberry Silk']) }}" class="badge bg-secondary bg-opacity-50 text-white text-decoration-none">Banarasi Silk</a>
                    <a href="{{ route('collections', ['search' => 'Bridal']) }}" class="badge bg-secondary bg-opacity-50 text-white text-decoration-none">Bridal Red</a>
                    <a href="{{ route('collections', ['fabric' => 'Handloom Chanderi']) }}" class="badge bg-secondary bg-opacity-50 text-white text-decoration-none">Chanderi</a>
                </div>
            </div>
        </div>
    </div>
</div>
