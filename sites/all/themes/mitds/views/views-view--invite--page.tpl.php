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

<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value);exit;?>
  <div class="listing listing-1 listing-new-style">
    <div class="listing-section">
      <div class="listing-ver-3">
        
        <div class="listing-heading">
          <?php
            $name = $value['field_first_name'].' '.$value['field_last_name']; 

          ?>
          <h5><a href="<?php echo url("user/".$value['uid'])?>"><?php echo $name; ?></a> | <?php echo $value['country']; ?></h5>            
        </div>

      <div class="listing-inner">
        <div class="listing-content">
          
          <div class="row">
            <div class="col-md-2">
              <?php echo $value['picture']; ?> 
            </div>
            <div class="col-md-10 client-description1">
              <?php echo $value['field_overview']; ?> 
            </div>
          </div>
          <h6 class="title-tags">Technology Required:</h6>
          <ul class="tags list-inline">
          <?php 
            $tech = explode(",",  $value['field_preferred_technology']);
            foreach($tech as $val){

            ?>
            <li>
              <?php echo $val; ?>
            </li>
            <?php } ?></ul> 

        </div>
         <a href="<?php echo url("invite/".arg(1)."/".$value['uid'],array('query' => array('destination' => $_GET['q'])))?>" class="btn btn-primary btn-block invite-button">Invite</a>
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