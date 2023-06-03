<style>
    .error {
        color: red;
        font-size: 1rem;
        /* font-family: Arial, sans-serif; */
    }
</style>


<form action="#" id="form">
    <div class="card-body">
        <div class="row">     
            
            <!-- col Here -->
            <div class="col-md-6 col-sm-12 col-12">                
                <div class="form-group">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" class="form-control" 
                            id="name" name="name" onkeyup="validate();" 
                            value="{{ isset($data['name']) ? $data['name'] : '' }}"
                            placeholder="Enter Book Name Here..">
                </div>
            </div>

            <!-- col Here -->
            <div class="col-md-6 col-sm-12 col-12">                
                <div class="form-group">
                    <label for="icon">
                        Type
                    </label>
                    <input type="text" class="form-control" 
                            id="type" name="type" onkeyup="validate();" 
                            value="{{ isset($data['type']) ? $data['type'] : '' }}"
                            placeholder="Enter Type Here..">
                </div>
            </div>

            <!-- col Here -->
            <div class="col-md-6 col-sm-12 col-12">                
                <div class="form-group">
                    <label for="icon">
                        Author Name <small><code id="logo_msg_txt" style="display:none"></code></small>
                    </label>
                    <input type="text" class="form-control"
                            id="author_name" name="author_name" onkeyup="validate();" 
                            value="{{ isset($data['author_name']) ? $data['author_name'] : '' }}"
                            placeholder="Enter Author Name Here..">
                </div>
            </div>

            <!-- col Here -->
            <div class="col-md-6 col-sm-12 col-12">                
                <div class="form-group">
                    <label for="icon">
                        Year
                    </label>
                    <input type="text" class="form-control"
                            id="year" name="year" onkeyup="validate();" 
                            value="{{ isset($data['year']) ? $data['year'] : '' }}"
                            placeholder="Enter Year Here..">
                </div>
            </div>


            <!-- buttons -->
            <div class="col-6"></div>

            <div class="col-6">
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <button type="button" 
                                class="btn btn-success btn-block float-right" 
                                onclick="update(`{{$data['id']}}`);">
                                Submit
                        </button>
                    </div>
                    <div class="col-sm-6 col-6">
                        <button type="button" 
                                class="btn btn-secondary btn-block float-right close_swal" 
                                onclick="swal_close();">
                                Cancel
                        </button>
                    </div>
                </div>            
            </div>

        </div>
    </div>
</form>