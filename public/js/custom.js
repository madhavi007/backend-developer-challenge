$(document).ready(function () {

    $(document).on("click", ".remove-quote", function (e) {
        e.preventDefault();
        var self = $(this);
        var id = self.data('id');
        $.ajax({
            url: "/quotes/" + id + "/delete",
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: id,
            },
            success: function (data) {
                if (data.status == false && data.message == "Quote not found") {
                    alert('error')
                }
                if (data.status == true && data.message == "Quote deleted successfully") {
                    location.reload();
                }
            }
        });

    });

});
