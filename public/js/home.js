/**
 * Created by mjames on 08/02/2016.
 */
var timerHandle = false; // global!
function setTimer() {
    console.log("Captured keys");
    if (timerHandle) clearTimeout(timerHandle);
    timerHandle = setTimeout(sendItOff,1000); // delay is in milliseconds
}
function sendItOff() {
    var text = $("#text").val();
    console.log("Sending " + text);
    if($('#text').val().length > 0){
        $('#text').css('background-color', '#7DC27D');
        $('#testing').text("Validation passed!").append('<i class="fa fa-check"></i>');
    }
    else
    {
        $('#text').css('background-color', '#fff0f0');
        $('#testing').text('This field is required');
    }
}
$(document).ready(function(){
    $('#text').focus(function(){
        $('#submit').show('fast');
        $('#testing').show('fast');
        console.log($('#text').val().length);
        if($('#text').val().length >= 1){
            $('#text').css('background-color', '#7DC27D');
        }
        else
        {
            $('#text').css('background-color', '#fff0f0');
        }
    });
    $('#text').focusout(function(){
        $('#submit').hide('slow');
        $('#testing').hide('slow');
    });
    $('#submit').mouseenter(function(){
        $(this).addClass('btn-success');
    });
    $('#submit').mouseleave(function(){
        $(this).removeClass('btn-success');
    });
    $('a.toggler').click(function(){
        $(this).toggleClass('off');
        if($(this).hasClass('off')){
            var off = 0;
            $.post('/chat-status', {off:off}, function(r){
                console.log(r);
                location.reload();
            });
        }else{
            var off = 1;
            $.post('/chat-status', {off:off}, function(r){
                console.log(r);
                location.reload();
            });
        }
    });
    $('#status-form').submit(function(event){
        event.preventDefault();

        var status = $('#text').val();

        $.post('/', {status:status}, function(status){
            $('.posted').hide();
            console.log(status);

            $('.timeline-list').prepend(
                "<li id='list'>" +
                "<div class='timeline-icon'>" +
                "<img style='width:32px; height:32px;' src='{{URL::asset('img/pp.png')}} '/>" +
                "</div>" +
                "<div class='timeline-time'>" +
                "<small>just now</small>" +
                "</div>" +
                "<div class='timeline-content'>" +
                "<p>"+status+"</p>" +
                "</div>" +
                "</li>" +
                "<hr class='line'>"
            );

            $("body").overHang({
                activity : "notification",
                message : "Status Posted Successfully!",
                duration: 5,
                col: "emerald"
            });
        });
    });
});