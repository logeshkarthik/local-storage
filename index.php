<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com ) -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JS Shopping Cart | Webdevtrick.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css'>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="row">
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">JS Shopping Cart</a></h1>
                </li>
            </ul>
        </nav>
        <div class="medium-4  columns">
            <div class="cart">
                <h1>Cart items</h1>
                <div class="row">
                    <div class="medium-6 columns">
                        <button class="tiny secondary" id="clear">Clear the cart</button>
                    </div>
                    <div class="medium-6 columns">
                        <button class="tiny disabled" title="Work in progress">Checkout</button>
                    </div>
                </div>
                <div id="cartItems">Loading cart...</div>
                Total price: <strong id="totalPrice">0 $</strong>
            </div>

        </div>
        <div class="medium-8 columns">
            <h1>Products List</h1>
            <div class="products">
                <div class="product medium-4 columns" data-name="Vivobook" data-price="50000" data-id="0">
                    <img src="https://webdevtrick.com/wp-content/uploads/vivobook.jpg" alt="" />
                    <h3>Vivobook</h3>
                    <input type="number" class="count" value="1" />
                    <button class="tiny">Add to cart</button>
                </div>
                <div class="product medium-4 columns" data-name="Surface Pro" data-price="85000" data-id="1">
                    <img src="https://webdevtrick.com/wp-content/uploads/surface.jpg" alt="" />
                    <h3>Surface Pro</h3>
                    <input type="number" class="count" value="1" />
                    <button class="tiny">Add to cart</button>
                </div>
                <div class="product medium-4 columns" data-name="Predator" data-price="250000" data-id="2">
                    <img src="https://webdevtrick.com/wp-content/uploads/predator.jpg" alt="" />
                    <h3>Predator</h3>
                    <input type="number" class="count" value="1" />
                    <button class="tiny">Add to cart</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/template" id="cartT">
        <% _.each(items, function (item) { %> 
            <div class = "panel"> 
                <!-- ITEM NAME -->
                <h3> <%= item.name %> </h3> 
                <!-- DELETE ITEM -->
            <div>delete item</div> <!--pending-->
            <!-- QUANTITY INCREMENT/DECREMENT BUTTONS -->
            <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <a href="javascript:;"
                                                                class="btn btn-light-orange px-1 sub">-</a>
                                                        </div>
                                                        <input type="text" style="width:30%;border:none;"
                                                            class="form-control count w-65 txtqty text-center"
                                                            id= "<%= item.count %>" 
                                                           
                                                            value="<%= item.count %>">
                                                        <div class="input-group-append">
                                                            <a href="javascript:;" id="<%= item.id %> "
                                                                class="btn btn-light-orange  px-1 add">add</a>
                                                        </div>
                                                    </div>
                                                    <!-- DISPLAY COUNT AND TOTAL AMOUNT BASED ON QUANTITY -->
            <span class="label">
<%= item.count %> piece<% if(item.count > 1)
{%>s
<%}%> for <%= item.total %>₹</span > </div>
<% }); %>
</script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js'></script>
    <script src="function.js"></script>

    <script>
    $(document).ready(function() {
        // $(document).on("click", ".btnadd", function() {
        //     var item_id = $(this).attr("id");
        //     $(this).parent().hide();
        //     $(this).parent().next().show();
        // });
        $(document).on("click", ".add", function() {
            var item_id = $(this).attr("id");
            // alert(typeof(item_id));
            var cart_items = JSON.parse(localStorage.getItem(cartId));
            // alert(cart_items.length);
            for (var i = 0; i < cart_items.length; i++) {
                // alert(typeof(cart_items[i].id));
                
                if (cart_items[i].id.localeCompare("1")) {
                    cart_items[i].count = $(this).prev().val();
                    alert(cart_items[i].count);
                }
            }

            // return arr[i];
            //    cart_items.forEach(element => {

            //     //    var ele_id =element.id;
            //     //    if((ele_id).equals(item_id)){
            //     //     alert(element.name);
            //     //    }
            //       alert(element.id +" " + element.name+" " + element.count+" " + element.total);
            //    });


            var qty = $(this).parent().prev().val();
            var updated_qty = parseInt(qty) + 1;
            $(this).parent().prev().val(updated_qty);
        });
        // $(".add").click(function() {
        //     alert("click");
        //     var qty = $(this).parent().prev().val();
        //     var updated_qty = parseInt(qty) + 1;
        //     $(this).parent().prev().val(updated_qty);
        // });

        $(".sub").click(function() {
            var qty = $(this).parent().next().val();
            var updated_qty = parseInt(qty) - 1;
            if (updated_qty >= 1) {
                $(this).parent().next().val(updated_qty);
            } else {
                $(this).closest(".qty-box").hide();
                $(this).closest(".qty-box").prev().show();
            }
        });
    });
    </script>
</body>

</html>