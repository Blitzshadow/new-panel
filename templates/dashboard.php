<div id="client-dashboard" class="bg-gray-900 text-gray-100 min-h-screen flex">
    <!-- Panel boczny -->
    <aside class="w-72 sidebar flex flex-col min-h-screen">
        <div class="sidebar-header flex items-center gap-3">
            <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-8" alt="Logo">
            Weblu Panel
        </div>
        <nav class="sidebar-menu flex-1">
            <ul class="space-y-1">
                <li>
                    <a href="#dashboard" class="sidebar-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 8h2v-2H7v2zm0-4h2v-2H7v2zm0-8v2h2V5H7zm4 8h2v-2h-2v2zm0 4h2v-2h-2v2zm0-8v2h2V5h-2zm4 8h2v-2h-2v2zm0-4h2v-2h-2v2zm0-8v2h2V5h-2z"/></svg>
                        Dashboard
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
