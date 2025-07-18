<!-- File: templates/element/layouts/table.php -->

<h1><?= $entity ?></h1>
<?php
    $tableDataAsArray = [];
    foreach ($tableData as $row) {
        $tableDataAsArray[] = $row->toArray();
    }
?>
<table>
    <?php foreach ($tableDataAsArray as $row): ?>
        <tr>
            <?php foreach ($row as $key => $value): ?>
                <th><?= $key ?></th>
            <?php endforeach; ?>
        </tr>

        <tr>
            <?php foreach ($row as $key => $value): ?>
                <td>
                    <?php echo $value instanceof DateTime ? $value->format(DATE_RFC850) : $value ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?> 
</table>
