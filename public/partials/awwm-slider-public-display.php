<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/abdulwahabpk/
 * @since      1.0.0
 *
 * @package    Awwm_Slider
 * @subpackage Awwm_Slider/public/partials
 */

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="pagepiling">
	<?php 
		$x=0;
		foreach ( $items as $item ) {
			$x++; ?>

	    <div class="section page-<?php echo $x; ?> pageSlide">
		<?php if($item!=end($items)) {
			$dataModal = 'modal-window-'. $x ; 
		}else{$dataModal = '' ; } ?>
		<div class="inside">
			<b><?php echo $item->post_title; ?></b>
			<?php if($x==1) { ?>
				<?php echo $item->post_content; ?>
			<?php  } elseif($item==end($items)) { ?>
				<div>
				<?php echo do_shortcode('[contact-form-7 id="19" title="Contact form 1"]'); ?>
				</div>
			<?php  } else { ?>
				<?php echo $item->post_content; ?>
				<div class="readMore click-to-open" data-modal="<?php echo $dataModal; ?>">
					<input type="button" value="Read More" />
				</div>

			<?php } ?>
		</div>
		<?php if($item!=end($items)) { ?>
		<div class="modal-window modal" id="<?php echo $dataModal; ?>">
    			<div class="modal-overlay modal-toggle"></div>
    			<div class="modal-wrapper modal-transition">
      				<div class="modal-header">
        				<h3 class="modal-heading"><?php echo $item->post_title; ?></h3>
        				<button class="modal-close modal-toggle"> X </button>
      				</div>
     
      				<div class="modal-body">
        				<div class="modal-content">
						<?php
        						$popup_content = get_post_meta($item->ID, '_cf_slider_age', true);
        						echo $popup_content;
    						?>
        				</div>
      				</div>
    			</div>
  		</div>
	<?php } ?>
	<div class="horizon scroll run-animation" style="background-image:url(<?php echo plugin_dir_url( __DIR__ ); ?>images/parallax-layer-2.png)">
     	</div>
    	<div class="middle scroll run-animation" style="background-image:url(<?php echo plugin_dir_url( __DIR__ ); ?>images/parallax-layer-1.png)">
       	</div>


	    </div>

	<?php } ?>
		<div id="" class="slideBottom">
			<div class="carImage">
					<img class="carWhite" src="<?php echo plugin_dir_url( __DIR__ ); ?>images/car-white.gif" alt="" />

					<img class="carRed" src="<?php echo plugin_dir_url( __DIR__ ); ?>images/car.gif" alt="" />

			</div>
		</div>


			<div class="nxtPrevBtn">
				<div class="prevBtn">
					<div class="svg-wrapper">
						<svg height="43" width="150" xmlns="http://www.w3.org/2000/svg">
							<rect id="shape" height="43" width="150" />
        						<div id="text">
          							<span class="spot"></span>
								<?php echo '< Previous'; ?>
        						</div>
      						</svg>
    					</div>
				</div>
				<div class="nextBtn" id="nextBtn">
					<div class="svg-wrapper">
						<svg height="43" width="150" xmlns="http://www.w3.org/2000/svg">
							<rect id="shape" height="43" width="150" />
        						<div id="text">
          							<span class="spot"></span>
								<?php echo 'Start >'; ?>
        						</div>
      						</svg>
    					</div>
				</div>
			</div>

	</div>



