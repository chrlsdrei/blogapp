import './bootstrap';

// Navigation dropdown functionality
function toggleDropdown() {
    const dropdown = document.getElementById('dropdown');
    if (dropdown) {
        dropdown.classList.toggle('hidden');
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('dropdown');
    if (!dropdown) return;

    const button = event.target.closest('.round-btn');

    if (!button && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
});

window.toggleDropdown = toggleDropdown;
