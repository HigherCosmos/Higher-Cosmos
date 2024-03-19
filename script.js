// script.js - Shared JavaScript functions

// Assuming you have a list of products
const products = [
    { name: 'Dove Exfoliating Soap', price: 5.99, image: 'Dove Soap.jpg', category: "soap" },
    { name: 'Head and Shoulders-Cool Menthol', price: 10.99, image: 'Cool Menthol.jpg', category: "shampoo" },
    { name: 'Head and Shoulders Conditioner-Coconut Clean', price: 10.99, image: 'Coconut Clean.jpg', category: "conditioner" },
    { name: 'CeraVe-Benzoyl Peroxide', price: 13.49, image: 'Benzoyl.jpg', category: "skin care" },
    { name: '13 in 1 Shampoo', price: 29.99, image: '13in1shampoo.jpg', category: "shampoo" },
    { name: 'CeraVe-Salicylic Acid', price: 14.99, image: 'Salicyclic.jpg', category: "skin care" },
    { name: 'Olay-Vitamin C', price: 11.99, image: 'Vitamin C.jpg', category: "body wash" },
    { name: 'Hair Clips', price: 4.56, image: 'HairClips.jpg', category: "hair accessories" },
    { name: 'Hoop Earings', price: 4.25, image: 'HoopEarings.jpg', category: "jewelry" }, 
    { name: 'Name', price: 1, image: '' }, 
    { name: 'Name', price: 1, image: '' },
    { name: 'Name', price: 1, image: '' }

    // { name: 'Name', price: 1, image: '' }
    // Add more products as needed
];

// Smooth scroll to contact section and highlight
function scrollToContact() {
    const contactSection = document.getElementById('contact');
    const offsetTop = contactSection.offsetTop;

    // Smoothly scroll to the contact section
    window.scroll({
        top: offsetTop,
        behavior: 'smooth'
    });

    // Add pulse animation
    contactSection.classList.add('pulse');

    // Remove pulse animation
    setTimeout(() => {
        contactSection.classList.remove('pulse');
    }, 1000); // 1500 milliseconds = 1.5 seconds
}


// Function to handle Enter key press in the search bar
function handleSearchKey(event) {
    if (event.key === 'Enter') {
        const searchInput = document.getElementById('searchInput');
        const query = searchInput.value.toLowerCase();
        const matchingProduct = findMatchingProduct(query);

        if (matchingProduct) {
            scrollToProduct(matchingProduct);
            document.getElementById('sorryMessage').style.display = 'none';
        } else {
            document.getElementById('sorryMessage').style.display = 'block';
        }
    }
}

// Function to filter products based on the search query
/*function searchProducts(event) {
    if (event.key === 'Enter') {
        const searchInput = document.getElementById('searchInput');
        const query = searchInput.value.trim().toLowerCase();

        const modal = document.getElementById('productModal');
        const sorryMessage = document.getElementById('sorryMessage');

        if (query !== '') {
            // Search by category if the query matches a category
            const categoryMatch = findProductsByCategory(query);
            if (categoryMatch.length > 0) {
                displayProducts(categoryMatch);
                sorryMessage.style.display = 'none';
            } else {
                // If not a category, search for products by name
                const matchingProduct = findMatchingProduct(query);
                if (matchingProduct) {
                    // Display product details in the modal
                    displayProductDetails(matchingProduct);
                    sorryMessage.style.display = 'none';
                } else {
                    sorryMessage.style.display = 'block';
                }
            }
        } else {
            // Clear the modal and sorry message when the search bar is empty
            modal.style.display = 'none';
            sorryMessage.style.display = 'none';
        }
    }
}*/

<?php
// Assuming you have products data stored in an array called $products

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the search query from the form submission
    $query = strtolower(trim($_POST["query"]));

    // Search for matching products
    $matchingProducts = array_filter($products, function ($product) use ($query) {
        // Match product name
        return strpos(strtolower($product["name"]), $query) !== false;
    });

    // Output the matching products as JSON
    echo json_encode($matchingProducts);
}
?>

