<!-- File: templates/Locations/index.php -->

<?php
echo $this->element('layouts/table', ['tableData' => $locations->toArray(), 'tableKeys' => $tableKeys, 'entity' => 'Locations']);
