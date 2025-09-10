<?php
/**
 * Podmoduł Dashboard Layout - Edytor układu dashboard
 */

if (!defined('ABSPATH')) exit;

/**
 * Funkcja renderująca sekcję dashboard layout
 */
function render_dashboard_layout_section() {
    ?>
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
                                <svg class="w-4 h-4 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                <div>
                                    <h6 class="font-medium text-gray-100">Wykres sprzedaży</h6>
                                    <p class="text-sm text-gray-400">Wizualizacja danych sprzedażowych</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-modern hover:border-gray-400 cursor-move transition-colors">
                                <svg class="w-4 h-4 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <div>
                                    <h6 class="font-medium text-gray-100">Lista użytkowników</h6>
                                    <p class="text-sm text-gray-400">Zarządzanie użytkownikami</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-modern hover:border-gray-400 cursor-move transition-colors">
                                <svg class="w-4 h-4 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <div class="text-2xl font-bold text-gray-100">1,234</div>
                                            <div class="text-sm text-gray-400">Użytkownicy</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-gray-100">$12,345</div>
                                            <div class="text-sm text-gray-400">Przychody</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-gray-100">89%</div>
                                            <div class="text-sm text-gray-400">Konwersja</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
