<?php

class Widgets extends SDKMenu
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        // Loading view
        $widgets = $this->load->view('demo/widgets', null, true);
        
        $htmlBottom = "<!-- page specific plugin scripts -->
		<script src='".base_url()."assets/pixi/js/jquery-ui.custom.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.ui.touch-punch.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.slimscroll.min.js'></script>
        
        <!-- inline scripts related to this page -->
		<script type=\"text/javascript\">
			jQuery(function(\$) {
			
				\$('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
					var color_class = \$(this).find('option:selected').data('class');
					var new_class = 'widget-box';
					if(color_class != 'default')  new_class += ' widget-color-'+color_class;
					\$(this).closest('.widget-box').attr('class', new_class);
				});
			
			
				// scrollables
				\$('.scrollable').each(function () {
					var \$this = \$(this);
					\$(this).ace_scroll({
						size: \$this.data('height') || 100,
						//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
					});
				});
				\$('.scrollable-horizontal').each(function () {
					var \$this = \$(this);
					\$(this).ace_scroll(
					  {
						horizontal: true,
						styleClass: 'scroll-top',//show the scrollbars on top(default is bottom)
						size: \$this.data('width') || 500,
						mouseWheelLock: true
					  }
					).css({'padding-top': 12});
				});
				
				\$(window).on('resize.scroll_reset', function() {
					\$('.scrollable-horizontal').ace_scroll('reset');
				});
			
			
				/**
				//or use slimScroll plugin
				\$('.slim-scrollable').each(function () {
					var \$this = \$(this);
					\$this.slimScroll({
						height: \$this.data('height') || 100,
						railVisible:true
					});
				});
				*/
				
			
				/**\$('.widget-box').on('setting.ace.widget' , function(e) {
					e.preventDefault();
				});*/
			
				/**
				\$('.widget-box').on('show.ace.widget', function(e) {
					//e.preventDefault();
					//this = the widget-box
				});
				\$('.widget-box').on('reload.ace.widget', function(e) {
					//this = the widget-box
				});
				*/
			
				//\$('#my-widget-box').widget_box('hide');
			
				
			
				// widget boxes
				// widget box drag & drop example
			    \$('.widget-container-col').sortable({
			        connectWith: '.widget-container-col',
					items:'> .widget-box',
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'widget-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					start: function(event, ui){
						//when an element is moved, it's parent becomes empty with almost zero height.
						//we set a min-height for it to be large enough so that later we can easily drop elements back onto it
						ui.item.parent().css({'min-height':ui.item.height()})
						//ui.sender.css({'min-height':ui.item.height() , 'background-color' : '#F5F5F5'})
					},
					update: function(event, ui) {
						ui.item.parent({'min-height':''})
						//p.style.removeProperty('background-color');
					}
			    });
			
			});
		</script>";
        
        $this->loadMainView('Widgets', 'Draggable Widget Boxes & Containers', $widgets, null, $htmlBottom);
    }
}
