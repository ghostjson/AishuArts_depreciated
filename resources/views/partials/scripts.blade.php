    <!--Plugins-->
    
    <script src="{{asset('js/plugins.js')}}"></script>
    <!--Template functions-->
    <script src="{{asset('js/functions.js')}}"></script>
    {{-- Custom Scripts --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function increment_quantity(product_id) {
            var inputQuantityElement = $("#input-quantity-"+product_id);
            var newQuantity = parseInt($(inputQuantityElement).val())+1;
            if(newQuantity<=10){
                save_to_db(product_id, newQuantity);
            }
            
        }

        function decrement_quantity(product_id) {
            var inputQuantityElement = $("#input-quantity-"+product_id);
            if($(inputQuantityElement).val() > 1) 
            {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            save_to_db(product_id, newQuantity);
            }
        }
        function sortProducts(){
            var sortBy = document.getElementById("product_sorting").value;
            console.log("sorted by value:"+sortBy);
            $.ajax({
                    url : "/sortProducts",
                    data : "sort_by="+sortBy,
                    type : 'get',
                    success : function(response) {
                        //console.log(response);
                        $('#productsList').html(response);
                        $(" select option[value=" + sortBy + "]").prop("selected",true); 
                    }
                });
        }

        function save_to_db(product_id, newQuantity){
            console.log("Product ID ="+product_id+ " Quantity="+newQuantity);
                $.ajax({
                    url : "/updateCartQuantity",
                    data : "product_id="+product_id+"&new_quantity="+newQuantity,
                    type : 'post',
                    success : function(response) {
                        console.log(response);
                        $("#input-quantity-"+product_id).val(newQuantity);
                        $(".totalPriceField1-"+product_id).html("₹"+(parseInt(newQuantity)*parseFloat(response['productPrice']))+"");
                        $(".totalPriceField2").html("₹"+response['totalPrice']+"");
                        $(".totalPriceField3").html("<strong>₹"+response['totalPrice']+"</strong>");
                    }
                });
            
        }
    </script>