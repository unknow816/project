// $(document).ready(function() {
// 	var input = $(".cart_quantity_input").attr('value');;
// 	console.log(input);
// });
var x = document.forms['form']['num'].value;

function increase(n){
	n = parseInt(n);
	x = parseInt(x);
	x = x + n;
	return document.forms['form']['num'].setAttribute("value", x);
}

function decrease(n){
	n = parseInt(n);
	x = parseInt(x);
	x = x - n;
	if(x < 0){
		x = 0;
	}
	return document.forms['form']['num'].setAttribute("value", x);
}
