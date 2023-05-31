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
        $('.book_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                'url' : "book/ajax",
                'type': 'POST',
                'headers' : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [
                {
                    data: 'books.name', name: 'books.name'
                },
                {
                    data: 'books.author_name', name: 'books.author_name'
                },
                {
                    data: 'action', name: 'action', 
                    orderable: true, searchable: true
                },
            ]
        })
    }

    create = async () => {
        try{
            await axios.get('book/create').then((res)=> {
                swal_html(res['data']);
            }).catch( (error)=> {
                swal_error(error);
            }).then(()=>{
            });
        }catch (error) {
            swal_error(error);
        }
    }

    store = async () => {
        try{
            if(validate() == true){
                let form_data = $( `#form` ).serializeJSON();
                await axios.post('book/store', form_data).then((res)=> {
                    if(res["data"]["status"] == 200){
                        swal_done(res["data"]["message"])
                        setTimeout(function(){
                            location.reload();
                        }, 3000);   
                    }else{
                        swal_error(res["data"]["message"])
                    }         
                }).catch( (error)=> {
                    swal_error(error);
                });
            }
        }catch (error) {
            swal_error(error);
        }
    }

    edit = async (id) => {
        try{
            await axios.get(`book/edit/${id}`).then((res)=> {
                swal_html(res['data']);
            }).catch( (error)=> {
                swal_error(error);
            }).then(()=>{
            });
        }catch (error) {
            swal_error(error);
        }
    }

    update = async (id) => {
        try{
            if(validate() == true){
                let form_data = $( `#form` ).serializeJSON();
                await axios.post(`book/update/${id}`, form_data).then((res)=> {
                    if(res["data"]["status"] == 200){
                        swal_done(res["data"]["message"])
                        setTimeout(function(){
                            location.reload();
                        }, 3000);   
                    }else{
                        swal_error(res["data"]["message"])
                    }        
                }).catch( (error)=> {
                    swal_error(error);
                });
            }
        }catch (error) {
            swal_error(error);
        }
    }

    destroy = async (id) => {
        try{
            await axios.get(`book/destroy/${id}`).then((res)=> {
                if(res["data"]["status"] == 200){
                    swal_done(res["data"]["message"])
                    setTimeout(function(){
                        location.reload();
                    }, 3000);   
                }else{
                    swal_error(res["data"]["message"])
                }        
            }).catch( (error)=> {
                swal_error(error);
            });
        }catch (error) {
            swal_error(error);
        }
    }


    validate = () => {
        let form = $( `#form` ).validate({
            rules: {
                name : {
                    required: true,
                    minlength: 6
                },
                type : {
                    required: true,
                    minlength: 3
                },
                author_name : {
                    required: true,
                    minlength: 6
                },
                year : {
                    required: true
                },
            },
            messages: {
                name:{
                    required: "Please enter name"
                },
                type:{
                    required: "Please enter type"
                },
                author_name:{
                    required: "Please enter author name"
                },
                year:{
                    required: "Please enter year"
                },
            }
        });

        if(form.valid()){
            $(this).prop("disabled", false);
            return true;
        }

        $(this).prop("disabled", true);
        return false;
    }

    
    $(document).ready(ready);

})(jQuery);
