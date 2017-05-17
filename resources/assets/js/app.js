require('./bootstrap');
$('#recipes-search input').on('keyup', function(){

    var term = $(this).val();

    $.ajax({
        'url': '/api/recipes?search=' + term,
        'success': function(data){
            $('#recipes-list').replaceWith(data);
        }
    });
});
