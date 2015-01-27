<div class="carousel carousel-navigation" style="width:<?php echo $width;?>;float:<?php echo $float;?>;">

   	<?php foreach($files as $file): ?>
    	<div>
			<?php
	       	set_current_record('File',$file);
			$item_id = metadata('File', 'item_id');
			$item = get_record_by_id('Item', $item_id);
			set_current_record('Item', $item);?>
			<div class="item-file image-jpeg">
				<a class="download-file" href="<?php echo file_display_url($file,'fullsize');?>">
				<?php echo file_image('thumbnail',array('title'=>''))?>
				</a>
			</div>
		</div>
	<?php endforeach; ?>		
</div>

<div class="carousel carousel-stage" style="width:<?php echo $width;?>;float:<?php echo $float;?>">
	<?php foreach($files as $file): ?>
		<div >
			<?php
	 		set_current_record('File',$file);
			$item_id = metadata('File', 'item_id');
			$item = get_record_by_id('Item', $item_id);
			set_current_record('Item', $item);?>
			<div class="item-file image-jpeg">
				<a class="download-file" href="<?php echo file_display_url($file,'fullsize');?>">
				<?php echo file_image('fullsize',array('max-height'=>'100%','max-width'=>'100%','width'=>'100%','title'=>''));?>
				</a>
				<p class="desc">
				<?php if (metadata('File', array('Dublin Core', 'Title'))):
					echo metadata('File', array('Dublin Core', 'Title')),"<br/>";
				else:
			 		echo html_escape(metadata('Item', array('Dublin Core', 'Title'))),' ';    
				endif;?> 
				</p>
			</div>
 		</div>
	<?php endforeach; ?>
</div>
	
<script type="text/javascript">
	jQuery(document).ready(function(){
	$('.carousel-navigation').slick({
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    asNavFor: '.carousel-stage',
		accessibility:true,
	    dots: false,
	    centerMode: true,
		centerPadding: '20%',
	    focusOnSelect: false,
		swipeToSlide: true,
		variableWidth: true,
		adaptiveHeight: true,
		prevArrow: '<input class="slick-prev" type="image"  style="background-image:url(<?php echo WEB_ROOT;?>/plugins/ShortcodeConnectedCarousel/views/public/images/left_double_arrow.png)"/>',
		nextArrow: '<input class="slick-next" type="image" style="background-image:url(<?php echo WEB_ROOT;?>/plugins/ShortcodeConnectedCarousel/views/public/images/right_double_arrow.png)"/>'
	});
	 $('.carousel-stage').slick({
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    arrows: false,
	    fade: true,
		centerMode: true,
		centerPadding:'20%',
		variableWidth: false,
		adaptiveHeight: true,
	    asNavFor: '.carousel-navigation'
	});
	});
</script>