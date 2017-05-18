require('./bootstrap');
$('#recipes-search input').on('keyup', function(){

    var term = $(this).val().trim();
    if(term.length === 0) {
        return;
    }
    
    $.ajax({
        'url': '/recipes/search/' + term,
        'success': function(data){
            $('#recipes-list').replaceWith(data);
        }
    });
});

$('.toggle-comments').on('click', function() {
    $(this).parent().parent().find('.comments').toggleClass('hidden');
})