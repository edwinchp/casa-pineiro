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
                        "<td><strong>$" + product.cp_price + "</strong>  (" + product.qty + ")</td>" +
                        "<td><strong>$" + product.te_price + "</strong>  (" + product.qty + ")</td>" +
                        "<td><img src='images/products/" + product.picture + "' width='50px'></td>" +
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

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{URL::to('https://code.jquery.com/jquery-3.6.0.min.js')}}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(window).on('load', function () {
    $('.loading').fadeOut(2000);
  });
</script>

<!-- From Custom Template-->
<!-- <script type="text/javascript" src="{{asset('custom-template/assets/pages/dashboard/custom-dashboard.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('custom-template/assets/js/script.js')}}"></script> -->
<!-- <script type="text/javascript " src="{{asset('custom-template/assets/js/SmoothScroll.js')}}"></script>
 --><!-- <script src="{{asset('custom-template/assets/js/pcoded.min.js')}}"></script> -->
<!-- <script src="{{asset('custom-template/assets/js/demo-12.js')}}"></script>
 --><!-- <script src="{{asset('custom-template/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script> -->
<!-- <script src="{{asset('custom-template/assets/pages/chart/morris/morris-custom-chart.js')}}"></script> -->
<!-- <script src="{{asset('custom-template/assets/js/raphael/raphael.min.js')}}"></script>
<script src="{{asset('custom-template/assets/js/morris.js/morris.js')}}"></script> -->