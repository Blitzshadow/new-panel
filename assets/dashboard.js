document.addEventListener('DOMContentLoaded', () => {
    // Funkcja do pokazywania sekcji; jeśli sekcji nie ma w DOM, spróbuj załadować moduł dynamicznie
    function showSection(sectionId) {
        // Usuń kl. active ze wszystkich sekcji
        document.querySelectorAll('main section').forEach(sec => sec.classList.remove('active'));
        // Usuń active z wszystkich sidebar linków
        document.querySelectorAll('aside nav a.sidebar-link').forEach(a => a.classList.remove('active'));

        const targetSection = document.getElementById(sectionId);
        const modulesRoot = document.getElementById('modules-root');

        // Jeśli istnieje sekcja w DOM, pokaż ją
        if (targetSection) {
            targetSection.classList.add('active');
        } else if (modulesRoot) {
            // Jeśli nie ma sekcji, załaduj moduł dynamicznie do modules-root
            loadModule(sectionId, modulesRoot);
        }

        // Oznacz odpowiadający link jako aktywny (jeśli istnieje)
        const link = document.querySelector(`aside nav a[href="#${sectionId}"]`);
        if (link) link.classList.add('active');
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

    // Ładuje moduł po jego identyfikatorze (bez znaku #) do podanego kontenera
    function loadModule(moduleId, container) {
        if (!moduleId || !container) return;
        // Pokaż loader
        container.innerHTML = '<div class="np-loading">Ładowanie modułu...</div>';

        // Preferowane: użyj localized np_vars from PHP
        var ajaxUrl = (window.np_vars && np_vars.ajax_url) ? np_vars.ajax_url : '/wp-admin/admin-ajax.php';
        var nonce = (window.np_vars && np_vars.nonce) ? np_vars.nonce : '';

        var fd = new FormData();
        fd.append('action', 'np_load_module');
        fd.append('module', moduleId);
        if (nonce) fd.append('security', nonce);

        fetch(ajaxUrl, { method: 'POST', credentials: 'same-origin', body: fd })
            .then(function(res){ return res.json(); })
            .then(function(data){
                if (!data || !data.success) {
                    container.innerHTML = '<div class="np-error">Nie udało się załadować modułu.</div>';
                    return;
                }
                container.innerHTML = data.data.html || '';
                // Optional: run any on-load init if present
                if (window.np_on_module_load) try { window.np_on_module_load(moduleId, container); } catch(e){}
            }).catch(function(){
                container.innerHTML = '<div class="np-error">Błąd sieci podczas ładowania modułu.</div>';
            });
    }

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
