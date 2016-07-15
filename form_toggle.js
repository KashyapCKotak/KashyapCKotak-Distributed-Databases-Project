/**
 * File: js/showhide.js
 * Author: design1online.com, LLC
 * Purpose: toggle the visibility of fields depending on the value of another field
 **/
$(document).ready(function () {
    toggleFields(); //call this first so we start out with the correct visibility depending on the selected form values
    //this will call our toggleFields function every time the selection value of our underAge field changes
    $("#action").change(function () {
        toggleFields();
    });

    $("#select_field").change(function () {
        toggleFields();
    });
});
//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
function toggleFields() {
    //if action is select
    if ($("#action").val() == "select" || $("#action").val() == "update")
        $("#select").show();
    else{
        $("#select").hide();
    }

    	//on selecting "select"

	    if ($("#select_field").val() == "user")
	        $("#user").show();
	    else
	        $("#user").hide();

	    if ($("#select_field").val() == "owner")
	        $("#owner").show();
	    else
	        $("#owner").hide();

	    if ($("#select_field").val() == "property")
	        $("#property").show();
	    else
	        $("#property").hide();
}