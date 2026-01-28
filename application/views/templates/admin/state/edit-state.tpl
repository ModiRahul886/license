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
		<form class="form-horizontal" id="frmstate" action="{$data.admin_url}state/update" method="post" enctype="multipart/form-data">
			<input type="hidden" name="data[iStateId]" value="{$data.state.iStateId}">
			<input type="hidden" name="oldstatename" id="oldstatename" value="{$data.state.vState}">
			<input type="hidden" name="oldvstateCode" id="oldvstateCode" value="{$data.state.vStatecode}">
			<fieldset>
				<legend>Edit Province</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Country<sup><span style="color:#CC2131">*</span></sup></label>
					<div class="controls">
						<select name="data[iCountryId]" id="iCountryId" class="span4" style="width: 32% !important;">
							{section name = i loop = $data.all_country}
							    <option value="{$data.all_country[i].iCountryId}" {if $data.all_country[i].iCountryId eq $data.state.iCountryId}selected="selected"{/if}>{$data.all_country[i].vCountry}</option>
							{/section}
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Province Name<sup><span style="color:#CC2131">*</span></sup></label>
					<div class="controls">
						<input type="text" class="span4" id="vState" name="data[vState]" value="{$data.state.vState}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Province Code<sup><span style="color:#CC2131">*</span></sup></label>
					<div class="controls">
						<input type="text" class="span4" id="vStatecode" maxlength="3" name="data[vStatecode]" value="{$data.state.vStatecode}">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="typeahead">Status<sup><span style="color:#CC2131">*</span></sup></label>
					<div class="controls">
						<select class="input-large" name="data[eStatus]" class="span4" style="width: 32% !important;">
							{section name=i loop=$eStatuses}
							<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.state.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
							{/section}
						</select>
					</div>
				</div>
				<div class="form-actions">						  
					<button type="button" id="btn-save" class="btn bottom-buffer" onclick="validate_data();" >Save Change</button>
					<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
				</div>
			</fieldset>
		</form>
	</div>
	</div>
    </div>
</div>