jQuery.noConflict();

(function($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    ready = () => {
        ajax();
    };

    ajax = async () => {
    }

    create = async () => {
        
    }

    store = async () => {
        
    }

    edit = async () => {
        
    }

    update = async () => {
        
    }

    dellete = async () => {
        
    }

    
    $(document).ready(ready);

})(jQuery);
