<?php
/**
 * Contact Form Controller & Standalone Page
 * Nik Nik Vishal Portfolio
 */
require_once __DIR__ . '/config/config.php';
$config = get_portfolio_config();

// Handle AJAX / POST Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=UTF-8');

    // 1. Verify CSRF Token
    $csrf_token = $_POST['csrf_token'] ?? '';
    if (empty($csrf_token) || !hash_equals($_SESSION['csrf_token'] ?? '', $csrf_token)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Security token invalid or expired. Please refresh the page.'
        ]);
        exit;
    }

    // 2. Sanitize & Validate Inputs
    $name = isset($_POST['name']) ? trim(htmlspecialchars((string)$_POST['name'], ENT_QUOTES, 'UTF-8')) : '';
    $email = isset($_POST['email']) ? trim(filter_var((string)$_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
    $message = isset($_POST['message']) ? trim(htmlspecialchars((string)$_POST['message'], ENT_QUOTES, 'UTF-8')) : '';

    if (empty($name) || mb_strlen($name) < 2) {
        echo json_encode(['status' => 'error', 'message' => 'Please provide your name (at least 2 characters).']);
        exit;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
        exit;
    }

    if (empty($message) || mb_strlen($message) < 10) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a message with at least 10 characters.']);
        exit;
    }

    // 3. Log Submission Safely
    $log_entry = sprintf(
        "[%s] Name: %s | Email: %s | IP: %s | Message: %s\n",
        date('Y-m-d H:i:s'),
        $name,
        $email,
        $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
        str_replace(["\r", "\n"], ' ', $message)
    );
    @file_put_contents(__DIR__ . '/scratch/messages.log', $log_entry, FILE_APPEND | LOCK_EX);

    // 4. Return Success JSON
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you, ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '! Your message has been sent successfully. I will get back to you soon.'
    ]);
    exit;
}

// If GET request, render full page
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<main class="contact-page-wrapper" style="padding-top: calc(var(--nav-height) + 40px); min-height: 80vh;">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-paper-plane"></i> Get In Touch</span>
            <h1 class="section-title">Let's Work Together</h1>
            <p class="section-desc">Have a project in mind, an opportunity, or want to discuss modern web technologies? Reach out and let's build something extraordinary.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-info-card">
                <div>
                    <h3 class="contact-lead-title">Let's Build Something <span class="gradient-purple-blue">Amazing</span></h3>
                    <p class="contact-lead-text">
                        "<?= htmlspecialchars($config['profile']['about']) ?>"
                    </p>

                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="contact-icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <div class="contact-label">Location</div>
                                <div class="contact-value"><?= htmlspecialchars($config['profile']['location']) ?></div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-box">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <div>
                                <div class="contact-label">Current Status</div>
                                <div class="contact-value"><?= htmlspecialchars($config['profile']['status']) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-social-icons" style="margin-top: 24px;">
                    <?php foreach ($config['socials'] as $soc): ?>
                        <a href="<?= htmlspecialchars($soc['url']) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="<?= htmlspecialchars($soc['name']) ?>">
                            <i class="<?= htmlspecialchars($soc['icon']) ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

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
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
