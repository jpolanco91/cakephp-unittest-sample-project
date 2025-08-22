<h1>Add event</h1>
<?php

echo $this->Form->create($event);
echo $this->Form->control('id', ['type' => 'text']);
echo $this->Form->control('user_id', ['type' => 'text']);
echo $this->Form->control('location_id', ['type' => 'text']);
echo $this->Form->control('exp_date');
echo $this->Form->control('title');
echo $this->Form->control('description');
echo $this->Form->control('url');
echo $this->Form->control('created');
echo $this->Form->control('modified');
echo $this->Form->label('Complete?');
echo $this->Form->select('complete', ['yes' => 'Yes', 'no' => 'No']);
echo $this->Form->button(__('Save Event'));
echo $this->Form->end();

?>
