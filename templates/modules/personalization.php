<?php
/**
 * Moduł Personalizacji - Główny plik modułu
 * Zawiera wszystkie podmoduły personalizacji dashboard
 */

if (!defined('ABSPATH')) exit;

// Ładowanie podmodułów personalizacji
if (file_exists(__DIR__ . '/personalization/branding.php')) {
    require_once __DIR__ . '/personalization/branding.php';
}
if (file_exists(__DIR__ . '/personalization/dashboard-widgets.php')) {
    require_once __DIR__ . '/personalization/dashboard-widgets.php';
}
if (file_exists(__DIR__ . '/personalization/dashboard-layout.php')) {
    require_once __DIR__ . '/personalization/dashboard-layout.php';
}
if (file_exists(__DIR__ . '/personalization/shortcuts.php')) {
    require_once __DIR__ . '/personalization/shortcuts.php';
}

/**
 * Funkcja renderująca główną sekcję personalizacji
 */
function render_personalization_section() {
    ?>
    <!-- Personalizacja -->
    <section id="personalization" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Personalizacja panelu</div>
            <div id="personalization-content" class="text-gray-300">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="stat-card hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-primary rounded-modern">
                                <svg class="w-4 h-4 text-white" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <svg class="w-4 h-4 text-white" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <svg class="w-4 h-4 text-white" style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    <?php
}
?>
