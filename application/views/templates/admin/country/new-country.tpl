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
				<form class="form-horizontal" id="frmcountry" action="{$data.admin_url}country/create" method="post" >
					
					<fieldset>
					<legend>Add Country</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country Name</label>
							<div class="controls">
								<input type="text" class="span3" id="vCountry" name="data[vCountry]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country Code</label>
							<div class="controls">
								<input type="text" class="span3" id="vCountryCode" maxlength="2" name="data[vCountryCode]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country ISD Code</label>
							<div class="controls">
								<input type="text" class="span3" id="vIsdCode" maxlength="3" name="data[vIsdCode]" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country Mobile Code</label>
							<div class="controls">
								<input type="text" class="span3" id="vCountryMobileCode" name="data[vCountryMobileCode]" value=""><br>
								<span style="color:red;font-size: 12px;">[Country mobile code should be : For e.g. if country is brazil code:+55]</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Status</label>
							<div class="controls">
								<select class="input-large" name="data[eStatus]" id="eStatus">
									<option value="">-- Select Status --</option>
									{section name=i loop=$eStatuses}
									<option value="{$eStatuses[i]}">{$eStatuses[i]}</option>
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