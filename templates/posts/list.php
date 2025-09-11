<?php
// templates/posts/list.php
// Renders the posts listing UI. This template loads data via the REST API endpoint: np/v1/posts
// No required incoming variables — the template fetches data client-side.
if (!defined('ABSPATH')) exit;
?>
<div id="np-posts" class="np-section np-posts-list">
    <div class="np-header flex items-center justify-between">
        <h2 class="np-title">Lista wpisów</h2>
        <div class="np-actions">
            <button id="np-refresh" class="btn">Odśwież</button>
        </div>
    </div>

    <div class="np-toolbar my-2">
        <input id="np-search" type="search" placeholder="Szukaj po tytule..." class="input" />
    </div>

    <div id="np-posts-messages" aria-live="polite"></div>

    <div class="np-table-wrap overflow-auto">
        <table id="np-posts-table" class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th style="width:30px"><input id="np-select-all" type="checkbox" /></th>
                    <th style="width:60px">ID</th>
                    <th>Tytuł</th>
                    <th style="width:160px">Data</th>
                    <th style="width:120px">Status</th>
                    <th style="width:120px">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr class="np-loading"><td colspan="6">Ładowanie...</td></tr>
            </tbody>
        </table>
    </div>

    <div id="np-posts-pagination" class="np-pagination mt-3"></div>
</div>

<script>
/* Posts list client: fetches from REST API and renders rows. Defensive about DOM presence. */
(function(){
    var root = document.getElementById('np-posts');
    if (!root) return;

    var table = root.querySelector('#np-posts-table');
    var tbody = table && table.querySelector('tbody');
    var paginationEl = document.getElementById('np-posts-pagination');
    var refreshBtn = document.getElementById('np-refresh');
    var searchInput = document.getElementById('np-search');
    var selectAll = document.getElementById('np-select-all');
    var currentPage = 1;

    var restEndpoint = '<?php echo esc_js( rest_url( "np/v1/posts" ) ); ?>';

    function showMessage(msg, type){
        var c = document.getElementById('np-posts-messages');
        if (!c) return;
        c.innerText = msg || '';
        if (type === 'error') c.classList.add('np-error');
        else c.classList.remove('np-error');
    }

    function renderRows(items){
        if (!tbody) return;
        tbody.innerHTML = '';
        if (!items || items.length === 0){
            tbody.innerHTML = '<tr><td colspan="6">Brak wpisów</td></tr>';
            return;
        }
        items.forEach(function(it){
            var tr = document.createElement('tr');
            tr.innerHTML = ''+
                '<td><input class="np-select" type="checkbox" data-id="'+(parseInt(it.id,10)||0)+'" /></td>'+
                '<td>'+(parseInt(it.id,10)||0)+'</td>'+
                '<td>'+escapeHtml(it.title)+'</td>'+
                '<td>'+escapeHtml(new Date(it.date).toLocaleString())+'</td>'+
                '<td>'+escapeHtml(it.status)+'</td>'+
                '<td><button class="btn btn-small" data-id="'+(parseInt(it.id,10)||0)+'" data-action="edit">Edytuj</button> <button class="btn btn-small" data-id="'+(parseInt(it.id,10)||0)+'" data-action="delete">Usuń</button></td>';
            tbody.appendChild(tr);
        });
    }

    function escapeHtml(str){
        if (str === null || str === undefined) return '';
        return String(str).replace(/[&<>"'`]/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":"&#39;","`":"&#96;"}[m]; });
    }

    function renderPagination(total, perPage){
        if (!paginationEl) return;
        perPage = perPage || 10;
        var pages = Math.max(1, Math.ceil(total / perPage));
        var html = '';
        for (var i=1;i<=pages;i++){
            html += '<button class="btn btn-sm '+(i===currentPage? 'active':'')+'" data-page="'+i+'">'+i+'</button> ';
        }
        paginationEl.innerHTML = html;
        Array.prototype.forEach.call(paginationEl.querySelectorAll('button'), function(b){
            b.addEventListener('click', function(){
                var p = parseInt(this.getAttribute('data-page'),10)||1;
                fetchPage(p);
            });
        });
    }

    function fetchPage(page){
        page = page || 1; currentPage = page;
        if (!tbody) return;
        tbody.innerHTML = '<tr class="np-loading"><td colspan="6">Ładowanie...</td></tr>';
        var q = '?paged='+encodeURIComponent(page);
        var s = (searchInput && searchInput.value) ? '&s='+encodeURIComponent(searchInput.value) : '';
        fetch(restEndpoint + q + s, { credentials: 'same-origin' })
            .then(function(res){ return res.json(); })
            .then(function(data){
                if (!data || !data.success){
                    showMessage('Błąd podczas pobierania wpisów', 'error');
                    tbody.innerHTML = '<tr><td colspan="6">Błąd ładowania</td></tr>';
                    return;
                }
                renderRows(data.data || []);
                renderPagination(data.total || 0, 10);
                showMessage('');
            }).catch(function(err){
                showMessage('Błąd: ' + (err && err.message ? err.message : 'network'), 'error');
                tbody.innerHTML = '<tr><td colspan="6">Błąd ładowania</td></tr>';
            });
    }

    // Bind events
    if (refreshBtn) refreshBtn.addEventListener('click', function(){ fetchPage(1); });
    if (searchInput) searchInput.addEventListener('keydown', function(e){ if (e.key === 'Enter') fetchPage(1); });
    if (selectAll) selectAll.addEventListener('change', function(){
        var checked = !!this.checked;
        Array.prototype.forEach.call(root.querySelectorAll('.np-select'), function(cb){ cb.checked = checked; });
    });

    // Delegated actions (edit/delete)
    if (tbody) tbody.addEventListener('click', function(e){
        var btn = e.target.closest('button[data-action]');
        if (!btn) return;
        var act = btn.getAttribute('data-action');
        var id = parseInt(btn.getAttribute('data-id'),10)||0;
        if (act === 'delete'){
            if (!confirm('Na pewno usunąć wpis #' + id + '?')) return;
            // Use AJAX bulk endpoint for delete for now
            var fd = new FormData(); fd.append('action','np_posts_bulk'); fd.append('security','<?php echo wp_create_nonce("np_posts_nonce"); ?>'); fd.append('action_type','delete'); fd.append('ids[]', id);
            fetch('<?php echo esc_js( admin_url("admin-ajax.php") ); ?>', { method:'POST', credentials:'same-origin', body: fd })
                .then(function(r){ return r.json(); }).then(function(res){ if (res && res.success){ fetchPage(currentPage); } else { alert((res && res.message) || 'Błąd'); } })
                .catch(function(){ alert('Błąd sieci'); });
        }
        if (act === 'edit'){
            window.location.href = '<?php echo esc_js( admin_url( 'post.php' ) ); ?>?post='+id+'&action=edit';
        }
    });

    // initial load
    fetchPage(1);
})();
</script>
