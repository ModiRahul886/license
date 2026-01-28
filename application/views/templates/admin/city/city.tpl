<script src="{$data.admin_js_path}city.js"></script>
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
                <div class="muted pull-left">City</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmcity" action="{$data.admin_url}city/{$data.action}" method="post">
					
				<input type="hidden" name="city[iCityId]" value="{$data.city['iCityId']}">
				<input type="hidden" name="oldcity"  id="oldcity" value="{$data.city['vCity']}">
					<fieldset>
					<legend>{$data.label} City</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Country<sup><span style="color:#CC2131">*</span></sup></label>
								<div class="controls">
									<select class="input-large" name="city[iCountryId]" id="iCountryId" style='width: 32% !important;'>
										<option value="">-- Select Country --</option>
										{section name = i loop = $country}
										<option value="{$country[i].iCountryId}" {if $data.city['iCountryId'] eq $country[i].iCountryId}selected{/if}>{$country[i].vCountry}</option>
										{/section}
										
									</select>
								</div>
						</div>
						<div class="control-group">
							<label class="control-label">State<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<select class="input-large" name="city[iStateId]" id="iStateId"  style='width: 32% !important;'>
									<option value="">-- Select State --</option>
									{section name=i loop=$statename}
										<option value="{$statename[i].iStateId}" {if $data.city['iStateId'] eq $statename[i].iStateId}selected{/if}>{$statename[i].vState}</option>
									{/section}
								</select>
							</div>
						</div>		
								
						<div class="control-group">
							<label class="control-label" for="typeahead">City Name<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span4" id="vcity" name="city[vCity]" value="{$data.city['vCity']}">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Status<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<select class="input-large" name="city[eStatus]" id="eStatus"  style='width: 32% !important;'>
									<option value="">-- Select Status --</option>
									{section name=i loop=$eStatuses}
									<option {if $eStatuses[i] eq $data.city['eStatus']}selected="selected"{/if}value="{$eStatuses[i]}">{$eStatuses[i]}</option>
									{/section}
								</select>
							</div>
						</div>
						<div class="form-actions">
						{if $data.action eq 'create'}
							<button type="button" id="btn-save" class="btn bottom-buffer" onclick="check_city();">Save</button>
							{else}
								<button type="button" id="btn-save" class="btn bottom-buffer" onclick="check_city();">Save Change</button>
						{/if}
							<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>