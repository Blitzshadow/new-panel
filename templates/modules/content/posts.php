<?php
/**
 * Podmoduł Posts - Zarządzanie wpisami dla klientów
 * Wyświetla listę wpisów z pełną funkcjonalnością zarządzania
 */

if (!defined('ABSPATH')) exit;

/**
 * Funkcja renderująca sekcję posts z pełną funkcjonalnością
 */
function render_posts_section() {
    // Sprawdź czy użytkownik ma rolę "klient"
    if (!current_user_can('klient') && !current_user_can('administrator')) {
        return;
    }

    // Pobierz parametry z URL lub ustaw domyślne
    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $posts_per_page = 10;
    $search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
    $status_filter = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : '';
    $category_filter = isset($_GET['category']) ? intval($_GET['category']) : '';
    $orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'date';
    $order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : 'DESC';

    // Przygotuj argumenty dla WP_Query
    $args = array(
        'post_type' => 'post',
        'post_status' => array('publish', 'draft', 'pending', 'future'),
        'posts_per_page' => $posts_per_page,
        'paged' => $current_page,
        'orderby' => $orderby,
        'order' => $order,
        'author' => get_current_user_id() // Tylko wpisy bieżącego użytkownika
    );

    // Dodaj wyszukiwanie
    if (!empty($search)) {
        $args['s'] = $search;
    }

    // Dodaj filtr statusu
    if (!empty($status_filter)) {
        $args['post_status'] = $status_filter;
    }

    // Dodaj filtr kategorii
    if (!empty($category_filter)) {
        $args['cat'] = $category_filter;
    }

    $posts_query = new WP_Query($args);

    // Pobierz statystyki
    $stats = get_posts_stats();

    // Pobierz kategorie dla filtra
    $categories = get_categories(array('hide_empty' => false));
    ?>
    <section id="posts" class="animate-fadeIn">
        <div class="card hover-lift">
            <div class="card-header section-title">Wpisy</div>
            <div id="posts-content">

                <!-- Statystyki wpisów -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="stat-card">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Wszystkie wpisy</p>
                                <p class="text-2xl font-bold text-gray-100"><?php echo $stats['total']; ?></p>
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
                                <p class="text-2xl font-bold text-green-400"><?php echo $stats['publish']; ?></p>
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
                                <p class="text-2xl font-bold text-yellow-400"><?php echo $stats['draft']; ?></p>
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
                                <p class="text-2xl font-bold text-blue-400"><?php echo $stats['pending']; ?></p>
                            </div>
                            <div class="p-3 bg-gradient-secondary rounded-modern">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Przyciski akcji i filtry -->
                <div class="mb-6 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                    <div class="flex gap-3">
                        <a href="<?php echo admin_url('post-new.php'); ?>" class="btn bg-gradient-primary hover:shadow-glow">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Dodaj nowy wpis
                        </a>

                        <button id="bulk-actions-btn" class="btn bg-gray-700 hover:bg-gray-600" disabled>
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                            Akcje masowe
                        </button>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 w-full lg:w-auto">
                        <div class="relative flex-1 lg:flex-initial">
                            <input type="text"
                                   id="posts-search"
                                   placeholder="Szukaj wpisów..."
                                   value="<?php echo esc_attr($search); ?>"
                                   class="w-full lg:w-64 px-4 py-2 pl-10 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        <select id="status-filter" class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Wszystkie statusy</option>
                            <option value="publish" <?php selected($status_filter, 'publish'); ?>>Opublikowane</option>
                            <option value="draft" <?php selected($status_filter, 'draft'); ?>>Wersje robocze</option>
                            <option value="pending" <?php selected($status_filter, 'pending'); ?>>Oczekujące</option>
                            <option value="future" <?php selected($status_filter, 'future'); ?>>Zaplanowane</option>
                        </select>

                        <select id="category-filter" class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-modern text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Wszystkie kategorie</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->term_id; ?>" <?php selected($category_filter, $category->term_id); ?>>
                                    <?php echo esc_html($category->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Tabela wpisów (desktop) -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <input type="checkbox" id="select-all-posts" class="rounded border-gray-600 text-blue-600 focus:ring-blue-500">
                                </th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="title">
                                    Tytuł
                                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                    </svg>
                                </th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="author">Autor</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="categories">Kategorie</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="comments">Komentarze</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="date">Data</th>
                                <th scope="col" class="px-6 py-3 cursor-pointer hover:text-gray-100" data-sort="status">Status</th>
                                <th scope="col" class="px-6 py-3">Akcje</th>
                            </tr>
                        </thead>
                        <tbody id="posts-table-body">
                            <?php if ($posts_query->have_posts()): ?>
                                <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>
                                    <?php
                                    $post_id = get_the_ID();
                                    $post_status = get_post_status();
                                    $categories = get_the_category();
                                    $comment_count = get_comments_number();
                                    $status_badge = get_status_badge($post_status);
                                    ?>
                                    <tr class="bg-gray-900 border-b border-gray-700 hover:bg-gray-800">
                                        <td class="px-4 py-4">
                                            <input type="checkbox" name="post_ids[]" value="<?php echo $post_id; ?>" class="post-checkbox rounded border-gray-600 text-blue-600 focus:ring-blue-500">
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-100 max-w-xs truncate" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4"><?php the_author(); ?></td>
                                        <td class="px-6 py-4">
                                            <?php if (!empty($categories)): ?>
                                                <div class="flex flex-wrap gap-1">
                                                    <?php foreach (array_slice($categories, 0, 2) as $category): ?>
                                                        <span class="badge badge-info text-xs"><?php echo esc_html($category->name); ?></span>
                                                    <?php endforeach; ?>
                                                    <?php if (count($categories) > 2): ?>
                                                        <span class="text-xs text-gray-400">+<?php echo count($categories) - 2; ?> więcej</span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-gray-500">Brak kategorii</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-gray-100"><?php echo $comment_count; ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-400">
                                            <?php echo get_the_date('Y-m-d'); ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $status_badge; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex gap-2">
                                                <a href="<?php echo get_edit_post_link($post_id); ?>" class="text-blue-400 hover:text-blue-300" title="Edytuj">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>
                                                <a href="<?php the_permalink(); ?>" target="_blank" class="text-green-400 hover:text-green-300" title="Podgląd">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </a>
                                                <button class="text-purple-400 hover:text-purple-300 duplicate-post" data-post-id="<?php echo $post_id; ?>" title="Duplikuj">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                    </svg>
                                                </button>
                                                <button class="text-red-400 hover:text-red-300 delete-post" data-post-id="<?php echo $post_id; ?>" title="Usuń">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p>Brak wpisów do wyświetlenia</p>
                                        <p class="text-sm">Rozpocznij od dodania pierwszego wpisu</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Widok mobilny (kafelki) -->
                <div class="lg:hidden space-y-4" id="posts-mobile-view">
                    <?php if ($posts_query->have_posts()): ?>
                        <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>
                            <?php
                            $post_id = get_the_ID();
                            $post_status = get_post_status();
                            $categories = get_the_category();
                            $comment_count = get_comments_number();
                            $status_badge = get_status_badge($post_status);
                            ?>
                            <div class="bg-gray-800 rounded-modern p-4 border border-gray-700">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-medium text-gray-100 truncate" title="<?php the_title(); ?>">
                                            <?php the_title(); ?>
                                        </h3>
                                        <p class="text-sm text-gray-400 mt-1">
                                            <?php the_author(); ?> • <?php echo get_the_date('Y-m-d'); ?>
                                        </p>
                                    </div>
                                    <input type="checkbox" name="post_ids[]" value="<?php echo $post_id; ?>" class="post-checkbox rounded border-gray-600 text-blue-600 focus:ring-blue-500">
                                </div>

                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <?php echo $status_badge; ?>
                                        <span class="text-sm text-gray-400">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                            </svg>
                                            <?php echo $comment_count; ?>
                                        </span>
                                    </div>
                                </div>

                                <?php if (!empty($categories)): ?>
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        <?php foreach (array_slice($categories, 0, 3) as $category): ?>
                                            <span class="badge badge-info text-xs"><?php echo esc_html($category->name); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="flex gap-2">
                                    <a href="<?php echo get_edit_post_link($post_id); ?>" class="btn btn-sm bg-blue-600 hover:bg-blue-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" target="_blank" class="btn btn-sm bg-green-600 hover:bg-green-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm bg-purple-600 hover:bg-purple-700 duplicate-post" data-post-id="<?php echo $post_id; ?>">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-sm bg-red-600 hover:bg-red-700 delete-post" data-post-id="<?php echo $post_id; ?>">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="text-center py-12 text-gray-400">
                            <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p>Brak wpisów do wyświetlenia</p>
                            <p class="text-sm">Rozpocznij od dodania pierwszego wpisu</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Paginacja -->
                <?php if ($posts_query->max_num_pages > 1): ?>
                    <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-400">
                            Wyświetlanie <?php echo ($current_page - 1) * $posts_per_page + 1; ?>-
                            <?php echo min($current_page * $posts_per_page, $posts_query->found_posts); ?> z
                            <?php echo $posts_query->found_posts; ?> wpisów
                        </div>

                        <div class="flex gap-2">
                            <?php if ($current_page > 1): ?>
                                <a href="<?php echo add_query_arg('paged', $current_page - 1); ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                    Poprzednia
                                </a>
                            <?php else: ?>
                                <span class="btn bg-gray-800 text-gray-500 cursor-not-allowed">Poprzednia</span>
                            <?php endif; ?>

                            <?php
                            $start_page = max(1, $current_page - 2);
                            $end_page = min($posts_query->max_num_pages, $current_page + 2);

                            if ($start_page > 1): ?>
                                <a href="<?php echo add_query_arg('paged', 1); ?>" class="btn bg-gray-700 hover:bg-gray-600">1</a>
                                <?php if ($start_page > 2): ?>
                                    <span class="px-2 py-2 text-gray-400">...</span>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                <?php if ($i == $current_page): ?>
                                    <span class="btn bg-gradient-primary text-white"><?php echo $i; ?></span>
                                <?php else: ?>
                                    <a href="<?php echo add_query_arg('paged', $i); ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                        <?php echo $i; ?>
                                    </a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($end_page < $posts_query->max_num_pages): ?>
                                <?php if ($end_page < $posts_query->max_num_pages - 1): ?>
                                    <span class="px-2 py-2 text-gray-400">...</span>
                                <?php endif; ?>
                                <a href="<?php echo add_query_arg('paged', $posts_query->max_num_pages); ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                    <?php echo $posts_query->max_num_pages; ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($current_page < $posts_query->max_num_pages): ?>
                                <a href="<?php echo add_query_arg('paged', $current_page + 1); ?>" class="btn bg-gray-700 hover:bg-gray-600">
                                    Następna
                                </a>
                            <?php else: ?>
                                <span class="btn bg-gray-800 text-gray-500 cursor-not-allowed">Następna</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Modal dla akcji masowych -->
    <div id="bulk-actions-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-gray-800 rounded-modern p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Akcje masowe</h3>
                <div class="space-y-3">
                    <button class="w-full btn bg-red-600 hover:bg-red-700" id="bulk-delete">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Usuń zaznaczone
                    </button>
                    <button class="w-full btn bg-yellow-600 hover:bg-yellow-700" id="bulk-draft">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Przenieś do wersji roboczych
                    </button>
                    <button class="w-full btn bg-green-600 hover:bg-green-700" id="bulk-publish">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Opublikuj zaznaczone
                    </button>
                </div>
                <div class="mt-6 flex gap-3">
                    <button class="flex-1 btn bg-gray-700 hover:bg-gray-600" id="cancel-bulk">Anuluj</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('posts-search');
        const statusFilter = document.getElementById('status-filter');
        const categoryFilter = document.getElementById('category-filter');
        const selectAllCheckbox = document.getElementById('select-all-posts');
        const postCheckboxes = document.querySelectorAll('.post-checkbox');
        const bulkActionsBtn = document.getElementById('bulk-actions-btn');
        const bulkModal = document.getElementById('bulk-actions-modal');
        const cancelBulkBtn = document.getElementById('cancel-bulk');

        let searchTimeout;

        // Funkcja do aktualizacji URL z parametrami
        function updateFilters() {
            const params = new URLSearchParams(window.location.search);

            const search = searchInput.value.trim();
            const status = statusFilter.value;
            const category = categoryFilter.value;

            if (search) {
                params.set('search', search);
            } else {
                params.delete('search');
            }

            if (status) {
                params.set('status', status);
            } else {
                params.delete('status');
            }

            if (category) {
                params.set('category', category);
            } else {
                params.delete('category');
            }

            // Resetuj stronę przy zmianie filtrów
            params.delete('paged');

            window.location.search = params.toString();
        }

        // Live search z opóźnieniem
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(updateFilters, 500);
        });

        // Filtry natychmiastowe
        statusFilter.addEventListener('change', updateFilters);
        categoryFilter.addEventListener('change', updateFilters);

        // Sortowanie
        document.querySelectorAll('[data-sort]').forEach(header => {
            header.addEventListener('click', function() {
                const sortBy = this.dataset.sort;
                const params = new URLSearchParams(window.location.search);
                const currentOrder = params.get('order') || 'DESC';
                const newOrder = currentOrder === 'DESC' ? 'ASC' : 'DESC';

                params.set('orderby', sortBy);
                params.set('order', newOrder);
                params.delete('paged');

                window.location.search = params.toString();
            });
        });

        // Zaznaczanie wszystkich checkboxów
        selectAllCheckbox.addEventListener('change', function() {
            postCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActionsButton();
        });

        // Aktualizacja przycisku akcji masowych
        postCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
                selectAllCheckbox.checked = checkedBoxes.length === postCheckboxes.length;
                selectAllCheckbox.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < postCheckboxes.length;
                updateBulkActionsButton();
            });
        });

        function updateBulkActionsButton() {
            const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
            bulkActionsBtn.disabled = checkedBoxes.length === 0;
            bulkActionsBtn.textContent = checkedBoxes.length === 0 ? 'Akcje masowe' : `Akcje masowe (${checkedBoxes.length})`;
        }

        // Modal akcji masowych
        bulkActionsBtn.addEventListener('click', function() {
            bulkModal.classList.remove('hidden');
        });

        cancelBulkBtn.addEventListener('click', function() {
            bulkModal.classList.add('hidden');
        });

        // Akcje masowe
        document.getElementById('bulk-delete').addEventListener('click', function() {
            if (confirm('Czy na pewno chcesz usunąć zaznaczone wpisy?')) {
                const selectedPosts = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
                bulkAction('delete', selectedPosts);
            }
        });

        document.getElementById('bulk-draft').addEventListener('click', function() {
            const selectedPosts = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
            bulkAction('draft', selectedPosts);
        });

        document.getElementById('bulk-publish').addEventListener('click', function() {
            const selectedPosts = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
            bulkAction('publish', selectedPosts);
        });

        function bulkAction(action, postIds) {
            const formData = new FormData();
            formData.append('action', 'bulk_posts_action');
            formData.append('bulk_action', action);
            formData.append('post_ids', JSON.stringify(postIds));
            formData.append('nonce', '<?php echo wp_create_nonce("bulk_posts_nonce"); ?>');

            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Wystąpił błąd: ' + data.data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Wystąpił błąd podczas przetwarzania żądania.');
            });
        }

        // Szybkie akcje pojedynczych wpisów
        document.querySelectorAll('.delete-post').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Czy na pewno chcesz usunąć ten wpis?')) {
                    const postId = this.dataset.postId;
                    quickAction('delete', postId);
                }
            });
        });

        document.querySelectorAll('.duplicate-post').forEach(btn => {
            btn.addEventListener('click', function() {
                const postId = this.dataset.postId;
                quickAction('duplicate', postId);
            });
        });

        function quickAction(action, postId) {
            const formData = new FormData();
            formData.append('action', 'quick_post_action');
            formData.append('quick_action', action);
            formData.append('post_id', postId);
            formData.append('nonce', '<?php echo wp_create_nonce("quick_post_nonce"); ?>');

            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Wystąpił błąd: ' + data.data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Wystąpił błąd podczas przetwarzania żądania.');
            });
        }
    });
    </script>
    <?php
}

