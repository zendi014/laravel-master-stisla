this.swal_html = (html) => {
    Swal.fire({
        html: html,
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
        scrollbarPadding:false,
        widthAuto: true,
        allowOutsideClick: false,
        // position: 'top',
        width: '75%',
    });
}


this.swal_html_middle_50 = (html) => {
    Swal.fire({
        html: html,
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
        scrollbarPadding:false,
        widthAuto: true,
        allowOutsideClick: false,
        width: '50%',
    });
}


this.swal_html_middle_40 = (html) => {
    Swal.fire({
        html: html,
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
        // scrollbarPadding:false,
        // widthAuto: true,
        allowOutsideClick: false,
        width: '40%',
    });
}

this.swal_html_mini = (html) => {
    Swal.fire({
        html: html,
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
        scrollbarPadding:false,
        allowOutsideClick: false,
        widthAuto: true,
    });
}



this.swal_loading = (msg) => {

    let imgurl = window.location.origin + "/assets/images/svg/blue/svg817.svg";

    let spinner = `           
        <div style="text-align:center">
            <img 
                src="${imgurl}" 
                alt="" style="height:auto; max-width: 50%;"
            >
        </div>     

        <div style="text-align:center">
            <div class="spinner-grow text-primary m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-success m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-info m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-warning m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-danger m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-dark m-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    `;
    Swal.fire({
        title: msg,
        html: spinner,
        showConfirmButton: false,
    }).then((result) => {
    })        
}



this.swal_done = (msg) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
        
    Toast.fire({
        icon: 'success',
        title: msg
    })
}



this.swal_error = (msg) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
        
    Toast.fire({
        icon: 'error',
        title: msg
    })
}


this.swal_confirm = (msg, pos_btn, neg_btn) => {
    return new Promise((resolve, reject) => {
        Swal.fire({
            title: msg,
            html: '<div style="text-align: center;" class="row"><i class="dripicons-warning" style="font-size:44px;"></i><p>This Action cant be undone!!</p></div>',
            showDenyButton: true,
            showCancelButton: false,
            showCloseButton: true,
            allowOutsideClick: false,
            confirmButtonText: pos_btn,
            denyButtonText: neg_btn,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // Swal.fire(pos_btn, '', 'success')
                resolve(true);
            } else if (result.isDenied) {
                // Swal.fire(neg_btn, '', 'info')
                resolve(false);
            }
            
        })
    });
    
}


this.swal_close = () => {
    Swal.close();
}