document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the search query
    const searchInput = document.getElementById('searchInput');
    const query = searchInput.value.trim().toLowerCase();

    // Send AJAX request to the PHP script
    fetch('search.php', {
        method: 'POST',
        body: new URLSearchParams({
            'query': query
        }),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response data (matching products)
        if (data.length > 0) {
            // Display matching products
            displayProducts(data);
            document.getElementById('sorryMessage').style.display = 'none';
        } else {
            // No matching products found
            document.getElementById('sorryMessage').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});



// Function to display product details in the modal
/*function displayProductDetails(product) {
    const modal = document.getElementById('productModal');
    const modalContent = document.getElementById('modalContent');

    // Update modal content with product details
    modalContent.innerHTML = `
        <h2>${product.name}</h2>
        <img src="${product.image}" alt="${product.name}">
        <p>Price: $${product.price.toFixed(2)}</p>
        <button onclick="addToCart('${product.name}', ${product.price}, '${product.image}')">Add to Cart</button>
        <button onclick="closeModal()">Close</button>
    `;

    // Display the modal
    modal.style.display = 'flex';
}

// Function to close the modal
function closeModal() {
    const modal = document.getElementById('productModal');
    modal.style.display = 'none';
}

// Function to find a matching product based on the search query
function findMatchingProduct(query) {
    // Remove spaces from the search query
    const queryWithoutSpaces = query.replace(/\s/g, '');

    return products.find(product =>
        // Remove spaces from the product name before comparing
        product.name.toLowerCase().replace(/\s/g, '').includes(queryWithoutSpaces)
    );

    return matchingProduct;
}*/


// Function to scroll to the found product
function scrollToProduct(product) {
    const productElement = document.getElementById(`product_${product.name.replace(/\s/g, '_')}`);
    if (productElement) {
        productElement.scrollIntoView({ behavior: 'smooth' });
    }
}


// Function to load cart data from localStorage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCartDisplay();
    }
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
                <img src="${image}" alt="${productName}" onerror="imageError('${productName}')">
                <div class="text-info">
                    <p>${productName} - $${price.toFixed(2)}</p> 
                    <p> Quantity: ${quantity}</p>
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

    // Apply button styles after updating the display
    applyButtonStyles();
}

// Function to save cart data to localStorage
function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to add items to the cart
function addToCart(productName, price, image) {
    if (cart[productName]) {
        // If the product is already in the cart, increase the quantity
        cart[productName].quantity += 1;
    } else {
        // If the product is not in the cart, add it with quantity 1
        cart[productName] = { price, quantity: 1, image }; // Ensure image is included here
    }

    // Save the cart data to localStorage
    saveCartToLocalStorage();

    // Update the cart display
    updateCartDisplay();
}


// Function to remove items from the cart
function removeFromCart(productName) {
    // Decrease the quantity of the product in the cart
    if (cart[productName]) {
        cart[productName].quantity -= 1;

        // Remove the product from the cart if the quantity is 0
        if (cart[productName].quantity === 0) {
            delete cart[productName];
        }
    }

    // Save the cart data to localStorage
    saveCartToLocalStorage();

    // Update the cart display
    updateCartDisplay();
}

// Function to display products
function displayProducts(products) {
    const productsContainer = document.getElementById('featured-products');
    productsContainer.innerHTML = ''; // Clear previous products

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.id = `product_${product.name.replace(/\s/g, '_')}`; // Add an ID for each product
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>$${product.price.toFixed(2)}</p>
            <button onclick="addToCart('${product.name}', ${product.price}, '${product.image}')">Add to Cart</button>
        `;
        productsContainer.appendChild(productDiv);
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Function to set cookie
const setCookie = (cName, cValue, expDays) => {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + ";" + expires + "; path=/";
}

// Function to get cookie
const getCookie = (cName) => {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie);
    const cArr = cDecoded.split(";");
    let value = "";
    cArr.forEach(val => {
        if(val.trim().indexOf(name) === 0) value = val.trim().substring(name.length);
    });
    return value;
}

// Event listener for cookie consent button
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('cookies-btn').addEventListener("click", () => {
        document.getElementById('cookie').style.display = "none";
        setCookie("cookiesAccepted", true, 90); // Set a cookie when the user accepts cookies
    });

    // Check if cookie consent has been given and display the popup if not
    cookieMessage();
});

// Function to display cookie consent popup
const cookieMessage = () => {
    if (!getCookie("cookiesAccepted")) { // Check if the cookie has been accepted
        document.getElementById('cookie').style.display = "block";
    }
}

window.onload = function() {
    // Call cookieMessage function when the page loads
    cookieMessage();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Call the loadCartFromLocalStorage function when the page loads
loadCartFromLocalStorage();

document.querySelector('a[href="#contact"]').addEventListener('click', scrollToContact);

