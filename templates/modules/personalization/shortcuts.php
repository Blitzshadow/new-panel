<?php
/**
 * Podmoduł Shortcuts - Skróty i linki
 */

/**
 * Funkcja renderująca sekcję shortcuts
 */
function render_shortcuts_section() {
    ?>
    <section id="shortcuts" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Skróty i linki</div>
            <div id="shortcuts-content">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-primary rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <span class="badge badge-success">Aktywny</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Nowy wpis</h4>
                        <p class="text-sm text-gray-400">Szybkie tworzenie nowego wpisu</p>
                    </div>

                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-secondary rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <span class="badge badge-info">Popularny</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Zarządzanie użytkownikami</h4>
                        <p class="text-sm text-gray-400">Dodaj, edytuj lub usuń użytkowników</p>
                    </div>

                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-warning rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="badge badge-warning">Beta</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Raporty sprzedaży</h4>
                        <p class="text-sm text-gray-400">Zobacz statystyki sprzedaży</p>
                    </div>

                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-success rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"/>
                                </svg>
                            </div>
                            <span class="badge badge-info">Nowe</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Zamówienia</h4>
                        <p class="text-sm text-gray-400">Zarządzaj zamówieniami klientów</p>
                    </div>

                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-primary rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="badge badge-success">Gotowe</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Biblioteka mediów</h4>
                        <p class="text-sm text-gray-400">Zarządzaj zdjęciami i plikami</p>
                    </div>

                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-secondary rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="badge badge-warning">Konfiguracja</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Ustawienia</h4>
                        <p class="text-sm text-gray-400">Konfiguruj ustawienia systemu</p>
                    </div>
                </div>

                <div class="mt-8 p-6 bg-gradient-primary rounded-modern-lg text-white">
                    <h4 class="text-xl font-semibold mb-3">Dostosuj skróty</h4>
                    <p class="opacity-90 mb-4">Dodaj własne skróty do najczęściej używanych funkcji</p>
                    <div class="flex gap-4">
                        <button class="btn bg-white text-gray-900 hover:bg-gray-50">Dodaj skrót</button>
                        <button class="btn bg-white text-gray-900 hover:bg-gray-50">Importuj/eksportuj</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
