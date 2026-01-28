<script src="{$data.admin_js_path}city.js"></script>
<div class="row-fluid">
    <div class="navbar">
        <div class="navbar-inner">
            {$data.breadcrumb}
        </div>
    </div>
</div>
<div id="googleMap" class="citymap" style="display:none;"></div>
<div class="row-fluid">
    <div class="span12">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Get City</div>
            </div>
            <div class="block-content collapse in">
				<form class="form-horizontal" id="frmcity" action="{$data.admin_url}city/{$data.action}" method="post">
					
				<input type="hidden" name="city[iCityId]" value="{$data.city['iCityId']}">
				<input type="hidden" name="oldcity"  id="oldcity" value="{$data.city['vCity']}">
					<fieldset>
					<legend>Get City</legend>
						<div class="control-group">
							<label class="control-label" for="typeahead">Enter Address<sup><span style="color:#CC2131">*</span></sup></label>
							<div class="controls">
								<input type="text" class="span5" id="vcity" name="city">
								<label style='float:right;width:35%;padding-right: 20% !important;display:inline !important;color:#CC2131 !important;'><h3 style='line-height:0px !important;padding-top: 10px !important;'><span id='lblcity'></span></h3></label>
							</div>
						</div>
						<div class="form-actions">
							<button type="button" id="btn-get_city_name" class="btn bottom-buffer" style='margin-left:7px;'>Get City From Address</button>
							<button type="button" id='clear_city' class="btn bottom-buffer">Clear</button>
							<button type="button" class="btn bottom-buffer" onclick="returnme();">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
{literal}
<script>

var rendererOptions = {
  draggable: false,
};

var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
var directionsService = new google.maps.DirectionsService();

var map;
var lat=56.130366;
var lng=-106.346771;
/*var lat=22.258652;
var lng=71.192381;*/
var Cnada = new google.maps.LatLng(lat,lng);

function initialize() {
    var mapOptions = {
        zoom: 3,
        center: Cnada
    };
    map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
    var input = /** @type {HTMLInputElement} */(
    document.getElementById('vcity'));

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    directionsDisplay.setMap(map);   
}

$(document).ready(function(){
	google.maps.event.addDomListener(window, 'load', initialize);
});


$('#btn-get_city_name').on('click',function(){
	var address = $('#vcity').val();

	if(address == '')
    {
        $(".modal-body").html( "<p>Please Enter Address!</p>" );
        $("#myalert").modal('show');
        return false;
    }
    else {
    	url = base_url+"city/checkcitynamefromapi?address="+address;
		$.post(url,
		    function(data) {
		    	data = data.trim();
		    	if(data=='error'){
		    		$('#lblcity').html('No City Found');
		    	}
		        else {
		        	$('#lblcity').html(data);
		        }
		    });
    }
});

$('#clear_city').on('click',function(){
	$('#lblcity').html('');
	$('#vcity').val('');
});
</script>
{/literal}