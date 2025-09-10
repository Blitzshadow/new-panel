<?php
/**
 * Posts Management Section
 * WordPress Admin-style Posts Table Layout
 */

if (!defined('ABSPATH')) exit;

/**
 * Render posts section - only when called
 */
function render_posts_section() {
?>

<section id="posts" class="animate-fadeIn">
    <div class="card hover-lift">
        <div class="card-header section-title">
            <div class="flex items-center justify-between">
                <h2>Wpisy</h2>
                <div class="flex gap-3">
                    <button class="btn btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Dodaj nowy wpis
                    </button>
                </div>
            </div>
        </div>

        <div id="posts-content">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Wszystkie wpisy</p>
                            <p class="text-2xl font-bold text-gray-100" id="total-posts-count">-</p>
                        </div>
                        <div class="p-3 bg-gradient-primary rounded-modern">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Opublikowane</p>
                            <p class="text-2xl font-bold text-green-400" id="published-posts-count">-</p>
                        </div>
                        <div class="p-3 bg-gradient-success rounded-modern">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Wersje robocze</p>
                            <p class="text-2xl font-bold text-yellow-400" id="draft-posts-count">-</p>
                        </div>
                        <div class="p-3 bg-gradient-warning rounded-modern">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Oczekujące</p>
                            <p class="text-2xl font-bold text-blue-400" id="pending-posts-count">-</p>
                        </div>
                        <div class="p-3 bg-gradient-secondary rounded-modern">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Actions Bar -->
            <div class="mb-6 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div class="flex gap-3">
                    <button id="bulk-actions-btn" class="btn bg-gray-700 hover:bg-gray-600" disabled>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                        Akcje zbiorowe
                    </button>

                    <select id="bulk-action-select" class="form-select" disabled>
                        <option value="">Wybierz akcję</option>
                        <option value="publish">Opublikuj</option>
                        <option value="draft">Przenieś do wersji roboczych</option>
                        <option value="trash">Przenieś do kosza</option>
                        <option value="delete">Usuń trwale</option>
                    </select>

                    <button id="apply-bulk-action" class="btn btn-secondary" disabled>
                        Zastosuj
                    </button>
                </div>

                <!-- Filters -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <select id="post-status-filter" class="form-select">
                        <option value="">Wszystkie statusy</option>
                        <option value="publish">Opublikowane</option>
                        <option value="draft">Wersje robocze</option>
                        <option value="pending">Oczekujące</option>
                        <option value="future">Zaplanowane</option>
                        <option value="private">Prywatne</option>
                        <option value="trash">Kosz</option>
                    </select>

                    <select id="category-filter" class="form-select">
                        <option value="">Wszystkie kategorie</option>
                        <!-- Categories will be loaded dynamically -->
                    </select>

                    <select id="author-filter" class="form-select">
                        <option value="">Wszyscy autorzy</option>
                        <!-- Authors will be loaded dynamically -->
                    </select>

                    <input type="text" id="post-search" placeholder="Szukaj wpisów..." class="form-input">

                    <button id="filter-btn" class="btn bg-blue-600 hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filtruj
                    </button>

                    <button id="clear-filters-btn" class="btn bg-gray-600 hover:bg-gray-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Wyczyść
                    </button>
                </div>
            </div>

            <!-- Posts Table -->
            <div class="bg-gray-800 rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="posts-table" class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">
                                    <input type="checkbox" id="select-all-posts" class="rounded border-gray-600">
                                </th>
                                <th class="px-4 py-3 cursor-pointer hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center gap-2">
                                        <span>Tytuł</span>
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 cursor-pointer hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center gap-2">
                                        <span>Autor</span>
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3">Kategorie</th>
                                <th class="px-4 py-3">Tagi</th>
                                <th class="px-4 py-3 cursor-pointer hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center gap-2">
                                        <span>Komentarze</span>
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 cursor-pointer hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center gap-2">
                                        <span>Data</span>
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3 cursor-pointer hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center gap-2">
                                        <span>Status</span>
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="px-4 py-3">Akcje</th>
                            </tr>
                        </thead>
                        <tbody id="posts-table-body">
                            <!-- Demo post for visualization -->
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition-colors">
                                <td class="px-4 py-3">
                                    <input type="checkbox" name="post[]" value="1" class="rounded border-gray-600">
                                </td>
                                <td class="px-4 py-3 font-medium text-white">
                                    <a href="post.php?post=1&action=edit" class="hover:text-blue-400 transition-colors">
                                        Witamy w nowym panelu WordPress!
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-300">
                                    Administrator
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="badge badge-info text-xs">Ogólne</span>
                                        <span class="badge badge-success text-xs">Aktualności</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap gap-1">
                                        <span class="badge badge-secondary text-xs">wordpress</span>
                                        <span class="badge badge-secondary text-xs">panel</span>
                                        <span class="badge badge-secondary text-xs">demo</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span class="text-gray-300">3</span>
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-300">
                                    <div class="flex flex-col">
                                        <span class="text-sm">2025-09-10</span>
                                        <span class="text-xs text-gray-500">14:30</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="badge badge-success">Opublikowany</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <a href="post.php?post=1&action=edit" class="text-blue-400 hover:text-blue-300 transition-colors" title="Edytuj">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <a href="?p=1" target="_blank" class="text-green-400 hover:text-green-300 transition-colors" title="Podgląd">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="delete-post text-red-400 hover:text-red-300 transition-colors" data-post-id="1" title="Usuń">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Empty state message -->
                            <tr id="empty-state-row" class="hidden">
                                <td colspan="9" class="px-4 py-8 text-center text-gray-400">
                                    <div class="flex flex-col items-center gap-4">
                                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <div>
                                            <p class="text-lg font-medium">Brak wpisów do wyświetlenia</p>
                                            <p class="text-sm">Wpisy zostaną wyświetlone po dodaniu logiki ładowania danych.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-400" id="pagination-info">
                    Wyświetlanie 0–0 z 0 wpisów
                </div>

                <div class="flex items-center gap-2" id="pagination-controls">
                    <button id="prev-page-btn" class="btn btn-secondary" disabled>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Poprzednia
                    </button>

                    <div class="flex gap-1" id="page-numbers">
                        <!-- Page numbers will be generated here -->
                    </div>

                    <button id="next-page-btn" class="btn btn-secondary" disabled>
                        Następna
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center gap-2">
                    <label for="per-page-select" class="text-sm text-gray-400">Pokaż:</label>
                    <select id="per-page-select" class="form-select">
                        <option value="10">10</option>
                        <option value="20" selected>20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-sm text-gray-400">wpisów</span>
                </div>
            </div>

            <!-- Loading Overlay -->
            <div id="loading-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-gray-800 rounded-lg p-6 flex items-center gap-4">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                    <span class="text-white">Ładowanie wpisów...</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for UI interactions (structure only, no data loading yet) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all posts checkbox
    const selectAllCheckbox = document.getElementById('select-all-posts');
    const postCheckboxes = document.querySelectorAll('input[name="post[]"]');
    const bulkActionsBtn = document.getElementById('bulk-actions-btn');
    const bulkActionSelect = document.getElementById('bulk-action-select');
    const applyBulkActionBtn = document.getElementById('apply-bulk-action');

    // Handle select all functionality
    selectAllCheckbox.addEventListener('change', function() {
        const isChecked = this.checked;
        postCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
        updateBulkActionsState();
    });

    // Handle individual checkbox changes
    postCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkActionsState);
    });

    function updateBulkActionsState() {
        const checkedBoxes = document.querySelectorAll('input[name="post[]"]:checked');
        const hasSelection = checkedBoxes.length > 0;

        bulkActionsBtn.disabled = !hasSelection;
        bulkActionSelect.disabled = !hasSelection;
        applyBulkActionBtn.disabled = !hasSelection;

        // Update select all checkbox state
        const totalCheckboxes = postCheckboxes.length;
        const checkedCount = checkedBoxes.length;

        if (checkedCount === 0) {
            selectAllCheckbox.checked = false;
            selectAllCheckbox.indeterminate = false;
        } else if (checkedCount === totalCheckboxes) {
            selectAllCheckbox.checked = true;
            selectAllCheckbox.indeterminate = false;
        } else {
            selectAllCheckbox.checked = false;
            selectAllCheckbox.indeterminate = true;
        }
    }

    // Filter button click handler (placeholder)
    document.getElementById('filter-btn').addEventListener('click', function() {
        console.log('Filter button clicked - logic will be added later');
        // TODO: Implement filtering logic
    });

    // Clear filters button click handler (placeholder)
    document.getElementById('clear-filters-btn').addEventListener('click', function() {
        console.log('Clear filters button clicked - logic will be added later');
        // TODO: Implement clear filters logic
    });

    // Bulk action apply button click handler (placeholder)
    applyBulkActionBtn.addEventListener('click', function() {
        console.log('Apply bulk action clicked - logic will be added later');
        // TODO: Implement bulk actions logic
    });

    // Pagination button handlers (placeholders)
    document.getElementById('prev-page-btn').addEventListener('click', function() {
        console.log('Previous page clicked - logic will be added later');
        // TODO: Implement pagination logic
    });

    document.getElementById('next-page-btn').addEventListener('click', function() {
        console.log('Next page clicked - logic will be added later');
        // TODO: Implement pagination logic
    });

    // Per page select handler (placeholder)
    document.getElementById('per-page-select').addEventListener('change', function() {
        console.log('Per page changed to:', this.value, '- logic will be added later');
        // TODO: Implement per page change logic
    });

    // Table sorting handlers (placeholders)
    document.querySelectorAll('th[cursor-pointer]').forEach(header => {
        header.addEventListener('click', function() {
            console.log('Table header clicked for sorting - logic will be added later');
            // TODO: Implement sorting logic
        });
    });

    console.log('Posts table UI initialized - ready for data loading logic');
});
</script>
    </div>
</section>
<?php
}
?>
