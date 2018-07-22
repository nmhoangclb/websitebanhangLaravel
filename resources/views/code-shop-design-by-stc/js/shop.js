function setbuy(i){
    var x = $('#countbuy');
    var value = Number(x.val());
    x.val((value+i < 1) ? 1 : value+i);
}

function setbuycart(id,i){
    var x = $('#countbuy'+id);
    var value = Number(x.val());
    value = (value+i < 1) ? 1 : value+i;
    x.val(value);
    var s = JSON.parse(sessionStorage.getItem(id));
    i = value-s[2];
    s[2] += i;
	sessionStorage.setItem(id, JSON.stringify(s));
	sessionStorage.count -= -i;
	sessionStorage.total -= -i*s[3];
	$("#count-in-cart").html(sessionStorage.count);
    $("#total"+id).html((s[2]*s[3]).toLocaleString('fr') + " VNĐ");
    $("#total").html(Number(sessionStorage.total).toLocaleString('fr') + " VNĐ");
}

$(window).on('load resize', function () {
	var width = $(".list-product").width();
	$(".card").css("width", 209 + y/x);
	var x = Math.floor(width/210);
	var y = width - 210*x - x *5;
	$(".card").css("width", 210 + y/x);
});

$(window).on("load", function() {
	if(sessionStorage.count > 0)
    	$("#count-in-cart").html(Number(sessionStorage.count));
    else{ 
    	sessionStorage.count = 0;
    }
});

function flyToElement(flyer, flyingTo) {
	$('html, body').animate({
        'scrollTop' : $(flyingTo).position().top - 20
    });
    var $func = $(this);
    var divider = 3;
    var flyerClone = $(flyer).clone();
    $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
    $('body').append($(flyerClone));
    var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
    var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;
     
    $(flyerClone).animate({
        opacity: 0.4,
        left: gotoX,
        top: gotoY,
        width: $(flyer).width()/divider,
        height: $(flyer).height()/divider
    }, 700,
    function () {
        $(flyingTo).fadeOut('fast', function () {
            $(flyingTo).fadeIn('fast', function () {
                $(flyerClone).fadeOut('fast', function () {
                    $(flyerClone).remove();
                });
            });
        });
    });
}

function addBuy(element, id, name, img, amount, price){
    var itemImg = $(element.parentNode.parentNode.parentNode).find('img').eq(0);
    storedToCard(itemImg, id, name, img, amount, price);
}

function storedToCard(element, id, name, img, amount, price){
    sessionStorage.count = Number(sessionStorage.count) + amount;
    flyToElement($(element), $('.cart_anchor'));
	var s = JSON.parse(sessionStorage.getItem(id));
	if(s){
		s[2] += amount;
		sessionStorage.setItem(id, JSON.stringify(s));
	} else {
		sessionStorage.setItem(id, JSON.stringify([name, img, amount, price]));
	}
	$("#count-in-cart").html(Number(sessionStorage.count));
}

function showListBuy(){
	var table = $("#table-cart > tbody");
	var total = 0;
	table.html("");
	for(var i = 0; i < sessionStorage.length; i++){
		var id = sessionStorage.key(i);
		if(!isNaN(+id)){
			var info = JSON.parse(sessionStorage.getItem(id));
			total += info[2]*info[3];
			var s = `<tr>
						<td><img style="height: 50px;" src="${info[1]}"> ${info[0]}</td>
						<td>
							<div class="form-row">
								<div class="form-group col-xs-1">
							        <button type="button" class="btn btn-secondary" onclick="setbuycart(${id},-1);">
							        	<i class="fa fa-minus"></i>
							        </button>
							    </div>
							    <div class="form-group col-md-2">
							    	<input style="vertical-align: middle; display: inline-block;" type="number" class="form-control" id="countbuy${id}" min="1" value="${info[2]}" onKeyUp="setbuycart(${id},0);">
							    </div>
							    <div class="form-group col-xs-1">
							        <button type="button" class="btn btn-secondary" onclick="setbuycart(${id},1);">
							        	<i class="fa fa-plus"></i>
							        </button>
							    </div>
							</div>
						</td>
						<td>${info[3].toLocaleString('fr')} VNĐ</td>
						<td id="total${id}">${(info[2]*info[3]).toLocaleString('fr')} VNĐ</td>
						<td style="width: 10px;">
							<i class="fa fa-trash" style="cursor: pointer;" onclick="removeProduct(${id});"></i>
						</td>
				     </tr>`;
			table.append(s);
		}
	}
	$("#total").html(total.toLocaleString('fr') + " VNĐ");
	sessionStorage.total = total;
}

function removeProduct(id){
	var s = JSON.parse(sessionStorage.getItem(id));
	sessionStorage.count -= s[2];
	$("#count-in-cart").html(sessionStorage.count > 0 ? sessionStorage.count : "");
	sessionStorage.removeItem(id);
	showListBuy();
}

function setOrder(){
	var A = new Array();
	for(var i = 0; i < sessionStorage.length; i++){
		var id = sessionStorage.key(i);
		if(!isNaN(+id)){
			var info = JSON.parse(sessionStorage.getItem(id));
			A.push(new Array(+id,+info[2]));
		}
	}
	sessionStorage.clear();
	alert("test");
	$("#order").val(JSON.stringify(A));
}