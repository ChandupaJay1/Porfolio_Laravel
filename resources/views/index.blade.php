<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Portfolio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --dark: #1e293b;
            --light: #f8fafc;
            --text: #334155;
            --border: #e2e8f0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        nav {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 20px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text);
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 120px 0 80px;
            margin-top: 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInUp 0.8s;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s 0.2s backwards;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: white;
            color: var(--primary);
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: transform 0.3s;
            animation: fadeInUp 0.8s 0.4s backwards;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        /* Section Styles */
        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--dark);
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .about-text p {
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .about-image {
            text-align: center;
        }

        .profile-pic {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--primary);
        }

        /* Skills Section */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .skill-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .skill-card:hover {
            transform: translateY(-10px);
        }

        .skill-card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .skill-bar {
            background: var(--border);
            height: 10px;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .skill-progress {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            height: 100%;
            border-radius: 5px;
            transition: width 1s ease;
        }

        /* Projects Section */
        #projects {
            background: var(--light);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .project-card:hover {
            transform: translateY(-10px);
        }

        .project-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-content h3 {
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .project-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .tag {
            background: var(--light);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.85rem;
            color: var(--primary);
        }

        /* Reviews Section */
        .reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .review-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            position: relative;
        }

        .review-quote {
            font-size: 3rem;
            color: var(--primary);
            opacity: 0.3;
            position: absolute;
            top: 10px;
            left: 20px;
        }

        .review-text {
            font-style: italic;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .reviewer {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .stars {
            color: #fbbf24;
        }

        /* Contact Section */
        #contact {
            background: var(--light);
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: 5px;
            font-family: inherit;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            display: none;
        }

        .alert.success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert.error {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            text-align: center;
            padding: 2rem 0;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-content {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .nav-links {
                gap: 1rem;
            }
        }
    </style>
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
                <div class="profile-pic" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">👨‍💻</div>
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
        <form class="contact-form" id="contactForm">
            <div class="alert success" id="successAlert">Message sent successfully!</div>
            <div class="alert error" id="errorAlert">Failed to send message. Please try again.</div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
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
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Form submission
    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('.submit-btn');
        const successAlert = document.getElementById('successAlert');
        const errorAlert = document.getElementById('errorAlert');

        // Hide alerts
        successAlert.style.display = 'none';
        errorAlert.style.display = 'none';

        // Disable button
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        try {
            const response = await fetch('/api/contact', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (response.ok) {
                successAlert.style.display = 'block';
                this.reset();
            } else {
                errorAlert.style.display = 'block';
            }
        } catch (error) {
            errorAlert.style.display = 'block';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Message';
        }
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
