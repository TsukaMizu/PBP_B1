document.getElementById('productform').addEventListener('submit', function (event) {
    let isValid = true;

    

    // Validasi Checkbox Jasa Kirim
    const jasaKirimCheckboxes = document.querySelectorAll('input[name="jasakirim"]');
    const jasakirimError = document.getElementById('jasakirimError');
    const checkedCount = Array.from(jasaKirimCheckboxes).filter(checkbox => checkbox.checked).length;


    if (checkedCount < 3) {
        jasakirimError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        jasakirimError.style.display = 'none'; // Sembunyikan pesan error
    }
    // Validasi Harga Grosir jika grosir dipilih
    const grosiryesElement = document.getElementById('grosiryes');
    const hargaGrosirElement = document.getElementById('hargagrosir');
    const hargaGrosirError = document.querySelector('.form-group:nth-child(6) .error-message');

    if (grosiryesElement.checked && !hargaGrosirElement.value) {
        hargaGrosirError.style.display = 'block'; // Tampilkan pesan error harga grosir
        isValid = false;
    } else {
        hargaGrosirError.style.display = 'none'; // Sembunyikan pesan error harga grosir
    }

    // Validasi Nama Produk
    const productNameElement = document.getElementById('productName');
    const productNameError = productNameElement.nextElementSibling;
    if (!productNameElement.checkValidity()) {
        productNameError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        productNameError.style.display = 'none'; // Sembunyikan pesan error
    }

    // Validasi Deskripsi Produk
    const productDescriptionElement = document.getElementById('productDescripstion');
    const productDescriptionError = productDescriptionElement.nextElementSibling;
    if (!productDescriptionElement.checkValidity()) {
        productDescriptionError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        productDescriptionError.style.display = 'none'; // Sembunyikan pesan error
    }

    // Validasi Kategori Produk
    const categoryElement = document.getElementById('category');
    const categoryError = categoryElement.nextElementSibling;
    if (!categoryElement.checkValidity()) {
        categoryError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        categoryError.style.display = 'none'; // Sembunyikan pesan error
    }

    // Validasi Sub Kategori Produk
    const subcategoryElement = document.getElementById('subcategory');
    const subcategoryError = subcategoryElement.nextElementSibling;
    if (!subcategoryElement.checkValidity()) {
        subcategoryError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        subcategoryError.style.display = 'none'; // Sembunyikan pesan error
    }

    // Validasi Harga Produk
    const priceElement = document.getElementById('price');
    const priceError = priceElement.nextElementSibling;
    if (!priceElement.checkValidity()) {
        priceError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        priceError.style.display = 'none'; // Sembunyikan pesan error
    }

    // Validasi Grosir
    const grosirError = document.querySelector('.form-group:nth-child(5) .error-message');
    if (!document.querySelector('input[name="grosir"]:checked')) {
        grosirError.style.display = 'block'; // Tampilkan pesan error
        isValid = false;
    } else {
        grosirError.style.display = 'none'; // Sembunyikan pesan error
    }

    // Validasi Captcha
    const captchaInput = document.getElementById('captcha').value;
    const generatedCaptcha = document.getElementById('captchatext').textContent;
    const captchaError = document.getElementById('captcha').nextElementSibling;

    if (captchaInput !== generatedCaptcha) {
        captchaError.style.display = 'block';
        isValid = false;
    } else {
        captchaError.style.display = 'none';
    }

    // Hentikan pengiriman form jika tidak valid
    if (!isValid) {
        event.preventDefault(); // Hentikan pengiriman form
    }
});

// Update subkategori berdasarkan kategori yang dipilih
const subcategory = {
    baju: ['Baju Pria', 'Baju Wanita', 'Baju Anak'],
    elektronik: ['Mesin Cuci', 'Kulkas', 'AC'],
    alattulis: ['Kertas', 'Map', 'Pulpen']
};

document.getElementById('category').addEventListener('change', function () {
    const category = this.value;
    const subcategoryElement = document.getElementById('subcategory');
    subcategoryElement.innerHTML = '<option value="">-- Pilihan Sub Kategori --</option>';

    if (category) {
        subcategoryElement.disabled = false;
        subcategory[category].forEach(subcat => {
            const option = document.createElement('option');
            option.value = subcat.toLowerCase();
            option.textContent = subcat;
            subcategoryElement.appendChild(option);
        });
    } else {
        subcategoryElement.disabled = true;
    }
});

// Disabled/Required Harga Grosir sesuai pilihan Grosir
document.querySelectorAll('input[name="grosir"]').forEach(element => {
    element.addEventListener('change', function () {
        const hargagrosirElement = document.getElementById('hargagrosir');
        if (document.getElementById('grosiryes').checked) {
            hargagrosirElement.disabled = false;
            hargagrosirElement.required = true;
        } else {
            hargagrosirElement.disabled = true;
            hargagrosirElement.required = false;
        }
    });
});

// Generate Captcha
function generateCaptcha() {
    let captcha = '';
    for (let i = 0; i < 5; i++) {
        const randomAscii = Math.floor(Math.random() * (122 - 65 + 1)) + 65;
        if ((randomAscii >= 65 && randomAscii <= 90) || (randomAscii >= 97 && randomAscii <= 122)) {
            captcha += String.fromCharCode(randomAscii);
        } else {
            i--;
        }
    }
    document.getElementById('captchatext').textContent = captcha;
}
window.onload = generateCaptcha;


document.getElementById('resetButton').addEventListener('click', function () {
    // Reset semua input di dalam form
    document.getElementById('productform').reset();
    
    // Generate ulang CAPTCHA setelah reset
    generateCaptcha();

    // Reset error messages
    document.querySelectorAll('.error-message').forEach(function (error) {
        error.style.display = 'none';
    });
});

// Fungsi untuk memeriksa validitas input dan mengubah warna border
function validateInput(inputElement) {
    if (inputElement.checkValidity()) {
        inputElement.classList.add('valid');
        inputElement.classList.remove('invalid');
    } else {
        inputElement.classList.add('invalid');
        inputElement.classList.remove('valid');
    }
}

// Tambahkan event listener untuk semua input yang perlu divalidasi
document.querySelectorAll('#productform input[type="text"], #productform input[type="number"], #productform select').forEach(function(inputElement) {
    inputElement.addEventListener('input', function() {
        validateInput(inputElement);
    });

    // Validasi saat pertama kali halaman dimuat
    validateInput(inputElement);
});
