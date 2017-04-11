/**
 * Action Untuk Save Global
 * @el elemet target
 * @return action
 */
export const actionSaveTest = ($e,content) => {
    /** Ini Untuk Extensi Keperluan before = BeforeSend Semua Sama Kaya Ajax Jquery */
    var _default = {
        confirmMessage : typeof $e.attr('data-confirm-message') !== 'undefined' ?  
        $e.attr('data-confirm-message') : null,
        confirmTitle   : typeof $e.attr('data-confirm-title') !== 'undefined' ?
        $e.attr('data-confirm-title') : null,
        url            : typeof $e.attr('action') !== 'undefined' ? $e.attr('action') : null,
        method         : typeof $e.attr('method') !== 'undefined' ? $e.attr('method') : 'POST' ,
        target         : typeof $e.attr('target-event') !== 'undefined' ? $e.attr('target-event') : null,
        model          : typeof $e.attr('target-model') !== 'undefined' ? $e.attr('target-model') : null,
        data           : $e.serializeArray(),
        async          : true,
        formInput      : $e,
        success        : function (event, data) {},
        error          : function (event, data) {},
        before         : function (event) {}
    };
    var options = $.extend({},_default, content);
    $.ajax({
        url: options.url,
        type: options.method,
        dataType : 'json',
        async: options.async,
        data: options.data,
        beforeSend : function() {

        },
        success : function(data) {
            $.gritter.add({
                title     : '<span class="ace-icon fa fa-check bigger-150" aria-hidden="true"></span> &nbsp; Proses Berhasil!',
                text      : 'Data Berhasil Tersimpan',
                sticky    : false,
                class_name: 'gritter-success'
            });
        },
        error : function(data) {

        }

    });
}