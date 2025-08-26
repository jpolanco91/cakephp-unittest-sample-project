<h1>Add location</h1>
<?php

echo $this->Form->create($location);
echo $this->Form->control('id', ['type' => 'text']);
echo $this->Form->control('user_id', ['type' => 'text']);
echo $this->Form->control('title', ['type' => 'text']);
echo $this->Form->control('city', ['type' => 'text']);
echo $this->Form->control('state', ['type' => 'text']);
echo $this->Form->control('zip');
echo $this->Form->control('address1', ['type' => 'text']);
echo $this->Form->control('address2', ['type' => 'text']);
echo $this->Form->control('created');
echo $this->Form->control('modified');
echo $this->Form->button(__('Save location'));
echo $this->Form->end();

?>
