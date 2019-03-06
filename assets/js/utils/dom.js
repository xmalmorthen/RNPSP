$.fn.readOnly = function() {  
    return this.each(function() {
        $objTypeOf = $(this)[0].tagName.toLowerCase();            

        switch ($objTypeOf) {
            case 'input':
                $type = $(this).attr('type').toLowerCase();
                switch ($type) {
                    case 'text':
                    case 'password':
                    case 'date':
                    case 'email':                    
                        $(this).prop('readonly', true);
                    break;
                    case 'checkbox': 
                        $(this).prop('disabled', 'disabled'); 
                    break;
                }
            break;
            case 'select': 
                //$(this).prop('disabled', true);               
            break;                                    
            default:
            break;
        }
    });
};

$.fn.resetReadOnly = function() {  
    return this.each(function() {
        $objTypeOf = $(this)[0].tagName.toLowerCase();            

        switch ($objTypeOf) {
            case 'input':
                $type = $(this).attr('type').toLowerCase();
                switch ($type) {
                    case 'text':
                    case 'password':
                    case 'date':
                    case 'email':                    
                        $(this).prop('readonly', false);
                    break;
                    case 'checkbox': 
                        $(this).prop('disabled', false); 
                    break;
                }
            break;
            case 'select': 
                $(this).prop('disabled', false);               
            break;                                    
            default:
            break;
        }
    });
};