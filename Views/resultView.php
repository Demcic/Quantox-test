<div style="width: 100%">
	<div id="leftDiv" style="width: 50%; display: inline-block;">
		<h2>List of all user types</h2>
		<?php foreach ($result_data_left as $data): ?>
			<p><?php echo $data[0] . "(" . $data[1] . ")" ?></p>
		<?php endforeach ?>
	</div>
	<div id="rightDiv" style="width: 50%; float: right; display: inline-block;">
		<h2>List of all users</h2>
		<?php foreach ($result_data_right as $data): ?>
			<p><?php echo $data ?></p>
		<?php endforeach ?>
	</div>
</div>