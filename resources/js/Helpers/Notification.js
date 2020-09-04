class Notification {
    success(){
        new Noty({
            text: 'Succesfully Done ! ',
            type: 'success',
            layout: 'topRight',
            timeout: 1000
        }).show();
    }
    alert(){
        new Noty({
            text: 'Are you sure? ',
            type: 'alert',
            layout: 'topRight',
            timeout: 1000
        }).show();
    }
    error(){
        new Noty({
            text: 'Something went to Wrong ! ',
            type: 'error',
            layout: 'topRight',
            timeout: 1000
        }).show();
    }
    warning(){
        new Noty({
            text: 'oops ! wrong',
            type: 'warning',
            layout: 'topRight',
            timeout: 1000
        }).show();
    }
    imageValidation(){
        new Noty({
            text: 'Image less then 1 MB ',
            type: 'error',
            layout: 'topRight',
            timeout: 1000
        }).show();
    }
}
export default Notification = new Notification();