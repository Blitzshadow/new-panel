<div id="client-dashboard" class="bg-gray-900 text-gray-100 min-h-screen flex">
    <!-- Panel boczny -->
    <aside class="w-72 sidebar flex flex-col min-h-screen">
        <div class="sidebar-header flex items-center gap-3">
            <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-8" alt="Logo">
            Weblu Panel
        </div>
        <nav class="sidebar-menu flex-1">
                <ul class="space-y-1 list-none p-0 m-0">
                    <li class="sidebar-section">Dashboard</li>
                    <li>
                        <a href="#dashboard" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 8h2v-2H7v2zm0-4h2v-2H7v2zm0-8v2h2V5H7z"/></svg>
                            Strona główna
                        </a>
                    </li>
                    <li class="sidebar-section">Strony i Wpisy</li>
                    <li>
                        <a href="#posts" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 6h8M8 10h8M8 14h6"/></svg>
                            Wpisy
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#posts-list" class="sidebar-link">Lista wpisów</a></li>
                            <li><a href="#add-post" class="sidebar-link">Dodaj wpis</a></li>
                            <li><a href="#edit-post" class="sidebar-link">Edycja / publikacja / draft</a></li>
                            <li><a href="#categories" class="sidebar-link">Kategorie i tagi</a></li>
                            <li><a href="#preview-post" class="sidebar-link">Podgląd wpisu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pages" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                            Strony
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#pages-list" class="sidebar-link">Lista stron</a></li>
                            <li><a href="#add-page" class="sidebar-link">Dodaj stronę</a></li>
                            <li><a href="#edit-page" class="sidebar-link">Edycja stron</a></li>
                            <li><a href="#templates" class="sidebar-link">Szablony stron</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#media" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                            Media
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#media-library" class="sidebar-link">Biblioteka mediów</a></li>
                            <li><a href="#add-media" class="sidebar-link">Dodaj plik</a></li>
                            <li><a href="#edit-media" class="sidebar-link">Edycja plików</a></li>
                            <li><a href="#folders" class="sidebar-link">Organizacja folderów</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Sklep (WooCommerce)</li>
                    <li>
                        <a href="#orders" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-6h6v6m-6 0h6"/></svg>
                            Zamówienia
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#orders-list" class="sidebar-link">Lista zamówień</a></li>
                            <li><a href="#order-details" class="sidebar-link">Szczegóły zamówienia</a></li>
                            <li><a href="#order-status" class="sidebar-link">Statusy zamówień</a></li>
                            <li><a href="#export-orders" class="sidebar-link">Eksport do CSV/PDF</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#products" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                            Produkty
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#products-list" class="sidebar-link">Lista produktów</a></li>
                            <li><a href="#add-product" class="sidebar-link">Dodaj produkt</a></li>
                            <li><a href="#edit-product" class="sidebar-link">Edycja produktu</a></li>
                            <li><a href="#categories-products" class="sidebar-link">Kategorie, tagi, warianty</a></li>
                            <li><a href="#stock" class="sidebar-link">Stany magazynowe</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#coupons" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 7v10"/></svg>
                            Kupony / Promocje
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#coupons-list" class="sidebar-link">Lista kuponów</a></li>
                            <li><a href="#add-coupon" class="sidebar-link">Tworzenie kuponu</a></li>
                            <li><a href="#edit-coupon" class="sidebar-link">Edycja kuponu</a></li>
                            <li><a href="#coupon-report" class="sidebar-link">Raport użycia</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#reports" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
                            Raporty i analityka
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#sales-daily" class="sidebar-link">Sprzedaż dzienna</a></li>
                            <li><a href="#sales-monthly" class="sidebar-link">Sprzedaż miesięczna</a></li>
                            <li><a href="#sales-yearly" class="sidebar-link">Sprzedaż roczna</a></li>
                            <li><a href="#popular-products" class="sidebar-link">Najpopularniejsze produkty</a></li>
                            <li><a href="#revenue" class="sidebar-link">Przychody i marże</a></li>
                            <li><a href="#trends" class="sidebar-link">Trendy i wykresy</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Klienci i Użytkownicy</li>
                    <li>
                        <a href="#customers" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                            Lista klientów / użytkowników
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#edit-user" class="sidebar-link">Edycja profilu użytkownika</a></li>
                            <li><a href="#roles" class="sidebar-link">Role i uprawnienia</a></li>
                            <li><a href="#activity" class="sidebar-link">Historia aktywności</a></li>
                            <li><a href="#block-user" class="sidebar-link">Blokowanie / usuwanie kont</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Formularze i Kontakty</li>
                    <li>
                        <a href="#forms" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                            Formularz kontaktowy
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#contact-history" class="sidebar-link">Historia zgłoszeń</a></li>
                            <li><a href="#report-problem" class="sidebar-link">Zgłoś problem</a></li>
                            <li><a href="#ticket-system" class="sidebar-link">System ticketowy</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Powiadomienia / System</li>
                    <li>
                        <a href="#notifications" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                            Powiadomienia / System
                        </a>
                    </li>
                    <li class="sidebar-section">Ustawienia strony</li>
                    <li>
                        <a href="#settings" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                            Dane strony
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#seo" class="sidebar-link">SEO</a></li>
                            <li><a href="#integrations" class="sidebar-link">Integracje</a></li>
                            <li><a href="#email-settings" class="sidebar-link">Ustawienia e-mail</a></li>
                            <li><a href="#backup" class="sidebar-link">Backup i przywracanie</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Personalizacja panelu</li>
                    <li>
                        <a href="#personalization" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                            Personalizacja
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#branding" class="sidebar-link">Branding klienta</a></li>
                            <li><a href="#dashboard-widgets" class="sidebar-link">Widżety na dashboard</a></li>
                            <li><a href="#dashboard-layout" class="sidebar-link">Drag & drop układu</a></li>
                            <li><a href="#shortcuts" class="sidebar-link">Skróty i linki</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Raporty i analityka</li>
                    <li>
                        <a href="#analytics" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
                            Statystyki odwiedzin
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#conversion-reports" class="sidebar-link">Raporty konwersji</a></li>
                            <li><a href="#user-actions" class="sidebar-link">Raporty działań użytkowników</a></li>
                            <li><a href="#export-data" class="sidebar-link">Eksport danych</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Integracje i dodatki</li>
                    <li>
                        <a href="#integrations" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                            Integracje i dodatki
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#api" class="sidebar-link">API / Webhooks</a></li>
                            <li><a href="#dropshipping" class="sidebar-link">Integracje dropshipping</a></li>
                            <li><a href="#sync" class="sidebar-link">Synchronizacja stanów</a></li>
                            <li><a href="#templates" class="sidebar-link">Szablony branżowe</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Profil użytkownika</li>
                    <li>
                        <a href="#profile" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                            Edycja profilu
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#edit-profile" class="sidebar-link">Edycja danych</a></li>
                            <li><a href="#notification-preferences" class="sidebar-link">Preferencje powiadomień</a></li>
                            <li><a href="#login-history" class="sidebar-link">Historia logowań</a></li>
                            <li><a href="#logout" class="sidebar-link">Wyloguj / język</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Pomoc / Support</li>
                    <li>
                        <a href="#help" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                            Dokumentacja / FAQ
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#video-tutorials" class="sidebar-link">Video tutoriale</a></li>
                            <li><a href="#live-chat" class="sidebar-link">Live chat / ticket</a></li>
                            <li><a href="#screenshots" class="sidebar-link">Przesyłanie screenów</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-section">Zaawansowane</li>
                    <li>
                        <a href="#advanced" class="sidebar-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                            Zaawansowane
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#wp-admin" class="sidebar-link">Dostęp do WP Admin</a></li>
                            <li><a href="#plugins-themes" class="sidebar-link">Wtyczki i motywy</a></li>
                            <li><a href="#custom-css" class="sidebar-link">Custom CSS</a></li>
                            <li><a href="#edit-code" class="sidebar-link">Edycja kodu</a></li>
                        </ul>
                    </li>
                </ul>
                    <a href="#posts" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 6h8M8 10h8M8 14h6"/></svg>
                        Strony i Wpisy
                    </a>
                </li>
                <li>
                    <a href="#media" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        Media
                    </a>
                </li>
                <li>
                    <a href="#shop" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
                        Sklep
                    </a>
                </li>
                <li>
                    <a href="#customers" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                        Klienci i Użytkownicy
                    </a>
                </li>
                <li>
                    <a href="#forms" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Formularze i Kontakty
                    </a>
                </li>
                <li>
                    <a href="#notifications" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                        Powiadomienia / System
                    </a>
                </li>
                <li>
                    <a href="#settings" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Ustawienia strony
                    </a>
                </li>
                <li>
                    <a href="#personalization" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Personalizacja panelu
                    </a>
                </li>
                <li>
                    <a href="#reports" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
                        Raporty i Analityka
                    </a>
                </li>
                <li>
                    <a href="#integrations" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Integracje i Dodatki
                    </a>
                </li>
                <li>
                    <a href="#profile" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                        Profil użytkownika
                    </a>
                </li>
                <li>
                    <a href="#help" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Pomoc / Support
                    </a>
                </li>
                <li>
                    <a href="#advanced" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Zaawansowane
                    </a>
                </li>
                <li>
                    <a href="#orders" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-6h6v6m-6 0h6"/></svg>
                        Moje zamówienia
                    </a>
                </li>
                <li>
                    <a href="#products" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        Produkty
                    </a>
                </li>
                <li>
                    <a href="#coupons" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 7v10"/></svg>
                        Kupony / Promocje
                    </a>
                </li>
                <li>
                    <a href="#reports" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
                        Raporty i statystyki
                    </a>
                </li>
                <li>
                    <a href="#posts" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M8 8h8v8H8z"/></svg>
                        Wpisy / Strony
                    </a>
                </li>
                <li>
                    <a href="#media" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        Media
                    </a>
                </li>
                <li>
                    <a href="#messages" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 15V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2z"/><path d="M3 7l9 6 9-6"/></svg>
                        Wiadomości / Kontakt
                    </a>
                </li>
                <li>
                    <a href="#notifications" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                        Powiadomienia / System
                    </a>
                </li>
                <li>
                    <a href="#support" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Zgłoś problem / Support
                    </a>
                </li>
                <li>
                    <a href="#profile" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                        Ustawienia profilu
                    </a>
                </li>
                <li>
                    <a href="#addons" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Dodatki / Widżety
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- Główna sekcja -->
    <main class="flex-1 p-8 space-y-8">
        <section id="welcome" class="widget">
            <!-- Widżet powitalny -->
            <div class="bg-gray-800 rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Witaj, <?php echo wp_get_current_user()->display_name; ?>!</h2>
                    <p class="text-gray-400">Miło Cię widzieć w panelu klienta. Zarządzaj swoją stroną i sklepem w jednym miejscu.</p>
                </div>
                <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-12" alt="Logo">
            </div>
        </section>
        <section id="orders" class="widget">
            <!-- Zamówienia WooCommerce -->
            <div id="orders-list"></div>
        </section>
        <section id="products" class="widget">
            <!-- Produkty WooCommerce -->
            <div id="products-list"></div>
        </section>
        <section id="coupons" class="widget">
            <!-- Kupony WooCommerce -->
            <div id="coupons-list"></div>
        </section>
        <section id="reports" class="widget">
            <!-- Raporty/statystyki -->
            <div id="reports-summary"></div>
        </section>
        <section id="posts" class="widget">
            <!-- Wpisy -->
            <div id="posts-list"></div>
        </section>
        <section id="contact" class="widget">
            <!-- Formularz kontaktowy -->
            <form id="contact-form" class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Kontakt z administratorem</h3>
                <input type="text" name="subject" placeholder="Temat" class="w-full mb-2 p-2 rounded bg-gray-900 text-gray-100">
                <textarea name="message" placeholder="Wiadomość" class="w-full mb-2 p-2 rounded bg-gray-900 text-gray-100"></textarea>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Wyślij</button>
            </form>
        </section>
        <section id="issues" class="widget">
            <!-- Zgłaszanie problemów -->
            <form id="issue-form" class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Zgłoś problem</h3>
                <input type="text" name="issue_subject" placeholder="Temat" class="w-full mb-2 p-2 rounded bg-gray-900 text-gray-100">
                <textarea name="issue_message" placeholder="Opis problemu" class="w-full mb-2 p-2 rounded bg-gray-900 text-gray-100"></textarea>
                <input type="file" name="issue_attachment" class="mb-2">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Wyślij zgłoszenie</button>
            </form>
        </section>
        <!-- Powiadomienia systemowe, toasty, progress bary -->
        <div id="notifications"></div>
    </main>
</div>
