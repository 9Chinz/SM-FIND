$(document).ready(function(){
    $("#stdprint").on('click', function(){
        window.print();
    });
})
$(".continue").click(function(){
    $(".register").animate({ height : "toggle" ,opacity : "toggle"}, "slow");
    $(".register2").animate({ height : "toggle" ,opacity : "toggle"}, "slow");
});