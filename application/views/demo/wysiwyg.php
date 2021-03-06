<!-- PAGE CONTENT BEGINS -->
<h4 class="header green clearfix">
	Bootstrap Lightweight Editor
	<span class="block pull-right">
		<small class="grey middle">Choose style: &nbsp;</small>

		<span class="btn-toolbar inline middle no-margin">
			<span data-toggle="buttons" class="btn-group no-margin">
				<label class="btn btn-sm btn-yellow">
					1
					<input type="radio" value="1" />
				</label>

				<label class="btn btn-sm btn-yellow active">
					2
					<input type="radio" value="2" />
				</label>

				<label class="btn btn-sm btn-yellow">
					3
					<input type="radio" value="3" />
				</label>

				<label class="btn btn-sm btn-yellow">
					4
					<input type="radio" value="4" />
				</label>
			</span>
		</span>
	</span>
</h4>

<div class="wysiwyg-editor" id="editor1"></div>

<div class="hr hr-double dotted"></div>

<div class="row">
	<div class="col-sm-6">
		<h4 class="header blue">Inside Widget</h4>

		<div class="widget-box widget-color-green">
			<div class="widget-header widget-header-small">
				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<div class="wysiwyg-editor" id="editor2"></div>
				</div>

				<div class="widget-toolbox padding-4 clearfix">
					<div class="btn-group pull-left">
						<button class="btn btn-sm btn-default btn-white btn-round">
							<i class="ace-icon fa fa-times bigger-125"></i>
							Cancel
						</button>
					</div>

					<div class="btn-group pull-right">
						<button class="btn btn-sm btn-danger btn-white btn-round">
							<i class="ace-icon fa fa-floppy-o bigger-125"></i>
							Save
						</button>

						<button class="btn btn-sm btn-success btn-white btn-round">
							<i class="ace-icon fa fa-globe bigger-125"></i>

							Publish
							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-125"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<h4 class="header green">Markdown Editor</h4>

		<div class="widget-box widget-color-blue">
			<div class="widget-header widget-header-small">  </div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<textarea name="content" data-provide="markdown" rows="10">**Markdown Editor** inside a *widget box*

- list item 1
- list item 2
- list item 3</textarea>
				</div>

				<div class="widget-toolbox padding-4 clearfix">
					<div class="btn-group pull-left">
						<button class="btn btn-sm btn-info">
							<i class="ace-icon fa fa-times bigger-125"></i>
							Cancel
						</button>
					</div>

					<div class="btn-group pull-right">
						<button class="btn btn-sm btn-purple">
							<i class="ace-icon fa fa-floppy-o bigger-125"></i>
							Save
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var $path_assets = "../assets";//this will be used in loading jQuery UI if needed!
</script>

<!-- PAGE CONTENT ENDS -->
