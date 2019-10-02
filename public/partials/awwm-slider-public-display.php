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
			<?php // echo count($items); ?>
		<?php if($item!=end($items)) {
			$dataModal = 'modal-window-'. $x ; 
		}else{$dataModal = '' ; } ?>
		<div class="inside">
			<b><?php // echo $item->post_title; ?></b>
			<?php if($x==1) { ?>
				
				<?php echo $item->post_content; ?>
			<?php  } elseif($item==end($items)) { ?>
				<div>
				<?php echo do_shortcode('[contact-form-7 id="19" title="Contact form 1"]'); ?>
				</div>
			<?php  } else { ?>
				<?php 
					$post_content_2 = $item->post_content;
					$post_content_2 = str_replace(chr(13), "<br>", $post_content_2);
					echo $post_content_2;
				?>
				<div class="readMore click-to-open" data-modal="<?php echo $dataModal; ?>">
					<input type="button" value="Lees verder >" />
				</div>

			<?php } ?>
		</div>
		<?php if($item!=end($items)) { ?>
		<div class="modal-window modal" id="<?php echo $dataModal; ?>">
    			<div class="modal-overlay modal-toggle"></div>
    			<div class="modal-wrapper modal-transition">
      				<div class="modal-header">
        				<h4 class="modal-heading"><?php echo "&nbsp;"; echo $item->post_title; ?></h4>
        				<button class="modal-close modal-toggle"> X </button>
      				</div>
     
      				<div class="modal-body">
        				<div class="modal-content">
						<?php
        						$popup_content = nl2br( htmlspecialchars_decode(get_post_meta($item->ID, '_cf_slider_age', true)) );
								//$popup_content = str_replace(chr(13), "<br>", $popup_content);
        						echo $popup_content;
    						?>
        				</div>
      				</div>
    			</div>
  		</div>
		<?php } ?>
			<div class="horizon2 scroll run-animation2" style="background-image:url(<?php echo plugin_dir_url( __DIR__ ); ?>images/parallax-layer-3.png)"></div>
			<div class="horizon scroll run-animation" style="background-image:url(<?php echo plugin_dir_url( __DIR__ ); ?>images/parallax-layer-2.png)"></div>
			<div class="middle scroll run-animation" style="background-image:url(<?php echo plugin_dir_url( __DIR__ ); ?>images/parallax-layer-1.png)"></div>

			<div class="nxtPrevBtn">
				<?php $prevBtnLabel = get_post_meta($item->ID, '_cf_slider_prev', true);
				      $nextBtnLabel = get_post_meta($item->ID, '_cf_slider_next', true);
				if(!empty($prevBtnLabel)) { ?>
					<div class="prevBtn">
						<div class="readMore">
							<input type="button" id="previous_button" value="< <?php echo $prevBtnLabel; ?>">
						</div>
					</div>
				<?php } 
				if(!empty($nextBtnLabel)) { ?>
					<div class="nextBtn" id="nextBtn">
						<div class="readMore">
							<input type="button" id="next_button" value="<?php echo $nextBtnLabel; ?> >">
						</div>
					</div>
				<?php } ?>
			</div>

		</div>

	<?php } ?>
		<div id="" class="slideBottom">
			<div class="carImage">
					<img class="carWhite" src="<?php echo plugin_dir_url( __DIR__ ); ?>images/car-white.gif" alt="" />
					<div id="car_and_exhaust" style="width: 500px;">
						<img id="exhaust" src="<?php echo plugin_dir_url( __DIR__ ); ?>images/car-exhaust.gif" alt="" style="display: none; opacity: 0.0; float: left; width: 40%; margin-right: -50px; margin-top: 50px;" />
						<img class="carRed" src="<?php echo plugin_dir_url( __DIR__ ); ?>images/car.png" alt="" style="float: left; width: 50%;" />
					</div>
			</div>
		</div>


			<!--<div class="nxtPrevBtn">
				<div class="prevBtn">
					<div class="readMore">
						<input type="button" id="previous_button" value="< Vorige">
					</div>
				</div>
				<div class="nextBtn" id="nextBtn">
					<div class="readMore">
						<input type="button" id="next_button" value="Start >">
					</div>
				</div>
			</div>-->

	</div>



