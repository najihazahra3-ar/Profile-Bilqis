<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Mahasiswa Multimedia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="#home">{{ $profile->brand_name }}<span>{{ $profile->brand_accent }}</span></a>
        <nav class="nav-menu" id="navMenu">
            <a href="#about">About</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#skills">Skills</a>
            <a href="#contact">Contact</a>
            <a href="{{ route('login') }}">Admin</a>
        </nav>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="hero-copy reveal">
                <p class="eyebrow">{{ $profile->hero_eyebrow }}</p>
                <h1>{{ $profile->owner_name }}</h1>
                <p class="hero-text">{{ $profile->hero_description }}</p>
                <a class="primary-button" href="#portfolio">Lihat Portfolio</a>
            </div>
            <div class="hero-visual reveal">
                <canvas id="heroCharacter" data-model-image="{{ asset('images/hero-whatsapp.jpeg') }}" aria-label="Model 3D dari foto portfolio"></canvas>
            </div>
        </section>

        <section class="section about" id="about">
            <div class="section-heading reveal">
                <p class="eyebrow">About Me</p>
                <h2>{{ $profile->about_heading }}</h2>
            </div>
            <div class="about-grid">
                <div class="profile-card reveal">
                    <div class="avatar-orbit">
                        @if ($profile->avatar_image)
                            <img class="avatar-face avatar-photo" src="{{ asset('storage/'.$profile->avatar_image) }}" alt="Foto {{ $profile->owner_name }}">
                        @else
                            <div class="avatar-face">{{ $profile->resolved_initials }}</div>
                        @endif
                    </div>
                    <h3>{{ $profile->owner_name }}</h3>
                    <p>{{ $profile->profile_summary }}</p>
                </div>
                <div class="about-card reveal">
                    <h3>{{ $profile->story_title }}</h3>
                    <p>{{ $profile->story_text }}</p>
                    <div class="interest-list">
                        @foreach (($profile->interests ?? []) as $interest)
                            <span>{{ $interest }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="portfolio">
            <div class="section-heading reveal">
                <p class="eyebrow">Portfolio</p>
                <h2>Pengalaman panitia dan karya dokumentasi.</h2>
            </div>
            <div class="portfolio-grid">
                @forelse ($experiences as $experience)
                    <article class="portfolio-card reveal">
                                <div class="card-image">
                            @php
                                $experienceImages = $experience->image_paths;
                            @endphp
                            @if (count($experienceImages) > 0)
                                <div class="carousel" data-autoplay="5000">
                                    <div class="carousel-track">
                                        @foreach ($experienceImages as $imagePath)
                                            <div class="carousel-slide">
                                                <img src="{{ asset('storage/'.$imagePath) }}" alt="Dokumentasi {{ $experience->event_name }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if (count($experienceImages) > 1)
                                        <button class="carousel-button prev" type="button" aria-label="Sebelumnya">‹</button>
                                        <button class="carousel-button next" type="button" aria-label="Berikutnya">›</button>
                                        <div class="carousel-indicators">
                                            @foreach ($experienceImages as $imagePath)
                                                <button type="button" class="indicator @if ($loop->first) active @endif"></button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <span>{{ $experience->year }}</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <p class="card-year">{{ $experience->year }}</p>
                            <h3>{{ $experience->event_name }}</h3>
                            <p class="role">{{ $experience->position }}</p>
                            <p>{{ $experience->description }}</p>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">Belum ada pengalaman acara. Tambahkan dari dashboard admin.</p>
                @endforelse
            </div>
        </section>

        <section class="section mini-portfolio">
            <div class="section-heading reveal">
                <p class="eyebrow">Selected Works</p>
                <h2>Karya kreatif pilihan.</h2>
            </div>
            <div class="portfolio-grid compact">
                @forelse ($portfolios as $portfolio)
                    <article class="portfolio-card reveal">
                        <div class="card-image">
                            @php
                                $portfolioImages = $portfolio->image_paths;
                            @endphp
                            @if (count($portfolioImages) > 0)
                                <div class="carousel" data-autoplay="5000">
                                    <div class="carousel-track">
                                        @foreach ($portfolioImages as $imagePath)
                                            <div class="carousel-slide">
                                                <img src="{{ asset('storage/'.$imagePath) }}" alt="{{ $portfolio->title }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if (count($portfolioImages) > 1)
                                        <button class="carousel-button prev" type="button" aria-label="Sebelumnya">‹</button>
                                        <button class="carousel-button next" type="button" aria-label="Berikutnya">›</button>
                                        <div class="carousel-indicators">
                                            @foreach ($portfolioImages as $imagePath)
                                                <button type="button" class="indicator @if ($loop->first) active @endif"></button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <span>{{ $portfolio->year }}</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <p class="card-year">{{ $portfolio->year }}</p>
                            <h3>{{ $portfolio->title }}</h3>
                            <p class="role">{{ $portfolio->role }}</p>
                            <p>{{ $portfolio->description }}</p>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">Belum ada portfolio. Tambahkan dari dashboard admin.</p>
                @endforelse
            </div>
        </section>

        <section class="section skills" id="skills">
            <div class="section-heading reveal">
                <p class="eyebrow">Skills</p>
                <h2>Tools dan kemampuan yang sering dipakai.</h2>
            </div>
            <div class="skill-list reveal">
                @forelse ($skills as $skill)
                    <div class="skill-item">
                        <div>
                            <strong>{{ $skill->name }}</strong>
                            <span>{{ $skill->level }}%</span>
                        </div>
                        <div class="progress"><span style="width: {{ $skill->level }}%"></span></div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada skill. Tambahkan dari dashboard admin.</p>
                @endforelse
            </div>
        </section>

        <section class="section contact" id="contact">
            <div class="contact-panel reveal">
                <p class="eyebrow">Contact</p>
                <h2>Mari terhubung untuk kolaborasi kreatif.</h2>
                <div class="contact-list">
                    <a href="tel:{{ $contact?->phone ?? '081234567890' }}">{{ $contact?->phone ?? '081234567890' }}</a>
                    <a href="mailto:{{ $contact?->email ?? 'hello@portfolio.test' }}">{{ $contact?->email ?? 'hello@portfolio.test' }}</a>
                    <a href="https://instagram.com/{{ ltrim($contact?->instagram ?? 'aesthetic.portfolio', '@') }}" target="_blank">{{ $contact?->instagram ?? '@aesthetic.portfolio' }}</a>
                </div>
                <a class="whatsapp-button" target="_blank" href="https://wa.me/{{ $contact?->whatsapp ?? '6281234567890' }}">Chat WhatsApp</a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <p>&copy; {{ date('Y') }} {{ $profile->footer_name }}. All rights reserved.</p>
        <div>
            <a href="#home">Home</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#contact">Contact</a>
        </div>
    </footer>

    <script src="https://unpkg.com/three@0.160.0/build/three.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
