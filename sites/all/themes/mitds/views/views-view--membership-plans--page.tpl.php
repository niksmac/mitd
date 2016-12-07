<?php if ($rows): ?>
	
<div class="table-responsive subscription-plan">
    <div class="membership-pricing-table">
        <table>
            <tbody>
            	<tr>
            		<th></th>   
                	<?php foreach ($view->style_plugin->rendered_fields as $key => $value) { //print_r($value);exit; ?>                 
                	<th class="plan-header plan-header-standard">
                		<div class="header-plan-inner">
                    <!--<span class="plan-head"> </span>-->
                    		
                   			<div class="pricing-plan-name"><?php print $value['name']; ?></div>
                    		<div class="pricing-plan-price">
                        		<sup>$</sup><?php print $value['amount']; ?><span></span>
                    		</div>
                    		<div class="pricing-plan-period"><?php print $value['length_type']; ?></div>
                		</div>
                	</th>
                	<?php } ?>
                	<!-- <th class="plan-header plan-header-blue">
                		<div class="pricing-plan-name">PREMIUM</div>
                		<div class="pricing-plan-price">
                    		<sup>$</sup>99<span>.99</span>
                		</div>
                		<div class="pricing-plan-period">month</div>
                	</th> -->
                	
                </tr>              
                <tr>
                    <td>Bids/Month</td>
                    <td>10</td>
                    <td>Unlimited</td>                    
                </tr>
                <tr>
                    <td>Email Support</td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                    
                </tr>
                <tr>
                    <td>24*7 Support</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>
                <tr>
                    <td>Full Opportunity Visible</td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                    
                </tr>
                <tr>
                    <td>Campaigns specific to Partner offerings</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>

                <tr>
                    
                    <td></td>
                    <td>
                    	<?php 
                    	$block = module_invoke('paypal_roles', 'block_view', 'premium');
						print render($block['content']);
                    	?>
                    </td>
                    <td>
                    	<?php 
                    	$block = module_invoke('paypal_roles', 'block_view', 'standard');
						print render($block['content']);
                    	?>
                    </td>                      
                </tr>
                
            </tbody>
        </table>
    </div>
    <span><strong>Success Fee:</strong> MakeITDeals charges a 2.5% success fee to Partners/Sellers on all closed transactions that were intiated via the MakeITDeals platform.<br><strong>Note: </strong> No subscription fee for hardware deals. Only success fee for closed transactions.</span>
</div>

<?php endif; ?>