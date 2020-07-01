
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function xacNhan(msg){
    if(window.confirm(msg)){
        return true;
    };
    return false;
};

$(".custom-input-number").each(function(){
    $(this).prepend('<input type="button" class="btn btn-quantity btn-down" value="-">');
    $(this).append('<input type="button" class="btn btn-quantity btn-up" value="+">');
    var input = $(this).find(".input-quantity");
    var btnUp = $(this).find(".btn-up");
    var btnDown = $(this).find(".btn-down")
    var min = parseInt(input.attr("min"));
    var max = parseInt(input.attr("max"));
    var step = parseInt(input.attr("step")?input.attr("step"):1);
    var value = input.val()?input.val():input.val(0);

    btnUp.click(function(){
    value = parseInt(input.val());
    if(value >= max){
        value = max;
    }else{
        value += step;
    };
    input.val(value);
    });
    btnDown.click(function(){
    value = parseInt(input.val());
    if(value <= min){
        value = min;
    }else{
        value -= step;
    };
    input.val(value);
    });
});

$(document).ready(function(){
    $(".icon-remove").live("click",function(){
        var tr = $(this).closest("tr");
        var id = tr.attr("product-id");
        $.get("cart/remove-product/"+id,function(data){
            $(".totalPrice").html(formatNumber(data['totalPrice'] + " VNĐ"));
            $(".numberItems").html(data['numberItems']+" item(s)");
            $("tr[product-id|="+id+"]").remove();
            if(data['totalPrice'] == 0){
                $(".topcartopen").remove();
            };
        });
    });
});
    

$(document).ready(function(){
$(".btn-up").click(function(){
    var tr = $(this).closest("tr");
    var id = tr.attr("product-id");
    var numberProduct = tr.find(".input-quantity").val();
    $.get("cart/increase/"+id, function(data){
    if(data == false){
        return false;
    };
    $(".totalPrice").html(formatNumber(data['totalPrice'])+" VNĐ");
    $(".numberItems").html(data['numberItems']+" item(s)");
    $("tr[product-id|="+id+"] .numberProduct").html(numberProduct);
    tr.find("td.total").html(formatNumber(data['total']));
    });
});

$(".btn-down").click(function(){
    var tr = $(this).closest("tr");
    var id = tr.attr("product-id");
    var numberProduct = tr.find(".input-quantity").val();
    if(numberProduct < 1){
        tr.find(".input-quantity").val(1);
        return false;
    };
    $.get("cart/reduce/"+id, function(data){
    if(data == false){
        return false;
    };
    $(".totalPrice").html(formatNumber(data['totalPrice'])+" VNĐ");
    $(".numberItems").html(data['numberItems']+" item(s)");
    $("tr[product-id|="+id+"] .numberProduct").html(numberProduct);
    tr.find("td.total").html(formatNumber(data['total']));
    });
});

var oldNumberProduct;
$(".input-quantity").focusin(function(){
    oldNumberProduct = $(this).val();
});

$(".input-quantity").focusout(function(){
    var tr = $(this).closest("tr");
    var id = tr.attr("product-id");
    var numberProduct = $(this).val();
    if(numberProduct < 1){
    alert("Please Enter Number > 0");
    $(this).val(oldNumberProduct);
    return false;
    };
    $.get("cart/update/"+id+"/"+numberProduct,function(data){
    if(data == false){
        return false;
    };
    $(".totalPrice").html(formatNumber(data['totalPrice'])+" VNĐ");
    $(".numberItems").html(data['numberItems']+" item(s)");
    $("tr[product-id|="+id+"] .numberProduct").html(numberProduct);
    tr.find("td.total").html(formatNumber(data['total']));
    });
});

$(".remove-action").click(function(){
    var tr = $(this).closest("tr");
    var id = tr.attr("product-id");
    $.get("cart/remove-product/"+id,function(data){
    if(data == false){
        return false;
    };
    $(".totalPrice").html(formatNumber(data['totalPrice'])+" VNĐ");
    $(".numberItems").html(data['numberItems']+" item(s)");
    tr.remove();
    
    var trTopCart = $(".topcartopen tr[product-id='"+id+"']");
    trTopCart.remove();
    if(data['totalPrice'] == 0){
        $(".topcartopen").remove();
    };
    });
});
});


//Popup Button Add To Cart
$(document).ready(function(){
  $(".btn-add-to-cart").click(function(){
    var productID = $(this).attr("product-id");
    $.get("cart/add/"+productID,function(data){
      if(data == false){
        return false;
      };
      $(".headerdetails .pull-right").html(data);
      
      var popup = "<div class='wrap-all-popup'><div class='wrap-popup'><div class='popup-add-to-cart'>Add To Cart Successfully</div></div></div>";
      var elPopup = $(popup).hide();
      $("body").prepend(elPopup);
      elPopup.fadeIn("slow");
      setTimeout(function() {
        $('.wrap-all-popup').fadeOut("slow",function(){
          $('.wrap-all-popup').remove();
        });
      }, 1500);

      $(".wrap-all-popup").click(function(){
        $('.wrap-all-popup').remove();
      });
    });
  });
});
