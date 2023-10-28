document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('categorySelect');
    const searchInput = document.getElementById('searchInput');
    const productList = document.getElementById('productList');
    const productDetails = document.getElementById('productDetails');

    // Function to fetch categories from the server and populate the category dropdown
    function fetchCategories() {
        // Assume you have a server endpoint to fetch categories
        // Example: fetch('/api/categories')
        // .then(response => response.json())
        // .then(data => {
        //     data.forEach(category => {
        //         const option = document.createElement('option');
        //         option.value = category.id;
        //         option.textContent = category.name;
        //         categorySelect.appendChild(option);
        //     });
        // })
        // .catch(error => console.error(error));
    }

    // Function to fetch products based on category and search term
    function fetchProducts(categoryId, searchTerm) {
        // Assume you have a server endpoint to fetch products
        // Example: fetch(`/api/products?category=${categoryId}&search=${searchTerm}`)
        // .then(response => response.json())
        // .then(data => {
        //     productList.innerHTML = '';
        //     data.forEach(product => {
        //         const li = document.createElement('li');
        //         li.textContent = product.nom_product;
        //         li.addEventListener('click', () => showProductDetails(product.id));
        //         productList.appendChild(li);
        //     });
        // })
        // .catch(error => console.error(error));
    }

    // Function to fetch and display product details
    function showProductDetails(productId) {
        // Assume you have a server endpoint to fetch product details by ID
        // Example: fetch(`/api/products/${productId}`)
        // .then(response => response.json())
        // .then(product => {
        //     productDetails.innerHTML = `
        //         <h2>${product.nom_product}</h2>
        //         <p>${product.description_product}</p>
        //         <p>Prix: ${product.prix_product}</p>
        //     `;
        // })
        // .catch(error => console.error(error));
    }

    // Event listener for category selection change
    categorySelect.addEventListener('change', function() {
        const categoryId = categorySelect.value;
        const searchTerm = searchInput.value;
        fetchProducts(categoryId, searchTerm);
    });

    // Event listener for search input change
    searchInput.addEventListener('input', function() {
        const categoryId = categorySelect.value;
        const searchTerm = searchInput.value;
        fetchProducts(categoryId, searchTerm);
    });

    // Fetch categories when the page loads
    fetchCategories();
});
