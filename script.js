// script.js - Shared JavaScript functions

// Assuming you have a list of products
/*
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
*/
const products = [
    { 
        name: 'Dove Exfoliating Soap', 
        price: 5.99, 
        image: 'Dove Soap.jpg', 
        description: 'Gentle exfoliating soap for smooth and soft skin.', 
        category: 'soap' 
    },
    { 
        name: 'Head and Shoulders-Cool Menthol', 
        price: 10.99, 
        image: 'Cool Menthol.jpg', 
        description: 'Refreshing shampoo with cool menthol scent.', 
        category: 'shampoo' 
    },
    { 
        name: 'Head and Shoulders Conditioner-Coconut Clean', 
        price: 10.99, 
        image: 'Coconut Clean.jpg', 
        description: 'Nourishing conditioner with the essence of coconut.', 
        category: 'conditioner' 
    },
    { 
        name: 'CeraVe-Benzoyl Peroxide', 
        price: 13.49, 
        image: 'Benzoyl.jpg', 
        description: 'Benzoyl peroxide acne treatment.', 
        category: 'skin care' 
    },
    { 
        name: '13 in 1 Shampoo', 
        price: 29.99, 
        image: '13in1shampoo.jpg', 
        description: 'Multipurpose shampoo for various hair types.', 
        category: 'shampoo' 
    },
    { 
        name: 'CeraVe-Salicylic Acid', 
        price: 14.99, 
        image: 'Salicyclic.jpg', 
        description: 'Salicylic acid acne treatment.', 
        category: 'skin care' 
    },
    { 
        name: 'Olay-Vitamin C', 
        price: 11.99, 
        image: 'Vitamin C.jpg', 
        description: 'Body wash enriched with vitamin C for glowing skin.', 
        category: 'body wash' 
    },
    { 
        name: 'Hair Clips', 
        price: 4.56, 
        image: 'HairClips.jpg', 
        description: 'Assorted hair clips for styling.', 
        category: 'hair accessories' 
    },
    { 
        name: 'Hoop Earings', 
        price: 4.25, 
        image: 'GoldHoops.jpg', 
        description: 'Stylish hoop earrings for everyday wear.', 
        category: 'jewelry' 
    },
    { 
        name: 'Pepperment Musk', 
        price: 25.99, 
        image: 'MenScent1.jpg', 
        description: 'Men Scent.', 
        category: 'scent' 
    },
    { 
        name: 'Another Scent', 
        price: 25.99, 
        image: 'MenScent2.jpg', 
        description: 'Another great scent.', 
        category: 'scent' 
    },
    { 
        name: 'Yet Another Scent', 
        price: 25.99, 
        image: 'MenScent3.jpg', 
        description: 'Yet another amazing scent.', 
        category: 'scent' 
    },
    { 
        name: 'Cool Breeze Scent', 
        price: 25.99, 
        image: 'MenScent4.jpg', 
        description: 'Refreshing cool breeze scent.', 
        category: 'scent' 
    },
    { 
        name: 'Ocean Mist Scent', 
        price: 25.99, 
        image: 'MenScent5.jpg', 
        description: 'Refreshing ocean mist scent.', 
        category: 'scent' 
    },
    { 
        name: 'Mountain Fresh Scent', 
        price: 25.99, 
        image: 'MenScent6.jpg', 
        description: 'Crisp mountain fresh scent.', 
        category: 'scent' 
    },
    { 
        name: 'Forest Rain Scent', 
        price: 25.99, 
        image: 'MenScent7.1.jpg', 
        description: 'Invigorating forest rain scent.', 
        category: 'scent' 
    },
    { 
        name: 'Citrus Splash Scent', 
        price: 25.99, 
        image: 'MenScent8.jpg', 
        description: 'Energizing citrus splash scent.', 
        category: 'scent' 
    },
    { 
        name: 'Space Dream', 
        price: 25.99, 
        image: 'WOMScent1.jpg', 
        description: 'A nice unique combination of mixed oils and flowery components for a dreamy sensation of smell.', 
        category: 'scent' 
    },
    { 
        name: 'Pink Saturn', 
        price: 25.99, 
        image: 'WOMScent2.jpg', 
        description: 'With special design made for luxury, this scent is meant to feel bright, light, and slightly more noticeable for all day long-lasting smell.', 
        category: 'scent' 
    },
    { 
        name: 'Nebulous', 
        price: 25.99, 
        image: 'WOMScent3.jpg', 
        description: 'With lavender and vanilla creates a sweet milky smell for home comfort feels.', 
        category: 'scent' 
    },
    { 
        name: 'Crystal Light', 
        price: 25.99, 
        image: 'WOMScent4.jpg', 
        description: 'A dusty rose oil mix with luminous shimmer and shine.', 
        category: 'scent' 
    },
    { 
        name: 'Remember Mars', 
        price: 25.99, 
        image: 'WOMScent5.jpg', 
        description: 'The unforgettable strong and feminine mixture of cherry blossoms.', 
        category: 'scent' 
    },
    { 
        name: 'Venus Sky', 
        price: 25.99, 
        image: 'WOMScent6.jpg', 
        description: 'A jasmine sensation of smell with mahogany tree extracts.', 
        category: 'scent' 
    },
    { 
        name: 'Martian Sunset', 
        price: 25.99, 
        image: 'WOMScent7.jpg', 
        description: 'Feel out of this world with the element of berries and fresh citrus lemon.', 
        category: 'scent' 
    }
    
    

    // Add more products as needed
];

