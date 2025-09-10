<?php
/**
 * Moduł Content - Zarządzanie treścią
 * Zawiera wszystkie podmoduły zarządzania treścią
 */

// Ładowanie podmodułów content
require_once __DIR__ . '/content/posts.php';
require_once __DIR__ . '/content/pages.php';
require_once __DIR__ . '/content/media.php';

/**
 * Funkcja renderująca sekcję content (placeholder)
 */
function render_content_section() {
    ?>
    <!-- Content Management - Placeholder -->
    <section id="content" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Zarządzanie treścią</div>
            <div id="content-content" class="text-gray-300">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="stat-card hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-primary rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <span class="badge badge-info">Aktywny</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Wpisy</h4>
                        <p class="text-sm text-gray-400">Zarządzaj wpisami na blogu</p>
                    </div>

                    <div class="stat-card hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-secondary rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12 3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                </svg>
                            </div>
                            <span class="badge badge-success">Gotowe</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Strony</h4>
                        <p class="text-sm text-gray-400">Zarządzaj stronami statycznymi</p>
                    </div>

                    <div class="stat-card hover-lift">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-warning rounded-modern">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>
                                </svg>
                            </div>
                            <span class="badge badge-warning">Beta</span>
                        </div>
                        <h4 class="font-semibold text-gray-100 mb-2">Media</h4>
                        <p class="text-sm text-gray-400">Biblioteka plików i obrazów</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
