$('#sendDataBtn').on('click', function() {
    var fileData = $('#teamsFile').prop('files')[0];   
    var formData = new FormData();                  
    formData.append('teamsFile', fileData);

    var tableBlock = $('.tableBlock');
    tableBlock.empty();

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
                $('#errorMessage').show();
                $('#errorMessage').text(data.error);
            } else {
                data = data.data;
                $.each(data, function(key, value) {
                    tableBlock.append('<h1 class="display-6">Календарь матчей</h1>');
                    $.each(value, function(key2, item) {
                        var tDiv = $('<div>');
                        tDiv.append('<p class="text-success h5">' + 'Круг №' + (key+1) + ', тур №' + (key2) + '</p');

                        var table = $('<table>').addClass('table');
                        var thead = $('<thead>').append('<tr><th scope="col" class="col-2">№</th><th scope="col" class="col-4">Хозяева</th><th scope="col" class="col-2">###</th><th scope="col" class="col-4">Гости</th></tr>');
                        table.append(thead);

                        var tbody = $('<tbody>');
                        $.each(item, function(key3, team) {
                            tbody.append('<tr><td>' + (key3 + 1) + '</td><td>' + team['home'] + '</td><td>###</td><td>' + team['foster'] + '</td></tr>');
                        });
                        table.append(tbody);

                        tDiv.append(table);

                        tableBlock.append(tDiv);
                    });

                    tableBlock.show();
                });
            }
            $('#sendDataBtn').prop('disabled', false);
        }
    });
});