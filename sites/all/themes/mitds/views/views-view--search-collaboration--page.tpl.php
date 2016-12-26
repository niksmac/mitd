<?php if ($rows): ?>
<div class="profile"<?php print $attributes; ?>>
 
<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value);exit; ?>
  <div class="listing listing-1 listing-new-style">
    <div class="listing-section">
      <div class="listing-ver-3">
        
        <div class="listing-heading">
          <h5><?php echo $value['title']; ?></h5>          
        </div>

      <div class="listing-inner">
        <div class="listing-content">
          <h6 class="title-company">Type Of Collaboration:<?php echo $value['field_type_of_collaboration']; ?></h6>
          <!-- <span class="location"> <i class="fa fa-map-marker"></i>city,country</span> --> 
          <!-- <span class="type-work full-time"> Full Time </span> -->
          <p><?php echo $value['field_general_requirements']; ?></p>
                  
        </div>
      </div>
      <div class="listing-tabs">
        <ul>          
          <li class="col-md-4"><a href="#">Contract Award Date:<?php echo $value['field_contract_award_date']; ?></a>
          </li>                           
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

  <!-- <div class="row">  
    <div class="col-md-12">
      <?php //if ($exposed): ?>
      <div class="view-filters">
      <?php //print $exposed; ?>
      </div>
      <?php //endif; ?>
    </div>    
  </div> -->

    <div class="col-md-12 air-card mar-bot10">
      <?php print $empty; ?>
    </div>    
  <?php endif; ?>
