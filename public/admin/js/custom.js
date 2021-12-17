$(document).ready(function(){
    var statusChange = $('.status-change');

    statusChange.change(function(){
        var self    = $(this);
        var id      = $(this).data('id');
        var status  = $(this).data('status');
        var url     = $(this).data('url');
        var _token  = $('form input[name="_token"]').val();
        var statusLabel = $(this).parent().find('.status-label');
        var newUrl  = url + `/change-status-ajax/${id}/${status}`;
        
        console.log(newUrl);
        console.log(status);

        $.ajax({
            url : newUrl,
            method: 'POST',
            data: {
                _token
            },
            success: function(data){
                console.log(JSON.parse(data));
                var data = JSON.parse(data);
                statusLabel.html(data.text);
                self.data('status', data.status);

            },
            error: function(err){
                console.log(err);
            }

        });
    });

    
})