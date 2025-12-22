// Mobile Navigation Toggle
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

if (hamburger) {
    hamburger.addEventListener("click", () => {
        navMenu.classList.toggle("active");

        // Animate hamburger
        const spans = hamburger.querySelectorAll("span");
        if (navMenu.classList.contains("active")) {
            spans[0].style.transform = "rotate(45deg) translateY(10px)";
            spans[1].style.opacity = "0";
            spans[2].style.transform = "rotate(-45deg) translateY(-10px)";
        } else {
            spans[0].style.transform = "none";
            spans[1].style.opacity = "1";
            spans[2].style.transform = "none";
        }
    });
}

// Close mobile menu when clicking on a link
const navLinks = document.querySelectorAll(".nav-menu a");
navLinks.forEach((link) => {
    link.addEventListener("click", () => {
        navMenu.classList.remove("active");
        const spans = hamburger.querySelectorAll("span");
        spans[0].style.transform = "none";
        spans[1].style.opacity = "1";
        spans[2].style.transform = "none";
    });
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Menu Tabs
const tabBtns = document.querySelectorAll(".tab-btn");
tabBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        // Remove active class from all buttons
        tabBtns.forEach((b) => b.classList.remove("active"));
        // Add active class to clicked button
        btn.classList.add("active");

        // Here you can add logic to filter products based on category
        const category = btn.dataset.tab;
        console.log("Selected category:", category);
        // Add your product filtering logic here
    });
});

// Promo Slider
let currentSlide = 0;
const slides = document.querySelectorAll(".promo-slide");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");

function showSlide(n) {
    slides.forEach((slide) => slide.classList.remove("active"));

    if (n >= slides.length) {
        currentSlide = 0;
    }
    if (n < 0) {
        currentSlide = slides.length - 1;
    }

    slides[currentSlide].classList.add("active");
}

if (nextBtn && prevBtn) {
    nextBtn.addEventListener("click", () => {
        currentSlide++;
        showSlide(currentSlide);
    });

    prevBtn.addEventListener("click", () => {
        currentSlide--;
        showSlide(currentSlide);
    });

    // Auto slide every 5 seconds
    setInterval(() => {
        currentSlide++;
        showSlide(currentSlide);
    }, 5000);
}

// Add to Cart functionality
const cartButtons = document.querySelectorAll(".add-to-cart");
const cartCount = document.querySelector(".cart-count");
let cartItems = parseInt(cartCount.textContent);

cartButtons.forEach((button) => {
    button.addEventListener("click", function () {
        const productCard = this.closest(".product-card");
        const productName =
            productCard.querySelector(".product-name").textContent;

        // Animation
        this.textContent = "Added!";
        this.style.background = "#27AE60";

        setTimeout(() => {
            this.textContent = "add to cart";
            this.style.background = "";
        }, 1500);

        // Update cart count
        cartItems++;
        cartCount.textContent = cartItems;

        // Scale animation for cart icon
        const cartBtn = document.querySelector(".cart-btn");
        cartBtn.style.transform = "scale(1.2)";
        setTimeout(() => {
            cartBtn.style.transform = "scale(1)";
        }, 300);

        console.log("Added to cart:", productName);
    });
});

// Search functionality
const searchBtn = document.querySelector(".search-btn");
searchBtn.addEventListener("click", () => {
    const searchQuery = prompt("Cari produk:");
    if (searchQuery) {
        console.log("Searching for:", searchQuery);
        // Add your search logic here
        alert(`Mencari: ${searchQuery}`);
    }
});

// Chat button
const chatButton = document.querySelector(".chat-button");
if (chatButton) {
    chatButton.addEventListener("click", () => {
        // Open WhatsApp or chat widget
        window.open("https://wa.me/622169181181", "_blank");
    });
}

// Navbar scroll effect
let lastScroll = 0;
const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll <= 0) {
        navbar.style.boxShadow = "0 2px 10px rgba(0,0,0,0.1)";
        return;
    }

    if (currentScroll > lastScroll) {
        // Scrolling down
        navbar.style.transform = "translateY(-100%)";
    } else {
        // Scrolling up
        navbar.style.transform = "translateY(0)";
        navbar.style.boxShadow = "0 4px 20px rgba(0,0,0,0.15)";
    }

    lastScroll = currentScroll;
});

// Add transition to navbar
navbar.style.transition = "transform 0.3s ease-in-out, box-shadow 0.3s";

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Observe elements for animation
const animateElements = document.querySelectorAll(
    ".category-card, .product-card"
);
animateElements.forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    observer.observe(el);
});

// Product hover effect
const productCards = document.querySelectorAll(".product-card");
productCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
        this.style.boxShadow = "0 15px 40px rgba(232, 65, 24, 0.2)";
    });
    card.addEventListener("mouseleave", function () {
        this.style.boxShadow = "";
    });
});

// Category card click
const categoryCards = document.querySelectorAll(".category-card");
categoryCards.forEach((card) => {
    card.addEventListener("click", function () {
        const categoryName = this.querySelector(".category-name").textContent;
        console.log("Clicked category:", categoryName);
        // Navigate to category page or filter products
        alert(`Menampilkan produk: ${categoryName}`);
    });
});

// Lazy loading images
const images = document.querySelectorAll("img[data-src]");
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.removeAttribute("data-src");
            imageObserver.unobserve(img);
        }
    });
});

images.forEach((img) => imageObserver.observe(img));

// Console message
console.log(
    "%c Holland Bakery Website ",
    "background: #E84118; color: white; font-size: 20px; padding: 10px;"
);
console.log("Welcome to Holland Bakery! 🍞🥐");

