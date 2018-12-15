var State = function() {
    var citylist=function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
        });
        $('body').on('click','.deletebutton',function(){
            
            var personId = $(this).attr('data-id');
            var dataUrl = $(this).attr('data-href');
            $('#btndelete').attr('data-url',dataUrl);
            $('#btndelete').attr('data-id',personId);
            $('#myModal_autocomplete').modal('show');
            
        });
        handleDelete();
    };
    
    var addstate = function() {
        var form = $('#stateAdd');
        var rules = {
            
            country_name: {required: true},
            state: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var editstate = function() {
        var form = $('#stateEdit');
        var rules = {
            
            country_name: {required: true},
            state: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    return {
       
        init: function() {
           citylist();
        },
       add:function(){
         addstate();  
       },
       edit:function(){
         editstate();  
       },
    };
}();
