<?php if($view_mode == "full") :  ?>  
<?php global $user;?>
<?php //print_r($node);exit;?>
  <div class="row">
    <div class="mar-bot50">
      <div class="col-md-6">
        <?php print render($content['field_project_budget']); ?>
      </div>
      <div class="col-md-6">
        <?php print render($content['field_project_start_date']); ?>
      </div> 
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">                

      <div class="air-card mar-bot50">
        <h3 class="m-0-top sub-title">General Requirements</h3>
        <p class="break" data-ng-non-bindable>
          <?php print render($node->field_general_requirements['und']['0']['value']);?>
        </p>

        <ul class="list-group"> 
          <li class="list-group-item"><?php print render($content['field_type_of_project']); ?></li>
          <li class="list-group-item"><?php print render($content['field_software_technology']); ?></li>
          <li class="list-group-item"><?php print render($content['field_minimum_number_of_employee']); ?></li>  
        </ul>
      </div>


      <div class="air-card mar-bot50">
        <div class="row">
          <div class="col-md-12">
            <p class="m-md-bottom"><strong><h3 class="sub-title">Important Dates </h3></strong></p>

            <ul class="list-group"> 
              <li class="list-group-item"><?php print render($content['field_rfp_issue_date']); ?></li>
              <li class="list-group-item"><?php print render($content['field_question_answer_start_date']); ?></li>
              <li class="list-group-item"><?php print render($content['field_question_answer_end_date']); ?></li>
              <li class="list-group-item"><?php print render($content['field_last_date_for_reveiving_pr']); ?></li>
              <li class="list-group-item"><?php print render($content['field_contract_award_date']); ?></li>
              <li class="list-group-item"><?php print render($content['field_project_end_date']); ?></li>    
            </ul>

          </div>
        </div>
      </div>
        <?php if($user->uid != $node->uid) { ?>
        <?php print views_embed_view('proposals','block'); ?>
        <?php } ?>
        <?php if($user->uid == $node->uid) { ?>
        <?php //print views_embed_view('proposals','block'); ?>
          <?php print views_embed_view('proposals','block_2'); ?>
          <?php print views_embed_view('proposals','block_4'); ?>
        <?php } ?>

    </div>
    <div class="col-md-4 profile-company-content">
      <div class="sidebar">
      <?php if($user->uid == $node->uid) { ?>
      <?php print views_embed_view('proposals','block_3'); ?>
      <?php } else { ?>
      <?php print views_embed_view('list_opportunites','block_1'); ?>
      <?php } ?>
    </div>

    <?php print light_misc_opp_action($node); ?>
  

    </div>        
  </div>
<?php endif; ?>