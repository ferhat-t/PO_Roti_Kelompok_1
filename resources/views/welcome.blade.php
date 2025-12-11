<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX Bakery - Bakery Terbaik Indonesia</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-wrapper">
                <div class="logo">
                    <img src="{{ asset('image/logotipastry.png') }}" alt="logotipastry">
                    <div class="logo-text">
                        <span class="logo-title">TI PASTRY</span>
                        <span class="logo-subtitle">The Best Pastries In Town</span>
                    </div>
                </div>
                <ul class="nav-menu">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#products">PRODUCT</a></li>
                    <li><a href="#preorder">PRE-ORDER</a></li>
                    <li><a href="#pickuppoints">Pickup Points</a></li>
                    <li><a href="#myorder">MY ORDER</a></li>
                </ul>
                <div class="nav-actions">
                    <button class="btn-cart">
                        CART
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </button>
                
                    <button class="btn-location">
                        <a href="{{ route('login') }}" class="btn-login">Login</a>
                        <a href="{{ route('sign') }}">Sign</a>


                        Location
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </button>
                    <button class="btn-search">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                    <button class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay">
        <div class="mobile-menu-header">
            <button class="close-menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="mobile-logo">
                <img src="{{ asset('image/logotipastry.png') }}" alt="logotipastry">
                <div class="logo-text">
                    <span class="logo-title">TI PASTRY</span>
                    <span class="logo-subtitle">The Best Pastries In Town</span>
                </div>
            </div>
            <div class="mobile-actions-top">
                <button class="btn-search-mobile">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
                <button class="btn-cart-mobile">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="mobile-menu-content">
            <button class="mobile-btn-location">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                CHOOSE LOCATION
            </button>
            <button class="mobile-btn-login">LOG IN</button>
            <ul class="mobile-nav-menu">
               <li><a href="#">HOME</a></li>
                <li><a href="#products">PRODUCT</a></li>
                <li><a href="#preorder">PRE-ORDER</a></li>
                <li><a href="#pickuppoints">Pickup Points</a></li>
                <li><a href="#myorder">MY ORDER</a></li>
            </ul>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-border">
            <div class="christmas-decorations">
                <img src="{{ asset('image/tipastryfront.png') }}" alt="tipastryfront">
            </div>
           
            <div class="halal-badge">
                <img src="{{ asset('image/logohalal.png') }}" alt="Halal Certified">
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <div class="container">
            <div class="section-header">
                <div class="section-icon">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="#a68a64">
                        <path d="M3 3h18v18H3V3zm16 16V5H5v14h14z"/>
                        <path d="M9 17l1.5-4.5L15 11l-4.5-1.5L9 5l-1.5 4.5L3 11l4.5 1.5z"/>
                    </svg>
                </div>
                <h2 class="section-title">Shop By Categories</h2>
            </div>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-image">
                        <img src="{{ asset('image/croisan.jpg') }}" alt="CROISSANT">
                    </div>
                    <h3 class="category-name">Puff Pastry</h3>
                </div>
                <div class="category-card">
                    <div class="category-image">
                        <img src="{{ asset('image/shortcrustpastry.jpg') }}" alt="Shortcrust Pastry">
                    </div>
                    <h3 class="category-name">Shortcrust Pastry</h3>
                </div>
                <div class="category-card">
                    <div class="category-image">
                        <img src="{{ asset('image/danishpastry.png') }}" alt="Danish Pastry">
                    </div>
                    <h3 class="category-name">Danish Pastry</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section class="featured-menu" id="menu">
        <div class="container">
            <div class="section-header">
                <div class="section-icon">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="#a68a64">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        <path d="M12 6c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/>
                    </svg>
                </div>
                <h2 class="section-title">Featured Menu</h2>
                <p class="section-subtitle">The best from our kitchen</p>
            </div>
            <div class="menu-tabs">
                <button class="tab-btn active" data-tab="christmas">Christmas 2025</button>
                <button class="tab-btn" data-tab="breads">Breads</button>
                <button class="tab-btn" data-tab="snacks">Traditional Snacks</button>
                <button class="tab-btn" data-tab="cakes">Chiffon & Roll Cakes</button>
                <button class="tab-btn" data-tab="donuts">Donuts</button>
                <button class="tab-btn" data-tab="pastry">Pastry And Danish</button>
                <button class="tab-btn" data-tab="pudding">Pudding</button>
            </div>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-badge">👍</div>
                    <div class="product-image">
                        <img src="{{ asset('image/croisan.jpg') }}" alt="Roti Croisant">
                    </div>
                    <h3 class="product-name">Roti Croissant</h3>
                    <div class="product-price">
                        <span class="price-old">Rp. 16.300</span>
                        <span class="price-current">Rp. 14.900</span>
                    </div>
                    <div class="product-rating">
                        <span>⭐⭐⭐⭐⭐</span>
                    </div>
                    <button class="add-to-cart">add to cart</button>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('image/singapurekayatoast.jpg') }}" alt="Singapore Kaya Toast">
                    </div>
                    <h3 class="product-name">Singapore Kaya Toast</h3>
                    <div class="product-price">
                        <span class="price-old">Rp. 18.700</span>
                        <span class="price-current">Rp. 17.000</span>
                    </div>
                    <div class="product-rating">
                        <span>⭐⭐⭐⭐⭐</span>
                    </div>
                    <button class="add-to-cart">add to cart</button>
                </div>
                <div class="product-card">
                    <div class="product-badge">👍</div>
                    <div class="product-image">
                        <img src="{{ asset('image/roti.jpg') }}" alt="Roti Gandum">
                    </div>
                    <h3 class="product-name">Roti Gandum</h3>
                    <div class="product-price">
                        <span class="price-old">Rp. 11.900</span>
                        <span class="price-current">Rp. 10.900</span>
                    </div>
                    <div class="product-rating">
                        <span>⭐⭐⭐⭐⭐</span>
                    </div>
                    <button class="add-to-cart">add to cart</button>
                </div>
                <div class="product-card">
                    <div class="product-badge">👍</div>
                    <div class="product-image">
                        <img src="{{ asset('image/blueberypastry.jpg') }}" alt="Bluebery Pastry">
                    </div>
                    <h3 class="product-name">Bluberry Pastry</h3>
                    <div class="product-price">
                        <span class="price-old">Rp. 35.000</span>
                        <span class="price-current">Rp. 25.000</span>
                    </div>
                    <div class="product-rating">
                        <span>⭐⭐⭐⭐⭐</span>
                    </div>
                    <button class="add-to-cart">add to cart</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="promo-section" id="promo">
        <div class="container">
            <div class="section-header">
                <div class="section-icon">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="#E84118">
                        <path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/>
                    </svg>
                </div>
                <h2 class="section-title">Special Promo</h2>
                <p class="section-subtitle">Check our latest Promo</p>
            </div>
            <div class="promo-slider">
                <button class="slider-btn prev-btn">‹</button>
                <div class="promo-slides">
                    <div class="promo-slide active">
                        <img src="{{ asset('images/promo-1.jpg') }}" alt="Promo 1">
                    </div>
                    <div class="promo-slide">
                        <img src="{{ asset('images/promo-2.jpg') }}" alt="Promo 2">
                    </div>
                    <div class="promo-slide">
                        <img src="{{ asset('images/promo-3.jpg') }}" alt="Promo 3">
                    </div>
                </div>
                <button class="slider-btn next-btn">›</button>
            </div>
        </div>
    </section>

    <!-- Halal Certificate Section -->
    <section class="halal-section">
        <div class="container">
            <div class="halal-content">
                <h2 class="halal-title">HALAL CERTIFICATE BY LPPOM MUI PUSAT</h2>
                <p class="halal-description">
                    TI PASTRY is proud to be certified halal by LPPOM MUI Pusat, ensuring that all our products meet the highest standards of halal compliance. We are committed to providing our customers with delicious and trustworthy baked goods that align with their values and dietary needs.
                </p>
                <button class="read-more-btn">Read More</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#store">Store Location</a></li>
                        <li><a href="#disclaimer">Disclaimer</a></li>
                        <li><a href="#privacy">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Information</h3>
                    <ul>
                        <li><a href="#terms">Terms of Use</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#cookies">Setting Cookies</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon instagram">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon facebook">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="app-downloads">
                        <a href="#" class="app-store">
                            <img src="{{ asset('images/google-play.png') }}" alt="Get it on Google Play">
                        </a>
                        <a href="#" class="app-store">
                            <img src="{{ asset('images/app-store.png') }}" alt="Download on App Store">
                        </a>
                    </div>
                </div>
                <div class="footer-column delivery-info">
                    <div class="delivery-banner">
                        <img src="{{ asset('images/delivery.png') }}" alt="Index Delivery">
                        <div class="delivery-text">
                            <h3>TI Delivery</h3>
                            <p class="delivery-phone">021-69181181</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 TI Pastry. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Chat Button -->
    <button class="chat-button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
        </svg>
    </button>

    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>