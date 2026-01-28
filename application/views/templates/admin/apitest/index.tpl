<div class="rightside">
    <div class="page-head">
        <h1 class="page-title small">API / Webservice Testing</h1>
        <ol class="breadcrumb">
            <li><a href="{$data.admin_url}home">Home</a></li>
            <li class="active">API Testing</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-title">
                        <h3><i class="fa fa-plug"></i> Test Webservice</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" role="form" id="apiTestForm">
                            <div class="form-group">
                                <label for="api_url" class="col-sm-2 control-label">API URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="api_url" placeholder="http://example.com/api/endpoint" value="{$data.api_url}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="api_action" class="col-sm-2 control-label">API Action</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="api_action" onchange="updateParams()">
                                        <option value="verifyLicense">Verify License</option>
                                        <option value="authetication">Authentication</option>
                                    </select>
                                    <div class="well well-sm" id="api_description" style="margin-top: 10px; display:none;"></div>
                                    <div class="well well-sm" id="api_sample_response" style="margin-top: 10px; display:none;">
                                        <strong>Sample Response:</strong>
                                        <pre style="margin-top: 5px;"></pre>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="request_method" class="col-sm-2 control-label">Method</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="request_method">
                                        <option value="GET">GET</option>
                                        <option value="POST">POST</option>
                                        <option value="PUT">PUT</option>
                                        <option value="DELETE">DELETE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="request_params" class="col-sm-2 control-label">Parameters (JSON)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="request_params" rows="12"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" class="btn btn-primary" onclick="testApi()">Send Request</button>
                                </div>
                            </div>
                        </form>
                        
                        <hr>
                        
                        <h4>Response</h4>
                        <pre id="apiResponse" style="background: #f4f4f4; padding: 10px; border: 1px solid #ddd; min-height: 100px;">Waiting for request...</pre>
                        
                        <div class="alert alert-danger" id="apiError" style="display:none; margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var apiSamples = {$data.api_samples_json};

function updateParams() {
    var selected = $('#api_action').val();
    if (apiSamples[selected]) {
        $('#request_params').val(apiSamples[selected].data);
        
        // Update Description
        if(apiSamples[selected].description){
            $('#api_description').html(apiSamples[selected].description).show();
        } else {
            $('#api_description').hide();
        }

        // Update Sample Response
        if(apiSamples[selected].response){
            $('#api_sample_response pre').text(apiSamples[selected].response);
            $('#api_sample_response').show();
        } else {
            $('#api_sample_response').hide();
        }

    } else {
        $('#request_params').val('');
        $('#api_description').hide();
        $('#api_sample_response').hide();
    }
}

// Initialize with default
$(document).ready(function() {
    updateParams();
});

function testApi() {
    var url = $('#api_url').val();
    var method = $('#request_method').val();
    var params = $('#request_params').val();
    var data = {};

    if(params) {
        try {
            data = JSON.parse(params);
        } catch(e) {
            alert("Invalid JSON parameters");
            return;
        }
    }

    $('#apiResponse').text('Loading...');
    $('#apiError').hide();

    $.ajax({
        url: url,
        type: method,
        data: data,
        success: function(response) {
            if (typeof response === 'object') {
                $('#apiResponse').text(JSON.stringify(response, null, 4));
            } else {
                try {
                    var jsonResponse = JSON.parse(response);
                    $('#apiResponse').text(JSON.stringify(jsonResponse, null, 4));
                } catch(e) {
                    $('#apiResponse').text(response);
                }
            }
        },
        error: function(xhr, status, error) {
            $('#apiResponse').text('Error: ' + error);
            $('#apiError').text(xhr.responseText).show();
        }
    });
}
</script>
