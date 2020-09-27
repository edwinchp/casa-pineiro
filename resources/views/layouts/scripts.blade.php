<!-- Bootstrap core JavaScript-->
<script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{URL::to('js/sb-admin-2.min.js')}}"></script>
<script type="text/javascript">
    $('body').on('keyup', '#search-products', function() {
        var searchRequest = $(this).val();
        $.ajax({
            method: 'POST',
            url: '{{route("search.products")}}',
            dataType: 'json',
            data: {
                '_token': '{{csrf_token()}}',
                searchRequest: searchRequest
            },
            success: function(response) {
                console.log(response);
                var tableRow = '';
                $('#product-rows').html('');
                $.each(response, function(index, product) {
                    tableRow =
                        "<tr>" +
                        "<td>" + product.name + "</td>" +
                        "<td><strong>$" + product.cp_price + "</strong>  (" + product.cp_qty + ")</td>" +
                        "<td><strong>$" + product.te_price + "</strong>  (" + product.te_qty + ")</td>" +
                        "<td><img src='" + product.picture_1 + "' width='50px'></td>" +
                        "<td>" +
                        "<a class='btn btn-success' href='/products/" + product.id + "/edit'> <i class='far fa-edit'></i></a>" +
                        "<a class='btn btn-success'><i class='fas fa-cart-plus'></i></a>"
                    "</td>"
                    "</tr>";
                    $('#product-rows').append(tableRow);
                });
            }
        });

    });
</script>