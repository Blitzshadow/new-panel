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
                console.debug('np_load_module response', data);
                if (!data || !data.success) {
                    container.innerHTML = '<div class="np-error">Nie udało się załadować modułu.</div>';
                    return;
                }
                var html = data.data.html || '';

                // If server returned a root element with the expected id (e.g. <section id="posts">), use it.
                // Otherwise wrap the HTML in a new <section id="moduleId"> so showSection can display it.
                var temp = document.createElement('div');
                temp.innerHTML = html;
                var found = temp.querySelector('#' + moduleId);
                // Clear previous modules root children before inserting
                container.innerHTML = '';
                if (found) {
                    // Move the element from temp into container
                    container.appendChild(found);
                    // If the element was not a <section>, ensure it is visible
                    var sec = container.querySelector('#' + moduleId);
                    if (sec) sec.classList.add('active');
                } else {
                    var secWrap = document.createElement('section');
                    secWrap.id = moduleId;
                    secWrap.className = 'animate-fadeIn active';
                    secWrap.innerHTML = html;
                    container.appendChild(secWrap);
                }

                // Ensure only this section is active
                document.querySelectorAll('main section').forEach(s => { if (s.id !== moduleId) s.classList.remove('active'); });

                // Optional: run any on-load init if present
                if (window.np_on_module_load) try { window.np_on_module_load(moduleId, container); } catch(e){ console.error(e); }
            }).catch(function(err){
                console.error('np_load_module fetch error', err);
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
