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