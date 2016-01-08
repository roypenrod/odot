$(function(){})
.on('click', '.delete-list', function(e){
    if (!confirm('Are you sure?')) {
        e.preventDefault();
    }
});