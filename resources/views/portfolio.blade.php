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
        <div class="logo">Portfolio</div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#reviews">Reviews</a></li>
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
                <img src="{{ asset('images/pic.jpeg') }}" alt="Chandupa Jayalath" class="profile-pic">
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
            <div class="review-card">
                <div class="review-quote">"</div>
                <p class="review-text">Exceptional work! The project was delivered on time and exceeded our expectations. Highly professional and skilled developer.</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">JD</div>
                    <div>
                        <strong>John Doe</strong>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>
            <div class="review-card">
                <div class="review-quote">"</div>
                <p class="review-text">Great communication and technical expertise. Transformed our ideas into a beautiful, functional application.</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">SS</div>
                    <div>
                        <strong>Sarah Smith</strong>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>
            <div class="review-card">
                <div class="review-quote">"</div>
                <p class="review-text">Outstanding developer with deep knowledge of Laravel and modern web technologies. Would definitely work again!</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">MJ</div>
                    <div>
                        <strong>Mike Johnson</strong>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>
        </div>
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
        <p>&copy; 2025 Developer Portfolio. All rights reserved.</p>
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
</script>
</body>
</html>
