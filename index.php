<?php
/**
 * Main Interactive Portfolio Entry Point
 * Nik Nik Vishal - Full-Stack Web Developer
 */
require_once __DIR__ . '/config/config.php';
$config = get_portfolio_config();
$site = $config['site'];
$profile = $config['profile'];

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ==========================================================================
     HERO SECTION (Cinematic 3D Interactive Presentation)
     ========================================================================== -->
<section id="hero" class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <!-- Left Column: Hero Content & CTA -->
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fa-solid fa-code"></i>
                    <span><?= htmlspecialchars($profile['greeting']) ?></span>
                </div>

                <h1 class="hero-name gradient-text">
                    <?= htmlspecialchars($profile['name']) ?>
                </h1>

                <div class="hero-title-wrapper">
                    <div class="hero-title">
                        <span class="pulse-dot"></span>
                        <span><?= htmlspecialchars($profile['title']) ?></span>
                    </div>
                </div>

                <p class="hero-desc">
                    <?= htmlspecialchars($profile['tagline']) ?>
                </p>

                <div class="hero-cta-group">
                    <a href="#projects" class="btn btn-primary">
                        <span>View My Work</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        <span>Contact Me</span>
                        <i class="fa-solid fa-paper-plane"></i>
                    </a>
                </div>

                <!-- Social Links -->
                <div class="hero-socials">
                    <?php foreach ($config['socials'] as $soc): ?>
                        <a href="<?= htmlspecialchars($soc['url']) ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="<?= htmlspecialchars($soc['name']) ?>" title="<?= htmlspecialchars($soc['name']) ?>">
                            <i class="<?= htmlspecialchars($soc['icon']) ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right Column: Interactive 3D Avatar Arena -->
            <div class="avatar-arena">
                <div class="avatar-halo-ring"></div>

                <!-- Floating Micro Tech Badges -->
                <div class="floating-badge badge-top-left">
                    <i class="fa-solid fa-cubes" style="color: var(--neon-purple);"></i>
                    <span>Full-Stack</span>
                </div>

                <div class="floating-badge badge-bottom-right">
                    <i class="fa-solid fa-bolt-lightning" style="color: var(--neon-blue);"></i>
                    <span>Three.js 3D</span>
                </div>

                <div class="floating-badge badge-center-left">
                    <i class="fa-solid fa-shield-halved" style="color: var(--neon-pink);"></i>
                    <span>Clean Code</span>
                </div>

                <!-- WebGL 3D Canvas Container -->
                <div id="avatar-container" class="avatar-canvas-container" title="Interactive 3D Avatar - Move cursor to interact">
                    <!-- Fallback image (handled gracefully by WebGL shader or direct img fallback) -->
                    <noscript>
                        <img src="<?= htmlspecialchars($profile['avatar_image']) ?>" alt="<?= htmlspecialchars($profile['name']) ?>" style="width: 100%; height: 100%; object-fit: contain;">
                    </noscript>
                </div>

                <!-- Avatar Reaction State Pill -->
                <div class="avatar-state-pill">
                    <span class="pulse-dot"></span>
                    <span id="avatar-state-text">Neutral / Idle Float</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     ABOUT SECTION
     ========================================================================== -->
