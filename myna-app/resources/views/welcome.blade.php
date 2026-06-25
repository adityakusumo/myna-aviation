@extends('layouts.app')
@section('title', __('Myna Aviation') . ' — ' . __("Thailand's Premier Aviation Services"))

@section('content')

{{-- ── HERO SECTION (txtav-inspired dark hero) ── --}}
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="hero-logo">
            <img src="{{ asset('images/myna_logo.jpg') }}" alt="Myna Aviation">
        </div>
        <h1 class="hero-title">Myna <strong>Aviation</strong></h1>
        <p class="hero-tagline">{{ __("Thailand's Premier Aviation Services") }}</p>
        <p class="hero-desc">{{ __('Excellence in every flight') }}</p>
        <div class="hero-cta mt-4">
            <a href="#services" class="btn-myna btn-myna-primary" style="padding:.7rem 2rem;">{{ __('Our Services') }}</a>
            <a href="#contact" class="btn-myna btn-myna-light" style="padding:.7rem 2rem;">{{ __('Contact Us') }}</a>
        </div>
    </div>
</section>

{{-- ── SERVICES SECTION (txtav promo-group style) ── --}}
<section id="services" class="services-section">
    <div class="container">
        <div class="section-label text-center">
            <h2>{{ __('Our Services') }}</h2>
            <p class="text-muted">Comprehensive aviation solutions across Thailand</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon" style="background:#e3f2fd;color:var(--myna-blue);">
                        <i class="bi bi-airplane-engines"></i>
                    </div>
                    <h3>Aircraft Charter</h3>
                    <p>Premium charter services throughout Southeast Asia with our fleet of modern aircraft.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon" style="background:#e8f5e9;color:#2e7d32;">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h3>Aircraft Maintenance</h3>
                    <p>FAA & EASA certified maintenance, repair, and overhaul services for all major aircraft types.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon" style="background:#fff3e0;color:#e65100;">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h3>Aviation Consulting</h3>
                    <p>Strategic advisory services for fleet acquisition, route planning, and operational optimization.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon" style="background:#f3e5f5;color:#6a1b9a;">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <h3>Crew Training</h3>
                    <p>Comprehensive training programs for pilots, cabin crew, and ground personnel.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon" style="background:#e0f7fa;color:#00695c;">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3>Ground Handling</h3>
                    <p>Full-service ground operations at major Thai airports including BKK, DMK, CNX, and HKT.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon" style="background:#fbe9e7;color:#bf360c;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>Safety & Compliance</h3>
                    <p>Regulatory compliance auditing, safety management systems, and quality assurance programs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── ABOUT / WHY US (txtav action-bar-style dark section) ── --}}
<section id="about" class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-image-placeholder">
                    <i class="bi bi-airplane"></i>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-label">
                    <h2>{{ __('About Us') }}</h2>
                </div>
                <p class="lead fw-semibold" style="color:var(--myna-blue);">
                    Elevating aviation standards across Thailand since 2015.
                </p>
                <p>
                    Myna Aviation is a premier aviation services company headquartered in Bangkok, Thailand.
                    We deliver world-class solutions in aircraft charter, maintenance, consulting, and training
                    to clients ranging from private owners to major airlines and government agencies.
                </p>
                <p>
                    Our team of certified professionals brings decades of combined experience from leading
                    aviation organizations worldwide. We are committed to safety, excellence, and innovation
                    in every operation we undertake.
                </p>
                <div class="row g-3 mt-3">
                    <div class="col-4 text-center">
                        <div class="stat-number">200+</div>
                        <div class="stat-label">{{ __('Aircraft') }} Serviced</div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">{{ __('Clients') }} Worldwide</div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="stat-number">10</div>
                        <div class="stat-label">{{ __('Years') }} of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── CALL TO ACTION (txtav action-bar style) ── --}}
<section class="cta-section">
    <div class="container text-center">
        <h2>{{ __('Ready to fly with Myna Aviation?') }}</h2>
        <p>{{ __('Contact our team today to discuss your aviation needs.') }}</p>
        <a href="#contact" class="btn-myna btn-myna-light" style="padding:.75rem 2.5rem;font-size:.9rem;">
            {{ __('Get in Touch') }}
        </a>
    </div>
</section>

