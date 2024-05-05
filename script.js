var selectedSize = ""; 

function selectSize(size) {
    selectedSize = size; 
    var addToCartButton = document.getElementById('addToCartButton');
    event.preventDefault();
    addToCartButton.style.display = 'block';
}

function addToCart(productName, price, size) {
    if (size) {
        addToCartToCart(productName, price, size);
        updateCartCount();
        alert('Added to cart: ' + productName + ' - ' + size);
    } else {
        alert('Please select a size.');
    }
}

function addToCartToCart(productName, price, size) {
    var item = {
        name: productName,
        price: price,
        size: size,
        quantity: 1
    };

    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    let itemIndex = cart.findIndex(i => i.name === productName && i.size === size);
    if (itemIndex === -1) {
        cart.push(item);
    } else {
        cart[itemIndex].quantity++;
    }
    localStorage.setItem('cart', JSON.stringify(cart));
}

let cartCount = 0;

function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    const cartCountElement = document.querySelector('.cart-count');
    cartCountElement.textContent = cartCount;
}

window.onload = function() {
    updateCartCount();
}
