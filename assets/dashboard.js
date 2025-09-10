document.addEventListener('DOMContentLoaded', () => {
    // Funkcja do pokazywania sekcji
    function showSection(sectionId) {
        // Ukryj wszystkie sekcje
        document.querySelectorAll('main > section').forEach(sec => {
            sec.style.display = 'none';
        });

        // Pokaż wybraną sekcję
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.style.display = 'block';
        }
    }

    // Przełączanie sekcji dla wszystkich linków sidebar
    document.querySelectorAll('aside nav a').forEach(link => {
        link.addEventListener('click', e => {
            // Jeśli kliknięto toggle do podmenu, nie przełączaj sekcji
            if (link.classList.contains('sidebar-toggle')) {
                e.preventDefault();
                return;
            }

            // Jeśli to link do sekcji, przełącz sekcję
            const href = link.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                showSection(href.substring(1));
            }
        });
    });

    // Sidebar: rozwijanie/zamykanie podmenu
    document.querySelectorAll('.sidebar-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const submenuId = toggle.getAttribute('data-toggle');
            const submenu = document.getElementById(submenuId);
            if (!submenu) return;

            // Toggle klasy active dla animacji
            const isOpen = submenu.classList.contains('open');
            if (isOpen) {
                submenu.classList.remove('open');
            } else {
                submenu.classList.add('open');
            }
        });
    });

    // Domyślnie pokaż powitanie
    showSection('welcome');

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
