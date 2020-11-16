function actionDelete(event){
    event.preventDefault()
    let urlId = $(this).data('url');
    let that = $(this)
    console.log({urlId})
    Swal.fire({
        title: 'Do you want to save the changes?',
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Yes! Delete it`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        console.log({result})
        if (result.isConfirmed) {
            $.ajax({
                type : 'GET',
                url : urlId,
                success : function (data) {
                    if(data.message === 'success'){
                        Swal.fire('Delete!', '', 'success')
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
    $(document).on('click','.action_delete', actionDelete);
})
