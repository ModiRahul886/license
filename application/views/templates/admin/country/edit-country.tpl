<script src="{$data.admin_js_path}country.js"></script>
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
                <div class="muted pull-left">Country</div>
            </div>
            <div class="block-content collapse in">
		<form class="form-horizontal" id="frmcountry" action="{$data.admin_url}country/update" method="post" enctype="multipart/form-data">
			<input type="hidden" name="data[iCountryId]" value="{$data.country.iCountryId}">
			<input type="hidden" name="oldcountryname" id="oldcountryname" value="{$data.country.vCountry}">
			<input type="hidden" name="oldvCountryCode" id="oldvCountryCode" value="{$data.country.vCountryCode}">
			<input type="hidden" name="oldIsdCode" id="oldIsdCode" value="{$data.country.vIsdCode}">
			<fieldset>
				<legend>Edit Country</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Country Name</label>
					<div class="controls">
						<input type="text" class="span3" id="vCountry" name="data[vCountry]"  value="{$data.country.vCountry}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Country Code</label>
					<div class="controls">
						<input type="text" class="span3" id="vCountryCode" maxlength="2" name="data[vCountryCode]"  value="{$data.country.vCountryCode}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Country ISD Code</label>
					<div class="controls">
						<input type="text" class="span3" id="vIsdCode" name="data[vIsdCode]" maxlength="3" value="{$data.country.vIsdCode}">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Country Mobile Code</label>
					<div class="controls">
						<input type="text" class="span3" id="vCountryMobileCode" name="data[vCountryMobileCode]" value="{$data.country.vCountryMobileCode}">
						<br>
								<span style="color:red;font-size: 12px;">[Country mobile code should be : For e.g. if country is brazil code:+55]</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="typeahead">Status</label>
					<div class="controls">
						<select class="input-large" name="data[eStatus]">
							{section name=i loop=$eStatuses}
							<option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.country.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
							{/section}
						</select>
					</div>
				</div>
				<div class="form-actions">						  
					<button type="button" id="btn-save" class="btn bottom-buffer" onclick="validate_data();">Save Change</button>
					<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
				</div>
			</fieldset>
		</form>
	</div>
	</div>
    </div>
</div>