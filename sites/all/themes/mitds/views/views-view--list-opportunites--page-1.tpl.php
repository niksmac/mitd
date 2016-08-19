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

<?php foreach ($view->style_plugin->rendered_fields as $key => $value) {//print_r($value); ?>
  <div class="listing listing-1 listing-new-style">
    <div class="listing-section">
      <div class="listing-ver-3">
        
        <div class="listing-heading">
          <h5><?php echo $value['title']; ?></h5>          
        </div>

      <div class="listing-inner">
        <div class="listing-content">
          <h6 class="title-company"><?php echo $value['field_organization_name']; ?></h6>
          <span class="location"> <i class="fa fa-map-marker"></i><?php echo $value['city'];?> <?php echo $value['country']; ?></span> 
          <!-- <span class="type-work full-time"> Full Time </span> -->
          <p><?php echo $value['field_general_requirements']; ?><a href="<?php echo url("node/".$value['nid']); ?>">read more</a></p>
          <h6 class="title-tags">Software Technology Required:</h6>
          <ul class="tags list-inline">
            <?php 
            $soft_tech = explode(",",  $value['field_software_technology']);
            foreach($soft_tech as $val){

            ?>
            <li>
              <a href="#"><?php echo $val; ?></a>
            </li>
            <?php } ?>            
          </ul>
        </div>
      </div>
      <div class="listing-tabs">
        <ul>
          <?php if(!empty($value['field_contact_email'])){?>
          <li class="col-md-4"><a href="#">
              <i class="fa fa-envelope"></i>   <?php echo $value['field_contact_email']; ?></a>  
          </li><?php } ?>
          <?php if($value['field_contact_phone'] != ''){?>
          <li class="col-md-4"><a href="#"><i class="fa fa-phone"></i>   <?php echo $value['field_contact_phone']; ?></a>
          </li><?php } ?>
          <?php if($value['field_organization_url'] != ''){?>
          <li class="col-md-4"><a href="#"><i class="fa fa-globe"></i>   <?php echo $value['field_organization_url']; ?></a>
          </li><?php } ?>          
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
       