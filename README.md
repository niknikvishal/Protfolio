# Nik Nik Vishal - Premium 3D Interactive Developer Portfolio

An ultra-modern, production-ready developer portfolio website engineered with a **reactive 3D avatar**, futuristic cyberpunk cyber-arena, glassmorphism cards, and a modular PHP architecture.

---

## ✨ Features & Architecture

### 1. Interactive 3D Avatar Engine (`assets/js/avatar.js`)
- **Three.js WebGL Presentation:** True 3D depth vertex displacement ($128 \times 128$ mesh grid), normal-mapped specular shine, holographic rotating neon rings, and a rotating cyber grid platform floor.
- **Strict Avatar Identity:** Preserves the exact character appearance (spiked hair, full beard, black sunglasses, black hoodie, purple/blue rim lighting).
- **Dual Pipeline Ready:** Automatically loads `assets/models/avatar.glb` if provided, otherwise seamlessly activates the high-fidelity 3D depth shader fallback.
- **Organic Idle Physics:** 7-second sinusoidal floating cycle, subtle breathing chest scale, and dynamic lighting reflections.
- **Mouse Physics & Cursor Tracking:** Desktop mouse tracking with smooth lerped inertia ($X/Y$ tilt clamped to $\pm 4.5^\circ$) and smooth return to center on mouse leave.

### 2. Scroll-Based Avatar Reactions (`assets/js/animations.js`)
- **IntersectionObserver Integration:** Tracks the active viewport section and smoothly transitions the 3D avatar's expressions, lighting colors, and movement:
  - **Hero:** Neutral / Slight Smile (Idle floating)
  - **About:** Confident & Poised (Slight head tilt & purple rim boost)
  - **Skills:** Impressed & Focused (Electric blue/cyan boost)
  - **Services:** Dynamic & Creative (Vibrant floating)
  - **Projects:** Excited & Happy (High-energy highlights)
  - **Experience:** Focused & Analytical (Deep cyber tones)
  - **Contact:** Friendly Big Smile (Warm welcoming rim glow)

### 3. Modular PHP Structure & Centralized Configuration
- All profile information, statistics, skills, projects, and services are defined in a single file: `config/config.php`.
- Adding a new project or updating statistics takes just seconds.

### 4. Security & Best Practices
- CSRF Token verification on contact submissions.
- `htmlspecialchars()` and PHP filter sanitization against XSS.
- Prepared HTTP security headers (`.htaccess`).
- Graceful degradation and `@media (prefers-reduced-motion)` compliance.

---

## 📁 Project Directory Structure

```
c:\xampp\htdocs\Lotus\
├── config/
│   └── config.php          # Central configuration (Profile, Skills, Projects, Stats)
├── includes/
│   ├── header.php          # HTML head, SEO meta, Fonts, CSS, CSRF init
│   ├── navbar.php          # Glass navbar, NK logo, theme switch, mobile drawer
│   └── footer.php          # Modern footer, quick links, status badge, script tags
├── assets/
│   ├── css/
│   │   └── style.css       # Complete design system, glassmorphism, responsive grid
│   ├── js/
│   │   ├── avatar.js       # Three.js 3D WebGL engine & reaction controller
│   │   ├── animations.js   # IntersectionObserver, GSAP triggers, number counters
│   │   └── main.js         # Theme toggle (Dark/Light), splash screen, AJAX form
│   ├── images/
│   │   ├── avatar/         # High-res transparent avatar PNGs, depth maps, normals
│   │   └── projects/       # Project mockups (Mithila Maati, Owl Cafe, etc.)
│   └── models/
│       └── avatar.glb      # Dedicated 3D GLB/GLTF model folder
├── index.php               # Complete one-page interactive experience
├── about.php               # Standalone / deep-link About page
├── contact.php             # Secure backend PHP form processor & Contact page
├── .htaccess               # Security headers, compression, MIME types
└── README.md               # Documentation & setup guide
```

---

## 🚀 How to Run & Test

1. Ensure **Apache** is running in your **XAMPP Control Panel**.
2. Open your web browser and navigate to:
   ```
   http://localhost/Lotus/
   ```
3. Test interactions:
   - **Move cursor** around the hero section to see the avatar tilt and follow your mouse.
   - **Scroll** through sections to see the avatar's expression, lighting, and reaction pill dynamically change.
   - **Click the Moon/Sun icon** in the top navbar to switch between Dark and Light themes.
   - **Submit the contact form** to test the secure AJAX validation and animated toast alerts.

---

## 🛠️ Customization Guide

### How to update projects or skills:
Open `config/config.php` and edit the array entries under `'skills'` or `'projects'`.

### How to add a custom 3D `.glb` model:
Drop your 3D model file named `avatar.glb` into `assets/models/`. The engine will automatically detect and load it!
