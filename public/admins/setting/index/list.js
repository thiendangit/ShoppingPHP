function action_Delete(event){
    event.preventDefault()
    let urlId = $(this).data('url');
    let that = $(this)
    Swal.fire({
        title: 'Do you want to delete this setting?',
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Yes! Delete it`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type : 'GET',
                url : urlId ,
                success : function (data) {
                    if(data.message === 'success'){
                        Swal.fire('Delete!', '', 'success');
                        that.parent().parent().remove()
                    }else {
                        Swal.fire('Something went wrong', '', 'info')
                    }
                },
                error: function () {

                }
            })
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

$(function () {
    $(document).on('click','.action_delete', action_Delete);
})
