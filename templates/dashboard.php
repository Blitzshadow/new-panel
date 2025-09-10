<div id="client-dashboard" class="bg-gray-900 text-gray-100 min-h-screen flex">
    <!-- Panel boczny -->
    <aside class="w-64 bg-gray-800 flex flex-col">
        <div class="p-6 flex items-center">
            <img src="<?php echo plugin_dir_url(__FILE__).'../assets/logo.svg'; ?>" class="h-8 mr-2" alt="Logo">
            <span class="font-bold text-lg">Twoja Firma</span>
        </div>
        <nav class="flex-1">
            <ul>
                <li><a href="#welcome" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Powitanie</a></li>
                <li><a href="#orders" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Zamówienia</a></li>
                <li><a href="#products" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Produkty</a></li>
                <li><a href="#coupons" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Kupony</a></li>
                <li><a href="#reports" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Raporty</a></li>
                <li><a href="#posts" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Wpisy</a></li>
                <li><a href="#contact" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Kontakt</a></li>
                <li><a href="#issues" class="flex items-center p-3 hover:bg-gray-700"><svg class="w-5 h-5 mr-2"><!-- Ikona --></svg> Zgłoś problem</a></li>
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
