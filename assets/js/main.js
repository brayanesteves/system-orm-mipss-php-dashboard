function remove(url) {
    $.confirm({
        title: 'Do you want to remove this record?',
        content: 'You will not visualize it',
        buttons: {
            confirm: {
                btnClass: 'btn-blue',
                action: function () {
                    
                    window.location.href = url;
                },
            },
            cancel: {
                btnClass: 'btn-red',
                action: function () {
                    $.alert('Canceled!');
                }, 
            }
        }
    });
}