<section id="about" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-user"></i> Discover</span>
            <h2 class="section-title">About Me</h2>
            <p class="section-desc">Passionate Full-Stack Developer turning ideas into real-world, high-performance digital experiences.</p>
        </div>

        <div class="about-grid">
            <div class="about-card">
                <div class="about-quote">
                    <i class="fa-solid fa-quote-left"></i>
                    <?= htmlspecialchars($profile['about']) ?>
                </div>

                <div class="about-details">
                    <div class="about-detail-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><strong>Location:</strong> <?= htmlspecialchars($profile['location']) ?></span>
                    </div>
                    <div class="about-detail-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span><strong>Status:</strong> <?= htmlspecialchars($profile['status']) ?></span>
                    </div>
                </div>

                <div class="stats-grid">
                    <?php foreach ($config['statistics'] as $stat): ?>
                        <div class="stat-card">
                            <i class="<?= htmlspecialchars($stat['icon']) ?> stat-icon" style="color: <?= htmlspecialchars($stat['accent']) ?>;"></i>
                            <div class="stat-number" data-target="<?= $stat['numeric'] ?>" data-suffix="<?= strpos($stat['number'], '+') !== false ? '+' : (strpos($stat['number'], '%') !== false ? '%' : '') ?>">
                                <?= htmlspecialchars($stat['number']) ?>
                            </div>
                            <div class="stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Terminal Developer Code Showcase -->
            <div class="dev-terminal">
                <div class="terminal-header">
                    <span class="terminal-dot dot-red"></span>
                    <span class="terminal-dot dot-yellow"></span>
                    <span class="terminal-dot dot-green"></span>
                    <span class="terminal-title">nik_nik_vishal.php</span>
                </div>
                <div class="terminal-body">
                    <p><span class="code-keyword">&lt;?php</span></p>
                    <p><span class="code-comment">// Developer Configuration & Skillset</span></p>
                    <p><span class="code-keyword">namespace</span> <span class="code-func">Portfolio\Core</span>;</p>
                    <br>
                    <p><span class="code-keyword">class</span> <span class="code-func">DeveloperProfile</span> {</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public string</span> <span class="code-var">$name</span> = <span class="code-string">"<?= htmlspecialchars($profile['name']) ?>"</span>;</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public string</span> <span class="code-var">$role</span> = <span class="code-string">"<?= htmlspecialchars($profile['title']) ?>"</span>;</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public string</span> <span class="code-var">$location</span> = <span class="code-string">"<?= htmlspecialchars($profile['location']) ?>"</span>;</p>
                    <br>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public function</span> <span class="code-func">deliverExcellence</span>(): <span class="code-keyword">bool</span> {</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-func">writeCleanCode</span>();</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-func">ensureResponsiveDesign</span>();</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-func">buildFastBackends</span>();</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-keyword">return true</span>;</p>
                    <p>&nbsp;&nbsp;}</p>
                    <p>}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SKILLS SECTION
     ========================================================================== -->
<section id="skills" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-code"></i> Technical Stack</span>
            <h2 class="section-title">My Skills</h2>
            <p class="section-desc">A comprehensive toolkit spanning robust server architecture, interactive modern frontends, and design precision.</p>
        </div>

        <div class="skills-container">
            <?php foreach ($config['skills'] as $cat_key => $cat): ?>
                <div class="skills-category">
                    <div class="category-header">
                        <i class="<?= htmlspecialchars($cat['category_icon']) ?> category-icon"></i>
                        <h3 class="category-title"><?= htmlspecialchars($cat['category_title']) ?></h3>
                    </div>

                    <div class="skills-cards-grid">
                        <?php foreach ($cat['items'] as $skill): ?>
                            <div class="skill-card">
                                <div class="skill-header">
                                    <div class="skill-name-wrap">
                                        <i class="<?= htmlspecialchars($skill['icon']) ?> skill-icon" style="color: <?= htmlspecialchars($skill['color']) ?>;"></i>
                                        <span class="skill-name"><?= htmlspecialchars($skill['name']) ?></span>
                                    </div>
                                    <span class="skill-percent"><?= $skill['level'] ?>%</span>
                                </div>
                                <p class="skill-desc"><?= htmlspecialchars($skill['desc']) ?></p>
                                <div class="skill-bar-bg">
                                    <div class="skill-bar-fill" data-width="<?= $skill['level'] ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICES SECTION ("What I Do")
     ========================================================================== -->
<section id="services" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-cubes"></i> Offerings</span>
            <h2 class="section-title">What I Do</h2>
            <p class="section-desc">Tailored web solutions engineered for speed, clean aesthetics, and seamless user experiences.</p>
        </div>

        <div class="services-grid">
            <?php foreach ($config['services'] as $service): ?>
                <div class="service-card">
                    <div>
                        <div class="service-icon-box">
                            <i class="<?= htmlspecialchars($service['icon']) ?>"></i>
                        </div>
                        <h3 class="service-title"><?= htmlspecialchars($service['title']) ?></h3>
                        <p class="service-desc"><?= htmlspecialchars($service['description']) ?></p>
                    </div>

                    <ul class="service-features">
                        <?php foreach ($service['features'] as $feat): ?>
                            <li><i class="fa-solid fa-check"></i> <?= htmlspecialchars($feat) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FEATURED PROJECTS SECTION
     ========================================================================== -->