/**
 * Funkcja pomocnicza do pobierania statystyk wpisów
 */
function get_posts_stats() {
    $user_id = get_current_user_id();

    return array(
        'total' => count_user_posts($user_id, 'post'),
        'publish' => count_user_posts($user_id, 'post', false, 'publish'),
        'draft' => count_user_posts($user_id, 'post', false, 'draft'),
        'pending' => count_user_posts($user_id, 'post', false, 'pending')
    );
}

/**
 * Funkcja pomocnicza do generowania badge statusu
 */
function get_status_badge($status) {
    $badges = array(
        'publish' => '<span class="badge badge-success">Opublikowany</span>',
        'draft' => '<span class="badge badge-warning">Wersja robocza</span>',
        'pending' => '<span class="badge badge-info">Oczekujący</span>',
        'future' => '<span class="badge badge-secondary">Zaplanowany</span>',
        'private' => '<span class="badge badge-dark">Prywatny</span>',
        'trash' => '<span class="badge badge-danger">W koszu</span>'
    );

    return isset($badges[$status]) ? $badges[$status] : '<span class="badge badge-light">' . ucfirst($status) . '</span>';
}

/**
 * AJAX handler dla akcji masowych
 */
function handle_bulk_posts_action() {
    // Sprawdź nonce dla bezpieczeństwa
    if (!wp_verify_nonce($_POST['nonce'], 'bulk_posts_nonce')) {
        wp_die('Bezpieczeństwo: nieprawidłowy nonce');
    }

    // Sprawdź uprawnienia
    if (!current_user_can('klient') && !current_user_can('administrator')) {
        wp_die('Brak uprawnień');
    }

    $action = sanitize_text_field($_POST['bulk_action']);
    $post_ids = json_decode(stripslashes($_POST['post_ids']), true);

    if (empty($post_ids)) {
        wp_send_json_error('Brak zaznaczonych wpisów');
    }

    $updated = 0;

    foreach ($post_ids as $post_id) {
        // Sprawdź czy użytkownik jest właścicielem wpisu
        $post = get_post($post_id);
        if (!$post || $post->post_author != get_current_user_id()) {
            continue;
        }

        switch ($action) {
            case 'delete':
                if (wp_delete_post($post_id, true)) {
                    $updated++;
                }
                break;

            case 'draft':
                if (wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'))) {
                    $updated++;
                }
                break;

            case 'publish':
                if (wp_update_post(array('ID' => $post_id, 'post_status' => 'publish'))) {
                    $updated++;
                }
                break;
        }
    }

    if ($updated > 0) {
        wp_send_json_success("Zaktualizowano $updated wpisów");
    } else {
        wp_send_json_error('Nie udało się zaktualizować żadnego wpisu');
    }
}
add_action('wp_ajax_bulk_posts_action', 'handle_bulk_posts_action');

