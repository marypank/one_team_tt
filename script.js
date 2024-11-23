$('#sendDataBtn').on('click', function() {
    var fileData = $('#teamsFile').prop('files')[0];   
    var formData = new FormData();                  
    formData.append('teamsFile', fileData);

    $('#errorMessage').hide();
    $.ajax({
        type: 'POST',
        url: 'handler.php',
        data: formData,
        datatype: 'JSON',
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $('#sendDataBtn').prop('disabled', true);
        },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.error !== null) {
                console.log('empty error');
                $('#errorMessage').show();
                $('#errorMessage').text(data.error);
            } else {
                data = data.data;
                $.each(data, function(key, value) {
                    console.log(key)
                    console.log(value)
                    var tableBlock = $('.table');
                });
            }
            $('#sendDataBtn').prop('disabled', false);
        }
    });

    //
});