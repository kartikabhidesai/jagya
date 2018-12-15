var City = function() {
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
    
    
    var  addcity=function(){
        var form = $('#addCity');
        var rules = {

            state: {required: true},
            city: {required: true},

        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var  editcity=function(){
        var form = $('#editcity');
        var rules = {

            state: {required: true},
            city: {required: true},

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
            addcity();
        },
        edit:function(){
          editcity();  
        },       
    };
}();
