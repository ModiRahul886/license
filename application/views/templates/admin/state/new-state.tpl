<script src="{$data.admin_js_path}state.js"></script>
<div class="row-fluid">
    <div class="navbar">
        <div class="navbar-inner">
            {$data.breadcrumb}
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Province</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmstate" action="{$data.admin_url}state/create" method="post" enctype="multipart/form-data">
					<fieldset>
					<legend>Add Province</legend>
					<div class="control-group">
							<label class="control-label" for="typeahead">Country<sup><span style="color:#CC2131">*</span></sup></label>
								<div class="controls">
									<select class="input-large" name="data[iCountryId]" id="iCountryId" class="span4" style="width: 32% !important;">
										<option value="">-- Select Country --</option>
										{section name = i loop = $data.country}
										<option value="{$data.country[i].iCountryId}">{$data.country[i].vCountry}</option>
										{/section}
									</select>
								</div>
						</div>
					
						<div class="control-group">
							<label class="control-label" for="typeahead">Province Name<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span4" id="vState" name="data[vState]" value="">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Province Code<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span4" id="vStatecode"  maxlength="3" name="data[vStatecode]" value="">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Status<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<select class="input-large" name="data[eStatus]" id="eStatus" class="span4" style="width: 32% !important;">
									<option value="">-- Select Status --</option>
									{section name=i loop=$eStatuses}
									<option value="{$eStatuses[i]}">{$eStatuses[i]}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="form-actions">
							<button type="button" id="btn-save" class="btn bottom-buffer" onclick="validate_data();">Save</button>
							<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>