<?php
/**
 * Podmoduł Dashboard Widgets - Zarządzanie widżetami
 */

/**
 * Funkcja renderująca sekcję dashboard widgets
 */
function render_dashboard_widgets_section() {
    ?>
    <section id="dashboard-widgets" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Widżety na dashboard</div>
            <div id="dashboard-widgets-content">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="stat-card hover-lift cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-success rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    <?php
}
?>
