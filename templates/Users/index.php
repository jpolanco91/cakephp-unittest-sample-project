<!-- File: templates/Users/index.php -->

<?php
echo $this->element('layouts/table', ['tableData' => $users->toArray(), 'tableKeys' => $tableKeys, 'entity' => 'Users']);
