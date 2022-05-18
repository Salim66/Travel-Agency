(function($){
    $(document).ready(function () {


        // Delete Script
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            let link = $(this).attr('href');

            Swal.fire({
            title: 'Are you sure?',
            text: "Delete this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })

        });


        // Category Image Preview
        $('#categroy_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.category_image_preview').attr('src', imageURL);
        });

        // Banner Image Preview
        $('#banner_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.banner_image_preview').attr('src', imageURL);
        });

        // Package Image Preview
        $('#package_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.package_image_preview').attr('src', imageURL);
        });

        // Destination Image Preview
        $('#destination_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.destination_image_preview').attr('src', imageURL);
        });

        // Travel Gallery Image Preview
        $('#travel_gallery_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.travel_gallery_image_preview').attr('src', imageURL);
        });


    });
})(jQuery);
