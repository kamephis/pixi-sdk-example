<?php

class Uielements extends SDKMenu
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function typography()
    {
        // Loading view
        $typography = $this->load->view('demo/typography', null, true);
        
        $this->loadMainView('Typography', 'This is page-header (.page-header > h1)', $typography, null, null);
    }
    
    public function elements()
    {
        // Loading view
        $elements = $this->load->view('demo/elements', null, true);
        
        $this->loadMainView('UI Elements', 'Common UI Features & Elements', $elements, null, null);
    }
    
    public function buttons()
    {
        // Loading view
        $buttons = $this->load->view('demo/buttons', null, true);
        
        $this->loadMainView('Buttons & Icons', 'Common Buttons & Icons', $buttons, null, null);
    }
    
    public function treeview()
    {
        // Loading view
        $treeview = $this->load->view('demo/treeview', null, true);
        
        $htmlBottom = "<!-- inline scripts related to this page -->
            <!-- page specific plugin scripts -->
    		<script src='".base_url()."/assets/pixi/js/fuelux/data/fuelux.tree-sample-demo-data.js'></script>
    		<script src='".base_url()."/assets/pixi/js/fuelux/fuelux.tree.min.js'></script>
            <script type='text/javascript'>
            	$(function($){
            
            $('#tree1').ace_tree({
            	dataSource: treeDataSource ,
            	multiSelect:true,
            	loadingHTML:\"<div class='tree-loading'><i class='ace-icon fa fa-refresh fa-spin blue'></i></div>\",
            	'open-icon' : 'ace-icon tree-minus',
            	'close-icon' : 'ace-icon tree-plus',
            	'selectable' : true,
            	'selected-icon' : 'ace-icon fa fa-check',
            	'unselected-icon' : 'ace-icon fa fa-times'
            });
            
            $('#tree2').ace_tree({
            	dataSource: treeDataSource2 ,
            	loadingHTML:\"<div class='tree-loading'><i class='ace-icon fa fa-refresh fa-spin blue'></i></div>\",
            	'open-icon' : 'ace-icon fa fa-folder-open',
            	'close-icon' : 'ace-icon fa fa-folder',
            	'selectable' : false,
            	'selected-icon' : null,
            	'unselected-icon' : null
            });
            
            });
            </script>";
        
        $this->loadMainView('Buttons & Icons', 'Common Buttons & Icons', $treeview, null, $htmlBottom);
    }
    
    public function jquery_ui()
    {
        // Loading view
        $jqueryUi = $this->load->view('demo/jquery_ui', null, true);
        
        $htmlTop = "<link rel=\"stylesheet\" href='".base_url()."assets/pixi/css/jquery-ui.min.css' />";
        
        $htmlBottom = "<!-- inline scripts related to this page -->
        <!-- page specific plugin scripts -->
        <script src=\"".base_url()."assets/pixi/js/jquery-ui.min.js\"></script>
        <script src=\"".base_url()."assets/pixi/js/jquery.ui.touch-punch.min.js\"></script>
		<script type=\"text/javascript\">
			jQuery(function(\$) {
			
				\$( \"#datepicker\" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,
			
					
					/*
					changeMonth: true,
					changeYear: true,
					
					showButtonPanel: true,
					beforeShow: function() {
						//change button colors
						var datepicker = \$(this).datepicker( \"widget\" );
						setTimeout(function(){
							var buttons = datepicker.find('.ui-datepicker-buttonpane')
							.find('button');
							buttons.eq(0).addClass('btn btn-xs');
							buttons.eq(1).addClass('btn btn-xs btn-success');
							buttons.wrapInner('<span class=\"bigger-110\" />');
						}, 0);
					}
			*/
				});
			
			
				//override dialog's title function to allow for HTML titles
				\$.widget(\"ui.dialog\", \$.extend({}, \$.ui.dialog.prototype, {
					_title: function(title) {
						var \$title = this.options.title || '&nbsp;'
						if( (\"title_html\" in this.options) && this.options.title_html == true )
							title.html(\$title);
						else title.text(\$title);
					}
				}));
			
				\$( \"#id-btn-dialog1\" ).on('click', function(e) {
					e.preventDefault();
			
					var dialog = \$( \"#dialog-message\" ).removeClass('hide').dialog({
						modal: true,
						title: \"<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>\",
						title_html: true,
						buttons: [ 
							{
								text: \"Cancel\",
								\"class\" : \"btn btn-xs\",
								click: function() {
									\$( this ).dialog( \"close\" ); 
								} 
							},
							{
								text: \"OK\",
								\"class\" : \"btn btn-primary btn-xs\",
								click: function() {
									\$( this ).dialog( \"close\" ); 
								} 
							}
						]
					});
			
					/**
					dialog.data( \"uiDialog\" )._title = function(title) {
						title.html( this.options.title );
					};
					**/
				});
			
			
				\$( \"#id-btn-dialog2\" ).on('click', function(e) {
					e.preventDefault();
				
					\$( \"#dialog-confirm\" ).removeClass('hide').dialog({
						resizable: false,
						modal: true,
						title: \"<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>\",
						title_html: true,
						buttons: [
							{
								html: \"<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items\",
								\"class\" : \"btn btn-danger btn-xs\",
								click: function() {
									\$( this ).dialog( \"close\" );
								}
							}
							,
							{
								html: \"<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel\",
								\"class\" : \"btn btn-xs\",
								click: function() {
									\$( this ).dialog( \"close\" );
								}
							}
						]
					});
				});
			
			
				
				//autocomplete
				 var availableTags = [
					\"ActionScript\",
					\"AppleScript\",
					\"Asp\",
					\"BASIC\",
					\"C\",
					\"C++\",
					\"Clojure\",
					\"COBOL\",
					\"ColdFusion\",
					\"Erlang\",
					\"Fortran\",
					\"Groovy\",
					\"Haskell\",
					\"Java\",
					\"JavaScript\",
					\"Lisp\",
					\"Perl\",
					\"PHP\",
					\"Python\",
					\"Ruby\",
					\"Scala\",
					\"Scheme\"
				];
				\$( \"#tags\" ).autocomplete({
					source: availableTags
				});
			
				//custom autocomplete (category selection)
				\$.widget( \"custom.catcomplete\", \$.ui.autocomplete, {
					_renderMenu: function( ul, items ) {
						var that = this,
						currentCategory = \"\";
						\$.each( items, function( index, item ) {
							if ( item.category != currentCategory ) {
								ul.append( \"<li class='ui-autocomplete-category'>\" + item.category + \"</li>\" );
								currentCategory = item.category;
							}
							that._renderItemData( ul, item );
						});
					}
				});
				
				 var data = [
					{ label: \"anders\", category: \"\" },
					{ label: \"andreas\", category: \"\" },
					{ label: \"antal\", category: \"\" },
					{ label: \"annhhx10\", category: \"Products\" },
					{ label: \"annk K12\", category: \"Products\" },
					{ label: \"annttop C13\", category: \"Products\" },
					{ label: \"anders andersson\", category: \"People\" },
					{ label: \"andreas andersson\", category: \"People\" },
					{ label: \"andreas johnson\", category: \"People\" }
				];
				\$( \"#search\" ).catcomplete({
					delay: 0,
					source: data
				});
				
				
				//tooltips
				\$( \"#show-option\" ).tooltip({
					show: {
						effect: \"slideDown\",
						delay: 250
					}
				});
			
				\$( \"#hide-option\" ).tooltip({
					hide: {
						effect: \"explode\",
						delay: 250
					}
				});
			
				\$( \"#open-event\" ).tooltip({
					show: null,
					position: {
						my: \"left top\",
						at: \"left bottom\"
					},
					open: function( event, ui ) {
						ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, \"fast\" );
					}
				});
			
			
				//Menu
				\$( \"#menu\" ).menu();
			
			
				//spinner
				var spinner = \$( \"#spinner\" ).spinner({
					create: function( event, ui ) {
						//add custom classes and icons
						\$(this)
						.next().addClass('btn btn-success').html('<i class=\"ace-icon fa fa-plus\"></i>')
						.next().addClass('btn btn-danger').html('<i class=\"ace-icon fa fa-minus\"></i>')
						
						//larger buttons on touch devices
						if('touchstart' in document.documentElement) 
							\$(this).closest('.ui-spinner').addClass('ui-spinner-touch');
					}
				});
			
				//slider example
				\$( \"#slider\" ).slider({
					range: true,
					min: 0,
					max: 500,
					values: [ 75, 300 ]
				});
			
			
			
				//jquery accordion
				\$( \"#accordion\" ).accordion({
					collapsible: true ,
					heightStyle: \"content\",
					animate: 250,
					header: \".accordion-header\"
				}).sortable({
					axis: \"y\",
					handle: \".accordion-header\",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( \".accordion-header\" ).triggerHandler( \"focusout\" );
					}
				});
				//jquery tabs
				\$( \"#tabs\" ).tabs();
				
				
				//progressbar
				\$( \"#progressbar\" ).progressbar({
					value: 37,
					create: function( event, ui ) {
						\$(this).addClass('progress progress-striped active')
							   .children(0).addClass('progress-bar progress-bar-success');
					}
				});
					
			});
		</script>";
        
        $this->loadMainView('jQuery UI', 'Restyling jQuery UI Widgets and Elements', $jqueryUi, $htmlTop, $htmlBottom);
    }
    
    public function nestable_list()
    {
        // Loading view
        $nesteableList = $this->load->view('demo/nestable-list', null, true);
        
        $this->loadMainView('Nestable lists', 'Drag & drop hierarchical list', $nesteableList, null, null);
    }
}
