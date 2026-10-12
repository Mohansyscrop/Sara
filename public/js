/**
 * SARA'S BOUTIQUE — MODERN 2026 SCROLL ANIMATION ENGINE
 * Lightweight, hardware-accelerated IntersectionObserver animation controller.
 */

(function () {
    'use strict';

    // ── Check for Reduced Motion Preference ───────────────────────────────
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ── Initialize Hero on Page Load ─────────────────────────────────────
    function initHero() {
        if (prefersReducedMotion) {
            document.body.classList.add('hero-ready');
            return;
        }
        // Micro-tick to ensure CSS layout calculation is complete
        requestAnimationFrame(() => {
            setTimeout(() => {
                document.body.classList.add('hero-ready');
            }, 60);
        });
    }

    let observerInstance = null;

    // ── Initialize Scroll Observer ───────────────────────────────────────
    function initScrollObserver() {
        const animatedElements = document.querySelectorAll(
            '.reveal, .reveal-left, .reveal-right, .reveal-scale, .image-reveal, .stagger-group'
        );

        if (!animatedElements.length) return;

        // Fallback if IntersectionObserver is unavailable or reduced motion is enabled
        if (!('IntersectionObserver' in window) || prefersReducedMotion) {
            animatedElements.forEach((el) => el.classList.add('active'));
            return;
        }

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -30px 0px',
            threshold: 0.08
        };

        if (observerInstance) {
            observerInstance.disconnect();
        }

        observerInstance = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const target = entry.target;

                    // If it is a stagger group, dynamically apply gentle delays to items
                    if (target.classList.contains('stagger-group')) {
                        const items = target.querySelectorAll('.stagger-item, .stagger-item-left');
                        items.forEach((item, index) => {
                            item.style.transitionDelay = `${(index * 0.10) + 0.05}s`;
                        });
                    }

                    target.classList.add('active');
                    obs.unobserve(target); // Performance: Unobserve once active
                }
            });
        }, observerOptions);

        animatedElements.forEach((element) => {
            if (!element.classList.contains('active')) {
                observerInstance.observe(element);
            }
        });
    }

    // Expose global observer refresh for dynamic rendering (e.g. collection page filter changes)
    window.refreshScrollAnimations = function () {
        if (!prefersReducedMotion && 'IntersectionObserver' in window) {
            initScrollObserver();
        }
    };

    // ── Smooth Anchor Scroll Offset (Accounting for sticky luxury header) ──
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]:not([href="#"]):not([data-bs-toggle])').forEach((anchor) => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (!targetId || targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    const headerOffset = 90;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // ── Bootstrapping ─────────────────────────────────────────────────────
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initHero();
            initScrollObserver();
            initSmoothScroll();
        });
    } else {
        initHero();
        initScrollObserver();
        initSmoothScroll();
    }
})();
