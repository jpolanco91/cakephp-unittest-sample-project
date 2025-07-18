<h1>Users</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>URL</th>
        <th>Complete</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($events as $event): ?>
    <tr>
        <td>
            <?= $event->title ?>
        </td>
         <td>
            <?= $event->description ?>
        </td>
        <td>
            <?= $event->url ?>
        </td>
         <td>
            <?= $event->complete ?>
        </td>
        <td>
            <?= $event->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>