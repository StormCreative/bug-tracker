<aside class="sub__content">
	<nav>
		<ul>
			<li>Menu</li>
			<li><a href="<?php echo DIRECTORY; ?>admin/listing/table/clients">Client Management</a></li>

			<?php if( $_SESSION[ 'user' ][ 'level' ] == 1 ) : ?>
				<li><a href="<?php echo DIRECTORY; ?>admin/listing/table/access">User Management</a></li>
			<?php endif; ?>
			
			<?php foreach( Clients_model::all_clients() as $client ) : ?>
				<li><a href="<?php echo DIRECTORY; ?>admin/bugs/listing/<?php echo $client[ 'id' ]; ?>"><?php echo $client[ 'title' ]; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>
</aside>
