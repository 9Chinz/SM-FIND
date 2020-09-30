$(document).ready(function(){
    $("#stdprint").on('click', function(){
        window.print();
    });
})
$(".continue").click(function(){
    $("form").animate({ height : "toggle" ,opacity : "toggle"}, "slow");
});