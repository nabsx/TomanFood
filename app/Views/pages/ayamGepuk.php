<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan & Pembayaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background-color: #6c5ce7;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .restaurant-info {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .menu-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .menu-item:last-child {
            border-bottom: none;
        }
        
        .menu-item-info {
            flex: 1;
        }
        
        .menu-item-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .menu-item-price {
            color: #6c5ce7;
            font-weight: bold;
        }
        
        .menu-item-actions {
            display: flex;
            align-items: center;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }
        
        .quantity-btn {
            background-color: #f0f0f0;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quantity-input {
            width: 40px;
            text-align: center;
            border: none;
            background: transparent;
            font-size: 16px;
            margin: 0 5px;
        }
        
        .add-btn {
            background-color: #6c5ce7;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        
        .cart-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-item-info {
            flex: 1;
        }
        
        .cart-item-title {
            font-weight: bold;
        }
        
        .cart-item-price {
            color: #6c5ce7;
        }
        
        .remove-btn {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .cart-summary {
            margin-top: 20px;
            border-top: 1px dashed #ddd;
            padding-top: 20px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .summary-row.total {
            font-weight: bold;
            font-size: 18px;
            color: #6c5ce7;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }
        
        .payment-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .payment-method {
            margin-bottom: 20px;
        }
        
        .payment-option {
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        .payment-option.selected {
            border-color: #6c5ce7;
            background-color: #f5f2ff;
        }
        
        .payment-option input {
            margin-right: 10px;
        }
        
        .checkout-btn {
            background-color: #6c5ce7;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .section-title {
            margin-bottom: 15px;
            color: #333;
        }
        
        .empty-cart {
            text-align: center;
            padding: 20px;
            color: #666;
        }
        
        .back-btn {
            background-color: transparent;
            border: 1px solid #6c5ce7;
            color: #6c5ce7;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
        }
        
        .back-btn svg {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-btn" onclick="window.history.back()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7"></path>
            </svg>
            Kembali
        </button>
        
        <div class="header">
            <h1>Pesanan & Pembayaran</h1>
            <p>Pilih menu favorit Anda dan lakukan pembayaran</p>
        </div>
        
        <div class="restaurant-info">
            <h2 id="restaurant-name">Ayam Gepuk</h2>
            <div class="rating">★★★★☆</div>
            <p id="restaurant-desc">Nikmati ayam gepuk yang gurih dan pedas, dengan bumbu khas yang menggugah selera. Ayam yang digoreng crispy, disajikan dengan sambal terasi pedas, nasi putih, dan lalapan segar.</p>
        </div>

        
        <div class="menu-section">
            <h3 class="section-title">Menu</h3>
            
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Ayam Gepuk Original</div>
                    <div class="menu-item-desc">Ayam goreng crispy dengan bumbu gepuk yang pedas manis, disajikan dengan nasi putih dan sambal khas.</div>
                    <div class="menu-item-price">Rp 35.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Ayam Gepuk Original', 35000)">+ Tambah</button>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Ayam Gepuk Spicy</div>
                    <div class="menu-item-desc">Ayam goreng dengan bumbu gepuk ekstra pedas, untuk yang suka tantangan rasa pedas.</div>
                    <div class="menu-item-price">Rp 38.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Ayam Gepuk Spicy', 38000)">+ Tambah</button>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Ayam Gepuk Terasi</div>
                    <div class="menu-item-desc">Ayam goreng dengan bumbu gepuk terasi yang gurih dan pedas, cocok untuk penyuka sambal terasi.</div>
                    <div class="menu-item-price">Rp 40.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Ayam Gepuk Terasi', 40000)">+ Tambah</button>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Ayam Gepuk Madu</div>
                    <div class="menu-item-desc">Ayam goreng dengan bumbu gepuk madu yang manis dan gurih, disajikan dengan nasi dan sambal.</div>
                    <div class="menu-item-price">Rp 42.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Ayam Gepuk Madu', 42000)">+ Tambah</button>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Ayam Bakar Gepuk</div>
                    <div class="menu-item-desc">Ayam bakar dengan bumbu gepuk yang kaya rasa, disajikan dengan nasi dan lalapan.</div>
                    <div class="menu-item-price">Rp 45.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Ayam Bakar Gepuk', 45000)">+ Tambah</button>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Ayam Gepuk Penyet</div>
                    <div class="menu-item-desc">Ayam gepuk yang dipenyet dengan sambal terasi pedas, disajikan dengan nasi hangat dan lalapan segar.</div>
                    <div class="menu-item-price">Rp 38.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Ayam Gepuk Penyet', 38000)">+ Tambah</button>
                </div>
            </div>

            <!-- Minuman Es Teh Manis dan Es Teh Tawar -->
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Es Teh Manis</div>
                    <div class="menu-item-desc">Teh manis dingin yang menyegarkan, pas untuk menemani ayam gepuk.</div>
                    <div class="menu-item-price">Rp 8.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Es Teh Manis', 8000)">+ Tambah</button>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Es Teh Tawar</div>
                    <div class="menu-item-desc">Teh tawar dingin, segar dan bebas gula, cocok untuk yang ingin pilihan yang lebih ringan.</div>
                    <div class="menu-item-price">Rp 7.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart('Es Teh Tawar', 7000)">+ Tambah</button>
                </div>
            </div>

        </div>
        
        <div class="cart-section">
            <h3 class="section-title">Pesanan Anda</h3>
            
            <div id="cart-items">
                <div class="empty-cart">
                    <p>Keranjang Anda masih kosong</p>
                    <p>Silakan tambahkan menu dari daftar di atas</p>
                </div>
            </div>
            
            <div id="cart-summary" class="cart-summary" style="display: none;">
                <div class="summary-row">
                    <div>Subtotal</div>
                    <div id="subtotal">Rp 0</div>
                </div>
                <div class="summary-row">
                    <div>Biaya Pengiriman</div>
                    <div id="delivery-fee">Rp 10.000</div>
                </div>
                <div class="summary-row">
                    <div>Pajak (10%)</div>
                    <div id="tax">Rp 0</div>
                </div>
                <div class="summary-row total">
                    <div>Total</div>
                    <div id="total">Rp 0</div>
                </div>
            </div>
        </div>
        
        <div id="payment-section" class="payment-section" style="display: none;">
            <h3 class="section-title">Metode Pembayaran</h3>
            
            <div class="payment-method">
                <div class="payment-option selected" onclick="selectPayment(this)">
                    <input type="radio" name="payment" id="cash" checked>
                    <label for="cash">Tunai</label>
                </div>
                
                <div class="payment-option" onclick="selectPayment(this)">
                    <input type="radio" name="payment" id="ovo">
                    <label for="ovo">OVO</label>
                </div>
                
                <div class="payment-option" onclick="selectPayment(this)">
                    <input type="radio" name="payment" id="gopay">
                    <label for="gopay">GoPay</label>
                </div>
                
                <div class="payment-option" onclick="selectPayment(this)">
                    <input type="radio" name="payment" id="dana">
                    <label for="dana">DANA</label>
                </div>
                
                <div class="payment-option" onclick="selectPayment(this)">
                    <input type="radio" name="payment" id="bank-transfer">
                    <label for="bank-transfer">Transfer Bank</label>
                </div>
            </div>
            
            <button class="checkout-btn" onclick="checkout()">Bayar Sekarang</button>
        </div>
    </div>
    
    <script>
        let cart = [];
        let deliveryFee = 10000;
        let taxRate = 0.1;
        
        function formatRupiah(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }
        
        function addToCart(name, price) {
            let existingItem = cart.find(item => item.name === name);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    name: name,
                    price: price,
                    quantity: 1
                });
            }
            
            updateCart();
        }
        
        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCart();
        }
        
        function updateQuantity(index, newQuantity) {
            if (newQuantity <= 0) {
                removeFromCart(index);
            } else {
                cart[index].quantity = newQuantity;
                updateCart();
            }
        }
        
        function updateCart() {
            const cartItemsElement = document.getElementById('cart-items');
            const cartSummaryElement = document.getElementById('cart-summary');
            const paymentSectionElement = document.getElementById('payment-section');
            
            if (cart.length === 0) {
                cartItemsElement.innerHTML = `
                    <div class="empty-cart">
                        <p>Keranjang Anda masih kosong</p>
                        <p>Silakan tambahkan menu dari daftar di atas</p>
                    </div>
                `;
                cartSummaryElement.style.display = 'none';
                paymentSectionElement.style.display = 'none';
                return;
            }
            
            let cartHTML = '';
            
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                
                cartHTML += `
                    <div class="cart-item">
                        <div class="cart-item-info">
                            <div class="cart-item-title">${item.name}</div>
                            <div class="cart-item-price">${formatRupiah(item.price)} x ${item.quantity}</div>
                        </div>
                        <div class="quantity-control">
                            <button class="quantity-btn" onclick="updateQuantity(${index}, ${item.quantity - 1})">-</button>
                            <input class="quantity-input" type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, parseInt(this.value))">
                            <button class="quantity-btn" onclick="updateQuantity(${index}, ${item.quantity + 1})">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeFromCart(${index})">Hapus</button>
                    </div>
                `;
            });
            
            cartItemsElement.innerHTML = cartHTML;
            
            let subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            let tax = subtotal * taxRate;
            let total = subtotal + tax + deliveryFee;
            
            document.getElementById('subtotal').textContent = formatRupiah(subtotal);
            document.getElementById('tax').textContent = formatRupiah(tax);
            document.getElementById('total').textContent = formatRupiah(total);
            
            cartSummaryElement.style.display = 'block';
            paymentSectionElement.style.display = 'block';
        }
        
        function selectPayment(element) {
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            element.classList.add('selected');
            element.querySelector('input').checked = true;
        }
        
        function checkout() {
            if (cart.length === 0) {
                alert('Silakan tambahkan menu ke keranjang terlebih dahulu.');
                return;
            }
            
            const selectedPayment = document.querySelector('input[name="payment"]:checked').id;
            
            alert(`Terima kasih atas pesanan Anda!\nPesanan Anda sedang diproses.\nMetode pembayaran: ${selectedPayment}`);
            
            // Reset cart
            cart = [];
            updateCart();
        }
        
        // Toggle between restaurants (just for demo)
        function changeRestaurant(name) {
            const restaurantName = document.getElementById('restaurant-name');
            const restaurantDesc = document.getElementById('restaurant-desc');
            
            if (name === 'sakura') {
                restaurantName.textContent = 'Sakura Bento';
                restaurantDesc.textContent = 'Kelezatan Jepang dalam setiap gigitan! Menghadirkan hidangan khas Jepang seperti Chicken Katsu, Beef Yakiniku, dan Tempura yang otentik.';
                
                // Change menu items
                document.querySelector('.menu-section').innerHTML = `
                    <h3 class="section-title">Menu</h3>
                    
                    <div class="menu-item">
                        <div class="menu-item-info">
                            <div class="menu-item-title">Chicken Katsu</div>
                            <div class="menu-item-desc">Ayam katsu renyah dengan saus tonkatsu</div>
                            <div class="menu-item-price">Rp 50.000</div>
                        </div>
                        <div class="menu-item-actions">
                            <button class="add-btn" onclick="addToCart('Chicken Katsu', 50000)">+ Tambah</button>
                        </div>
                    </div>
                    
                    <div class="menu-item">
                        <div class="menu-item-info">
                            <div class="menu-item-title">Beef Yakiniku</div>
                            <div class="menu-item-desc">Daging sapi panggang dengan saus yakiniku</div>
                            <div class="menu-item-price">Rp 65.000</div>
                        </div>
                        <div class="menu-item-actions">
                            <button class="add-btn" onclick="addToCart('Beef Yakiniku', 65000)">+ Tambah</button>
                        </div>
                    </div>
                    
                    <div class="menu-item">
                        <div class="menu-item-info">
                            <div class="menu-item-title">Tempura Udang</div>
                            <div class="menu-item-desc">5 buah tempura udang dengan saus tentsuyu</div>
                            <div class="menu-item-price">Rp 45.000</div>
                        </div>
                        <div class="menu-item-actions">
                            <button class="add-btn" onclick="addToCart('Tempura Udang', 45000)">+ Tambah</button>
                        </div>
                    </div>
                    
                    <div class="menu-item">
                        <div class="menu-item-info">
                            <div class="menu-item-title">Salmon Sushi</div>
                            <div class="menu-item-desc">8 pcs salmon sushi</div>
                            <div class="menu-item-price">Rp 70.000</div>
                        </div>
                        <div class="menu-item-actions">
                            <button class="add-btn" onclick="addToCart('Salmon Sushi', 70000)">+ Tambah</button>
                        </div>
                    </div>
                    
                    <div class="menu-item">
                        <div class="menu-item-info">
                            <div class="menu-item-title">Ocha</div>
                            <div class="menu-item-desc">Teh hijau Jepang</div>
                            <div class="menu-item-price">Rp 15.000</div>
                        </div>
                        <div class="menu-item-actions">
                            <button class="add-btn" onclick="addToCart('Ocha', 15000)">+ Tambah</button>
                        </div>
                    </div>
                `;
            } else {
                restaurantName.textContent = 'Sate Khas Nusantara';
                restaurantDesc.textContent = 'Warisan rasa yang melekat di hati! Di "Sate Mas Joko", kami menyajikan sate dengan daging pilihan yang dibakar sempurna, berpadu dengan bumbu tradisional.';
                
                // Reset to default menu
                location.reload();
            }
            
            // Clear cart when switching restaurants
            cart = [];
            updateCart();
        }
    </script>
</body>
</html>