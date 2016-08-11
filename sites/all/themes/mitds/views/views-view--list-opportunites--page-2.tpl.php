<?php if ($rows): ?>
<div class="profile"<?php print $attributes; ?>>
  <div class="row">  
    <div class="col-md-12">
      <?php if ($exposed): ?>
      <div class="view-filters">
      <?php print $exposed; ?>
      </div>
      <?php endif; ?>
    </div>    
  </div>  

<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value);exit; ?>
  <div class="listing listing-1 listing-new-style">
    <div class="listing-section">
      <div class="listing-ver-3">
        
        <div class="listing-heading">
          <h5><?php echo $value['title']; ?></h5>          
        </div>

      <div class="listing-inner">
        <div class="listing-content">
          <h6 class="title-company"><?php echo $value['field_organization_name']; ?></h6>
          <!-- <span class="location"> <i class="fa fa-map-marker"></i>city,country</span> --> 
          <!-- <span class="type-work full-time"> Full Time </span> -->
          <p><?php echo $value['field_general_requirements']; ?></p>
                  
        </div>
      </div>
      <div class="listing-tabs">
        <ul>
          <li class="col-md-4"><a href="#">
            <?php echo $value['field_project_budget']; ?></a>  
          </li>
          <li class="col-md-4"><a href="#"><?php echo $value['field_project_end_date']; ?></a>
          </li>
          <?php 
            global $user;
            //print_r($user->uid);
            $proposal_data = mitd_nid($user->uid, $value['nid']);
            if($proposal_data){     
          ?>
          <li class="col-md-4"><a href="<?php echo url("node/".$value['nid']); ?>"></i>View Proposal</a><?php }
          else{?>
          </li>
          <li class="col-md-4"><a href="/makeitdeals/?q=node/add/proposals"></i>Submit Proposal</a>
          <?php } ?>          
        </ul>
      </div>
     
      </div>
    </div>
  </div>
    <?php } ?>
    <?php if ($pager): ?>
    <?php print $pager; ?>
    <?php endif; ?>
</div>
</div> 
<?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>
