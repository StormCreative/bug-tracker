<div class="wrapper">
	<?php include "assets/includes/header.php"; ?>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Bug Listing <small>Total amount of bugs: <span class="red_text">10</span></small></h2>
			<div class="styled-select">
				<select>
					<option>All</option>
					<?php foreach( Clients_contacts_model::get( $_SESSION[ 'client' ][ 'clients_id' ] ) as $person ) : ?>
						<option value="<?php echo $person[ 'id' ]; ?>"><?php echo $person[ 'title' ]; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
	        <?php if( !!$success_message ) : ?>
	          <p class="success_message"><?php echo $success_message; ?></p>
	        <?php endif; ?>
	          <div class="holder">
	            <div class="tabs">
	              <ul class="tab_list">
	                  <a href="<?php echo DIRECTORY; ?>admin/bugs/listing#pending"><li class="js-tabs pending-tab active-tab" data-action="pending">Pending</li></a>
	                  <a href="<?php echo DIRECTORY; ?>admin/bugs/listing#fixed"><li class="js-tabs fixed-tab" data-action="fixed">Fixed</li></a>
	                  <a href="<?php echo DIRECTORY; ?>admin/bugs/listing#closed"><li class="js-tabs closed-tab" data-action="closed">Reviewed</li></a>
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
	                                    <a href="<?php echo DIRECTORY; ?>admin/bugs/edit/<?php echo $unapproved_item[ 'id' ]; ?>" class="edit_icon icon-edit"></a>
	                                  </td>
	                              </tr>
	                          <?php endforeach; ?>
	                      <?php else : ?>
	                         <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
	                      <?php endif; ?>
	                    </tbody>
	                  </table>

	                  <?php if( !!$pagination[ 'back' ] ) : ?>
	                      <a href="<?php echo $pagination[ 'back' ]; ?>"><</a>
	                  <?php endif; ?>

	                  <?php if( !!$pagination[ 'middle' ] ) : ?>
	                      <?php foreach( $pagination[ 'middle' ] as $middle ) : ?>
	                          <a href="<?php echo $middle[ 'link' ]; ?>"><?php echo $middle[ 'page' ]; ?></a>
	                      <?php endforeach; ?>
	                  <?php endif; ?>

	                  <?php if( !!$pagination[ 'next' ] ) : ?>
	                    <a href="<?php echo $pagination[ 'next' ]; ?>">></a>
	                  <?php endif; ?>


	                  <input type="hidden" name="type" value="pending" />

	                </form>
	              </div>
	              <div class="fixed hide">
	                <form action="#" method="POST">
	                <div class="js-error"></div>
	                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	                            <thead>
	                              <tr>
	                                <th></th>
	                                <th>Name</th>
	                                <th>Location</th>
	                                <th>Current Position</th>
	                                <th>Ref</th>
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

	                          <?php if( !!$approved_pagination[ 'back' ] ) : ?>
	                              <a href="<?php echo $approved_pagination[ 'back' ]; ?>"><</a>
	                          <?php endif; ?>

	                          <?php if( !!$approved_pagination[ 'middle' ] ) : ?>
	                              <?php foreach( $approved_pagination[ 'middle' ] as $middle ) : ?>
	                                  <a href="<?php echo $middle[ 'link' ]; ?>"><?php echo $middle[ 'page' ]; ?></a>
	                              <?php endforeach; ?>
	                          <?php endif; ?>

	                          <?php if( !!$approved_pagination[ 'next' ] ) : ?>
	                            <a href="<?php echo $approved_pagination[ 'next' ]; ?>">></a>
	                          <?php endif; ?>
	                    </form>
	              </div>
	              <div class="closed hide">
	                <form action="#" method="POST">
	                <div class="js-error"></div>
	                          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	                            <thead>
	                              <tr>
	                                <th></th>
	                                <th>Name</th>
	                                <th>Location</th>
	                                <th>Current Position</th>
	                                <th>Ref</th>
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
	          </div>
		</article>
	</section>
</div>