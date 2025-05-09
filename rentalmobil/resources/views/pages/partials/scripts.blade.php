<script>
  // Inisialisasi carousel
  function showItem(index) {
  items.forEach((item, i) => {
    if (i === index) {
      item.classList.remove('hidden');
      item.classList.add('opacity-0');
      setTimeout(() => {
        item.classList.add('opacity-100');
        item.classList.remove('opacity-0');
      }, 10); // aktifkan transisi smooth
    } else {
      item.classList.remove('opacity-100');
      item.classList.add('opacity-0');
      setTimeout(() => {
        item.classList.add('hidden');
      }, 300); // tunggu transisi selesai sebelum hidden
    }
  });

  // Update indikator
  if (indicators.length > 0) {
    indicators.forEach((indicator, i) => {
      indicator.classList.toggle('bg-[#1e2b5c]', i === index);
      indicator.classList.toggle('bg-gray-300', i !== index);
      indicator.setAttribute('aria-current', i === index);
    });
  }
}

 
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        currentIndex = index;
        showItem(currentIndex);
      });
    });
    
    // Auto slide jika diperlukan
    if (carousel.dataset.carousel === 'slide') {
      setInterval(nextItem, 3000);
    }
    
    // Tampilkan item pertama
    showItem(0);
  });
  
  // Logout confirmation
  function confirmLogout() {
    if (confirm('Apakah Anda yakin ingin keluar?')) {
      document.getElementById('logout-form').submit();
    }
  }
</script>