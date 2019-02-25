/*global $*/

$("#q1,#q2,#q3,#shipping-select").change(function(){
    let total = 0;
    for (let i=1; i <=3; i++){
        let price = parseFloat($(`#q${i}-price`).text().substr(1));
        if ($(`#q${i}`).val() == ""){
            continue;
        }
        price *= $(`#q${i}`).val();
        total += price;
        $(`#q${i}-total`).text("$"+price.toFixed(2));
    }
    
    let shipping = $("#shipping-select").val();
    if (shipping != "0"){
        $("#error").text("");
        shipping = parseInt(shipping);
        $("#shipping").text("$"+shipping.toFixed(2));
        total += shipping;
    }
    
    $("#subtotal").text("$" + total.toFixed(2));
    $("#tax").text("$" + (total/10).toFixed(2));
    
    total /= .9;
    
    $("#total").text("$"+total.toFixed(2));
    
    
    
    
    });
    
$("#confirm").click(function(){
    let shipping = $("#shipping-select").val();
    if (shipping == "0"){
        $("#error").text("you must select a shipping method!");
        return;
    }
    
    if (!$("#accept").is(":checked")){
        $("#accept-text").css("color","red");
        return;
    }
    $("#accept-text").css("color","black");
    
    $("#response").text("Thank you for your purchase!");
    })