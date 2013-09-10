<aside class="sub__content">
	<nav>
		<ul>
			<li>Menu</li>
			<li><a href="<?php echo DIRECTORY; ?>admin/listing/table/clients">Client Management</a></li>
			<?php foreach( Clients_model::all_clients() as $client ) : ?>
				<li><a href="<?php echo DIRECTORY; ?>admin/clients/listing/<?php echo $client[ 'id' ]; ?>"><?php echo $client[ 'title' ]; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>
</aside>
