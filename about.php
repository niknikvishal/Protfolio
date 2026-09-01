<?php
/**
 * Standalone About Page
 * Nik Nik Vishal Portfolio
 */
require_once __DIR__ . '/config/config.php';
$config = get_portfolio_config();

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<main class="about-page-wrapper" style="padding-top: calc(var(--nav-height) + 40px); min-height: 85vh;">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><i class="fa-solid fa-user"></i> Profile</span>
            <h1 class="section-title">About Me</h1>
            <p class="section-desc">Passionate Full-Stack Developer turning ideas into real-world, high-performance digital experiences.</p>
        </div>

        <div class="about-grid">
            <div class="about-card">
                <div class="about-quote">
                    <i class="fa-solid fa-quote-left"></i>
                    <?= htmlspecialchars($config['profile']['about']) ?>
                </div>
                <div class="about-details">
                    <div class="about-detail-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><strong>Location:</strong> <?= htmlspecialchars($config['profile']['location']) ?></span>
                    </div>
                    <div class="about-detail-item">
                        <i class="fa-solid fa-briefcase"></i>
                        <span><strong>Role:</strong> <?= htmlspecialchars($config['profile']['title']) ?></span>
                    </div>
                    <div class="about-detail-item">
                        <i class="fa-solid fa-signal"></i>
                        <span><strong>Status:</strong> <?= htmlspecialchars($config['profile']['status']) ?></span>
                    </div>
                </div>

                <div class="stats-grid">
                    <?php foreach ($config['statistics'] as $stat): ?>
                        <div class="stat-card">
                            <i class="<?= htmlspecialchars($stat['icon']) ?> stat-icon"></i>
                            <div class="stat-number" data-target="<?= $stat['numeric'] ?>" data-suffix="<?= strpos($stat['number'], '+') !== false ? '+' : (strpos($stat['number'], '%') !== false ? '%' : '') ?>">
                                <?= htmlspecialchars($stat['number']) ?>
                            </div>
                            <div class="stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="dev-terminal">
                <div class="terminal-header">
                    <span class="terminal-dot dot-red"></span>
                    <span class="terminal-dot dot-yellow"></span>
                    <span class="terminal-dot dot-green"></span>
                    <span class="terminal-title">developer_profile.php</span>
                </div>
                <div class="terminal-body">
                    <p><span class="code-keyword">&lt;?php</span></p>
                    <p><span class="code-comment">// Nik Nik Vishal Developer Definition</span></p>
                    <p><span class="code-keyword">class</span> <span class="code-func">NikNikVishal</span> <span class="code-keyword">implements</span> <span class="code-func">FullStackEngineer</span> {</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public string</span> <span class="code-var">$location</span> = <span class="code-string">"<?= htmlspecialchars($config['profile']['location']) ?>"</span>;</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public string</span> <span class="code-var">$status</span> = <span class="code-string">"<?= htmlspecialchars($config['profile']['status']) ?>"</span>;</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public array</span> <span class="code-var">$coreStack</span> = [<span class="code-string">"PHP"</span>, <span class="code-string">"JavaScript"</span>, <span class="code-string">"MySQL"</span>, <span class="code-string">"Three.js"</span>];</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">public function</span> <span class="code-func">buildExperience</span>(): <span class="code-keyword">void</span> {</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-func">createResponsiveDesign</span>();</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-func">optimizePerformance</span>();</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="code-func">ensureClientSatisfaction</span>(<span class="code-string">1.00</span>);</p>
                    <p>&nbsp;&nbsp;}</p>
                    <p>}</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
