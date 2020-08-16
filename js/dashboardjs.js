$(document).ready(function(){
    $('a').click (function(){
        $(this).addclass('active');
        $('li.list-group.active').removeclass('active');
        
    })
});