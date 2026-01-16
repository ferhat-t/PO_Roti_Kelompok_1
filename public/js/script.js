// public/js/script.js

/**
 * NeedRoti - Main JavaScript File
 * Author: NeedRoti Team
 */

// ==================== DOCUMENT READY ====================
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initAlerts();
    initConfirmDelete();
    initQuantityButtons();
    initImagePreview();
    initPrintButton();
    
    console.log('NeedRoti App Loaded Successfully!');
});

// ==================== AUTO DISMISS ALERTS ====================
function initAlerts() {
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000); // Auto dismiss after 5 seconds
    });
}

// ==================== CONFIRM DELETE ====================
function initConfirmDelete() {
    const deleteButtons = document.querySelectorAll('[data-confirm-delete]');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const message = this.getAttribute('data-confirm-delete') || 
                          'Apakah Anda yakin ingin menghapus item ini?';
            
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });
}

// ==================== QUANTITY BUTTONS ====================
function initQuantityButtons() {
    // Plus button
    const plusButtons = document.querySelectorAll('.qty-plus');
    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            input.value = parseInt(input.value) + 1;
            updateCartItem(input);
        });
    });

    // Minus button
    const minusButtons = document.querySelectorAll('.qty-minus');
    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateCartItem(input);
            }
        });
    });
}

// ==================== UPDATE CART ITEM ====================
function updateCartItem(input) {
    const form = input.closest('form');
    if (form && form.getAttribute('data-auto-submit') === 'true') {
        // Auto submit form after quantity change
        setTimeout(() => {
            form.submit();
        }, 500);
    }
}

// ==================== IMAGE PREVIEW ====================
function initImagePreview() {
    const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
    
    imageInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('image-preview');
            
            if (file && preview) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                
                reader.readAsDataURL(file);
            }
        });
    });
}

// ==================== PRINT BUTTON ====================
function initPrintButton() {
    const printButtons = document.querySelectorAll('[data-print]');
    
    printButtons.forEach(button => {
        button.addEventListener('click', function() {
            window.print();
        });
    });
}

// ==================== CART FUNCTIONS ====================
const Cart = {
    
    // Add item to cart
    addItem: function(productId) {
        console.log(`Adding product ${productId} to cart`);
        // This is handled by Laravel form submission
    },
    
    // Remove item from cart
    removeItem: function(productId) {
        if (confirm('Hapus produk ini dari keranjang?')) {
            document.getElementById(`remove-form-${productId}`).submit();
        }
    },
    
    // Update cart total
    updateTotal: function() {
        let total = 0;
        const items = document.querySelectorAll('.cart-item');
        
        items.forEach(item => {
            const price = parseFloat(item.dataset.price);
            const quantity = parseInt(item.querySelector('.qty-input').value);
            total += price * quantity;
        });
        
        document.getElementById('cart-total').textContent = 
            'Rp ' + total.toLocaleString('id-ID');
    }
};

// ==================== FORM VALIDATION ====================
const FormValidator = {
    
    // Validate checkout form
    validateCheckout: function(form) {
        const name = form.querySelector('[name="customer_name"]').value.trim();
        const phone = form.querySelector('[name="phone"]').value.trim();
        
        if (name === '') {
            alert('Nama harus diisi!');
            return false;
        }
        
        if (phone === '') {
            alert('Nomor telepon harus diisi!');
            return false;
        }
        
        if (!/^[0-9]{10,13}$/.test(phone.replace(/[^0-9]/g, ''))) {
            alert('Nomor telepon tidak valid!');
            return false;
        }
        
        return true;
    },
    
    // Validate product form
    validateProduct: function(form) {
        const name = form.querySelector('[name="name"]').value.trim();
        const price = form.querySelector('[name="price"]').value;
        const stock = form.querySelector('[name="stock"]').value;
        
        if (name === '') {
            alert('Nama produk harus diisi!');
            return false;
        }
        
        if (price <= 0) {
            alert('Harga harus lebih dari 0!');
            return false;
        }
        
        if (stock < 0) {
            alert('Stok tidak boleh negatif!');
            return false;
        }
        
        return true;
    }
};

