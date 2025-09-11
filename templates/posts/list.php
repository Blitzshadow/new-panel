<?php
// templates/posts/list.php
// Oczekuje zmiennej $posts (tablica)
?>
<div class="np-posts-list">
    <table>
        <thead>
            <tr><th>ID</th><th>Title</th><th>Date</th><th>Status</th></tr>
        </thead>
        <tbody>
            <?php if (empty($posts)): ?>
                <tr><td colspan="4">Brak wpisów</td></tr>
            <?php else: foreach ($posts as $p): ?>
                <tr>
                    <td><?php echo intval($p['id']); ?></td>
                    <td><?php echo esc_html($p['title']); ?></td>
                    <td><?php echo esc_html($p['date']); ?></td>
                    <td><?php echo esc_html($p['status']); ?></td>
                </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
