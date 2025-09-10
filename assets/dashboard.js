document.addEventListener('DOMContentLoaded', () => {
    // Przełączanie sekcji
    document.querySelectorAll('aside nav a').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            document.querySelectorAll('main > section').forEach(sec => sec.style.display = 'none');
            const target = document.querySelector(link.getAttribute('href'));
            if (target) target.style.display = 'block';
        });
    });
    // Domyślnie pokaż powitanie
    document.querySelectorAll('main > section').forEach(sec => sec.style.display = 'none');
    document.getElementById('welcome').style.display = 'block';

    // Przykład toast powiadomienia
    window.showToast = function(msg, type = 'info') {
        const n = document.createElement('div');
        n.className = `fixed top-4 right-4 px-4 py-2 rounded shadow-lg z-50 bg-${type === 'error' ? 'red' : 'blue'}-600 text-white animate-fadeIn`;
        n.innerText = msg;
        document.body.appendChild(n);
        setTimeout(() => n.remove(), 4000);
    };

    // Obsługa formularza kontaktowego
    document.getElementById('contact-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        showToast('Wiadomość wysłana!', 'info');
        // AJAX do REST API
    });

    // Obsługa zgłaszania problemów
    document.getElementById('issue-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        showToast('Zgłoszenie wysłane!', 'info');
        // AJAX do REST API
    });
});