<section id="projects" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-folder-open"></i> Portfolio</span>
            <h2 class="section-title">Featured Projects</h2>
            <p class="section-desc">A selection of recent projects built with modern web technologies, responsive layouts, and robust backends.</p>
        </div>

        <div class="projects-grid">
            <?php foreach ($config['projects'] as $proj): ?>
                <div class="project-card">
                    <div class="project-mockup-wrapper">
                        <span class="project-category-badge"><?= htmlspecialchars($proj['category']) ?></span>
                        <?php if (!empty($proj['live_url']) && $proj['live_url'] !== '#'): ?>
                            <a href="<?= htmlspecialchars($proj['live_url']) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= htmlspecialchars($proj['title']) ?> Live Demo">
                                <img src="<?= htmlspecialchars($proj['image']) ?>" alt="<?= htmlspecialchars($proj['title']) ?>" class="project-img" loading="lazy">
                            </a>
                        <?php else: ?>
                            <img src="<?= htmlspecialchars($proj['image']) ?>" alt="<?= htmlspecialchars($proj['title']) ?>" class="project-img" loading="lazy">
                        <?php endif; ?>
                    </div>

                    <div class="project-content">
                        <h3 class="project-title">
                            <?php if (!empty($proj['live_url']) && $proj['live_url'] !== '#'): ?>
                                <a href="<?= htmlspecialchars($proj['live_url']) ?>" target="_blank" rel="noopener noreferrer" class="project-title-link">
                                    <?= htmlspecialchars($proj['title']) ?>
                                    <i class="fa-solid fa-arrow-up-right-from-square title-external-icon"></i>
                                </a>
                            <?php else: ?>
                                <?= htmlspecialchars($proj['title']) ?>
                            <?php endif; ?>
                        </h3>
                        <p class="project-desc"><?= htmlspecialchars($proj['description']) ?></p>

                        <div class="project-tech-tags">
                            <?php foreach ($proj['technologies'] as $tech): ?>
                                <span class="tech-tag"><?= htmlspecialchars($tech) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <div class="project-actions">
                            <?php if (!empty($proj['live_url']) && $proj['live_url'] !== '#'): ?>
                                <a href="<?= htmlspecialchars($proj['live_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-project">
                                    <span>Live Demo</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($proj['github_url'])): ?>
                                <a href="<?= htmlspecialchars($proj['github_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-project" aria-label="GitHub Repository">
                                    <i class="fa-brands fa-github"></i>
                                    <span>Code</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
     EXPERIENCE SECTION (Laser Timeline)
     ========================================================================== -->
<section id="experience" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-briefcase"></i> Background</span>
            <h2 class="section-title">Experience</h2>
            <p class="section-desc">Focused expertise in full-stack architecture, clean coding practices, and production deployment.</p>
        </div>

        <div class="timeline-container">
            <?php foreach ($config['experience'] as $exp): ?>
                <div class="timeline-item">
                    <div class="timeline-node"></div>
                    <div class="timeline-content">
                        <span class="timeline-period"><?= htmlspecialchars($exp['period']) ?></span>
                        <h3 class="timeline-title"><?= htmlspecialchars($exp['role']) ?></h3>
                        <h4 class="timeline-subtitle"><?= htmlspecialchars($exp['subtitle']) ?></h4>
                        <p class="timeline-desc"><?= htmlspecialchars($exp['description']) ?></p>

                        <div class="timeline-skills-list">
                            <?php foreach ($exp['skills'] as $skill_chip): ?>
                                <span class="timeline-skill-chip"><?= htmlspecialchars($skill_chip) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
     CONTACT SECTION
     ========================================================================== -->
<section id="contact" class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-paper-plane"></i> Connect</span>
            <h2 class="section-title">Let's Work Together</h2>
            <p class="section-desc">Have a project in mind? Let's build something amazing together.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-info-card">
                <div>
                    <h3 class="contact-lead-title">Ready to launch your next project?</h3>
                    <p class="contact-lead-text">
                        "<?= htmlspecialchars($profile['about']) ?>"
                    </p>

                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="contact-icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <div class="contact-label">Location</div>
                                <div class="contact-value"><?= htmlspecialchars($profile['location']) ?></div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-box">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <div>
                                <div class="contact-label">Availability</div>
                                <div class="contact-value"><?= htmlspecialchars($profile['status']) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-social-icons">
                    <?php foreach ($config['socials'] as $soc): ?>
                        <a href="<?= htmlspecialchars($soc['url']) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="<?= htmlspecialchars($soc['name']) ?>">
                            <i class="<?= htmlspecialchars($soc['icon']) ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-card">
                <form id="portfolio-contact-form" method="POST" action="contact.php" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                    <div class="form-group">
                        <label for="contact-name" class="form-label">Your Name</label>
                        <input type="text" id="contact-name" name="name" class="form-control" placeholder="e.g. Alex Morgan" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-email" class="form-label">Email Address</label>
                        <input type="email" id="contact-email" name="email" class="form-control" placeholder="name@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-message" class="form-label">Your Message</label>
                        <textarea id="contact-message" name="message" class="form-control" placeholder="Tell me about your project, goals, or timeline..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-submit">
                        <span class="btn-text">Send Message</span>
                        <i class="fa-solid fa-paper-plane btn-icon"></i>
                        <span class="btn-spinner"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