// Prevent right-click on images (optional)
document.querySelectorAll("img").forEach((img) => {
    img.addEventListener("contextmenu", (e) => {
        e.preventDefault();
    });
});

// ========================================
// PREORDER VALIDATION SYSTEM
// ========================================

// Konfigurasi jadwal pre-order
const orderSchedules = {
    morning: {
        name: 'Morning Batch',
        days: [1, 2, 3, 4, 5], // Senin - Jumat (0=Minggu, 1=Senin, dst)
        startHour: 18,
        endHour: 22,
        orderUrl: '/preorder/morning' // ← GANTI SESUAI ROUTE LARAVEL ANDA
    },
    afternoon: {
        name: 'Afternoon Batch',
        days: [1, 2, 3, 4, 5, 6], // Senin - Sabtu
        startHour: 6,
        endHour: 11,
        orderUrl: '/preorder/afternoon' // ← GANTI SESUAI ROUTE LARAVEL ANDA
    },
    weekend: {
        name: 'Weekend Special',
        days: [0, 6], // Sabtu - Minggu
        startHour: 8,
        endHour: 14,
        orderUrl: '/preorder/weekend' // ← GANTI SESUAI ROUTE LARAVEL ANDA
    }
};

/**
 * Fungsi utama untuk cek waktu order
 * @param {string} batchType - Tipe batch: 'morning', 'afternoon', atau 'weekend'
 */
function checkOrderTime(batchType) {
    // Cek apakah user sudah login
    const isLoggedIn = checkUserLogin();
    
    if (!isLoggedIn) {
        showModal('🔒', 'Login Required', 'Silakan login terlebih dahulu untuk melakukan pre-order.', true);
        return;
    }
    
    // Validasi waktu order
    const schedule = orderSchedules[batchType];
    const now = new Date();
    const currentDay = now.getDay();
    const currentHour = now.getHours();
    
    // Cek apakah hari ini termasuk dalam jadwal
    if (!schedule.days.includes(currentDay)) {
        const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const validDays = schedule.days.map(d => dayNames[d]).join(', ');
        showModal('📅', 'Diluar Jadwal', `${schedule.name} hanya tersedia pada hari: ${validDays}`, false);
        return;
    }
    
    // Cek apakah waktu sekarang dalam rentang order time
    if (currentHour < schedule.startHour || currentHour >= schedule.endHour) {
        showModal('⏰', 'Diluar Jam Order', `Waktu order untuk ${schedule.name} adalah pukul ${schedule.startHour}:00 - ${schedule.endHour}:00 WIB`, false);
        return;
    }
    
    // Jika semua validasi lolos, redirect ke halaman order
    window.location.href = schedule.orderUrl;
}

/**
 * Cek apakah user sudah login
 * @returns {boolean}
 */
function checkUserLogin() {
    // Metode 1: Cek dari meta tag (paling aman dan reliable)
    const metaTag = document.querySelector('meta[name="user-logged-in"]');
    if (metaTag) {
        return metaTag.content === 'true';
    }
    
    // Metode 2: Cek session/cookie Laravel (fallback)
    // Laravel biasanya menyimpan session dengan nama yang dimulai dengan 'laravel_session'
    return document.cookie.includes('laravel_session');
}

/**
 * Tampilkan modal notifikasi
 * @param {string} icon - Emoji icon
 * @param {string} title - Judul modal
 * @param {string} message - Pesan modal
 * @param {boolean} redirectToLogin - Apakah perlu redirect ke login
 */
function showModal(icon, title, message, redirectToLogin) {
    const modal = document.getElementById('preorderModal');
    document.getElementById('modalIcon').textContent = icon;
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalMessage').textContent = message;
    
    modal.style.display = 'flex';
    
    // Jika perlu redirect ke login, tunggu 2 detik
    if (redirectToLogin) {
        setTimeout(() => {
            // ← GANTI DENGAN ROUTE LOGIN ANDA
            window.location.href = '/login';
        }, 2000);
    }
}

/**
 * Tutup modal
 */
function closeModal() {
    const modal = document.getElementById('preorderModal');
    modal.style.display = 'none';
}

// Event listener untuk close modal ketika klik di luar box
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('preorderModal');
    
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }
});

/**
 * Optional: Fungsi untuk testing validasi waktu (bisa dihapus di production)
 * Cara pakai: Buka console browser, ketik testOrderTime('morning')
 */
function testOrderTime(batchType) {
    console.log('Testing order time for:', batchType);
    const schedule = orderSchedules[batchType];
    const now = new Date();
    
    console.log('Current time:', now);
    console.log('Current day:', now.getDay());
    console.log('Current hour:', now.getHours());
    console.log('Valid days:', schedule.days);
    console.log('Valid hours:', schedule.startHour + '-' + schedule.endHour);
    
    checkOrderTime(batchType);
}

document.addEventListener('click', function (e) {
    const wrapper = document.getElementById('profileDropdown');
    const btn = document.getElementById('profileBtn');

    if (!wrapper || !btn) return;

    if (btn.contains(e.target)) {
        wrapper.classList.toggle('active');
        return;
    }

    if (!wrapper.contains(e.target)) {
        wrapper.classList.remove('active');
    }
});

document.getElementById('userToggle')?.addEventListener('click', function (e) {
    e.stopPropagation();
    document.getElementById('userDropdown').classList.toggle('show');
});

document.addEventListener('click', function () {
    document.getElementById('userDropdown')?.classList.remove('show');
});
