<?php
/**
 * Główny plik dashboard - Modularny system
 * Ładuje wszystkie moduły i zarządza strukturą dashboard
 */

// Debug: sprawdź czy plik się wykonuje
// echo "<!-- DEBUG: dashboard-modular.php loaded successfully -->";

// Ładowanie modułów - włączanie modułu content i personalization
if (file_exists(__DIR__ . '/modules/content.php')) {
    require_once __DIR__ . '/modules/content.php';
}
if (file_exists(__DIR__ . '/modules/personalization.php')) {
    require_once __DIR__ . '/modules/personalization.php';
}
?>

<div id="client-dashboard" class="min-h-screen font-display" style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #1a1a2e 100%);">
    <!-- Panel boczny -->
    <aside class="sidebar min-h-screen shadow-modern-lg">
        <nav class="sidebar-menu">
            <div class="sidebar-header">
                <h2 class="text-xl font-display font-bold text-gradient">Panel Klienta</h2>
            </div>
            <ul class="space-y-2">
                <!-- Personalizacja -->
                <li class="sidebar-section">Personalizacja</li>
                <li>
                    <a href="#personalization" class="sidebar-link sidebar-toggle" data-toggle="submenu-personalization">
                        <svg class="w-4 h-4 flex-shrink-0" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 7v10"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 8h8v8H8z"/></svg>
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
                        <svg class="w-4 h-4" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                        Powiadomienia / System
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Główna sekcja -->
    <main class="dashboard-content space-y-4 overflow-auto">
        <!-- Sekcje powitalne -->
        <section id="welcome" class="animate-fadeIn">
            <!-- Widżet powitalny -->
            <div class="card hover-lift rounded-modern-lg shadow-modern">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <?php if (function_exists('wp_get_current_user')):
                            $current_user = wp_get_current_user();
                            if ($current_user && isset($current_user->display_name)):
                                $display_name = function_exists('esc_html') ? esc_html($current_user->display_name) : $current_user->display_name; ?>
                            <h2 class="text-3xl font-display font-bold mb-3 text-gradient">Witaj, <?php echo $display_name; ?>!</h2>
                            <p class="text-gray-300 text-lg leading-relaxed">Miło Cię widzieć w panelu klienta. Zarządzaj swoją stroną i sklepem w jednym miejscu.</p>
                        <?php else: ?>
                            <h2 class="text-3xl font-display font-bold mb-3 text-gradient">Witaj w panelu klienta!</h2>
                            <p class="text-gray-300 text-lg leading-relaxed">Panel uruchomiony poza WordPressem – brak personalizacji.</p>
                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="mt-6 flex gap-4">
                            <button class="btn bg-gradient-primary hover:shadow-glow transform hover:scale-105 transition-all duration-300">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Rozpocznij pracę
                            </button>
                            <button class="btn bg-white text-gray-900 border-2 border-gray-200 hover:border-gray-300 hover:shadow-modern transition-all duration-300">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Pomoc
                            </button>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <?php if (function_exists('plugin_dir_url')): ?>
                            <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-24 w-24 opacity-80 hover:opacity-100 transition-opacity duration-300" alt="Logo">
                        <?php else: ?>
                            <img src="/wp-content/plugins/new-panel-master/assets/logo.svg" class="h-24 w-24 opacity-80 hover:opacity-100 transition-opacity duration-300" alt="Logo">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ładowanie modułów -->
        <?php
        // Visible debug banner: confirm dashboard renders and DB access
        // ...existing code...
        global $wpdb;
        $fn_exists = function_exists('render_posts_section') ? 'yes' : 'no';
        $db_prefix = isset($wpdb->prefix) ? $wpdb->prefix : 'unknown';
        $total_posts = null;
        if (isset($wpdb)) {
            $posts_table = $wpdb->prefix . 'posts';
            // safe quick count — exclude attachments
            $total_posts = $wpdb->get_var("SELECT COUNT(*) FROM `{$posts_table}` WHERE post_type='post'");
        }
        echo '<div style="background:#fff6f6;color:#a00;border:1px solid #faa;padding:8px;margin:8px 0;border-radius:6px;">'
            . 'DEBUG: render_posts_section=' . $fn_exists
            . '; db_prefix=' . esc_html($db_prefix)
            . '; total_posts=' . intval($total_posts)
            . '</div>';
        // Renderuj sekcje - włączanie modułu content
        if (function_exists('render_posts_section')) {
            render_posts_section();
        }

        // Renderuj sekcje personalizacji - włączanie
        if (function_exists('render_personalization_section')) {
            render_personalization_section();
        }
        if (function_exists('render_branding_section')) {
            render_branding_section();
        }
        if (function_exists('render_dashboard_widgets_section')) {
            render_dashboard_widgets_section();
        }
        if (function_exists('render_dashboard_layout_section')) {
            render_dashboard_layout_section();
        }
        if (function_exists('render_shortcuts_section')) {
            render_shortcuts_section();
        }
        ?>
    </main>
</div>
