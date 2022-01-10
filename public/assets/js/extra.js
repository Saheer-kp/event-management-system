
$('.remove-user').click(function(){
    var user_id = $(this).data('userid');
    var event_id = $(this).data('eventid');
    var tr = $(this).closest("tr");
    var tableTr = $('#eventUsers tbody tr');
    var tableTbody = $('#eventUsers tbody');
    $.confirm({
        title: 'Delete?',
        content: 'Are you sure want to delete this user?',
        buttons: {
            yes: function () {
                $.ajax({
                    url: `/events/${event_id}/users/${user_id}`,
                    headers: {'X-CSRF-TOKEN': $('#csrf-input').val()},
                    type: "DELETE",
                    dataType: "Json",
                    success: function(result) {
                        if (result.success) {
                            tr.find('td').fadeOut(500,function(){ 
                                tr.remove();                    
                            });
                            setTimeout(function() {
                                if(!$('#eventUsers tbody tr').length) {
                                    $('#eventUsers tbody').append('<tr><td colspan="5" style="text-align:center"><strong>No Records</strong></td></tr>')
                                }
                            },700)
                            toastr.error(result.message);
                        }
                    },
                 });
            },
            cancel: function () {
                
            }
        }
    });

    
})