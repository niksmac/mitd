<?php if ($rows): ?>
	
<div class="table-responsive subscription-plan">
    <div class="membership-pricing-table">
        <table>
            <tbody>
            	<tr>
            		<th class="plan-header plan-header-standard head">Feature</th>  
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
                    <td>Bid for Global Tenders</td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>                     
                </tr>
                <tr>
                    <td>Bid for all opportunities</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                    
                </tr>
                <tr>
                    <td>Verified by MITD Analyst” flag</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>
                <tr>
                    <td>High search priority</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                    
                </tr>
                <tr>
                    <td>Email Campaign</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>
                <tr>
                    <td>Featured</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>
                <tr>
                    <td>Promotion</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>
                <tr>
                    <td>New features/innovations</td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>                   
                </tr>                
                <tr>
                    
                    <td class="area">Per Month</td>
                    <td>
                        -
                    </td>
                    <td>
                    	<?php 
                    	$block = module_invoke('paypal_roles', 'block_view', 'basic');
						print render($block['content']);
                    	?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'standard');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'premium');
                        print render($block['content']);
                        ?>
                    </td>                                        
                </tr>
                <tr class="month-3-class">
                    
                    <td class="area">3 Months</td>
                    <td>-</td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'basic3');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'standard3');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'premium3');
                        print render($block['content']);
                        ?>
                    </td> 

                </tr>
                <tr class="month-6-class">
                    
                    <td class="area">6 Months</td>
                    <td>-</td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'basic6');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'standard6');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'premium6');
                        print render($block['content']);
                        ?>
                    </td>
                </tr>
                <tr class="month-12-class">
                    
                    <td class="area">12 Months</td>
                    <td>-</td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'basic12');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'standard12');
                        print render($block['content']);
                        ?>
                    </td>
                    <td>
                        <?php 
                        $block = module_invoke('paypal_roles', 'block_view', 'premium12');
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