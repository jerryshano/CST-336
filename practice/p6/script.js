/*global $*/

$("#discount").change(function(){
    
    
    if ($("#discount").val() != ""){
        $.ajax({
            type: "GET",
            url: "api/applyPromoCode.php",
            dataType: "json",
            data: { "code": $("#discount").val()},
            success: function(data,status) {
            //alert(data);
                $("#discount-val").text(data.discount ? data.discount + "%" : "");
                calculate();
            
            },
            });
    }
    
    calculate();
    
  });//ajax

$("#q").change(calculate);

function calculate(){
    let discount = $("#discount-val").text();
    discount = discount != "" ? parseFloat(discount.substr(0, discount.length - 1))/100 : 0;
    $("#error").text(discount == 0 ? "This code does not exist" : "");
    
    let total = parseFloat($(`#q-price`).text().substr(1));
    if ($(`#q`).val() == ""){
        return;
    }
    total *= $(`#q`).val();
    $("#q-total").text("$" + total);
    
    total -= total * discount;
    
    $("#subtotal").text("$" + total.toFixed(2));
    $("#tax").text("$" + (total/10).toFixed(2));
    
    total /= .9;
    
    $("#total").text("$"+total.toFixed(2));
}
        
$.ajax({
    type: "GET",
    url: "api/getRandomProduct.php",
    dataType: "json",
    // data: { "": },
    success: function(data,status) {
    //alert(data);
        $("#q-name").text(data.product);
        $("#q-price").text("$"+data.price);
    
    },
    complete: function(data,status) { //optional, used for debugging purposes
    //alert(status);
    }
  });//ajax
