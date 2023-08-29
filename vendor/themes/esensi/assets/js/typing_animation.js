// Fungsi untuk membuat efek animasi mengetik
function animateTyping(element, text, delay) {
    let charIndex = 0;
    const timer = setInterval(function() {
      if (charIndex <= text.length) {
        element.textContent = text.substr(0, charIndex);
        charIndex++;
      } else {
        clearInterval(timer);
        setTimeout(function() {
          animateTyping(element, text, delay); // Loop untuk animasi tanpa henti
        }, delay);
      }
    }, delay);
  }
  
  window.onload = function() {
    // Panggil fungsi animateTyping dengan elemen dan teks yang ingin dianimasikan
    const namaDesaElement = document.getElementById('nama_desa');
    const namaDesaText = namaDesaElement.textContent;
    const delay = 100; // Kecepatan animasi (ms per karakter)
  
    animateTyping(namaDesaElement, namaDesaText, delay);
  };
  