// Mobile Navigation Toggle
const hamburger = document.querySelector('.hamburger');
const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
const closeMenu = document.querySelector('.close-menu');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        mobileMenuOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
}

if (closeMenu) {
    closeMenu.addEventListener('click', () => {
        mobileMenuOverlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
}

// Close mobile menu when clicking on a link
const mobileNavLinks = document.querySelectorAll('.mobile-nav-menu a');
mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenuOverlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Menu Tabs
const tabBtns = document.querySelectorAll('.tab-btn');
tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Remove active class from all buttons
        tabBtns.forEach(b => b.classList.remove('active'));
        // Add active class to clicked button
        btn.classList.add('active');
        
        // Here you can add logic to filter products based on category
        const category = btn.dataset.tab;
        console.log('Selected category:', category);
        // Add your product filtering logic here
    });
});

// Promo Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.promo-slide');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

function showSlide(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    
    if (n >= slides.length) {
        currentSlide = 0;
    }
    if (n < 0) {
        currentSlide = slides.length - 1;
    }
    
    slides[currentSlide].classList.add('active');
}

if (nextBtn && prevBtn) {
    nextBtn.addEventListener('click', () => {
        currentSlide++;
        showSlide(currentSlide);
    });

    prevBtn.addEventListener('click', () => {
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
const cartButtons = document.querySelectorAll('.add-to-cart');
const cartCount = document.querySelector('.cart-count');
let cartItems = parseInt(cartCount.textContent);

cartButtons.forEach(button => {
    button.addEventListener('click', function() {
        const productCard = this.closest('.product-card');
        const productName = productCard.querySelector('.product-name').textContent;
        
        // Animation
        this.textContent = 'Added!';
        this.style.background = '#27AE60';
        
        setTimeout(() => {
            this.textContent = 'add to cart';
            this.style.background = '';
        }, 1500);
        
        // Update cart count
        cartItems++;
        cartCount.textContent = cartItems;
        
        // Scale animation for cart icon
        const cartBtn = document.querySelector('.cart-btn');
        cartBtn.style.transform = 'scale(1.2)';
        setTimeout(() => {
            cartBtn.style.transform = 'scale(1)';
        }, 300);
        
        console.log('Added to cart:', productName);
    });
});

// Search functionality
const searchBtn = document.querySelector('.btn-search');
const searchBtnMobile = document.querySelector('.btn-search-mobile');

function handleSearch() {
    const searchQuery = prompt('Cari produk:');
    if (searchQuery) {
        console.log('Searching for:', searchQuery);
        alert(Mencari: ${searchQuery});
    }
}

if (searchBtn) {
    searchBtn.addEventListener('click', handleSearch);
}

if (searchBtnMobile) {
    searchBtnMobile.addEventListener('click', handleSearch);
}

// Chat button
const chatButton = document.querySelector('.chat-button');
if (chatButton) {
    chatButton.addEventListener('click', () => {
        // Open WhatsApp or chat widget
        window.open('https://wa.me/622169181181', '_blank');
    });
}

// Navbar scroll effect
let lastScroll = 0;
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll <= 0) {
        navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
        return;
    }
    
    if (currentScroll > lastScroll) {
        // Scrolling down
        navbar.style.transform = 'translateY(-100%)';
    } else {
        // Scrolling up
        navbar.style.transform = 'translateY(0)';
        navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.15)';
    }
    
    lastScroll = currentScroll;
});

// Add transition to navbar
navbar.style.transition = 'transform 0.3s ease-in-out, box-shadow 0.3s';

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animation
const animateElements = document.querySelectorAll('.category-card, .product-card');
animateElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// Product hover effect
const productCards = document.querySelectorAll('.product-card');
productCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.boxShadow = '0 15px 40px rgba(232, 65, 24, 0.2)';
    });
    card.addEventListener('mouseleave', function() {
        this.style.boxShadow = '';
    });
});

// Category card click
const categoryCards = document.querySelectorAll('.category-card');
categoryCards.forEach(card => {
    card.addEventListener('click', function() {
        const categoryName = this.querySelector('.category-name').textContent;
        console.log('Clicked category:', categoryName);
        // Navigate to category page or filter products
        alert(Menampilkan produk: ${categoryName});
    });
});

// Lazy loading images
const images = document.querySelectorAll('img[data-src]');
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            imageObserver.unobserve(img);
        }
    });
});

images.forEach(img => imageObserver.observe(img));

// Console message
console.log('%c Holland Bakery Website ', 'background: #E84118; color: white; font-size: 20px; padding: 10px;');
console.log('Welcome to Holland Bakery! 🍞🥐');

// Prevent right-click on images (optional)
document.querySelectorAll('img').forEach(img => {
    img.addEventListener('contextmenu', (e) => {
        e.preventDefault();
    });
});