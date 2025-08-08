<!-- File: templates/EventPlanner/index.php -->

<?php
echo $this->element('layouts/table', ['tableData' => $events->toArray(), 'tableKeys' => $tableKeys, 'entity' => 'Events']);
