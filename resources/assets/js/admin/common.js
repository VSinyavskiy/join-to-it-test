(function ($, undefined) {
    /**
     * Namespace
     * @var object
     */
    var ns = namespace('admin.common');

    /**
     * Initializes namespace
     */
    ns.init = function() {        
        ns.initSelect2();
        ns.initiCheck();
        ns.initMask();
    };

    ns.initSelect2 = function() {
        $('.select2').select2();
    };

    ns.initiCheck = function() {
        $('.icheck').find('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    };

    ns.initMask = function() {
        $('.mask').inputmask();
    };

    ns.init();
})(jQuery);

