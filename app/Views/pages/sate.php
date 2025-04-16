<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan & Pembayaran</title>
    <style>
        /* CSS tetap sama seperti sebelumnya */
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
            <h2 id="restaurant-name">Sate Khas Nusantara</h2>
            <div class="rating">★★★★★</div>
            <p id="restaurant-desc">Warisan rasa yang melekat di hati! Di "Sate Mas Joko", kami menyajikan sate dengan daging pilihan yang dibakar sempurna, berpadu dengan bumbu tradisional.</p>
        </div>
        
        <div class="menu-section">
            <h3 class="section-title">Menu</h3>
            
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Sate Ayam</div>
                    <div class="menu-item-desc">10 tusuk sate ayam dengan bumbu kacang</div>
                    <div class="menu-item-price">Rp 35.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart(1, 'Sate Ayam', 35000)">+ Tambah</button>
                </div>
            </div>
            
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Sate Kambing</div>
                    <div class="menu-item-desc">10 tusuk sate kambing dengan bumbu kacang spesial</div>
                    <div class="menu-item-price">Rp 45.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart(2, 'Sate Kambing', 45000)">+ Tambah</button>
                </div>
            </div>
            
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Sate Maranggi</div>
                    <div class="menu-item-desc">10 tusuk sate maranggi dengan kecap manis</div>
                    <div class="menu-item-price">Rp 40.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart(3, 'Sate Maranggi', 40000)">+ Tambah</button>
                </div>
            </div>
            
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Nasi Putih</div>
                    <div class="menu-item-desc">Nasi putih pulen</div>
                    <div class="menu-item-price">Rp 5.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart(4, 'Nasi Putih', 5000)">+ Tambah</button>
                </div>
            </div>
            
            <div class="menu-item">
                <div class="menu-item-info">
                    <div class="menu-item-title">Es Teh Manis</div>
                    <div class="menu-item-desc">Teh manis dingin</div>
                    <div class="menu-item-price">Rp 7.000</div>
                </div>
                <div class="menu-item-actions">
                    <button class="add-btn" onclick="addToCart(5, 'Es Teh Manis', 7000)">+ Tambah</button>
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
        let selectedPayment = 'cash'; // Tambahkan ini di bagian deklarasi variabel     
        
        
        function formatRupiah(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }
        
        function addToCart(menuId, name, price) {
            let existingItem = cart.find(item => item.menu_id === menuId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    menu_id: menuId,
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
        
        // Fungsi selectPayment yang diperbarui
function selectPayment(element) {
    document.querySelectorAll('.payment-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    element.classList.add('selected');
    selectedPayment = element.querySelector('input').id; // Update selectedPayment
}
        
        function checkout() {
    if (cart.length === 0) {
        alert('Keranjang Anda masih kosong');
        return;
    }

    // Hitung total
    const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    const tax = subtotal * taxRate;
    const total = subtotal + tax + deliveryFee;

    // Siapkan data untuk dikirim ke server
    const orderData = {
        customer_name: "Nama Pelanggan", // Ganti dengan input dari form
        payment_method: selectedPayment,
        items: cart.map(item => ({
            menu_id: item.menu_id,
            quantity: item.quantity,
            price: item.price
        }))
    };

    console.log('Data yang dikirim:', orderData); // Debugging

    // Kirim data ke server
    fetch('/order/checkout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(orderData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Pesanan berhasil diproses! ID Pesanan: ' + data.order_id);
            cart = [];
            updateCart();
        } else {
            throw new Error(data.message || 'Gagal memproses pesanan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error: ' + error.message);
    }
    

      );
}
    </script>
</body>
</html>