// Grid Look
function displayProductsInGrid() {
    const productGrid = document.querySelector('.product-grid');
    productGrid.innerHTML = '';

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product');
        productDiv.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>$${product.price.toFixed(2)}</p>
            <button class="add-to-cart-btn" onclick="addToCart('${product.name}', ${product.price}, '${product.image}')">Add to Cart</button>
        `;
        productGrid.appendChild(productDiv);

        // Add event listener to open modal when clicking on product image or name
        productDiv.querySelector('img').addEventListener('click', () => openModal(product));
        productDiv.querySelector('h3').addEventListener('click', () => openModal(product));
    });
}

// Function to open the modal and display product details
function openModal(product) {
    const modal = document.getElementById('productModal');
    const modalProductName = document.getElementById('modalProductName');
    const modalProductImage = document.getElementById('modalProductImage');
    const modalProductDescription = document.getElementById('modalProductDescription');
    const modalProductPrice = document.getElementById('modalProductPrice');
    const addToCartButton = document.getElementById('addToCartButton');

    modalProductName.textContent = product.name;
    modalProductImage.src = product.image;
    modalProductDescription.textContent = product.description; // Assuming product has a 'description' property
    modalProductPrice.textContent = `$${product.price.toFixed(2)}`;

    // Set onclick event for Add to Cart button
    addToCartButton.onclick = () => addToCart(product);

    modal.style.display = 'block';
}

// Function to handle click events on product squares
function handleProductClick(product) {
    const target = event.target;
    const addToCartButton = target.closest('.add-to-cart-btn');
    const isModalOpen = document.getElementById('productModal').style.display === 'block';

    if (!addToCartButton && !isModalOpen) {
        openModal(product);
    }
}


// Update the product display loop to add event listener to each product
products.forEach(product => {
    const productDiv = document.createElement('div');
    productDiv.classList.add('product');
    productDiv.innerHTML = `
        <img src="${product.image}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>$${product.price.toFixed(2)}</p>
        <button class="add-to-cart-btn">Add to Cart</button>
    `;
    productDiv.addEventListener('click', () => handleProductClick(product)); // Handle clicks on product squares
    document.querySelector('.product-grid').appendChild(productDiv);
});

function closeModal() {
    const modal = document.getElementById('productModal');
    modal.style.display = 'none';
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
function displayProductDetails(product) {
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
}


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

// Function to display notification
function displayNotification(productName) {
    const notification = document.createElement('div');
    notification.classList.add('notification');
    notification.textContent = `${productName} added to cart`;
    document.body.appendChild(notification);

    // Remove notification after a few seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
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

    // Display notification
    displayNotification(productName);

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

// Function to clear the entire cart
function clearCart() {
    cart = {}; // Clear the cart object
    saveCartToLocalStorage(); // Save the updated cart to local storage
    updateCartDisplay(); // Update the cart display
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
displayProductsInGrid();
// Call the loadCartFromLocalStorage function when the page loads
loadCartFromLocalStorage();

document.querySelector('a[href="#contact"]').addEventListener('click', scrollToContact);

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