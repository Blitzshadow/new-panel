<div id="client-dashboard" class="min-h-screen flex font-display" style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #1a1a2e 100%);">
    <!-- Panel boczny -->
    <aside class="sidebar w-72 min-h-screen shadow-modern-lg">
        <nav class="sidebar-menu">
            <div class="sidebar-header">
                <h2 class="text-gradient font-display">Panel Klienta</h2>
            </div>
            <ul class="space-y-2">
                <!-- Personalizacja -->
                <li class="sidebar-section">Personalizacja</li>
                <li>
                    <a href="#personalization" class="sidebar-link sidebar-toggle" data-toggle="submenu-personalization">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128.75.75 0 01-1.5 0 4.5 4.5 0 018.4-2.409c-.26.201-.542.388-.832.58a1.5 1.5 0 01-1.78-.124z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 8.25a2.25 2.25 0 012.25 2.25c0 1.012-.442 1.915-1.125 2.52a.75.75 0 01-1.005-.933 3.75 3.75 0 00.627-2.087 3.75 3.75 0 00-3.75-3.75.75.75 0 01-.75-.75z"/>
                        </svg>
                        Personalizacja <span class="ml-auto text-xs opacity-60">▼</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-personalization">
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
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h7.5"/>
                        </svg>
                        Wpisy <span class="ml-auto text-xs opacity-60">▼</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-posts">
                        <li><a href="#posts-list" class="sidebar-link">Lista wpisów</a></li>
                        <li><a href="#add-post" class="sidebar-link">Dodaj wpis</a></li>
                        <li><a href="#edit-post" class="sidebar-link">Edycja / publikacja / draft</a></li>
                        <li><a href="#categories" class="sidebar-link">Kategorie i tagi</a></li>
                        <li><a href="#preview-post" class="sidebar-link">Podgląd wpisu</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pages" class="sidebar-link sidebar-toggle" data-toggle="submenu-pages">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12 3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                        Strony <span class="ml-auto text-xs opacity-60">▼</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-pages">
                        <li><a href="#pages-list" class="sidebar-link">Lista stron</a></li>
                        <li><a href="#add-page" class="sidebar-link">Dodaj stronę</a></li>
                        <li><a href="#edit-page" class="sidebar-link">Edycja stron</a></li>
                        <li><a href="#page-templates" class="sidebar-link">Szablony stron</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#media" class="sidebar-link sidebar-toggle" data-toggle="submenu-media">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        Media <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-media">
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
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                        </svg>
                        Zamówienia <span class="ml-auto text-xs opacity-60">▼</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-orders">
                        <li><a href="#orders-list" class="sidebar-link">Lista zamówień</a></li>
                        <li><a href="#order-details" class="sidebar-link">Szczegóły zamówienia</a></li>
                        <li><a href="#order-status" class="sidebar-link">Statusy zamówień</a></li>
                        <li><a href="#export-orders" class="sidebar-link">Eksport do CSV/PDF</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#products" class="sidebar-link sidebar-toggle" data-toggle="submenu-products">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.5a2.25 2.25 0 01-2.25 2.25H6.75a2.25 2.25 0 01-2.25-2.25L3.875 7.5m6 2.25L9 7.5m0 0L7.5 9m1.5-1.5L12 9m-4.5 0L9 10.5m0-3L10.5 9m3 0l-1.5-1.5M12 9l1.5 1.5M12 9L9 10.5m3-3l1.5 1.5M15 7.5l-1.5 1.5M15 7.5l1.5 1.5"/>
                        </svg>
                        Produkty <span class="ml-auto text-xs opacity-60">▼</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-products">
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
                    <ul class="sidebar-submenu" id="submenu-coupons">
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
                    <ul class="sidebar-submenu" id="submenu-reports">
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
                    <ul class="sidebar-submenu" id="submenu-customers">
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
                    <ul class="sidebar-submenu" id="submenu-forms">
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
                    <ul class="sidebar-submenu" id="submenu-settings">
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
                    <ul class="sidebar-submenu" id="submenu-integrations">
                        <li><a href="#api" class="sidebar-link">API / Webhooks</a></li>
                        <li><a href="#dropshipping" class="sidebar-link">Integracje dropshipping</a></li>
                        <li><a href="#sync" class="sidebar-link">Synchronizacja stanów</a></li>
                        <li><a href="#industry-templates" class="sidebar-link">Szablony branżowe</a></li>
                    </ul>
                </li>

                <!-- Profil -->
                <li class="sidebar-section">Profil</li>
                <li>
                    <a href="#profile" class="sidebar-link sidebar-toggle" data-toggle="submenu-profile">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
                        Profil użytkownika <span class="ml-auto">&#9662;</span>
                    </a>
                    <ul class="sidebar-submenu" id="submenu-profile">
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
                    <ul class="sidebar-submenu" id="submenu-help">
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
                    <ul class="sidebar-submenu" id="submenu-advanced">
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
    <main class="flex-1 p-4 space-y-4 overflow-auto max-w-7xl mx-auto" style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #1a1a2e 100%);">
        <!-- Sekcje powitalne -->
        <section id="welcome" class="animate-fadeIn">
            <!-- Widżet powitalny -->
            <div class="card hover-lift rounded-modern-lg shadow-modern">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <?php if (function_exists('wp_get_current_user')): ?>
                            <h2 class="text-3xl font-display font-bold mb-3 text-gradient">Witaj, <?php echo wp_get_current_user()->display_name; ?>!</h2>
                            <p class="text-gray-300 text-lg leading-relaxed">Miło Cię widzieć w panelu klienta. Zarządzaj swoją stroną i sklepem w jednym miejscu.</p>
                        <?php else: ?>
                            <h2 class="text-3xl font-display font-bold mb-3 text-gradient">Witaj w panelu klienta!</h2>
                            <p class="text-gray-300 text-lg leading-relaxed">Panel uruchomiony poza WordPressem – brak personalizacji.</p>
                        <?php endif; ?>
                        <div class="mt-6 flex gap-4">
                            <button class="btn bg-gradient-primary hover:shadow-glow transform hover:scale-105 transition-all duration-300">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Rozpocznij pracę
                            </button>
                            <button class="btn bg-white text-gray-900 border-2 border-gray-200 hover:border-gray-300 hover:shadow-modern transition-all duration-300">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Pomoc
                            </button>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <?php if (function_exists('plugin_dir_url')): ?>
                            <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-16 w-16 opacity-80 hover:opacity-100 transition-opacity duration-300" alt="Logo">
                        <?php else: ?>
                            <img src="/wp-content/plugins/new-panel-master/assets/logo.svg" class="h-16 w-16 opacity-80 hover:opacity-100 transition-opacity duration-300" alt="Logo">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Personalizacja -->
        <section id="personalization" class="animate-fadeIn">
            <div class="card hover-lift">
                <div class="card-header section-title">Personalizacja panelu</div>
                <div id="personalization-content" class="text-gray-300">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="stat-card hover-lift">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-primary rounded-modern">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                                    </svg>
                                </div>
                                <span class="badge badge-info">Aktywny</span>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Widżety Dashboard</h4>
                            <p class="text-sm text-gray-400">Dostosuj widżety wyświetlane na głównym panelu</p>
                        </div>

                        <div class="stat-card hover-lift">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-secondary rounded-modern">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                <span class="badge badge-success">Gotowe</span>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Branding</h4>
                            <p class="text-sm text-gray-400">Personalizuj kolory i logo swojej marki</p>
                        </div>

                        <div class="stat-card hover-lift">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-warning rounded-modern">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <span class="badge badge-warning">Beta</span>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Skróty</h4>
                            <p class="text-sm text-gray-400">Szybki dostęp do najczęściej używanych funkcji</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="branding" class="animate-fadeIn">
            <div class="card hover-lift">
                <div class="card-header section-title">Branding klienta</div>
                <div id="branding-content">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="bg-gradient-primary p-6 rounded-modern-lg text-white">
                                <h4 class="text-xl font-semibold mb-3">Kolorystyka</h4>
                                <p class="opacity-90 mb-4">Dostosuj paletę kolorów swojej marki</p>
                                <div class="grid grid-cols-4 gap-3">
                                    <div class="w-12 h-12 bg-white rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                    <div class="w-12 h-12 bg-blue-500 rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                    <div class="w-12 h-12 bg-green-500 rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                    <div class="w-12 h-12 bg-purple-500 rounded-lg shadow-modern cursor-pointer hover:scale-110 transition-transform"></div>
                                </div>
                            </div>

                            <div class="bg-gradient-secondary p-6 rounded-modern-lg text-white">
                                <h4 class="text-xl font-semibold mb-3">Logo i grafiki</h4>
                                <p class="opacity-90">Prześlij swoje logo i grafiki firmowe</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="border-2 border-dashed border-gray-300 rounded-modern-lg p-8 text-center hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <h4 class="text-lg font-semibold text-gray-100 mb-2">Przeciągnij pliki tutaj</h4>
                                <p class="text-gray-400">lub kliknij, aby wybrać</p>
                                <button class="mt-4 btn bg-gradient-primary">Wybierz pliki</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="dashboard-widgets" class="animate-fadeIn">
            <div class="card hover-lift">
                <div class="card-header section-title">Widżety na dashboard</div>
                <div id="dashboard-widgets-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="stat-card hover-lift cursor-pointer">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-success rounded-modern">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="badge badge-success">Aktywny</span>
                                    <input type="checkbox" checked class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Statystyki sprzedaży</h4>
                            <p class="text-sm text-gray-400">Wyświetla kluczowe wskaźniki sprzedaży i przychodów</p>
                        </div>

                        <div class="stat-card hover-lift cursor-pointer">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-primary rounded-modern">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="badge badge-info">Włączony</span>
                                    <input type="checkbox" checked class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Aktywni użytkownicy</h4>
                            <p class="text-sm text-gray-400">Monitoruje aktywność użytkowników w czasie rzeczywistym</p>
                        </div>

                        <div class="stat-card hover-lift cursor-pointer">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-warning rounded-modern">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="badge badge-warning">Wyłączony</span>
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Najnowsze zamówienia</h4>
                            <p class="text-sm text-gray-400">Lista ostatnich zamówień z statusami</p>
                        </div>
                    </div>

                    <div class="mt-8 p-6 bg-gradient-primary rounded-modern-lg text-white">
                        <h4 class="text-xl font-semibold mb-3">Układ dashboard</h4>
                        <p class="opacity-90 mb-4">Przeciągnij widżety, aby zmienić ich kolejność i układ</p>
                        <button class="btn bg-white text-gray-900 hover:bg-gray-50">Zapisz układ</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="dashboard-layout" class="animate-fadeIn">
            <div class="card hover-lift">
                <div class="card-header section-title">Drag & drop układu</div>
                <div id="dashboard-layout-content">
                    <div class="bg-gradient-secondary p-6 rounded-modern-lg text-white mb-6">
                        <h4 class="text-xl font-semibold mb-3">Edytor układu</h4>
                        <p class="opacity-90">Przeciągnij i upuść elementy, aby stworzyć idealny układ dla swojego dashboard</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h5 class="text-lg font-semibold text-gray-100 mb-4">Dostępne elementy</h5>

                            <div class="space-y-3">
                                <div class="flex items-center p-4 border-2 border-dashed border-gray-600 rounded-modern hover:border-gray-500 cursor-move transition-colors bg-gray-800 bg-opacity-50">
                                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    <div>
                                        <h6 class="font-medium text-gray-100">Wykres sprzedaży</h6>
                                        <p class="text-sm text-gray-400">Wizualizacja danych sprzedażowych</p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-modern hover:border-gray-400 cursor-move transition-colors">
                                    <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <div>
                                        <h6 class="font-medium text-gray-100">Lista użytkowników</h6>
                                        <p class="text-sm text-gray-400">Zarządzanie użytkownikami</p>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-modern hover:border-gray-400 cursor-move transition-colors">
                                    <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                    <div>
                                        <h6 class="font-medium text-gray-100">Statystyki</h6>
                                        <p class="text-sm text-gray-400">Kluczowe wskaźniki wydajności</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h5 class="text-lg font-semibold text-gray-100 mb-4">Podgląd układu</h5>

                            <div class="border-2 border-gray-200 rounded-modern-lg p-6 min-h-96 bg-gray-50">
                                <div class="grid grid-cols-2 gap-3 h-full">
                                    <div class="bg-white p-4 rounded-modern shadow-modern">
                                        <h6 class="font-medium text-gray-100 mb-2">Wykres sprzedaży</h6>
                                        <div class="h-20 bg-gradient-primary rounded opacity-20"></div>
                                    </div>

                                    <div class="bg-gray-800 p-4 rounded-modern shadow-modern">
                                        <h6 class="font-medium text-gray-100 mb-2">Lista użytkowników</h6>
                                        <div class="space-y-2">
                                            <div class="h-3 bg-gray-600 rounded"></div>
                                            <div class="h-3 bg-gray-600 rounded w-3/4"></div>
                                            <div class="h-3 bg-gray-600 rounded w-1/2"></div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-800 p-4 rounded-modern shadow-modern col-span-2">
                                        <h6 class="font-medium text-gray-100 mb-2">Statystyki</h6>
                                        <div class="grid grid-cols-3 gap-3">
                                            <div class="text-center">
                                                <div class="stat-value text-2xl">1,234</div>
                                                <div class="stat-label">Użytkownicy</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="stat-value text-2xl">567</div>
                                                <div class="stat-label">Zamówienia</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="stat-value text-2xl">$89K</div>
                                                <div class="stat-label">Przychody</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-4">
                        <button class="btn bg-gray-200 text-gray-900 hover:bg-gray-300">Resetuj układ</button>
                        <button class="btn bg-gradient-primary">Zapisz zmiany</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="shortcuts" class="animate-fadeIn">
            <div class="card hover-lift">
                <div class="card-header section-title">Skróty i linki</div>
                <div id="shortcuts-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        <div class="stat-card hover-lift cursor-pointer group">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-success rounded-modern group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Nowy wpis</h4>
                            <p class="text-sm text-gray-400">Szybko dodaj nowy wpis do bloga</p>
                            <div class="mt-3 text-xs text-gray-400">Ctrl + N</div>
                        </div>

                        <div class="stat-card hover-lift cursor-pointer group">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-primary rounded-modern group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Zamówienia</h4>
                            <p class="text-sm text-gray-400">Zobacz wszystkie zamówienia</p>
                            <div class="mt-3 text-xs text-gray-400">Ctrl + O</div>
                        </div>

                        <div class="stat-card hover-lift cursor-pointer group">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-warning rounded-modern group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Użytkownicy</h4>
                            <p class="text-sm text-gray-400">Zarządzaj użytkownikami</p>
                            <div class="mt-3 text-xs text-gray-400">Ctrl + U</div>
                        </div>

                        <div class="stat-card hover-lift cursor-pointer group">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-gradient-secondary rounded-modern group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-100 mb-2">Ustawienia</h4>
                            <p class="text-sm text-gray-400">Konfiguracja systemu</p>
                            <div class="mt-3 text-xs text-gray-400">Ctrl + S</div>
                        </div>
                    </div>

                    <div class="bg-gradient-primary p-6 rounded-modern-lg text-white">
                        <h4 class="text-xl font-semibold mb-3">Niestandardowe skróty</h4>
                        <p class="opacity-90 mb-4">Utwórz własne skróty klawiszowe dla najczęściej używanych funkcji</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="bg-white bg-opacity-10 p-4 rounded-modern">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-medium">Szybki eksport danych</span>
                                    <span class="text-sm opacity-75">Ctrl + Shift + E</span>
                                </div>
                                <p class="text-sm opacity-75">Eksportuj dane do CSV/PDF</p>
                            </div>

                            <div class="bg-white bg-opacity-10 p-4 rounded-modern">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-medium">Raport miesięczny</span>
                                    <span class="text-sm opacity-75">Ctrl + Shift + R</span>
                                </div>
                                <p class="text-sm opacity-75">Generuj raport miesięczny</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="btn bg-white text-gray-900 hover:bg-gray-50">Dodaj nowy skrót</button>
                        </div>
                    </div>
                </div>
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
        <section id="page-templates" class="widget">
            <h3 class="text-xl font-bold mb-4">Szablony stron</h3>
            <div id="page-templates-content">
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
        <section id="industry-templates" class="widget">
            <h3 class="text-xl font-bold mb-4">Szablony branżowe</h3>
            <div id="industry-templates-content">
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
