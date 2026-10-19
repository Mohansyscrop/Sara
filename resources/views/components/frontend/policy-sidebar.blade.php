<!-- ===================== REUSABLE POLICY SIDEBAR ===================== -->
<div class="policy-sidebar">

    <!-- Policy Navigation Card -->
    <div class="policy-nav-card">
        <div class="policy-nav-header">
            <i class="bi bi-shield-check"></i>
            <span>Customer Support &amp; Policies</span>
        </div>
        <ul class="policy-nav-list">
            <li>
                <a href="{{ route('terms') }}" class="policy-nav-link {{ request()->routeIs('terms') ? 'active' : '' }}">
                    <span><i class="bi bi-file-text me-2 text-gold"></i>Terms &amp; Conditions</span>
                    <i class="bi bi-chevron-right chevron"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('privacy') }}" class="policy-nav-link {{ request()->routeIs('privacy') ? 'active' : '' }}">
                    <span><i class="bi bi-shield-lock me-2 text-gold"></i>Privacy Policy</span>
                    <i class="bi bi-chevron-right chevron"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('shipping.policy') }}" class="policy-nav-link {{ request()->routeIs('shipping.policy') ? 'active' : '' }}">
                    <span><i class="bi bi-truck me-2 text-gold"></i>Shipping &amp; Delivery</span>
                    <i class="bi bi-chevron-right chevron"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('refund.policy') }}" class="policy-nav-link {{ request()->routeIs('refund.policy') ? 'active' : '' }}">
                    <span><i class="bi bi-arrow-counterclockwise me-2 text-gold"></i>Refund &amp; Cancellation</span>
                    <i class="bi bi-chevron-right chevron"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('contact.us') }}" class="policy-nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}">
                    <span><i class="bi bi-headset me-2 text-gold"></i>Contact Us &amp; Support</span>
                    <i class="bi bi-chevron-right chevron"></i>
                </a>
            </li>
        </ul>
    </div>

    <!-- Verified Business Details Card -->
    <div class="policy-business-card">
        <div class="policy-biz-title">
            <i class="bi bi-patch-check-fill text-gold"></i>
            <span>Verified Boutique Details</span>
        </div>

        <div class="policy-biz-item">
            <i class="bi bi-shop"></i>
            <div>
                <strong class="text-dark d-block">Sara's Boutique</strong>
                <span class="small text-muted">Shanmugapuram Boutique Store (Est. 2023)</span>
            </div>
        </div>

        <div class="policy-biz-item">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
                <span class="d-block fw-semibold text-dark">Store &amp; Return Address:</span>
                <span>No. 1, 2nd Mani Road, 4th Cross Street, Manikachettyar Nagar, Shanmugapuram, Puducherry – 605009, India.</span>
            </div>
        </div>

        <div class="policy-biz-item">
            <i class="bi bi-telephone-fill"></i>
            <div>
                <span class="d-block small text-muted">Customer Helpline:</span>
                <a href="tel:+919442634491" class="fw-semibold">+91 94426 34491</a>
            </div>
        </div>

        <div class="policy-biz-item">
            <i class="bi bi-whatsapp text-success"></i>
            <div>
                <span class="d-block small text-muted">WhatsApp Concierge:</span>
                <a href="https://wa.me/919442634491?text=Hi%20Saras%20Boutique%2C%20I%20have%20an%20enquiry%20regarding%20orders%20and%20policies." target="_blank" rel="noopener noreferrer" class="fw-semibold text-success">+91 94426 34491</a>
            </div>
        </div>

        <div class="policy-biz-item">
            <i class="bi bi-envelope-fill"></i>
            <div>
                <span class="d-block small text-muted">Official Inquiries &amp; Support:</span>
                <a href="mailto:Sarasboutique2026@gmail.com" class="fw-semibold">Sarasboutique2026@gmail.com</a>
            </div>
        </div>

        <div class="policy-biz-item">
            <i class="bi bi-clock-history"></i>
            <div>
                <span class="d-block small text-muted">Support &amp; Store Hours:</span>
                <span>Monday – Sunday: 10:00 AM – 9:00 PM IST</span>
            </div>
        </div>

        <div class="mt-3 pt-3 border-top text-center">
            <a href="https://maps.google.com/?q=No.+1,+2nd+Mani+Road,+4th+Cross+Street,+Manikachettyar+Nagar,+Shanmugapuram,+Puducherry+605009" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="btn btn-sm w-100 rounded-pill py-2 d-inline-flex align-items-center justify-content-center gap-2"
               style="background: rgba(212,175,55,0.12); border: 1px solid var(--policy-gold); color: #7a5814; font-size: 0.82rem; font-weight: 600;">
                <i class="bi bi-geo-alt-fill text-gold"></i>
                <span>Get Store Directions</span>
            </a>
        </div>
    </div>

    <!-- Razorpay & Safe Checkout Compliance Strip -->
    <div class="p-3 rounded-3 mt-3 text-center" style="background: #ffffff; border: 1px dashed rgba(212,175,55,0.45); font-size: 0.78rem; color: #5e4f66;">
        <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
            <i class="bi bi-shield-check text-success fs-6"></i>
            <strong style="color: var(--policy-plum);">Razorpay Secure Checkout</strong>
        </div>
        <p class="mb-0" style="line-height: 1.45;">256-bit encrypted checkout. PCI-DSS compliant payment processing. We never store card or UPI credentials.</p>
    </div>

</div>
