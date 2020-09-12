<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

$('#id_degree').change(function(){
    var id_degree = $(this).val();
    
    $.ajax({
        type: "POST",
        url: "ajax_db.php",
        data: {id:id_degree, function:'degree'},
        success: function(data){
            $('#id_class').html(data);
            $('#id_room').val('');      
        }
    });

});

$('#id_class').change(function(){
    var id_degree = $('#id_degree').val();
    var id_class = $(this).val();
    
    $.ajax({
        type: "POST",
        url: "ajax_db.php",
        data: {id_class:id_class, id_degree: id_degree, function: 'class'},
        success: function(data){
            $('#id_room').html(data);
        }
    });
});

$('#stdSearch').click(function(){
    let id_dept = $('#id_dept').val();
    let id_degree = $('#id_degree').val();
    let id_class = $('#id_class').val();
    let id_room = $('#id_room').val();
    
    $.ajax({
        type: "POST",
        url: "ajax_db.php",
        data: {id_dept:id_dept, id_degree:id_degree, id_class:id_class, id_room:id_room, function: 'stdSearch'},
        success: function(data){
            $('#tbStd').html(data);
        }
    });
});

$(document).ready(function() {
    $('[data-toggle="datepicker"]').datepicker({
        format: 'dd/mm/yyyy',
        language: 'th-TH'
    });
    $('[data-toggle="datepicker"]').datepicker('setStartDate', '01/09/2020');
    $('[data-toggle="datepicker"]').datepicker('setEndDate', '13/09/2020');
});

</script>
