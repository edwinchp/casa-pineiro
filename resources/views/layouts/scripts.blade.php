<!-- Bootstrap core JavaScript-->
<script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{URL::to('js/sb-admin-2.min.js')}}"></script>
<script type="text/javascript">
    $('body').on('keyup', '#search-products', function(){
        var searchRequest = $(this).val();
        $.ajax({
            method: 'POST',
            url: '{{route("search.products")}}',
            dataType: 'json',
            data: {
                '_token': '{{csrf_token()}}',
                searchRequest: searchRequest
            },
            success: function(response){
                console.log(response);
                var tableRow = '';
                $('#product-rows').html('');
                $.each(response, function(index, value){
                    tableRow = value.name;
                    $('#product-rows').append(tableRow);
                });
            }
        });

    });

</script>