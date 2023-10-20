const toggleBtn = document.getElementById('toggleBtn');
const mobileMenuDropdown = document.getElementById('mobile-menu-dropdown');

toggleBtn.addEventListener('click', () => {
  mobileMenuDropdown.classList.toggle('hidden');
});

let isDropdownOpen = false;

toggleBtn.addEventListener('click', () => {
    isDropdownOpen = !isDropdownOpen;
    updateDropdownVisibility();
  });
  
  function updateDropdownVisibility() {
    if (isDropdownOpen) {
      mobileMenuDropdown.classList.remove('hidden');
    } else {
      mobileMenuDropdown.classList.add('hidden');
    }
  }
  
  // Panggil fungsi untuk memastikan status awal dropdown sesuai dengan keinginan.
  updateDropdownVisibility();

  