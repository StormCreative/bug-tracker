<section class="main__content">
    <div class="container">
      <div class="page_title">
          <p class="page_name"><span class="js-title"><?php echo $client_info[ 'title' ]; ?> Listing</span></p>
          <a href="#" class="js-filter">Filter</a>
          <a href="<?php echo DIRECTORY; ?>admin/candidates/listing?reset=true" class="reset">Reset</a>
      </div>
      <div class="filter">
          <form action="#" method="POST">
            <input type="hidden" name="tab_value" class="js-tab-value" value="" />
            <dl class="filter_options">
                <dt>Name: </dt>
                <dd><input type="text" name="filter[firstname]" class="js-search-boxes" value="<?php echo $_SESSION[ 'candidate_filter' ][ 'options' ][ 'firstname' ]; ?>" /></dd>
                <dd><input type="text" name="filter[id]" class="js-search-boxes" value="<?php echo $_SESSION[ 'candidate_filter' ][ 'options' ][ 'id' ]; ?>" /></dd>
            </dl>
            <input type="submit" name="filter[submit]" class="search-button js-search" value="search">
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
                  <a href="<?php echo DIRECTORY; ?>admin/bugs/listing#closed"><li class="js-tabs closed-tab" data-action="closed">Closed</li></a>
              </ul>
              <div class="pending">
                <form action="<?php echo DIRECTORY; ?>admin/bugs/listing" method="POST">
                <div class="js-error"></div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Summary</th>
                        <th>Assigned to</th>
                        <th><a href="<?php echo DIRECTORY; ?>admin/bugs/edit/?client_id=<?php echo $client_info['id']; ?>" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
                      </tr>
                    </thead>
                    <tbody class="js-sortable js-body">
                      <?php if( !!$pending_bugs ) : ?>
                          <?php foreach( $pending_bugs as $bug ) : ?>
                              <tr>
                                  <td><input type="checkbox" name="user_id[]" value="<?php echo $bug[ 'id' ]; ?>" /></td>
                                  <td><?php echo $bug[ '_title' ]; ?></td>
                                  <td><?php echo $bug[ 'summary' ]; ?></td>
                                  <td><?php echo $bug[ 'assigned' ]; ?></td>
                                  <td>
                                    <a href="<?php echo DIRECTORY; ?>admin/bugs/edit/<?php echo $bug[ 'id' ]; ?>/?client_id=<?php echo $id; ?>" class="edit_icon icon-edit"></a>
                                    <a href="<?php echo DIRECTORY; ?>admin/bugs/approve/<?php echo $bug[ 'id' ]; ?>" class="edit_icon icon-thumbs-up"></a>
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
                                <th></th>
                                <th>Name</th>
                                <th>Summary</th>
                                <th>Assigned to</th>
                                <th><a href="<?php echo DIRECTORY; ?>admin/bugs/edit/?client_id=<?php echo $client_info['id']; ?>" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
                              </tr>
                            </thead>
                            <tbody class="js-sortable js-body">

                                <?php if( !!$fixed_bugs ) : ?>
                                  <?php foreach( $fixed_bugs as $bug ) : ?>
                                      <tr>
                                          <td><input type="checkbox" name="user_id[]" value="<?php echo $bug[ 'id' ]; ?>"></td>
                                          <td><?php echo $bug[ '_title' ]; ?></td>
                                          <td><?php echo $bug[ 'summary' ]; ?></td>
                                          <td><?php echo $bug[ 'assigned' ]; ?></td>
                                          <td>
                                            <a href="<?php echo DIRECTORY; ?>admin/bugs/edit/<?php echo $bug[ 'id' ]; ?>" class="edit_icon icon-edit"></a>
                                            <a href="<?php echo DIRECTORY; ?>admin/bugs/archive/<?php echo $bug[ 'id' ]; ?>" class="remove_icon icon-archive"></a>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                                <?php else : ?>
                                 <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
                              <?php endif; ?> 

                            </tbody>
                          </table>

                          <input type="hidden" name="type" value="live" />
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
                                <th>Summary</th>
                                <th>Assigned to</th>
                                <th><a href="<?php echo DIRECTORY; ?>admin/bugs/edit/?client_id=<?php echo $client_info['id']; ?>" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
                              </tr>
                            </thead>
                            <tbody class="js-sortable js-body">

                               <?php if( !!$closed_bugs ) : ?>
                                    <?php foreach( $closed_bugs as $bug ) : ?>
                                        <tr>
                                            <td><input type="checkbox" name="user_id[]" value="<?php echo $bug[ 'id' ]; ?>"></td>
                                            <td><?php echo $bug[ '_title' ]; ?></td>
                                            <td><?php echo $bug[ 'summary' ]; ?></td>
                                            <td><?php echo $bug[ 'assigned' ]; ?></td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; ?>
                               <?php else : ?>
                                <tr><td colspan="5" class="no_results">No results matched your criteria</td></tr>
                              <?php endif; ?> 

                            </tbody>
                          </table>

                          <input type="hidden" name="type" value="archive" />
                      </div>
                   </form>
             </div>
          </div>
    </div>
</section>
<script>
    var search_type = '<?php echo( $search_type ); ?>';
</script>
