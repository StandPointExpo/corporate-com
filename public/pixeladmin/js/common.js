$(function() {
    $('.common-datepicker').datepicker({
        format: 'dd.mm.yyyy'
    });

    $('button[data-action=hide-panel]').bind('click', function(event) {
        event.preventDefault();
        var icon = $(this).find('i');
        var panel = $(this).closest('.panel');
        var body = $(panel).find('.panel-body');
        var status = +$(this).data('status');

        if (!status) {
            $(icon).prop('class', 'fa fa-eye-slash');
            $(this).prop('class', 'btn btn-danger btn-xs');
            $(body).removeClass('hidden');
        } else {
            $(icon).prop('class', 'fa fa-eye');
            $(this).prop('class', 'btn btn-primary btn-xs');
            $(body).addClass('hidden');
        }

        $(this).data('status', !status);
    });

    $('.form-confirm').bind('submit', function(event) {
        var string = $(this).data('confirm');
        if (confirm(string || 'Вы уверены?')) {
            return true;
        }
        event.preventDefault();
    });
});