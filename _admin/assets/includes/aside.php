<aside class="sub__content">
	<nav>
		<ul>
			<li><a href="<?php echo DIRECTORY; ?>admin/dashboard"><i class="icon-dashboard"></i> Dashboard</a></li>

			<?php if( $_SESSION[ 'user' ][ 'level' ] == 1 ) : ?>
				<li><a href="<?php echo DIRECTORY; ?>admin/listing/table/clients"><i class="icon-cogs"></i> Client Management</a></li>
				<li><a href="<?php echo DIRECTORY; ?>admin/listing/table/access"><i class="icon-user"></i> User Management</a></li>
			<?php endif; ?>

			<?php foreach( Clients_model::all_clients() as $client ) : ?>
				<li><a href="<?php echo DIRECTORY; ?>admin/bugs/listing/<?php echo $client[ 'id' ]; ?>"><i class="icon-edit"></i> <?php echo $client[ 'title' ]; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>
</aside>