// ==================== WHATSAPP HELPER ====================
const WhatsApp = {
    
    // Open WhatsApp with pre-filled message
    openChat: function(phone, message) {
        const cleanPhone = phone.replace(/[^0-9]/g, '');
        const encodedMessage = encodeURIComponent(message);
        const url = `https://wa.me/${cleanPhone}?text=${encodedMessage}`;
        window.open(url, '_blank');
    },
    
    // Send order notification to customer
    notifyCustomer: function(orderData) {
        const message = `Halo ${orderData.customer_name},\n\n` +
                       `Pesanan Anda #${orderData.id} dengan total Rp ${orderData.total} ` +
                       `telah kami terima.\n\n` +
                       `Silakan lakukan pembayaran dan konfirmasi ke nomor ini.\n\n` +
                       `Terima kasih telah berbelanja di NeedRoti! 🍪`;
        
        this.openChat(orderData.phone, message);
    }
};

// ==================== UTILITY FUNCTIONS ====================
const Utils = {
    
    // Format number as currency
    formatCurrency: function(amount) {
        return 'Rp ' + amount.toLocaleString('id-ID');
    },
    
    // Format phone number
    formatPhone: function(phone) {
        // Format: 0812-3456-7890
        const cleaned = phone.replace(/[^0-9]/g, '');
        const match = cleaned.match(/^(\d{4})(\d{4})(\d+)$/);
        if (match) {
            return match[1] + '-' + match[2] + '-' + match[3];
        }
        return phone;
    },
    
    // Show loading spinner
    showLoading: function(element) {
        element.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Loading...';
        element.disabled = true;
    },
    
    // Hide loading spinner
    hideLoading: function(element, text) {
        element.innerHTML = text;
        element.disabled = false;
    },
    
    // Copy to clipboard
    copyToClipboard: function(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Berhasil disalin ke clipboard!');
        }).catch(err => {
            console.error('Failed to copy:', err);
        });
    }
};

// ==================== ADMIN FUNCTIONS ====================
const Admin = {
    
    // Change order status
    changeOrderStatus: function(orderId, status) {
        const form = document.getElementById(`status-form-${orderId}`);
        if (form) {
            form.querySelector('[name="status"]').value = status;
            form.submit();
        }
    },
    
    // Export orders to CSV
    exportOrders: function() {
        console.log('Exporting orders...');
        // Implementation would go here
    },
    
    // Print order invoice
    printInvoice: function(orderId) {
        window.open(`/admin/orders/${orderId}/download`, '_blank');
    }
};

// ==================== SEARCH & FILTER ====================
const Search = {
    
    // Filter products
    filterProducts: function(searchTerm) {
        const products = document.querySelectorAll('.product-card');
        const term = searchTerm.toLowerCase();
        
        products.forEach(product => {
            const name = product.querySelector('.card-title').textContent.toLowerCase();
            const description = product.querySelector('.card-text').textContent.toLowerCase();
            
            if (name.includes(term) || description.includes(term)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    },
    
    // Filter orders by status
    filterOrders: function(status) {
        const orders = document.querySelectorAll('.order-row');
        
        orders.forEach(order => {
            if (status === 'all' || order.dataset.status === status) {
                order.style.display = '';
            } else {
                order.style.display = 'none';
            }
        });
    }
};

// ==================== SMOOTH SCROLL ====================
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

// ==================== BACK TO TOP BUTTON ====================
const backToTopButton = document.getElementById('back-to-top');

if (backToTopButton) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ==================== EXPORT FUNCTIONS ====================
// Make functions available globally
window.Cart = Cart;
window.WhatsApp = WhatsApp;
window.Utils = Utils;
window.Admin = Admin;
window.Search = Search;
window.FormValidator = FormValidator;