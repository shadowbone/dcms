// Setting Header For Send by ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'DSCM-TOKEN' : 'xtc'
    }
});
// Setting Modal Before Shown
$.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner =
        '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' +
        '<div class="progress progress-striped active">' +
        '<div class="progress-bar" style="width: 100%;"></div>' +
        '</div>' +
        '</div>';
        
//REMOTE MODAL
$(document).on('click', '[data-toggle="modal"]', function (event) {
    event.preventDefault();
    _this = $(this);
    url = _this.attr('href');

    if (typeof _this.data('url') != 'undefined') {
        url = _this.data('url');
    }

    modal = $(_this.data('target'));

    if (backdrop = _this.data('backdrop')) {
        modal.data('backdrop', backdrop);
    }

    if (width = _this.data('width')) {
        modal.data('width', width);
    }

    $('.modal-content', modal).empty();
    if (url) {
        if (url.charAt(0) != '#') {
            modal.removeClass('fade');
            modal.modal('show');

            $('body').modalmanager('loading');
            modal.load(url, null, function () {
                modal.modal();
                modal.modal('show');
            });
        }
    }
});

// Save By Ajaxs
$.fn.myForm = function(content) {
    var _this = $(this);
    // Set Prepare before Action
    var _default = {
        confirmMessage : typeof _this.attr('data-confirm-message') !== 'undefined' ?  _this.attr('data-confirm-message') : null,
        confirmTitle   : typeof _this.attr('data-confirm-title') !== 'undefined' ? _this.attr('data-confirm-title') : null,
        url            : typeof _this.attr('action') !== 'undefined' ? _this.attr('action') : null,
        method         : typeof _this.attr('method') !== 'undefined' ? _this.attr('method') : null ,
        data           : null,
        success        : function (event, data) {},
        error          : function (event, data) {},
        before         : function (event) {}
    };

    var options = $.extend(true, _default, content);
    _this.submit(function(event) {
        event.preventDefault();
        _this.ajaxSubmit({
            type: options.type,
            url: options.url,
            data: options.data,
            beforeSubmit : function() {
                options.before();
                $('.form-group',_this).removeClass('has-error');
                $('span.help-block.error',_this).remove();
            },
            success : function(data) {
                var data      = JSON.parse(data);
                var succTitle = 'Proses Berhasil !';
                var succMsg   = 'Data Berhasil Di Simpan.'
                options.success(data);
                // Setting Sukses Title
                if(data.title) {
                    succTitle = data.title;
                }
                // Setting Sukses Message
                if(data.message) {
                    succMsg = data.message;
                }
                // Reset Form Setelah Proses Sukses
                _this[0].reset();
                $('input:checkbox', _this).removeAttr('checked');
                $('.checked', _this).removeClass('checked');
                if ($('.select2', _this).length > 0) {
                    $('.select2', _this).select2('val', '');  
                }
                // Triger With Eval (data.return)
                if(data.return) {
                    eval('(' + data.return + ')');
                }              
                // Pessan Setelah Sukses
                $.gritter.add({
                    title     : '<span class="glyphicon glyphicon-saved" aria-hidden="true"></span> &nbsp;' + succTitle,
                    text      : succMsg,
                    sticky    : false,
                    class_name: 'gritter-success'
                });
            },
            error : function(data) {
                options.error();
                var sttsErr  = data.status;
                var errMsg   = 'Terjadi Kesalahan, Silahkan Cek Inputan.';
                var errTitle = 'Proses Gagal !';

                if(sttsErr == '411') {
                    var error = JSON.parse(data.responseText);
                    var logo  = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp';

                    if(data.message) {
                        errMsg = data.message;
                    }
                    // Setting Error title
                    if(data.title) {
                        errTitle = data.title;
                    }
                    // Parsing Error
                    $.each(error.data, function(key, val) {
                        var _field     = $('[name='+ key +']', _this);
                        var _div       = $('.error_' + key, _this);
                        var _group     = _field.closest('.form-group').find('div.input-group');
                        var _selectize = _field.closest('.form-group').find('div.selectize-control');
                        var _select2   = _field.closest('.form-group').find('.select2-container');
                        // Menambahkan class Error pada form-group
                        _field.closest('.form-group').addClass('has-error');
                        // Cara kedua menempelkan manual error pada form
                        var manualErr = $('#error_' + key,_this);

                        if(manualErr.length) {
                            manualErr.html('<span class="help-block error">'+ logo + val[0] +'</span>');
                        } else {
                            if(_group.length) {
                                _group.after('<span class="help-block error">'+ logo + val[0] +'</span>');
                            } else if(_selectize.length) {
                                _selectize.after('<span class="help-block error">'+ logo + val[0] +'</span>');
                            } else if (_select2.length) {
                                _select2.after('<span class="help-block error">'+ logo + val[0] +'</span>');
                            } else if(_div.length) {
                                _div.after('<span class="help-block error">'+ logo + val[0] +'</span>');
                            } else {
                                _field.after('<span class="help-block error">'+ logo + val[0] +'</span>');
                            }
                        }
                    });
                } else {
                    errMsg   = 'Terjadi Kesalahan pada Sistem';
                    errTitle = 'Error ' + sttsErr + ' !';
                }
                // Add Message
                $.gritter.add({
                    title     : '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> &nbsp;' + errTitle,
                    text      : errMsg,
                    sticky    : false,
                    class_name: 'gritter-error'
                });
            }
        });
    });
}

var myApp = {
    init : function() {
        $('[data-rel=tooltip]').tooltip();
        $('[data-rel=popover]').popover({html:true});
        myApp.checkAll();
        $.each($('select.select2'), function() {
            $(this).select2({width : '100%'});
        });
    },
    checkAll : function(object) {
        $('.unchecked-all, .checked-all').on('click',function(event){
            var _this   = $(this).attr('class');
            var _target = $('.del-checked');
            if(_this === 'checked-all') {
                $('.del-checked').prop('checked',true);
            } else {
                $('.del-checked').prop('checked',false);
            }

            if($('.del-checked:checked').length > 0) {
                
            } else {

            }

            return false;
        });

    },
    delete : function(object) {

    }
}
