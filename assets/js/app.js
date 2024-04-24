$(function(){
    //alerts autohide
    notification_autohide();
});

function notification_autohide() {
    var timeout_id;
    timeout_id = setTimeout(function() { 
        $('.myjs-alert-autohide').slideUp(1000, function() {
            $('.myjs-alert-autohide').empty();
        });  
    }, 15000);
}//end-func

//-----  form-validation  --------
//clear all the errors & error formatting
function clear_errors() { 
    $(".myjs-error").text("");
    $("*").removeClass("has-error");
}//end-func

//add 'has-error' class to erroneous elements
function change_status() {
    $(".myjs-error").each(function(){
        if($(this).text().trim().length > 0) { //an erroneous element.		
            var elem_target = $(this).attr("data-block");
            $(elem_target).addClass("has-error");
        }
    });
}//end-func

function is_empty(arg) { 
    if(arg == null){ return true;}
    arg = arg.trim();
    return arg.length == 0;
}//end-func