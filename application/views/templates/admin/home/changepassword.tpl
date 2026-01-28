<script src="{$data.admin_js_path}changepassword.js"></script>
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
                <div class="muted pull-left">Change Password</div>
            </div>
            <div class="block-content collapse in">
	    <form class="form-horizontal" id="changepwd" action="{$data.admin_url}changepassword" method="post">
		    <fieldset>
		    <legend>Change Password</legend>
			    <div class="control-group">
				    <label class="control-label" for="typeahead">New Password<sup><span style="color:#CC2131">*</span></sup></label>
				    <div class="controls">
					    <input type="password" class="span3" id="vPassword" name="vPassword">
				    </div>
			    </div>

			    <div class="control-group">
				    <label class="control-label" for="typeahead">Confirm Password<sup><span style="color:#CC2131">*</span></sup></label>
				    <div class="controls">
					    <input type="password" class="span3" id="confirmpwd">
				    </div>
			    </div>

			    <div class="form-actions">
				    <button type="submit" id="btn-save" class="btn bottom-buffer" >Save Change</button>
				    <button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
				    
			    </div>
                    </fieldset>
		</form>
            </div>
        </div>
    </div>
</div>