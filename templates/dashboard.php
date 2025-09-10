<div id="client-dashboard" class="bg-gray-100 text-gray-900 min-h-screen flex">
    <!-- Panel boczny -->
    <aside class="sidebar w-64 min-h-screen">
        <nav class="sidebar-menu">
            <div class="sidebar-header">
                <h2>Panel Klienta</h2>
            </div>
            <ul class="space-y-2">
                <!-- Personalizacja -->
                <li class="sidebar-section">Personalizacja</li>
                <li>
                    <a href="#personalization" class="sidebar-link sidebar-toggle" data-toggle="submenu-personalization">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Personalizacja <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-personalization" style="display:none;">
                        <li><a href="#branding" class="sidebar-link">Branding klienta</a></li>
                        <li><a href="#dashboard-widgets" class="sidebar-link">Widżety na dashboard</a></li>
                        <li><a href="#dashboard-layout" class="sidebar-link">Drag & drop układu</a></li>
                        <li><a href="#shortcuts" class="sidebar-link">Skróty i linki</a></li>
                    </ul>
                </li>

                <!-- Strony i Wpisy -->
                <li class="sidebar-section">Strony i Wpisy</li>
                <li>
                    <a href="#posts" class="sidebar-link sidebar-toggle" data-toggle="submenu-posts">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 6h8M8 10h8M8 14h6"/></svg>
                        Wpisy <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-posts" style="display:none;">
                        <li><a href="#posts-list" class="sidebar-link">Lista wpisów</a></li>
                        <li><a href="#add-post" class="sidebar-link">Dodaj wpis</a></li>
                        <li><a href="#edit-post" class="sidebar-link">Edycja / publikacja / draft</a></li>
                        <li><a href="#categories" class="sidebar-link">Kategorie i tagi</a></li>
                        <li><a href="#preview-post" class="sidebar-link">Podgląd wpisu</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pages" class="sidebar-link sidebar-toggle" data-toggle="submenu-pages">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                        Strony <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-pages" style="display:none;">
                        <li><a href="#pages-list" class="sidebar-link">Lista stron</a></li>
                        <li><a href="#add-page" class="sidebar-link">Dodaj stronę</a></li>
                        <li><a href="#edit-page" class="sidebar-link">Edycja stron</a></li>
                        <li><a href="#templates" class="sidebar-link">Szablony stron</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#media" class="sidebar-link sidebar-toggle" data-toggle="submenu-media">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        Media <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-media" style="display:none;">
                        <li><a href="#media-library" class="sidebar-link">Biblioteka mediów</a></li>
                        <li><a href="#add-media" class="sidebar-link">Dodaj plik</a></li>
                        <li><a href="#edit-media" class="sidebar-link">Edycja plików</a></li>
                        <li><a href="#folders" class="sidebar-link">Organizacja folderów</a></li>
                    </ul>
                </li>

                <!-- Sklep -->
                <li class="sidebar-section">Sklep</li>
                <li>
                    <a href="#orders" class="sidebar-link sidebar-toggle" data-toggle="submenu-orders">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-6h6v6m-6 0h6"/></svg>
                        Zamówienia <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-orders" style="display:none;">
                        <li><a href="#orders-list" class="sidebar-link">Lista zamówień</a></li>
                        <li><a href="#order-details" class="sidebar-link">Szczegóły zamówienia</a></li>
                        <li><a href="#order-status" class="sidebar-link">Statusy zamówień</a></li>
                        <li><a href="#export-orders" class="sidebar-link">Eksport do CSV/PDF</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#products" class="sidebar-link sidebar-toggle" data-toggle="submenu-products">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        Produkty <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-products" style="display:none;">
                        <li><a href="#products-list" class="sidebar-link">Lista produktów</a></li>
                        <li><a href="#add-product" class="sidebar-link">Dodaj produkt</a></li>
                        <li><a href="#edit-product" class="sidebar-link">Edycja produktu</a></li>
                        <li><a href="#categories-products" class="sidebar-link">Kategorie, tagi, warianty</a></li>
                        <li><a href="#stock" class="sidebar-link">Stany magazynowe</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#coupons" class="sidebar-link sidebar-toggle" data-toggle="submenu-coupons">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 7v10"/></svg>
                        Kupony / Promocje <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-coupons" style="display:none;">
                        <li><a href="#coupons-list" class="sidebar-link">Lista kuponów</a></li>
                        <li><a href="#add-coupon" class="sidebar-link">Tworzenie kuponu</a></li>
                        <li><a href="#edit-coupon" class="sidebar-link">Edycja kuponu</a></li>
                        <li><a href="#coupon-report" class="sidebar-link">Raport użycia</a></li>
                    </ul>
                </li>

                <!-- Raporty -->
                <li class="sidebar-section">Raporty</li>
                <li>
                    <a href="#reports" class="sidebar-link sidebar-toggle" data-toggle="submenu-reports">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
                        Raporty i analityka <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-reports" style="display:none;">
                        <li><a href="#sales-daily" class="sidebar-link">Sprzedaż dzienna</a></li>
                        <li><a href="#sales-monthly" class="sidebar-link">Sprzedaż miesięczna</a></li>
                        <li><a href="#sales-yearly" class="sidebar-link">Sprzedaż roczna</a></li>
                        <li><a href="#popular-products" class="sidebar-link">Najpopularniejsze produkty</a></li>
                        <li><a href="#revenue" class="sidebar-link">Przychody i marże</a></li>
                        <li><a href="#trends" class="sidebar-link">Trendy i wykresy</a></li>
                    </ul>
                </li>

                <!-- Klienci -->
                <li class="sidebar-section">Klienci</li>
                <li>
                    <a href="#customers" class="sidebar-link sidebar-toggle" data-toggle="submenu-customers">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                        Klienci i Użytkownicy <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-customers" style="display:none;">
                        <li><a href="#customers-list" class="sidebar-link">Lista klientów / użytkowników</a></li>
                        <li><a href="#edit-user" class="sidebar-link">Edycja profilu użytkownika</a></li>
                        <li><a href="#roles" class="sidebar-link">Role i uprawnienia</a></li>
                        <li><a href="#activity" class="sidebar-link">Historia aktywności</a></li>
                        <li><a href="#block-user" class="sidebar-link">Blokowanie / usuwanie kont</a></li>
                    </ul>
                </li>

                <!-- Formularze -->
                <li class="sidebar-section">Formularze</li>
                <li>
                    <a href="#forms" class="sidebar-link sidebar-toggle" data-toggle="submenu-forms">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Formularze i Kontakty <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-forms" style="display:none;">
                        <li><a href="#contact-form" class="sidebar-link">Formularz kontaktowy</a></li>
                        <li><a href="#contact-history" class="sidebar-link">Historia zgłoszeń</a></li>
                        <li><a href="#report-problem" class="sidebar-link">Zgłoś problem</a></li>
                        <li><a href="#ticket-system" class="sidebar-link">System ticketowy</a></li>
                    </ul>
                </li>

                <!-- Ustawienia -->
                <li class="sidebar-section">Ustawienia</li>
                <li>
                    <a href="#settings" class="sidebar-link sidebar-toggle" data-toggle="submenu-settings">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Ustawienia strony <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-settings" style="display:none;">
                        <li><a href="#site-data" class="sidebar-link">Dane strony</a></li>
                        <li><a href="#seo" class="sidebar-link">SEO</a></li>
                        <li><a href="#integrations" class="sidebar-link">Integracje</a></li>
                        <li><a href="#email-settings" class="sidebar-link">Ustawienia e-mail</a></li>
                        <li><a href="#backup" class="sidebar-link">Backup i przywracanie</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#integrations" class="sidebar-link sidebar-toggle" data-toggle="submenu-integrations">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Integracje i dodatki <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-integrations" style="display:none;">
                        <li><a href="#api" class="sidebar-link">API / Webhooks</a></li>
                        <li><a href="#dropshipping" class="sidebar-link">Integracje dropshipping</a></li>
                        <li><a href="#sync" class="sidebar-link">Synchronizacja stanów</a></li>
                        <li><a href="#templates" class="sidebar-link">Szablony branżowe</a></li>
                    </ul>
                </li>

                <!-- Profil -->
                <li class="sidebar-section">Profil</li>
                <li>
                    <a href="#profile" class="sidebar-link sidebar-toggle" data-toggle="submenu-profile">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                        Profil użytkownika <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-profile" style="display:none;">
                        <li><a href="#edit-profile" class="sidebar-link">Edycja danych</a></li>
                        <li><a href="#notification-preferences" class="sidebar-link">Preferencje powiadomień</a></li>
                        <li><a href="#login-history" class="sidebar-link">Historia logowań</a></li>
                        <li><a href="#logout" class="sidebar-link">Wyloguj / język</a></li>
                    </ul>
                </li>

                <!-- Pomoc -->
                <li class="sidebar-section">Pomoc / Support</li>
                <li>
                    <a href="#help" class="sidebar-link sidebar-toggle" data-toggle="submenu-help">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Dokumentacja / FAQ <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-help" style="display:none;">
                        <li><a href="#video-tutorials" class="sidebar-link">Video tutoriale</a></li>
                        <li><a href="#live-chat" class="sidebar-link">Live chat / ticket</a></li>
                        <li><a href="#screenshots" class="sidebar-link">Przesyłanie screenów</a></li>
                    </ul>
                </li>

                <!-- Zaawansowane -->
                <li class="sidebar-section">Zaawansowane</li>
                <li>
                    <a href="#advanced" class="sidebar-link sidebar-toggle" data-toggle="submenu-advanced">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                        Zaawansowane <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-advanced" style="display:none;">
                        <li><a href="#wp-admin" class="sidebar-link">Dostęp do WP Admin</a></li>
                        <li><a href="#plugins-themes" class="sidebar-link">Wtyczki i motywy</a></li>
                        <li><a href="#custom-css" class="sidebar-link">Custom CSS</a></li>
                        <li><a href="#edit-code" class="sidebar-link">Edycja kodu</a></li>
                    </ul>
                </li>

                <!-- Powiadomienia -->
                <li>
                    <a href="#notifications" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                        Powiadomienia / System
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- Główna sekcja -->
    <main class="flex-1 p-8 space-y-8">
        <!-- Sekcje powitalne -->
        <section id="welcome" class="widget">
            <!-- Widżet powitalny -->
            <div class="bg-white rounded-lg p-6 flex items-center justify-between shadow-card">
                <div>
                    <?php if (function_exists('wp_get_current_user')): ?>
                        <h2 class="text-2xl font-bold mb-2">Witaj, <?php echo wp_get_current_user()->display_name; ?>!</h2>
                        <p class="text-gray-400">Miło Cię widzieć w panelu klienta. Zarządzaj swoją stroną i sklepem w jednym miejscu.</p>
                    <?php else: ?>
                        <h2 class="text-2xl font-bold mb-2">Witaj w panelu klienta!</h2>
                        <p class="text-gray-400">Panel uruchomiony poza WordPressem – brak personalizacji.</p>
                    <?php endif; ?>
                </div>
                <?php if (function_exists('plugin_dir_url')): ?>
                    <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-12" alt="Logo">
                <?php else: ?>
                    <img src="/wp-content/plugins/new-panel-master/assets/logo.svg" class="h-12" alt="Logo">
                <?php endif; ?>
            </div>
        </section>

        <!-- Personalizacja -->
        <section id="personalization" class="widget">
            <h3 class="text-xl font-bold mb-4">Personalizacja panelu</h3>
            <div id="personalization-content">
                <p>Wybierz sekcję personalizacji z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="branding" class="widget">
            <h3 class="text-xl font-bold mb-4">Branding klienta</h3>
            <div id="branding-content">
                <p>Ustawienia brandingowe dla Twojej strony.</p>
            </div>
        </section>
        <section id="dashboard-widgets" class="widget">
            <h3 class="text-xl font-bold mb-4">Widżety na dashboard</h3>
            <div id="dashboard-widgets-content">
                <p>Zarządzaj widżetami wyświetlanymi na dashboard.</p>
            </div>
        </section>
        <section id="dashboard-layout" class="widget">
            <h3 class="text-xl font-bold mb-4">Drag & drop układu</h3>
            <div id="dashboard-layout-content">
                <p>Przeciągnij i upuść elementy, aby zmienić układ dashboard.</p>
            </div>
        </section>
        <section id="shortcuts" class="widget">
            <h3 class="text-xl font-bold mb-4">Skróty i linki</h3>
            <div id="shortcuts-content">
                <p>Zarządzaj szybkimi linkami i skrótami.</p>
            </div>
        </section>

        <!-- Wpisy -->
        <section id="posts" class="widget">
            <h3 class="text-xl font-bold mb-4">Wpisy</h3>
            <div id="posts-content">
                <p>Wybierz akcję dotyczącą wpisów z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="posts-list" class="widget">
            <h3 class="text-xl font-bold mb-4">Lista wpisów</h3>
            <div id="posts-list-content">
                <p>Lista wszystkich wpisów na stronie.</p>
            </div>
        </section>
        <section id="add-post" class="widget">
            <h3 class="text-xl font-bold mb-4">Dodaj wpis</h3>
            <div id="add-post-content">
                <p>Formularz dodawania nowego wpisu.</p>
            </div>
        </section>
        <section id="edit-post" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja wpisu</h3>
            <div id="edit-post-content">
                <p>Edycja istniejącego wpisu.</p>
            </div>
        </section>
        <section id="categories" class="widget">
            <h3 class="text-xl font-bold mb-4">Kategorie i tagi</h3>
            <div id="categories-content">
                <p>Zarządzaj kategoriami i tagami wpisów.</p>
            </div>
        </section>
        <section id="preview-post" class="widget">
            <h3 class="text-xl font-bold mb-4">Podgląd wpisu</h3>
            <div id="preview-post-content">
                <p>Podgląd wpisu przed publikacją.</p>
            </div>
        </section>

        <!-- Strony -->
        <section id="pages" class="widget">
            <h3 class="text-xl font-bold mb-4">Strony</h3>
            <div id="pages-content">
                <p>Wybierz akcję dotyczącą stron z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="pages-list" class="widget">
            <h3 class="text-xl font-bold mb-4">Lista stron</h3>
            <div id="pages-list-content">
                <p>Lista wszystkich stron na stronie.</p>
            </div>
        </section>
        <section id="add-page" class="widget">
            <h3 class="text-xl font-bold mb-4">Dodaj stronę</h3>
            <div id="add-page-content">
                <p>Formularz dodawania nowej strony.</p>
            </div>
        </section>
        <section id="edit-page" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja strony</h3>
            <div id="edit-page-content">
                <p>Edycja istniejącej strony.</p>
            </div>
        </section>
        <section id="templates" class="widget">
            <h3 class="text-xl font-bold mb-4">Szablony stron</h3>
            <div id="templates-content">
                <p>Zarządzaj szablonami stron.</p>
            </div>
        </section>

        <!-- Media -->
        <section id="media" class="widget">
            <h3 class="text-xl font-bold mb-4">Media</h3>
            <div id="media-content">
                <p>Wybierz akcję dotyczącą mediów z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="media-library" class="widget">
            <h3 class="text-xl font-bold mb-4">Biblioteka mediów</h3>
            <div id="media-library-content">
                <p>Biblioteka wszystkich plików multimedialnych.</p>
            </div>
        </section>
        <section id="add-media" class="widget">
            <h3 class="text-xl font-bold mb-4">Dodaj plik</h3>
            <div id="add-media-content">
                <p>Dodaj nowy plik multimedialny.</p>
            </div>
        </section>
        <section id="edit-media" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja plików</h3>
            <div id="edit-media-content">
                <p>Edycja właściwości plików multimedialnych.</p>
            </div>
        </section>
        <section id="folders" class="widget">
            <h3 class="text-xl font-bold mb-4">Organizacja folderów</h3>
            <div id="folders-content">
                <p>Zarządzaj organizacją plików w folderach.</p>
            </div>
        </section>

        <!-- Zamówienia -->
        <section id="orders" class="widget">
            <h3 class="text-xl font-bold mb-4">Zamówienia</h3>
            <div id="orders-content">
                <p>Wybierz akcję dotyczącą zamówień z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="orders-list" class="widget">
            <h3 class="text-xl font-bold mb-4">Lista zamówień</h3>
            <div id="orders-list-content">
                <p>Lista wszystkich zamówień w sklepie.</p>
            </div>
        </section>
        <section id="order-details" class="widget">
            <h3 class="text-xl font-bold mb-4">Szczegóły zamówienia</h3>
            <div id="order-details-content">
                <p>Szczegółowe informacje o wybranym zamówieniu.</p>
            </div>
        </section>
        <section id="order-status" class="widget">
            <h3 class="text-xl font-bold mb-4">Statusy zamówień</h3>
            <div id="order-status-content">
                <p>Zarządzaj statusami zamówień.</p>
            </div>
        </section>
        <section id="export-orders" class="widget">
            <h3 class="text-xl font-bold mb-4">Eksport zamówień</h3>
            <div id="export-orders-content">
                <p>Eksportuj zamówienia do pliku CSV lub PDF.</p>
            </div>
        </section>

        <!-- Produkty -->
        <section id="products" class="widget">
            <h3 class="text-xl font-bold mb-4">Produkty</h3>
            <div id="products-content">
                <p>Wybierz akcję dotyczącą produktów z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="products-list" class="widget">
            <h3 class="text-xl font-bold mb-4">Lista produktów</h3>
            <div id="products-list-content">
                <p>Lista wszystkich produktów w sklepie.</p>
            </div>
        </section>
        <section id="add-product" class="widget">
            <h3 class="text-xl font-bold mb-4">Dodaj produkt</h3>
            <div id="add-product-content">
                <p>Formularz dodawania nowego produktu.</p>
            </div>
        </section>
        <section id="edit-product" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja produktu</h3>
            <div id="edit-product-content">
                <p>Edycja istniejącego produktu.</p>
            </div>
        </section>
        <section id="categories-products" class="widget">
            <h3 class="text-xl font-bold mb-4">Kategorie produktów</h3>
            <div id="categories-products-content">
                <p>Zarządzaj kategoriami, tagami i wariantami produktów.</p>
            </div>
        </section>
        <section id="stock" class="widget">
            <h3 class="text-xl font-bold mb-4">Stany magazynowe</h3>
            <div id="stock-content">
                <p>Zarządzaj stanami magazynowymi produktów.</p>
            </div>
        </section>

        <!-- Kupony -->
        <section id="coupons" class="widget">
            <h3 class="text-xl font-bold mb-4">Kupony</h3>
            <div id="coupons-content">
                <p>Wybierz akcję dotyczącą kuponów z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="coupons-list" class="widget">
            <h3 class="text-xl font-bold mb-4">Lista kuponów</h3>
            <div id="coupons-list-content">
                <p>Lista wszystkich kuponów rabatowych.</p>
            </div>
        </section>
        <section id="add-coupon" class="widget">
            <h3 class="text-xl font-bold mb-4">Tworzenie kuponu</h3>
            <div id="add-coupon-content">
                <p>Formularz tworzenia nowego kuponu rabatowego.</p>
            </div>
        </section>
        <section id="edit-coupon" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja kuponu</h3>
            <div id="edit-coupon-content">
                <p>Edycja istniejącego kuponu rabatowego.</p>
            </div>
        </section>
        <section id="coupon-report" class="widget">
            <h3 class="text-xl font-bold mb-4">Raport użycia kuponów</h3>
            <div id="coupon-report-content">
                <p>Raport wykorzystania kuponów rabatowych.</p>
            </div>
        </section>

        <!-- Raporty -->
        <section id="reports" class="widget">
            <h3 class="text-xl font-bold mb-4">Raporty</h3>
            <div id="reports-content">
                <p>Wybierz typ raportu z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="sales-daily" class="widget">
            <h3 class="text-xl font-bold mb-4">Sprzedaż dzienna</h3>
            <div id="sales-daily-content">
                <p>Raport sprzedaży dziennej.</p>
            </div>
        </section>
        <section id="sales-monthly" class="widget">
            <h3 class="text-xl font-bold mb-4">Sprzedaż miesięczna</h3>
            <div id="sales-monthly-content">
                <p>Raport sprzedaży miesięcznej.</p>
            </div>
        </section>
        <section id="sales-yearly" class="widget">
            <h3 class="text-xl font-bold mb-4">Sprzedaż roczna</h3>
            <div id="sales-yearly-content">
                <p>Raport sprzedaży rocznej.</p>
            </div>
        </section>
        <section id="popular-products" class="widget">
            <h3 class="text-xl font-bold mb-4">Najpopularniejsze produkty</h3>
            <div id="popular-products-content">
                <p>Raport najpopularniejszych produktów.</p>
            </div>
        </section>
        <section id="revenue" class="widget">
            <h3 class="text-xl font-bold mb-4">Przychody i marże</h3>
            <div id="revenue-content">
                <p>Raport przychodów i marż.</p>
            </div>
        </section>
        <section id="trends" class="widget">
            <h3 class="text-xl font-bold mb-4">Trendy i wykresy</h3>
            <div id="trends-content">
                <p>Wykresy i trendy sprzedażowe.</p>
            </div>
        </section>

        <!-- Klienci -->
        <section id="customers" class="widget">
            <h3 class="text-xl font-bold mb-4">Klienci</h3>
            <div id="customers-content">
                <p>Wybierz akcję dotyczącą klientów z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="customers-list" class="widget">
            <h3 class="text-xl font-bold mb-4">Lista klientów</h3>
            <div id="customers-list-content">
                <p>Lista wszystkich klientów i użytkowników.</p>
            </div>
        </section>
        <section id="edit-user" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja profilu</h3>
            <div id="edit-user-content">
                <p>Edycja danych użytkownika.</p>
            </div>
        </section>
        <section id="roles" class="widget">
            <h3 class="text-xl font-bold mb-4">Role i uprawnienia</h3>
            <div id="roles-content">
                <p>Zarządzaj rolami i uprawnieniami użytkowników.</p>
            </div>
        </section>
        <section id="activity" class="widget">
            <h3 class="text-xl font-bold mb-4">Historia aktywności</h3>
            <div id="activity-content">
                <p>Historia aktywności użytkowników.</p>
            </div>
        </section>
        <section id="block-user" class="widget">
            <h3 class="text-xl font-bold mb-4">Blokowanie użytkowników</h3>
            <div id="block-user-content">
                <p>Blokuj lub usuwaj konta użytkowników.</p>
            </div>
        </section>

        <!-- Formularze -->
        <section id="forms" class="widget">
            <h3 class="text-xl font-bold mb-4">Formularze</h3>
            <div id="forms-content">
                <p>Wybierz akcję dotyczącą formularzy z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="contact-form" class="widget">
            <!-- Formularz kontaktowy -->
            <form id="contact-form-element" class="bg-white rounded-lg p-6 shadow-card">
                <h3 class="text-lg font-bold mb-4">Kontakt z administratorem</h3>
                <input type="text" name="subject" placeholder="Temat" class="w-full mb-2 p-2 rounded bg-white text-gray-900 border border-gray-300">
                <textarea name="message" placeholder="Wiadomość" class="w-full mb-2 p-2 rounded bg-white text-gray-900 border border-gray-300"></textarea>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Wyślij</button>
            </form>
        </section>
        <section id="contact-history" class="widget">
            <h3 class="text-xl font-bold mb-4">Historia zgłoszeń</h3>
            <div id="contact-history-content">
                <p>Historia wszystkich zgłoszeń kontaktowych.</p>
            </div>
        </section>
        <section id="report-problem" class="widget">
            <!-- Zgłaszanie problemów -->
            <form id="issue-form-element" class="bg-white rounded-lg p-6 shadow-card">
                <h3 class="text-lg font-bold mb-4">Zgłoś problem</h3>
                <input type="text" name="issue_subject" placeholder="Temat" class="w-full mb-2 p-2 rounded bg-white text-gray-900 border border-gray-300">
                <textarea name="issue_message" placeholder="Opis problemu" class="w-full mb-2 p-2 rounded bg-white text-gray-900 border border-gray-300"></textarea>
                <input type="file" name="issue_attachment" class="mb-2">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Wyślij zgłoszenie</button>
            </form>
        </section>
        <section id="ticket-system" class="widget">
            <h3 class="text-xl font-bold mb-4">System ticketowy</h3>
            <div id="ticket-system-content">
                <p>System ticketów wsparcia technicznego.</p>
            </div>
        </section>

        <!-- Ustawienia -->
        <section id="settings" class="widget">
            <h3 class="text-xl font-bold mb-4">Ustawienia</h3>
            <div id="settings-content">
                <p>Wybierz kategorię ustawień z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="site-data" class="widget">
            <h3 class="text-xl font-bold mb-4">Dane strony</h3>
            <div id="site-data-content">
                <p>Podstawowe dane i ustawienia strony.</p>
            </div>
        </section>
        <section id="seo" class="widget">
            <h3 class="text-xl font-bold mb-4">SEO</h3>
            <div id="seo-content">
                <p>Ustawienia optymalizacji wyszukiwarek.</p>
            </div>
        </section>
        <section id="integrations" class="widget">
            <h3 class="text-xl font-bold mb-4">Integracje</h3>
            <div id="integrations-content">
                <p>Wybierz integrację z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="email-settings" class="widget">
            <h3 class="text-xl font-bold mb-4">Ustawienia e-mail</h3>
            <div id="email-settings-content">
                <p>Konfiguracja ustawień e-mail.</p>
            </div>
        </section>
        <section id="backup" class="widget">
            <h3 class="text-xl font-bold mb-4">Backup i przywracanie</h3>
            <div id="backup-content">
                <p>Zarządzaj kopiami zapasowymi strony.</p>
            </div>
        </section>

        <!-- Integracje -->
        <section id="api" class="widget">
            <h3 class="text-xl font-bold mb-4">API / Webhooks</h3>
            <div id="api-content">
                <p>Ustawienia API i webhooków.</p>
            </div>
        </section>
        <section id="dropshipping" class="widget">
            <h3 class="text-xl font-bold mb-4">Integracje dropshipping</h3>
            <div id="dropshipping-content">
                <p>Konfiguracja integracji dropshipping.</p>
            </div>
        </section>
        <section id="sync" class="widget">
            <h3 class="text-xl font-bold mb-4">Synchronizacja stanów</h3>
            <div id="sync-content">
                <p>Synchronizacja stanów magazynowych.</p>
            </div>
        </section>
        <section id="templates" class="widget">
            <h3 class="text-xl font-bold mb-4">Szablony branżowe</h3>
            <div id="templates-content">
                <p>Zarządzaj szablonami branżowymi.</p>
            </div>
        </section>

        <!-- Profil -->
        <section id="profile" class="widget">
            <h3 class="text-xl font-bold mb-4">Profil</h3>
            <div id="profile-content">
                <p>Wybierz akcję dotyczącą profilu z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="edit-profile" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja danych</h3>
            <div id="edit-profile-content">
                <p>Edycja danych profilowych.</p>
            </div>
        </section>
        <section id="notification-preferences" class="widget">
            <h3 class="text-xl font-bold mb-4">Preferencje powiadomień</h3>
            <div id="notification-preferences-content">
                <p>Ustawienia preferencji powiadomień.</p>
            </div>
        </section>
        <section id="login-history" class="widget">
            <h3 class="text-xl font-bold mb-4">Historia logowań</h3>
            <div id="login-history-content">
                <p>Historia wszystkich logowań do systemu.</p>
            </div>
        </section>
        <section id="logout" class="widget">
            <h3 class="text-xl font-bold mb-4">Wyloguj / język</h3>
            <div id="logout-content">
                <p>Opcje wylogowania i zmiany języka.</p>
            </div>
        </section>

        <!-- Pomoc -->
        <section id="help" class="widget">
            <h3 class="text-xl font-bold mb-4">Pomoc</h3>
            <div id="help-content">
                <p>Wybierz rodzaj pomocy z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="video-tutorials" class="widget">
            <h3 class="text-xl font-bold mb-4">Video tutoriale</h3>
            <div id="video-tutorials-content">
                <p>Biblioteka filmów instruktażowych.</p>
            </div>
        </section>
        <section id="live-chat" class="widget">
            <h3 class="text-xl font-bold mb-4">Live chat</h3>
            <div id="live-chat-content">
                <p>Czat na żywo z obsługą techniczną.</p>
            </div>
        </section>
        <section id="screenshots" class="widget">
            <h3 class="text-xl font-bold mb-4">Przesyłanie screenów</h3>
            <div id="screenshots-content">
                <p>Prześlij zrzuty ekranu dla pomocy technicznej.</p>
            </div>
        </section>

        <!-- Zaawansowane -->
        <section id="advanced" class="widget">
            <h3 class="text-xl font-bold mb-4">Zaawansowane</h3>
            <div id="advanced-content">
                <p>Wybierz zaawansowaną opcję z menu po lewej stronie.</p>
            </div>
        </section>
        <section id="wp-admin" class="widget">
            <h3 class="text-xl font-bold mb-4">Dostęp do WP Admin</h3>
            <div id="wp-admin-content">
                <p>Dostęp do panelu administratora WordPress.</p>
            </div>
        </section>
        <section id="plugins-themes" class="widget">
            <h3 class="text-xl font-bold mb-4">Wtyczki i motywy</h3>
            <div id="plugins-themes-content">
                <p>Zarządzaj wtyczkami i motywami.</p>
            </div>
        </section>
        <section id="custom-css" class="widget">
            <h3 class="text-xl font-bold mb-4">Custom CSS</h3>
            <div id="custom-css-content">
                <p>Edytor niestandardowego CSS.</p>
            </div>
        </section>
        <section id="edit-code" class="widget">
            <h3 class="text-xl font-bold mb-4">Edycja kodu</h3>
            <div id="edit-code-content">
                <p>Edytor plików kodu źródłowego.</p>
            </div>
        </section>

        <!-- Powiadomienia -->
        <section id="notifications" class="widget">
            <h3 class="text-xl font-bold mb-4">Powiadomienia / System</h3>
            <div id="notifications-content">
                <p>System powiadomień i ustawienia systemowe.</p>
            </div>
        </section>

        <!-- Powiadomienia systemowe, toasty, progress bary -->
        <div id="system-notifications"></div>
    </main>
</div>
