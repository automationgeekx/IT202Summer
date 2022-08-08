<?php
// this will show no results query in a better manner
if (!isset($results)) {
    $results = [];
} ?>
<table class="table">
    <?php foreach ($results as $index => $record) : ?>
        <?php if ($index == 0) : ?>
            <thead>
                <?php foreach ($record as $column => $value) : ?>
                    <th><?php se($column); ?></th>
                <?php endforeach; ?>
            </thead>
        <?php endif; ?>
        <tr>
            <?php foreach ($record as $column => $value) : ?>
                <td><?php se($value, null, "N/A"); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>