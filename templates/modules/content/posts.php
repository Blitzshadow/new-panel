<?php
/**
 * Podmoduł Posts - Zarządzanie wpisami
 */

/**
 * Funkcja renderująca sekcję posts
 */
function render_posts_section() {
    ?>
    <section id="posts" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Wpisy</div>
            <div id="posts-content">
                <div class="mb-6 flex justify-between items-center">
                    <div class="flex gap-4">
                        <button class="btn bg-gradient-primary hover:shadow-glow">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Nowy wpis
                        </button>
                        <button class="btn bg-white text-gray-900 border-2 border-gray-200 hover:border-gray-300">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filtry
                        </button>
                    </div>
                    <div class="flex items-center gap-4">
                        <input type="text" placeholder="Szukaj wpisów..." class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <select class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Wszystkie statusy</option>
                            <option>Opublikowane</option>
                            <option>Wersja robocza</option>
                            <option>Zaplanowane</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tytuł</th>
                                <th scope="col" class="px-6 py-3">Autor</th>
                                <th scope="col" class="px-6 py-3">Kategorie</th>
                                <th scope="col" class="px-6 py-3">Tagi</th>
                                <th scope="col" class="px-6 py-3">Data</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-900 border-b border-gray-700 hover:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-100">Witaj na blogu!</td>
                                <td class="px-6 py-4">Admin</td>
                                <td class="px-6 py-4">Ogólne</td>
                                <td class="px-6 py-4">powitanie, blog</td>
                                <td class="px-6 py-4">2024-01-15</td>
                                <td class="px-6 py-4"><span class="badge badge-success">Opublikowany</span></td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edytuj">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Podgląd">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Usuń">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-gray-900 border-b border-gray-700 hover:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-100">Jak zacząć z WordPress</td>
                                <td class="px-6 py-4">Admin</td>
                                <td class="px-6 py-4">Poradniki</td>
                                <td class="px-6 py-4">wordpress, tutorial</td>
                                <td class="px-6 py-4">2024-01-10</td>
                                <td class="px-6 py-4"><span class="badge badge-info">Wersja robocza</span></td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="text-blue-400 hover:text-blue-300" title="Edytuj">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <button class="text-green-400 hover:text-green-300" title="Podgląd">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300" title="Usuń">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <div class="text-sm text-gray-400">
                        Wyświetlanie 1-2 z 2 wpisów
                    </div>
                    <div class="flex gap-2">
                        <button class="px-3 py-2 bg-gray-800 text-gray-400 rounded-modern hover:bg-gray-700 disabled:opacity-50" disabled>
                            Poprzednia
                        </button>
                        <button class="px-3 py-2 bg-gradient-primary text-white rounded-modern hover:shadow-glow">
                            1
                        </button>
                        <button class="px-3 py-2 bg-gray-800 text-gray-400 rounded-modern hover:bg-gray-700">
                            Następna
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
