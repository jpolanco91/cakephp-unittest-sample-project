<h1>Edit user</h1>
<?php

echo $this->Form->create($user);
echo $this->Form->control('id', ['type' => 'text']);
echo $this->Form->control('email', ['type' => 'text']);
echo $this->Form->control('pass', ['type' => 'text']);
echo $this->Form->control('enabled', ['yes' => 'Yes', 'no' => 'No']);
echo $this->Form->control('activated', ['yes' => 'Yes', 'no' => 'No']);
echo $this->Form->control('ac_code', ['type' => 'text']);
echo $this->Form->control('role', ['admin' => 'Admin', 'user' => 'User']);
echo $this->Form->control('created');
echo $this->Form->control('modified');
echo $this->Form->button(__('Save user'));
echo $this->Form->end();

?>
