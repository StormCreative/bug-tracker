<div class="wrapper">
	<?php include "assets/includes/header.php"; ?>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Bug Listing <small>Total amount of active bugs: <span class="red_text"><?php echo Bugs_model::count_active( $_SESSION[ 'client' ][ 'clients_id' ] ); ?></span></small></h2>
			<div class="styled-select">
				<form action="#" method="POST">
					<select name="bug_filter" onchange="this.form.submit()">
						<option value="0">All</option>
						<?php foreach( Clients_contacts_model::get( $_SESSION[ 'client' ][ 'clients_id' ] ) as $person ) : ?>
							<option value="<?php echo $person[ 'id' ]; ?>" <?php echo( $_SESSION[ 'bug_filter' ] == $person[ 'id' ] ? 'selected="selected"' : '' ); ?>><?php echo $person[ 'title' ]; ?></option>
						<?php endforeach; ?>
					</select>
				</form>
			</div>
	        <?php if( !!$success_message ) : ?>
	          <p class="success_message"><?php echo $success_message; ?></p>
	        <?php endif; ?>
	          <div class="holder">
	            <div class="tabs">
	              <ul class="tab_list">
	                  <a href="<?php echo DIRECTORY; ?>admin/bugs/listing#pending"><li class="js-tabs pending-tab active-tab" data-action="pending">Pending</li></a>
	                  <a href="<?php echo DIRECTORY; ?>admin/bugs/listing#fixed"><li class="js-tabs fixed-tab" data-action="fixed">Fixed</li></a>
	                  <!--<a href="<?php echo DIRECTORY; ?>admin/bugs/listing#closed"><li class="js-tabs closed-tab" data-action="closed">Reviewed</li></a>-->
	              </ul>
	              <div class="pending">
	                <form action="<?php echo DIRECTORY; ?>admin/bugs/listing" method="POST">
	                <div class="js-error"></div>
	                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	                    <thead>
	                      <tr>
	                        <th>Name</th>
	                        <th>Summary</th>
	                        <th>Severity</th>
	                        <th>Browser</th>
	                        <th>Device</th>
	                        <th><a href="<?php echo DIRECTORY; ?>bugs/edit" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                      </tr>
	                    </thead>
	                    <tbody class="js-sortable js-body">
	                      <?php if( !!Bugs_model::get_bugs( 'open', $_SESSION[ 'client' ]['clients_id'] ) ) : ?>
	                          <?php foreach( Bugs_model::get_bugs( 'open', $_SESSION[ 'client' ]['clients_id'] ) as $bug ) : ?>
	                              <tr>
	                                  <td><?php echo $bug[ '_title' ]; ?></td>
	                                  <td><?php echo $bug[ 'summary' ]; ?></td>
	                                  <td><?php echo $bug[ 'severity' ]; ?></td>
	                                  <td><?php echo $bug[ 'browser' ]; ?></td>
	                                  <td><?php echo $bug[ 'device' ]; ?></td>
	                                  <td>
	                                    <a href="<?php echo DIRECTORY; ?>bugs/edit/<?php echo $bug[ 'id' ]; ?>" class="edit_icon icon-edit"></a>
	                                  </td>
	                              </tr>
	                          <?php endforeach; ?>
	                      <?php else : ?>
	                         <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
	                      <?php endif; ?>
	                    </tbody>
	                  </table>

	                  <input type="hidden" name="type" value="pending" />

	                </form>
	              </div>
	              <div class="fixed hide">
	                <form action="#" method="POST">
	                <div class="js-error"></div>
	                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	                            <thead>
	                              <tr>
	                                <th>Name</th>
			                        <th>Summary</th>
			                        <th>Severity</th>
			                        <th>Browser</th>
			                        <th>Device</th>
	                                <th><a href="<?php echo DIRECTORY; ?>admin/bugs/edit" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                              </tr>
	                            </thead>
	                            <tbody class="js-sortable js-body">

	                                <?php if( !!Bugs_model::get_bugs( 'closed', $_SESSION[ 'client' ]['clients_id'] ) ) : ?>
	                                  <?php foreach( Bugs_model::get_bugs( 'closed', $_SESSION[ 'client' ]['clients_id'] ) as $bug ) : ?>
	                                      <tr>
	                                          <td><?php echo $bug[ '_title' ]; ?></td>
			                                  <td><?php echo $bug[ 'summary' ]; ?></td>
			                                  <td><?php echo $bug[ 'severity' ]; ?></td>
			                                  <td><?php echo $bug[ 'browser' ]; ?></td>
			                                  <td><?php echo $bug[ 'device' ]; ?></td>
	                                          <td>
	                                          </td>
	                                      </tr>
	                                  <?php endforeach; ?>
	                                <?php else : ?>
	                                 <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
	                              <?php endif; ?> 

	                            </tbody>
	                          </table>
	                    </form>
	              </div>
	              <!--
	              <div class="closed hide">
	                <form action="#" method="POST">
	                <div class="js-error"></div>
	                          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	                            <thead>
	                              <tr>
	                                <th>Name</th>
			                        <th>Summary</th>
			                        <th>Severity</th>
			                        <th>Browser</th>
			                        <th>Device</th>
	                                <th><a href="<?php echo DIRECTORY; ?>admin/bugs/edit" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                              </tr>
	                            </thead>
	                            <tbody class="js-sortable js-body">

	                               <?php if( !!Bugs_model::get_bugs( 'flagged', $_SESSION[ 'client' ]['clients_id'] ) ) : ?>
	                                    <?php foreach( Bugs_model::get_bugs( 'flagged', $_SESSION[ 'client' ]['clients_id'] ) as $bug ) : ?>
	                                        <tr>
	                                            <td><?php echo $bug[ '_title' ]; ?></td>
				                                <td><?php echo $bug[ 'summary' ]; ?></td>
				                                <td><?php echo $bug[ 'severity' ]; ?></td>
				                                <td><?php echo $bug[ 'browser' ]; ?></td>
				                                <td><?php echo $bug[ 'device' ]; ?></td>
	                                            <td></td>
	                                        </tr>
	                                    <?php endforeach; ?>
	                               <?php else : ?>
	                                <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
	                              <?php endif; ?> 

	                            </tbody>
	                          </table>
	                      </div>
	                   </form>
	             </div>
	         	-->
	          </div>
		</article>
	</section>
</div>