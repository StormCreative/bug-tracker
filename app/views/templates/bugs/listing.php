<div class="wrapper">
	<header class="header">
		<img src="<?php echo DIRECTORY; ?>assets/images/logo.png" class="logo"/>
		<h1>Bug Tracker</h1>
		<a href="#" class="signout"><i class="icon-signout"></i> Log out</a>
	</header>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Bug Listing <small>Total amount of bugs: <span class="red_text">10</span></small></h2>
			<div class="styled-select">
				<select>
					<option>All</option>
					<option>User 1</option>
					<option>User 2</option>
					<option>User 3</option>
				</select>
			</div>
	        <?php if( !!$success_message ) : ?>
	          <p class="success_message"><?php echo $success_message; ?></p>
	        <?php endif; ?>
	          <div class="holder">
	            <div class="tabs">
	              <ul class="tab_list">
	                  <a href="<?php echo DIRECTORY; ?>admin/candidates/listing#pending"><li class="js-tabs pending-tab active-tab" data-action="pending">Pending</li></a>
	                  <a href="<?php echo DIRECTORY; ?>admin/candidates/listing#live"><li class="js-tabs live-tab" data-action="live">Fixed</li></a>
	                  <a href="<?php echo DIRECTORY; ?>admin/candidates/listing#archive"><li class="js-tabs archive-tab" data-action="archive">Reviewed</li></a>
	              </ul>
	              <div class="pending">
	                <form action="<?php echo DIRECTORY; ?>admin/candidates/listing" method="POST">
	                <div class="js-error"></div>
	                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	                    <thead>
	                      <tr>
	                        <th>Name</th>
	                        <th>Location</th>
	                        <th>Current Position</th>
	                        <th>Ref</th>
	                        <th><a href="<?php echo DIRECTORY; ?>admin/candidates/edit" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                      </tr>
	                    </thead>
	                    <tbody class="js-sortable js-body">
	                      <?php if( !!$unapproved ) : ?>
	                          <?php foreach( $unapproved as $unapproved_item ) : ?>
	                              <tr>
	                                  <td><input type="checkbox" name="user_id[]" value="<?php echo $unapproved_item[ 'id' ]; ?>" /></td>
	                                  <td><?php echo $unapproved_item[ 'firstname' ] . ' ' . $unapproved_item[ 'lastname' ]; ?></td>
	                                  <td><?php echo $unapproved_item[ 'county' ]; ?></td>
	                                  <td><?php echo $unapproved_item[ 'current_position' ]; ?></td>
	                                  <td><?php echo $unapproved_item[ 'ref' ]; ?></td>
	                                  <td>
	                                    <a href="<?php echo DIRECTORY; ?>admin/candidates/edit/<?php echo $unapproved_item[ 'id' ]; ?>" class="edit_icon icon-edit"></a>
	                                    <a href="<?php echo DIRECTORY; ?>admin/candidates/approve/<?php echo $unapproved_item[ 'id' ]; ?>" class="edit_icon icon-thumbs-up"></a>
	                                    <a href="<?php echo DIRECTORY; ?>admin/candidates/archive/<?php echo $unapproved_item[ 'id' ]; ?>" class="remove_icon icon-archive"></a>
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
	              <div class="live hide">
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
	                                <th><a href="<?php echo DIRECTORY; ?>admin/candidates/edit" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                              </tr>
	                            </thead>
	                            <tbody class="js-sortable js-body">

	                                <?php if( !!$approved ) : ?>
	                                  <?php foreach( $approved as $approved_item ) : ?>
	                                      <tr>
	                                          <td><input type="checkbox" name="user_id[]" value="<?php echo $approved_item[ 'id' ]; ?>"></td>
	                                          <td><?php echo $approved_item[ 'firstname' ] . ' ' . $approved_item[ 'lastname' ]; ?></td>
	                                          <td><?php echo $approved_item[ 'county' ]; ?></td>
	                                          <td><?php echo $approved_item[ 'current_position' ]; ?></td>
	                                          <td><?php echo $approved_item[ 'ref' ]; ?></td>
	                                          <td>
	                                            <a href="<?php echo DIRECTORY; ?>admin/candidates/edit/<?php echo $approved_item[ 'id' ]; ?>" class="edit_icon icon-edit"></a>
	                                            <a href="<?php echo DIRECTORY; ?>admin/candidates/archive/<?php echo $approved_item[ 'id' ]; ?>" class="remove_icon icon-archive"></a>
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
	              <div class="archive hide">
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
	                                <th><a href="<?php echo DIRECTORY; ?>admin/candidates/edit" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                              </tr>
	                            </thead>
	                            <tbody class="js-sortable js-body">

	                               <?php if( !!$archived ) : ?>
	                                    <?php foreach( $archived as $archived_item ) : ?>
	                                        <tr>
	                                            <td><input type="checkbox" name="user_id[]" value="<?php echo $archived_item[ 'id' ]; ?>"></td>
	                                            <td><?php echo $archived_item[ 'firstname' ] . ' ' . $archived_item[ 'lastname' ]; ?></td>
	                                            <td><?php echo $archived_item[ 'county' ]; ?></td>
	                                            <td><?php echo $archived_item[ 'current_position' ]; ?></td>
	                                            <td><?php echo $archived_item[ 'ref' ]; ?></td>
	                                            <td>
	                                              <a href="<?php echo DIRECTORY; ?>admin/candidates/edit/<?php echo $archived_item[ 'id' ]; ?>" class="edit_icon icon-edit"></a>
	                                              <a href="<?php echo DIRECTORY; ?>admin/candidates/approve/<?php echo $archived_item[ 'id' ]; ?>" class="edit_icon icon-thumbs-up"></a>
	                                              <a href="<?php echo DIRECTORY; ?>admin/candidates/unarchive/<?php echo $archived_item[ 'id' ]; ?>" class="remove_icon icon-archive" ></a>
	                                            </td>
	                                        </tr>
	                                    <?php endforeach; ?>
	                               <?php else : ?>
	                                <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
	                              <?php endif; ?> 

	                            </tbody>
	                          </table>

	                          <?php if( !!$archived_pagination[ 'back' ] ) : ?>
	                              <a href="<?php echo $archived_pagination[ 'back' ]; ?>"><</a>
	                          <?php endif; ?>

	                          <?php if( !!$archived_pagination[ 'middle' ] ) : ?>
	                              <?php foreach( $archived_pagination[ 'middle' ] as $middle ) : ?>
	                                  <a href="<?php echo $middle[ 'link' ]; ?>"><?php echo $middle[ 'page' ]; ?></a>
	                              <?php endforeach; ?>
	                          <?php endif; ?>

	                          <?php if( !!$archived_pagination[ 'next' ] ) : ?>
	                            <a href="<?php echo $archived_pagination[ 'next' ]; ?>">></a>
	                          <?php endif; ?>
	                      </div>
	                   </form>
	             </div>
	          </div>
		</article>
	</section>
</div>