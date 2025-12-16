document.addEventListener('DOMContentLoaded', () => {

    const body = document.body;
    const toggle = document.getElementById('themeToggle');

    const savedTheme = localStorage.getItem('theme') || 'dark';
    body.classList.add(savedTheme);

    toggle.addEventListener('click', () => {
        const newTheme = body.classList.contains('dark') ? 'light' : 'dark';

        body.classList.remove('dark', 'light');
        body.classList.add(newTheme);

        localStorage.setItem('theme', newTheme);
    });

});
