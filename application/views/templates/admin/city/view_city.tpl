<script src="{$data.admin_js_path}city.js"></script>
<form name="frmlist" id="frmlist" action="{$data.admin_url}city/action_update" method="post">
<input type="hidden" name="action" id="action">
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
                {if $data.message neq ''}
                <div class="span12">
                    <div class="alert alert-info">
                        {$data.message}
                    </div>
                </div>
                {/if}
                    <div class="span6"  style="width:98.717949%;margin:0;">
                    {if $data.Expot_dispalay eq 1}
                    <div class="pull-left">
                        <button type="button" id="btn-export" class="btn bottom-buffer" onclick="Export();" >Export</button>
                    </div>
                    {/if}
                    <div class="pull-right">
                        <button type="submit" id="btn-get-city" class="btn bottom-buffer" >Get City From Address</button>
                        <button type="submit" id="btn-active" class="btn bottom-buffer" onclick="check_all();" >Make Active</button>
                        <button type="submit" id="btn-inactive" class="btn bottom-buffer">Make Inactive</button>
                        <button type="button" id="btn-add" onclick="addme('{$data.admin_url}city/create');"  class="btn bottom-buffer"> Add New</button>
                        <button type="submit" id="btn-delete" class="btn bottom-buffer">Delete</button>
                    </div>
                    </div>
                
                    <table class="table  table-bordered table-striped " id="citytable">
                        <thead>
                            <tr>
                                <th width="3%"><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
                                <th>City Name</th>
                                <!-- <th>Country Name</th>
                                <th>State Name</th> -->
                                <th width="10%">Status</th>
                                <th width="10%"><center>Edit</center></th>
                            </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>
</div>           
</form>

{literal}
<script type="text/javascript">
    
function Export()
{
    window.location.href=base_url+"city/exportcsv";
}

</script>
{/literal} 