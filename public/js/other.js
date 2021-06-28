function LoadingBlockUI() {
    $.blockUI({
        css: {
            border: 'none',
            padding: '5px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff',
            'font-size': '5px',
            left: '45%',
            width: '15%'
        }
    });
}

function LoadingUnblockUI() {
    $.unblockUI()
}