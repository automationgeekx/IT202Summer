<?php
if (!isset($page)) {
    $page = 1;
}
if (!isset($total_pages)) {
    $total_pages = 1;
} ?>
<ul class="page-pagination">
    <li class="page-item <?php if (($page - 1) < 1) echo 'disabled'; ?>">
        <a class="page-link" href="?<?php paginate($page - 1); ?>">Previous Page</a>
    </li>
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
            <a class="page-link" href="?<?php paginate($i); ?>">
                <?php se($i); ?></a>
        </li>
    <?php endfor; ?>
    <li class="page-item <?php if (($page + 1) > $total_pages) echo 'disabled'; ?>">
        <a class="page-link" href="?<?php paginate($page + 1); ?>">Next Page</a>
    </li>
</ul>