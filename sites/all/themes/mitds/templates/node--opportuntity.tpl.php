<?php if($view_mode == "full") : ?>  
<div class="row">
    <div class="col-md-4 p-0-right">
        <div class="pull-left">
          <span class="glyphicon air-icon-clock-hourly m-0-left-right"></span>
        </div>
        <div class="pull-left m-sm-left m-md-bottom col-md-10 p-0-left-right">
          <p class="m-0-bottom"><strong>Hourly</strong></p>
            <small class="text-muted">
              Less than 30 hrs/week<br />
              Less than 1 week
            </small>
        </div>
    </div>
    <div class="col-md-3 p-0-right">
      <div class="pull-left">$<?php print($node->field_project_budget['und']['0']['taxonomy_term']->name);?></div>
        <div class="pull-left m-sm-left m-md-bottom freelancer-level">
          <p class="m-0-bottom"><strong>Budget</strong></p>
        </div>
    </div>
    <div class="col-md-3">
      <div class="row m-0">
        <!-- <div class="col-md-1 p-0-left pull-left">
          <span class="glyphicon air-icon-calendar-under1month"></span>
        </div> -->
      <div class="col-md-10 m-md-bottom p-0-right pull-right">
        <p class="m-0-bottom">
          <!-- <span class="glyphicon glyphicon-calendar"></span> -->
          <strong>
            Start Date
          </strong>
        </p>
        <small class="text-muted nowrap"><?php print(date("Md,Y",strtotime($node->field_project_start_date['und']['0']['value'])));?></small>
      </div>
      </div>
    </div>
</div>   
  <div class="col-md-9">                
    <div class="air-card-group">
                    
      <div class="air-card m-0-top m-0-right">

        <h2 class="m-0-top">General Requirements</h2>
        <p class="break" data-ng-non-bindable>
          <?php print render($node->field_general_requirements['und']['0']['value']);?>
        </p>
      
      <ul class="list-unstyled">
        <div id="form">   
          <li><strong class="m-sm-right">Project Type:</strong><?php print($node->field_type_of_project['und']['0']['taxonomy_term']->name);?></li>
          <li><strong class="m-sm-right">Software Technology:</strong><?php print($node->field_software_technology['und']['0']['taxonomy_term']->name);?></li>
          <li><strong class="m-sm-right">Minimum Number Of Employees Bidder:</strong><?php print($node->field_minimum_number_of_employee['und']['0']['value']);?></li>  
         </div>
      </ul>
      </div>
    </div>
    <div class="air-card m-0-right">
      <div class="row">
        <div class="col-md-6">
          <p class="m-md-bottom"><strong><h2>Important Dates </h2></strong></p>
          <p class="m-xs-bottom">
            <span class="text-muted">PRFP Issue Date:</span>
            <?php print(date("Md,Y",strtotime($node->field_rfp_issue_date['und']['0']['value'])));?>                        
          </p>
          <p class="m-xs-bottom">
            <span class="text-muted">Question & Answer Start Date:</span>
            <?php print(date("Md,Y",strtotime($node->field_question_answer_start_date['und']['0']['value'])));?>                        
          </p>
          <p class="m-xs-bottom">
            <span class="text-muted">Question & Answer End Date:</span>
            <?php print(date("Md,Y",strtotime($node->field_question_answer_end_date['und']['0']['value'])));?>                        
          </p>
           <p class="m-xs-bottom">
            <span class="text-muted">Last Date for Receiving Proposals:</span>
            <?php print(date("Md,Y",strtotime($node->field_last_date_for_reveiving_pr['und']['0']['value'])));?>                        
          </p>
          <p class="m-xs-bottom">
            <span class="text-muted">Contract Award Date:</span>
            <?php print(date("Md,Y",strtotime($node->field_contract_award_date['und']['0']['value'])));?>                        
          </p>
          <p class="m-xs-bottom">
            <span class="text-muted">Project End Date:</span>
            <?php print(date("Md,Y",strtotime($node->field_project_end_date['und']['0']['value'])));?>   <?php //print views_embed_view('proposals','block'); ?>                     
          </p>

        </div>
      </div>
    </div>
    <div class="air-card-group">
      <div class="air-card m-0-right">
        <h2 class="m-0-top">Proposal</h2>
         <?php print views_embed_view('proposals','block'); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>