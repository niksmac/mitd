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

<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value);exit;
  $user_data = user_load($value['uid']);
  //print_r($user_data->field_preferred_technology);exit;
  //print_r($user_data->field_preferred_technology['und']['0']['tid']);
  //$tid = $user_data->field_preferred_technology['und']['0']['tid'];
  $tid = $user_data->field_preferred_technology;
  //print_r($tid);exit;
 // $taxonomy_term = taxonomy_term_load($tid);
  //dsm($taxonomy_term);
  //print_r($taxonomy_term);exit;
  //exit;
  //print_r($user_data->field_last_name['und']['0']['value']);
  //print_r($user_data->location['country_name']);
  //print_r($user_data['']);

  //exit;?>
  <div class="listing listing-1 listing-new-style">
    <div class="listing-section">
      <div class="listing-ver-3">
        
        <div class="listing-heading">
          <?php
            $name = $user_data->field_first_name['und']['0']['value'].' '.$user_data->field_last_name['und']['0']['value']; 

          ?>
          <h5><a href="<?php echo url("user/".$value['uid'])?>"><?php echo $name; ?></a> | <?php echo $user_data->location['country_name']; ?></h5>            
        </div>

      <div class="listing-inner">
        <div class="listing-content">
          
          <div class="row">
            <div class="col-md-2">
              <?php //echo $user_data->picture; ?> 
            </div>
            <div class="col-md-10 client-description1">
              <?php echo $user_data->field_overview['und']['0']['value']; ?> 
            </div>
          </div>
          <h6 class="title-tags">Technology Required:</h6>
          <ul class="tags list-inline">
          <?php 
            //$tech = explode(",",  $value['field_preferred_technology']);
            //foreach($tid as $key => $val){
              //print_r($val);
              //taxonomy_term_load($tid)
             // exit;

            ?>
            <li>
              <a href="#"><?php echo $taxonomy_term->name; ?></a>
            </li>
            <?php //} ?></ul> 

        </div>
         
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
</div>
</div>
<?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
    <?php print $exposed; ?>
  <?php endif; ?>
