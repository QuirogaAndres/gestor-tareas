import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('toggle-dark');

    if (!toggle) return;

    toggle.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');

        // Guardar preferencia en localStorage
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });

    // Cargar preferencia previa
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    }
});
