<section class="main__content">
    <div class="container">
            <h2>Dashboard</h2>
            <h3>Current Projects <a href="<?php echo DIRECTORY; ?>admin/clients/edit" class="add-project-btn"><i class="icon-plus"></i> Add Project</a></h3>
            <ul class="projects">
                  <?php foreach( $all_clients as $client ) : ?>
                  	<a href="<?php echo DIRECTORY; ?>admin/bugs/listing/<?php echo $client[ 'id' ]; ?>">
                  		<li>
                  			<p class="notfication"><?php echo Bugs_model::count_active(); ?></p>
                  			<p class="client"><?php echo $client[ 'title' ]; ?></p> 
                  		</li>
                  	</a>
                  <?php endforeach; ?>
            	<a href="<?php echo DIRECTORY; ?>clients/edit" class="add_project_tab">
            		<li>
      				<p class="notfication"><i class="icon-plus"></i></p>
      				<p class="client">Add Project</p></p>
            		</li>
            	</a>
        </div>
    </div>
</section>