/**
 * AJAX handler dla szybkich akcji
 */
function handle_quick_post_action() {
    // Sprawdź nonce dla bezpieczeństwa
    if (!wp_verify_nonce($_POST['nonce'], 'quick_post_nonce')) {
        wp_die('Bezpieczeństwo: nieprawidłowy nonce');
    }

    // Sprawdź uprawnienia
    if (!current_user_can('klient') && !current_user_can('administrator')) {
        wp_die('Brak uprawnień');
    }

    $action = sanitize_text_field($_POST['quick_action']);
    $post_id = intval($_POST['post_id']);

    // Sprawdź czy użytkownik jest właścicielem wpisu
    $post = get_post($post_id);
    if (!$post || $post->post_author != get_current_user_id()) {
        wp_send_json_error('Brak dostępu do tego wpisu');
    }

    switch ($action) {
        case 'delete':
            if (wp_delete_post($post_id, true)) {
                wp_send_json_success('Wpis został usunięty');
            } else {
                wp_send_json_error('Nie udało się usunąć wpisu');
            }
            break;

        case 'duplicate':
            $new_post = array(
                'post_title' => $post->post_title . ' (kopia)',
                'post_content' => $post->post_content,
                'post_excerpt' => $post->post_excerpt,
                'post_status' => 'draft',
                'post_type' => $post->post_type,
                'post_author' => $post->post_author,
                'post_category' => wp_get_post_categories($post_id)
            );

            $new_post_id = wp_insert_post($new_post);

            if ($new_post_id) {
                // Skopiuj tagi
                $tags = wp_get_post_tags($post_id);
                if (!empty($tags)) {
                    wp_set_post_tags($new_post_id, wp_list_pluck($tags, 'name'));
                }

                wp_send_json_success('Wpis został zduplikowany');
            } else {
                wp_send_json_error('Nie udało się zduplikować wpisu');
            }
            break;

        default:
            wp_send_json_error('Nieprawidłowa akcja');
    }
}
add_action('wp_ajax_quick_post_action', 'handle_quick_post_action');
?>
