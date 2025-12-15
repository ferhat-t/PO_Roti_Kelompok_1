<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TI PASTRY - Pastry Terbaik Indonesia</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">
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
                   <li><a href="{{ route('welcome') }}">HOME</a></li>
                    <li><a href="{{ route('welcome') }}#menu">PRODUCT</a></li>
                    <li><a href="{{ route('preorder') }}" class="active">PRE-ORDER</a></li>
                    <li><a href="{{ route('welcome') }}#pickuppoints">Pickup Points</a></li>
                    <li><a href="{{ route('welcome') }}#myorder">MY ORDER</a></li>
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
                <li><a href="#menu">PRODUCT</a></li>
                <li><a href="{{ route('preorder') }}" class="active">PRE-ORDER</a></li>
                <li><a href="#pickuppoints">Pickup Points</a></li>
                <li><a href="#myorder">MY ORDER</a></li>
            </ul>
        </div>
    </div>


    <!-- Pre-Order Section -->
    <section id="preorder" style="padding: 80px 20px; background: linear-gradient(135deg, #FFF8DC 0%, #FAEBD7 100%);">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 2.5rem; color: #8B4513; margin-bottom: 10px; font-weight: 700;">Pre-Order Schedule</h2>
                <p style="color: #666; font-size: 1.1rem;">Pesan sekarang dan ambil pastry fresh di waktu yang telah ditentukan</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 40px;">
                <!-- Card 1 - Morning Batch -->
                <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div style="margin-bottom: 20px;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#8B4513" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.5rem; color: #8B4513; margin-bottom: 25px; font-weight: 700;">Morning Batch</h3>
                    <div style="text-align: left; margin-bottom: 30px;">
                        <div style="margin-bottom: 15px; padding: 12px; background: #FFF8DC; border-radius: 10px;">
                            <span style="display: block; font-size: 0.85rem; color: #666; margin-bottom: 5px; font-weight: 600;">Order Period:</span>
                            <span style="display: block; font-size: 1.1rem; color: #333; font-weight: 700;">Senin - Jumat</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 12px; background: #FFF8DC; border-radius: 10px;">
                            <span style="display: block; font-size: 0.85rem; color: #666; margin-bottom: 5px; font-weight: 600;">Order Time:</span>
                            <span style="display: block; font-size: 1.1rem; color: #333; font-weight: 700;">18:00 - 22:00 WIB</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 12px; background: #FFE4B5; border-radius: 10px; border-left: 4px solid #8B4513;">
                            <span style="display: block; font-size: 0.85rem; color: #666; margin-bottom: 5px; font-weight: 600;">Pickup Time:</span>
                            <span style="display: block; font-size: 1.2rem; color: #8B4513; font-weight: 700;">07:00 - 09:00 WIB</span>
                            <span style="display: block; font-size: 0.75rem; color: #999; margin-top: 5px; font-style: italic;">(Hari berikutnya)</span>
                        </div>
                    </div>
                    <button onclick="checkOrderTime('morning')" style="width: 100%; padding: 15px; background: #8B4513; color: white; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: background 0.3s ease;" onmouseover="this.style.background='#A0522D';" onmouseout="this.style.background='#8B4513';">Order Now</button>
                </div>

                <!-- Card 2 - Afternoon Batch (Featured) -->
                <div style="background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); color: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; text-align: center; transform: scale(1.05); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.08) translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div style="position: absolute; top: -15px; right: 20px; background: #FFD700; color: #8B4513; padding: 8px 20px; border-radius: 20px; font-weight: 700; font-size: 0.85rem; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">Popular</div>
                    <div style="margin-bottom: 20px;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.5rem; color: white; margin-bottom: 25px; font-weight: 700;">Afternoon Batch</h3>
                    <div style="text-align: left; margin-bottom: 30px;">
                        <div style="margin-bottom: 15px; padding: 12px; background: rgba(255, 255, 255, 0.15); border-radius: 10px;">
                            <span style="display: block; font-size: 0.85rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 5px; font-weight: 600;">Order Period:</span>
                            <span style="display: block; font-size: 1.1rem; color: white; font-weight: 700;">Senin - Sabtu</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 12px; background: rgba(255, 255, 255, 0.15); border-radius: 10px;">
                            <span style="display: block; font-size: 0.85rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 5px; font-weight: 600;">Order Time:</span>
                            <span style="display: block; font-size: 1.1rem; color: white; font-weight: 700;">06:00 - 11:00 WIB</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 12px; background: rgba(255, 215, 0, 0.3); border-radius: 10px; border-left: 4px solid #FFD700;">
                            <span style="display: block; font-size: 0.85rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 5px; font-weight: 600;">Pickup Time:</span>
                            <span style="display: block; font-size: 1.2rem; color: #FFD700; font-weight: 700;">14:00 - 16:00 WIB</span>
                            <span style="display: block; font-size: 0.75rem; color: rgba(255, 255, 255, 0.8); margin-top: 5px; font-style: italic;">(Hari yang sama)</span>
                        </div>
                    </div>
                    <button onclick="checkOrderTime('afternoon')" style="width: 100%; padding: 15px; background: white; color: #8B4513; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: background 0.3s ease;" onmouseover="this.style.background='#FFD700';" onmouseout="this.style.background='white';">Order Now</button>
                </div>

                <!-- Card 3 - Weekend Special -->
                <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div style="margin-bottom: 20px;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#8B4513" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.5rem; color: #8B4513; margin-bottom: 25px; font-weight: 700;">Weekend Special</h3>
                    <div style="text-align: left; margin-bottom: 30px;">
                        <div style="margin-bottom: 15px; padding: 12px; background: #FFF8DC; border-radius: 10px;">
                            <span style="display: block; font-size: 0.85rem; color: #666; margin-bottom: 5px; font-weight: 600;">Order Period:</span>
                            <span style="display: block; font-size: 1.1rem; color: #333; font-weight: 700;">Sabtu - Minggu</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 12px; background: #FFF8DC; border-radius: 10px;">
                            <span style="display: block; font-size: 0.85rem; color: #666; margin-bottom: 5px; font-weight: 600;">Order Time:</span>
                            <span style="display: block; font-size: 1.1rem; color: #333; font-weight: 700;">08:00 - 14:00 WIB</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 12px; background: #FFE4B5; border-radius: 10px; border-left: 4px solid #8B4513;">
                            <span style="display: block; font-size: 0.85rem; color: #666; margin-bottom: 5px; font-weight: 600;">Pickup Time:</span>
                            <span style="display: block; font-size: 1.2rem; color: #8B4513; font-weight: 700;">16:00 - 18:00 WIB</span>
                            <span style="display: block; font-size: 0.75rem; color: #999; margin-top: 5px; font-style: italic;">(Hari yang sama)</span>
                        </div>
                    </div>
                    <button onclick="checkOrderTime('weekend')" style="width: 100%; padding: 15px; background: #8B4513; color: white; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: background 0.3s ease;" onmouseover="this.style.background='#A0522D';" onmouseout="this.style.background='#8B4513';">Order Now</button>
                </div>
            </div>

            <div style="text-align: center; padding: 20px; background: white; border-radius: 15px; border-left: 5px solid #8B4513;">
                <p style="margin: 0; color: #666; font-size: 1rem;">💡 <strong>Tips:</strong> Pesan minimal 1 hari sebelumnya untuk memastikan ketersediaan produk favorit Anda</p>
            </div>
        </div>
    </section>

    <!-- Modal untuk notifikasi -->
    <div id="preorderModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
        <div style="background: white; padding: 40px; border-radius: 20px; max-width: 400px; text-align: center; box-shadow: 0 10px 40px rgba(0,0,0,0.3);">
            <div id="modalIcon" style="margin-bottom: 20px; font-size: 4rem;"></div>
            <h3 id="modalTitle" style="color: #8B4513; margin-bottom: 15px; font-size: 1.5rem;"></h3>
            <p id="modalMessage" style="color: #666; margin-bottom: 25px; line-height: 1.6;"></p>
            <button onclick="closeModal()" style="padding: 12px 30px; background: #8B4513; color: white; border: none; border-radius: 10px; cursor: pointer; font-weight: 600; font-size: 1rem;" onmouseover="this.style.background='#A0522D';" onmouseout="this.style.background='#8B4513';">OK</button>
        </div>
    </div>

   
    <!-- Chat Button -->
    <button class="chat-button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
        </svg>
    </button>

    <script src="{{ asset('js/preorder.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Responsive Style untuk Mobile -->
    <style>
    @media (max-width: 992px) {
        #preorder > div > div:nth-child(2) {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }
        #preorder > div > div:nth-child(2) > div:nth-child(2) {
            transform: scale(1) !important;
        }
        #preorder h2 {
            font-size: 2rem !important;
        }
    }

    @media (max-width: 768px) {
        #preorder {
            padding: 60px 15px !important;
        }
        #preorder h2 {
            font-size: 1.8rem !important;
        }
        #preorder > div > div:first-child p {
            font-size: 1rem !important;
        }
        #preorder > div > div:nth-child(2) > div {
            padding: 30px 20px !important;
        }
    }
    </style>
</body>
</html>
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

</body>
</html>
