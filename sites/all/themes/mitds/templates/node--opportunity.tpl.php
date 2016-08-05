<?php if($view_mode == "full") : ?>  

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
    <div class="col-md-12">                

      <div class="air-card mar-bot50">
        <h2 class="m-0-top">General Requirements</h2>
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
          <div class="col-md-6">
            <p class="m-md-bottom"><strong><h2>Important Dates </h2></strong></p>

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

      <div class="air-card mar-bot50">
        <h2 class="m-0-top">Proposal</h2>
        <?php //print views_embed_view('proposals','block'); ?>
      </div>

    </div>
  </div>

<?php endif; ?>