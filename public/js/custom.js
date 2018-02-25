jQuery(document).on('keyup', '#main-search', function () {
    $value = jQuery(this).val();

    if ($value.length > 0) {
        jQuery.ajax({
            type: 'get',
            url: _SEARCH,
            data: {'search': $value},
            success: function (data) {
                if (data !== '') {

                    var searchBlock = jQuery('#searchresponse').empty().show();
                    searchBlock.append(data);
                }

                else {
                    var searchBlock = jQuery('#searchresponse').empty().show();
                    searchBlock.append('No results');
                }

            }
        });
    }
    else {
        jQuery('#searchresponse').empty().hide();
    }
});

jQuery(document).on('click', '.delete-item', function () {
    $('#delete-href').attr("href", '');
    var $url = jQuery(this).data('url');
    $('#delete-href').attr("href", $url);
});

jQuery(document).on('click', '.single-server thead tr th', function () {
    var $this = $(this);
    $(this).toggleClass('asc');

    $ = jQuery;
    var objectForAllRows = {};
    var dataName = '';
    var arrayToAddAll = [];
    var param = '';
    $('tbody tr').each(function () {
        $(this).find('td').each(function () {
            dataName = $(this).data('name');
            objectForAllRows[dataName] = $(this).html();
        });
        arrayToAddAll.push(objectForAllRows);
        objectForAllRows = {};
    });
    arrayToAddAll.sort(function (a, b) {
        var textA, textB;
        var arrayParam = $this.data('name');
        if ($this.hasClass('asc')) {
            if (arrayParam === 'name') {
                textA = $(a[arrayParam]).text().toUpperCase();
                textB = $(b[arrayParam]).text().toUpperCase();
            }
            else if (arrayParam === 'price') {
                textA = Number(a[arrayParam]);
                textB = Number(b[arrayParam]);
            }
            else {
                textA = a[arrayParam].toUpperCase();
                textB = b[arrayParam].toUpperCase();
            }
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        }
        else {
            if (arrayParam === 'name') {
                textA = $(a[arrayParam]).text().toUpperCase();
                textB = $(b[arrayParam]).text().toUpperCase();
            }
            else if (arrayParam === 'price') {
                textA = Number(a[arrayParam]);
                textB = Number(b[arrayParam]);
            }
            else {
                textA = a[arrayParam].toUpperCase();
                textB = b[arrayParam].toUpperCase();
            }
            return (textA > textB) ? -1 : (textA < textB) ? 1 : 0;
        }


    });

    $('.single-server tbody').empty();

    function checkStatusColor(param) {
        switch (param) {
            case 'Active':
                return 'active';

            case 'Completed':
                return 'completed';

            case 'Pending':
                return 'pending';
            default:
                return '';
        }
    }

    for (items in arrayToAddAll) {
        var prop = arrayToAddAll[items];
        var generateRow = $('<tr>' +
            '<td data-name="rb">' + prop.rb + '</td>' +
            '<td data-name="name">' + prop.name + '</td>' +
            '<td data-name="type">' + prop.type + '</td>' +
            '<td data-name="status" class="' + checkStatusColor(prop.status) + '">' + prop.status + '</td>' +
            '<td data-name="start">' + prop.start + '</td>' +
            '<td data-name="end">' + prop.end + '</td>' +
            '<td data-name="price">' + prop.price + '</td>' +
            '<td data-name="actions">' + prop.actions + '</td>' +
            '</tr>');
        $('.single-server tbody').append(generateRow);
    }
    objectForAllRows = {};
    dataName = '';
    arrayToAddAll = [];

});