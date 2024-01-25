// cart.js - Handle shopping cart logic

// Define a cart object to track products and quantities
let cart = {};

function addToCart(productName, price) {
    if (cart[productName]) {
        // If the product is already in the cart, increase the quantity
        cart[productName].quantity += 1;
    } else {
        // If the product is not in the cart, add it with quantity 1
        cart[productName] = { price, quantity: 1 };
    }

    updateCartDisplay();

    // Save the cart data to localStorage
    saveCartToLocalStorage();
}

function removeFromCart(productName) {
    // Decrease the quantity of the product in the cart
    if (cart[productName]) {
        cart[productName].quantity -= 1;

        // Remove the product from the cart if the quantity is 0
        if (cart[productName].quantity === 0) {
            delete cart[productName];
        }
    }

    updateCartDisplay();

    // Save the cart data to localStorage
    saveCartToLocalStorage();
}

// Function to update the cart display
function updateCartDisplay() {
    const cartItemsDiv = document.getElementById('cart-items');
    cartItemsDiv.innerHTML = '';

    let total = 0;

    for (const [productName, { price, quantity, image }] of Object.entries(cart)) {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
            <div class="product-info">
                <img src="${image}" alt="${productName}" style="width: 50px; height: 50px;" onerror="imageError('${productName}')">
                <div class="text-info">
                    <p>${productName} - $${price.toFixed(2)} x ${quantity}</p>
                    <button class="remove-button" onclick="removeFromCart('${productName}')">Remove</button>
                </div>
            </div>
        `;
        cartItemsDiv.appendChild(itemDiv);

        // Calculate and update the total price
        total += price * quantity;
    }

    // Display the total price
    const totalPriceDiv = document.getElementById('total-price');
    totalPriceDiv.innerText = `Total: $${total.toFixed(2)}`;
}

// Function to save cart data to localStorage
function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to load cart data from localStorage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCartDisplay();
    }
}

// Load cart data when the page is loaded
loadCartFromLocalStorage();
