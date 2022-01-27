<?php

class Forms extends SDKMenu
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function form_elements()
    {
        // Loading view
        $formElements = $this->load->view('demo/form-elements', null, true);
        
        $htmlTop = "<!-- page specific plugin styles -->
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/jquery-ui.custom.min.css' />
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/chosen.css' />
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/datepicker.css' />
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/bootstrap-timepicker.css' />
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/daterangepicker.css' />
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/bootstrap-datetimepicker.css' />
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/colorpicker.css' />";
        
        $htmlBottom = "<!-- page specific plugin scripts -->
		<!--[if lte IE 8]>
		  <script src='".base_url()."assets/pixi/js/excanvas.min.js'></script>
		<![endif]-->
		<script src='".base_url()."assets/pixi/js/jquery-ui.custom.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.ui.touch-punch.min.js'></script>
		<script src='".base_url()."assets/pixi/js/chosen.jquery.min.js'></script>
		<script src='".base_url()."assets/pixi/js/fuelux/fuelux.spinner.min.js'></script>
		<script src='".base_url()."assets/pixi/js/date-time/bootstrap-datepicker.min.js'></script>
		<script src='".base_url()."assets/pixi/js/date-time/bootstrap-timepicker.min.js'></script>
		<script src='".base_url()."assets/pixi/js/date-time/moment.min.js'></script>
		<script src='".base_url()."assets/pixi/js/date-time/daterangepicker.min.js'></script>
		<script src='".base_url()."assets/pixi/js/date-time/bootstrap-datetimepicker.min.js'></script>
		<script src='".base_url()."assets/pixi/js/bootstrap-colorpicker.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.knob.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.autosize.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.inputlimiter.1.3.1.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.maskedinput.min.js'></script>
		<script src='".base_url()."assets/pixi/js/bootstrap-tag.min.js'></script>
        
        <!-- inline scripts related to this page -->
		<script type=\"text/javascript\">
			jQuery(function(\$) {
				\$('#id-disable-check').on('click', function() {
					var inp = \$('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value=\"This text field is readonly!\";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value=\"This text field is disabled!\";
					}
				});
			
			
				\$('.chosen-select').chosen({allow_single_deselect:true}); 
				//resize the chosen on window resize
				\$(window).on('resize.chosen', function() {
					var w = \$('.chosen-select').parent().width();
					\$('.chosen-select').next().css({'width':w});
				}).trigger('resize.chosen');
			
				\$('#chosen-multiple-style').on('click', function(e){
					var target = \$(e.target).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) \$('#form-field-select-4').addClass('tag-input-style');
					 else \$('#form-field-select-4').removeClass('tag-input-style');
				});
			
			
				\$('[data-rel=tooltip]').tooltip({container:'body'});
				\$('[data-rel=popover]').popover({container:'body'});
				
				\$('textarea[class*=autosize]').autosize({append: \"\\n\"});
				\$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				\$.mask.definitions['~']='[+-]';
				\$('.input-mask-date').mask('99/99/9999');
				\$('.input-mask-phone').mask('(999) 999-9999');
				\$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				\$(\".input-mask-product\").mask(\"a*-999-a999\",{placeholder:\" \",completed:function(){alert(\"You typed the following: \"+this.val());}});
			
			
			
				\$( \"#input-size-slider\" ).css('width','200px').slider({
					value:1,
					range: \"min\",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						\$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
			
				\$( \"#input-span-slider\" ).slider({
					value:1,
					range: \"min\",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						\$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//\"jQuery UI Slider\"
				//range slider tooltip example
				\$( \"#slider-range\" ).css('height','200px').slider({
					orientation: \"vertical\",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[\$(ui.handle).index()-1] + \"\";
			
						if( !ui.handle.firstChild ) {
							\$(\"<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>\")
							.prependTo(ui.handle);
						}
						\$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('a').on('blur', function(){
					\$(this.firstChild).hide();
				});
				
				
				\$( \"#slider-range-max\" ).slider({
					range: \"max\",
					min: 1,
					max: 10,
					value: 2
				});
				
				\$( \"#slider-eq > span\" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( \$( this ).text(), 10 );
					\$( this ).empty().slider({
						value: value,
						range: \"min\",
						animate: true
						
					});
				});
				
				\$(\"#slider-eq > span.ui-slider-purple\").slider('disable');//disable third item
			
				
				\$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//\$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				\$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log(\$(this).data('ace_input_files'));
					//console.log(\$(this).data('ace_input_method'));
				});
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				\$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = \"Drop images here or click to choose\";
						no_icon = \"ace-icon fa fa-picture-o\";
			
						whitelist_ext = [\"jpeg\", \"jpg\", \"png\", \"gif\" , \"bmp\"];
						whitelist_mime = [\"image/jpg\", \"image/jpeg\", \"image/png\", \"image/gif\", \"image/bmp\"];
					}
					else {
						btn_choose = \"Drop files here or click to choose\";
						no_icon = \"ace-icon fa fa-cloud-upload\";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = \$('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
				
				});
			
				\$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.on('change', function(){
					//alert(this.value)
				});
				\$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up', icon_down:'ace-icon fa fa-caret-down'});
				\$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus smaller-75', icon_down:'ace-icon fa fa-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				//\$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//\$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//\$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				\$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					\$(this).prev().focus();
				});
			
				//or change it into a date range picker
				\$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the \"examples/daterange-fr.js\" contents here before initialization
				\$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					\$(this).next().focus();
				});
			
			
				\$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					\$(this).prev().focus();
				});
				
				\$('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
					\$(this).prev().focus();
				});
				
			
				\$('#colorpicker1').colorpicker();
			
				\$('#simple-colorpicker-1').ace_colorpicker();
				//\$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//\$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = \$('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				\$(\".knob\").knob();
				
				
				var tag_input = \$('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match \"query\"
						source: function(query, process) {
						  \$.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					);
			
					//programmatically add a new
					var \$tag_obj = \$('#form-field-tags').data('tag');
					\$tag_obj.add('Programmatically Added');
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id=\"'+tag_input.attr('id')+'\" name=\"'+tag_input.attr('name')+'\" rows=\"3\">'+tag_input.val()+'</textarea>').remove();
					//\$('#form-field-tags').autosize({append: \"\\n\"});
				}
				
				
				
			
				/////////
				\$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				\$('#modal-form').on('shown.bs.modal', function () {
					\$(this).find('.chosen-container').each(function(){
						\$(this).find('a:first-child').css('width' , '210px');
						\$(this).find('.chosen-drop').css('width' , '210px');
						\$(this).find('.chosen-search input').css('width' , '200px');
					});
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				\$('#modal-form').on('shown', function () {
					\$(this).find('.modal-chosen').chosen();
				})
				*/
			
			});
		</script>";
        
        $this->loadMainView('Form Elements', 'Common form elements and layouts', $formElements, $htmlTop, $htmlBottom);
    }
    
    public function form_wizard()
    {
        // Loading view
        $formWizard = $this->load->view('demo/form-wizard', null, true);
        
        $htmlTop = "<!-- page specific plugin styles -->
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/select2.css' />";
        
        $htmlBottom = "<!-- page specific plugin scripts -->
		<script src='".base_url()."assets/pixi/js/fuelux/fuelux.wizard.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.validate.min.js'></script>
		<script src='".base_url()."assets/pixi/js/additional-methods.min.js'></script>
		<script src='".base_url()."assets/pixi/js/bootbox.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.maskedinput.min.js'></script>
		<script src='".base_url()."assets/pixi/js/select2.min.js'></script>
        
        <!-- inline scripts related to this page -->
		<script type=\"text/javascript\">
			jQuery(function(\$) {
			
				\$('[data-rel=tooltip]').tooltip();
			
				\$(\".select2\").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					\$(this).closest('form').validate().element(\$(this));
				}); 
			
			
				var \$validation = false;
				\$('#fuelux-wizard')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step \"2\" at first
				})
				.on('change' , function(e, info){
					if(info.step == 1 && \$validation) {
						if(!\$('#validation-form').valid()) return false;
					}
				})
				.on('finished', function(e) {
					bootbox.dialog({
						message: \"Thank you! Your information was successfully saved!\", 
						buttons: {
							\"success\" : {
								\"label\" : \"OK\",
								\"className\" : \"btn-sm btn-primary\"
							}
						}
					});
				}).on('stepclick', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});
			
			
				//jump to a step
				\$('#step-jump').on('click', function() {
					var wizard = \$('#fuelux-wizard').data('wizard')
					wizard.currentStep = 3;
					wizard.setState();
				})
				//determine selected step
				//wizard.selectedItem().step
			
			
			
				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				\$('#skip-validation').removeAttr('checked').on('click', function(){
					\$validation = this.checked;
					if(this.checked) {
						\$('#sample-form').hide();
						\$('#validation-form').removeClass('hide');
					}
					else {
						\$('#validation-form').addClass('hide');
						\$('#sample-form').show();
					}
				})
			
			
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				\$.mask.definitions['~']='[+-]';
				\$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod(\"phone\", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?\$/.test(value);
				}, \"Enter a valid phone number.\");
			
				\$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: \"#password\"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						date: {
							required: true,
							date: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: 'required',
						agree: 'required'
					},
			
					messages: {
						email: {
							required: \"Please provide a valid email.\",
							email: \"Please provide a valid email.\"
						},
						password: {
							required: \"Please specify a password.\",
							minlength: \"Please specify a secure password.\"
						},
						subscription: \"Please choose at least one option\",
						gender: \"Please choose gender\",
						agree: \"Please accept our policy\"
					},
			
			
					highlight: function (e) {
						\$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						\$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						\$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is(':checkbox') || element.is(':radio')) {
							var controls = element.closest('div[class*=\"col-\"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*=\"select2-container\"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*=\"chosen-container\"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				
				
				
				\$('#modal-wizard .modal-header').ace_wizard();
				\$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
				/**
				\$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					\$(this).closest('form').validate().element(\$(this));
				});
				
				\$('#mychosen').chosen().on('change', function(ev) {
					\$(this).closest('form').validate().element(\$(this));
				});
				*/
			})
		</script>
        ";
        
        $this->loadMainView('Form Wizard', 'and Validation', $formWizard, $htmlTop, $htmlBottom);
    }
    
    public function wysiwyg()
    {
        // Loading view
        $wysiwyg = $this->load->view('demo/wysiwyg', null, true);
        
        $htmlTop = "<!-- page specific plugin styles -->
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/jquery-ui.custom.min.css' />";
        
        $htmlBottom = "<!-- page specific plugin scripts -->
		<script src='".base_url()."assets/pixi/js/jquery-ui.custom.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.ui.touch-punch.min.js'></script>
		<script src='".base_url()."assets/pixi/js/markdown/markdown.min.js'></script>
		<script src='".base_url()."assets/pixi/js/markdown/bootstrap-markdown.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.hotkeys.min.js'></script>
		<script src='".base_url()."assets/pixi/js/bootstrap-wysiwyg.min.js'></script>
		<script src='".base_url()."assets/pixi/js/bootbox.min.js'></script>
        
        <!-- inline scripts related to this page -->
		<script type=\"text/javascript\">
			jQuery(function(\$){
	
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = \"Unsupported format \" +detail; }
		else {
			//console.log(\"error uploading file\", reason, detail);
		}
		\$('<div class=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}

	//\$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

	//but we want to change a few buttons colors for the third style
	\$('#editor1').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');

	
	/**
	//make the editor have all the available height
	\$(window).on('resize.editor', function() {
		var offset = \$('#editor1').parent().offset();
		var winHeight =  \$(this).height();
		
		\$('#editor1').css({'height':winHeight - offset.top - 10, 'max-height': 'none'});
	}).triggerHandler('resize.editor');
	*/
	

	\$('#editor2').css({'height':'200px'}).ace_wysiwyg({
		toolbar_place: function(toolbar) {
			return \$(this).closest('.widget-box')
			       .find('.widget-header').prepend(toolbar)
				   .find('.wysiwyg-toolbar').addClass('inline');
		},
		toolbar:
		[
			'bold',
			{name:'italic' , title:'Change Title!', icon: 'ace-icon fa fa-leaf'},
			'strikethrough',
			null,
			'insertunorderedlist',
			'insertorderedlist',
			null,
			'justifyleft',
			'justifycenter',
			'justifyright'
		],
		speech_button: false
	});
	
	


	\$('[data-toggle=\"buttons\"] .btn').on('click', function(e){
		var target = \$(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = \$('#editor1').prev().get(0);
		if(which >= 1 && which <= 4) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) \$(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) \$(toolbar).addClass('wysiwyg-style2');
			if(which == 4) {
				\$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
			} else \$(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
		}
	});


	

	//RESIZE IMAGE
	
	//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( \"destroy\" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			\$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = \$(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {
							//disable previous resizable image
							lastResizableImg.resizable( \"destroy\" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }

		enableImageResize();

		/**
		//or we can load the jQuery UI dynamically only if needed
		if (typeof jQuery.ui !== 'undefined') enableImageResize();
		else {//load jQuery UI if not loaded
			\$.getScript(\$path_assets+\"/js/jquery-ui.custom.min.js\", function(data, textStatus, jqxhr) {
				enableImageResize()
			});
		}
		*/
	}


});
		</script>";
        
        $this->loadMainView('Wysiwyg & Markdown Editor', null, $wysiwyg, $htmlTop, $htmlBottom);
    }
    
}
