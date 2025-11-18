<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Developer Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Navigation -->
<nav>
    <div class="container">
        <div class="logo">Chandupa Jayalath</div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#reviews">Reviews</a></li>
            <li><a href="#write-review">Write Review</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <h1>Hi, I'm a Full Stack Developer</h1>
        <p>Building amazing web applications with modern technologies</p>
        <a href="#contact" class="btn">Get In Touch</a>
    </div>
</section>

<!-- About Section -->
<section id="about">
    <div class="container">
        <h2 class="section-title">About Me</h2>
        <div class="about-content">
            <div class="about-text">
                <p>Hello! I'm a passionate full-stack developer with expertise in building robust and scalable web applications. With years of experience in the industry, I specialize in creating efficient solutions that meet business objectives.</p>
                <p>I have a strong foundation in both frontend and backend technologies, with a particular focus on Laravel, JavaScript, and modern web frameworks. I'm constantly learning and adapting to new technologies to deliver the best solutions.</p>
                <p>When I'm not coding, I enjoy contributing to open-source projects, writing technical blogs, and mentoring aspiring developers.</p>
            </div>
            <div class="about-image">
{{--                <div class="profile-pic" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">👨‍💻</div>--}}
                <img src="{{ asset('images/pic.jpeg') }}" alt="Your Name" class="profile-pic">
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills">
    <div class="container">
        <h2 class="section-title">Skills & Technologies</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>Frontend Development</h3>
                <p>HTML5, CSS3, JavaScript</p>
                <div class="skill-bar"><div class="skill-progress" style="width: 90%"></div></div>
                <p style="margin-top: 0.5rem;">React, Vue.js, Tailwind CSS</p>
                <div class="skill-bar"><div class="skill-progress" style="width: 85%"></div></div>
            </div>
            <div class="skill-card">
                <h3>Backend Development</h3>
                <p>Laravel, PHP</p>
                <div class="skill-bar"><div class="skill-progress" style="width: 95%"></div></div>
                <p style="margin-top: 0.5rem;">Node.js, Express</p>
                <div class="skill-bar"><div class="skill-progress" style="width: 80%"></div></div>
            </div>
            <div class="skill-card">
                <h3>Database & Tools</h3>
                <p>MySQL, PostgreSQL, MongoDB</p>
                <div class="skill-bar"><div class="skill-progress" style="width: 88%"></div></div>
                <p style="margin-top: 0.5rem;">Git, Docker, AWS</p>
                <div class="skill-bar"><div class="skill-progress" style="width: 82%"></div></div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">🛒</div>
                <div class="project-content">
                    <h3>E-Commerce Platform</h3>
                    <p>A full-featured online shopping platform with payment integration, inventory management, and admin dashboard.</p>
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Vue.js</span>
                        <span class="tag">MySQL</span>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">📱</div>
                <div class="project-content">
                    <h3>Social Media Dashboard</h3>
                    <p>Analytics dashboard for managing multiple social media accounts with real-time data visualization.</p>
                    <div class="project-tags">
                        <span class="tag">React</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">MongoDB</span>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">📊</div>
                <div class="project-content">
                    <h3>Project Management Tool</h3>
                    <p>Collaborative project management application with task tracking, team collaboration, and reporting features.</p>
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">JavaScript</span>
                        <span class="tag">PostgreSQL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section id="reviews">
    <div class="container">
        <h2 class="section-title">Client Reviews</h2>
        <div class="reviews-grid">
            @forelse($reviews ?? [] as $review)
                <div class="review-card">
                    <div class="review-quote">"</div>
                    <p class="review-text">{{ $review->review }}</p>
                    <div class="reviewer">
                        <div class="reviewer-avatar">{{ $review->initials }}</div>
                        <div>
                            <strong>{{ $review->name }}</strong>
                            @if($review->position || $review->company)
                                <p style="font-size: 0.9rem; color: #64748b;">
                                    @if($review->position) {{ $review->position }} @endif
                                    @if($review->position && $review->company) at @endif
                                    @if($review->company) {{ $review->company }} @endif
                                </p>
                            @endif
                            <div class="stars">{{ $review->stars }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="review-card">
                    <div class="review-quote">"</div>
                    <p class="review-text">No reviews yet. Be the first to leave a review!</p>
                    <div class="reviewer">
                        <div class="reviewer-avatar">?</div>
                        <div>
                            <strong>Waiting for reviews...</strong>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Write a Review Section -->
<section id="write-review" style="background: var(--light);">
    <div class="container">
        <h2 class="section-title">Write a Review</h2>
        <p style="text-align: center; margin-bottom: 2rem; color: var(--text);">
            Worked with me? Share your experience and help others make informed decisions.
        </p>

        <form class="contact-form" action="{{ route('reviews.submit') }}" method="POST">
            @csrf

            @if(session('success') && request()->is('/') && !session('contact_success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif

            <div class="form-group">
                <label for="review_name">Your Name *</label>
                <input type="text" id="review_name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="review_email">Email *</label>
                <input type="email" id="review_email" name="email" value="{{ old('email') }}" required>
                <small style="color: #64748b;">Your email will not be published</small>
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="review_company">Company</label>
                    <input type="text" id="review_company" name="company" value="{{ old('company') }}">
                    @error('company')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="review_position">Position</label>
                    <input type="text" id="review_position" name="position" value="{{ old('position') }}">
                    @error('position')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="rating">Rating *</label>
                <div class="star-rating" id="starRating">
                    <span class="star" data-value="1">☆</span>
                    <span class="star" data-value="2">☆</span>
                    <span class="star" data-value="3">☆</span>
                    <span class="star" data-value="4">☆</span>
                    <span class="star" data-value="5">☆</span>
                </div>
                <input type="hidden" id="rating" name="rating" value="{{ old('rating', 5) }}" required>
                @error('rating')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="review_text">Your Review *</label>
                <textarea id="review_text" name="review" required>{{ old('review') }}</textarea>
                @error('review')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Submit Review</button>
            <p style="text-align: center; margin-top: 1rem; font-size: 0.9rem; color: #64748b;">
                Your review will be published after approval
            </p>
        </form>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <h2 class="section-title">Get In Touch</h2>
        <form class="contact-form" action="{{ route('contact.send') }}" method="POST">
            @csrf

            @if(session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
                @error('subject')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                @error('message')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <p>&copy; 2025 Chandupa Jayalath Portfolio. All rights reserved.<br> Made with Laravel.</p>
    </div>
</footer>

<script>
    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Skill bar animation on scroll
    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('.skill-progress').forEach(bar => {
                    bar.style.width = bar.style.width;
                });
            }
        });
    }, observerOptions);

    document.querySelectorAll('.skill-card').forEach(card => {
        observer.observe(card);
    });

    // Star rating functionality
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');

    // Set initial rating
    const initialRating = ratingInput.value || 5;
    updateStars(initialRating);

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;
            updateStars(value);
        });

        star.addEventListener('mouseenter', function() {
            const value = this.getAttribute('data-value');
            highlightStars(value);
        });
    });

    document.getElementById('starRating').addEventListener('mouseleave', function() {
        updateStars(ratingInput.value);
    });

    function updateStars(rating) {
        stars.forEach(star => {
            const value = star.getAttribute('data-value');
            if (value <= rating) {
                star.classList.add('active');
                star.textContent = '★';
            } else {
                star.classList.remove('active');
                star.textContent = '☆';
            }
        });
    }

    function highlightStars(rating) {
        stars.forEach(star => {
            const value = star.getAttribute('data-value');
            if (value <= rating) {
                star.textContent = '★';
                star.style.color = '#fbbf24';
            } else {
                star.textContent = '☆';
                star.style.color = '#e2e8f0';
            }
        });
    }
</script>
</body>
</html>