{{-- ── CONTACT SECTION ── --}}
<section id="contact" class="contact-section">
    <div class="container">
        <div class="section-label text-center">
            <h2>{{ __('Get in Touch') }}</h2>
            <p class="text-muted">{{ __("Let's discuss how we can serve your aviation needs") }}</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form class="contact-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Your Name') }}</label>
                        <input type="text" class="form-control" placeholder="John Smith">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Your Email') }}</label>
                        <input type="email" class="form-control" placeholder="john@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Your Message') }}</label>
                        <textarea class="form-control" rows="4" placeholder="Tell us about your requirements..."></textarea>
                    </div>
                    <button type="submit" class="btn-myna btn-myna-primary w-100">
                        <i class="bi bi-send me-2"></i>{{ __('Send Message') }}
                    </button>
                </form>

                <div class="contact-info mt-4 text-center">
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <div><i class="bi bi-geo-alt me-1" style="color:var(--myna-blue);"></i> Bangkok, Thailand</div>
                        <div><i class="bi bi-envelope me-1" style="color:var(--myna-blue);"></i> contact@myna-aviation.com</div>
                        <div><i class="bi bi-telephone me-1" style="color:var(--myna-blue);"></i> +66 2 123 4567</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* ── HERO ── */
    .hero-section {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        background: var(--myna-dark);
        overflow: hidden;
    }
    .hero-overlay {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 70% 50% at 50% 40%, rgba(18,119,189,.15) 0%, transparent 70%),
            radial-gradient(ellipse 50% 30% at 70% 70%, rgba(200,168,78,.05) 0%, transparent 50%);
        pointer-events: none;
    }
    .hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 4rem 0;
    }
    .hero-logo img {
        height: 80px;
        width: auto;
        border-radius: 50%;
        background: rgba(255,255,255,.95);
        padding: 5px;
        box-shadow: 0 4px 20px rgba(0,0,0,.3);
        margin-bottom: 1rem;
    }
    .hero-title {
        color: #fff;
        font-weight: 300;
        font-size: 3rem;
        letter-spacing: 3px;
        margin: 0;
    }
    .hero-title strong { font-weight: 700; color: var(--myna-blue); }
    .hero-tagline {
        color: var(--myna-gold);
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 4px;
        margin: .5rem 0 .25rem;
        font-weight: 600;
    }
    .hero-desc {
        color: rgba(255,255,255,.5);
        font-size: .95rem;
        margin: 0;
    }
    .hero-cta { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }

    /* ── SECTION LABELS ── */
    .section-label { margin-bottom: 3rem; }
    .section-label h2 {
        font-weight: 700;
        font-size: 1.8rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--myna-dark);
        margin: 0 0 .5rem;
    }

    /* ── SERVICES ── */
    .services-section {
        padding: 5rem 0;
        background: var(--myna-light-gray);
    }
    .service-card {
        background: #fff;
        padding: 2rem 1.5rem;
        text-align: center;
        height: 100%;
        transition: transform .2s, box-shadow .2s;
    }
    .service-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(26,35,50,.12);
    }
    .service-icon {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin: 0 auto 1rem;
    }
    .service-card h3 {
        font-size: 1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: .75rem;
    }
    .service-card p {
        font-size: .85rem;
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    /* ── ABOUT ── */
    .about-section {
        padding: 5rem 0;
        background: #fff;
    }
    .about-image-placeholder {
        background: var(--myna-light-gray);
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: var(--myna-blue);
        opacity: .3;
    }
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--myna-blue);
        line-height: 1;
    }
    .stat-label {
        font-size: .7rem;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #888;
        margin-top: .25rem;
    }

    /* ── CTA ── */
    .cta-section {
        background: var(--myna-dark);
        padding: 4rem 0;
    }
    .cta-section h2 {
        color: #fff;
        font-weight: 700;
        font-size: 1.6rem;
        margin-bottom: .5rem;
    }
    .cta-section p {
        color: rgba(255,255,255,.6);
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    /* ── CONTACT ── */
    .contact-section {
        padding: 5rem 0;
        background: var(--myna-light-gray);
    }
    .contact-info { font-size: .85rem; color: #666; }

    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-tagline { font-size: .8rem; letter-spacing: 2px; }
        .services-section,
        .about-section,
        .contact-section { padding: 3rem 0; }
    }
</style>
@endsection
