function openitem(evt, itemName) {
		    var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(itemName).style.display = "block";
			evt.currentTarget.className += " active";
		}
// Get the element with id="defaultOpen" and click on it
try{
	document.getElementById("defaultOpen").click();
}
catch{
	console.log("Hello")
}

// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
  	
    modal.style.display = "none";
  }
  else{

  }
}

var total=0,c=0;
var items=[];
var prices=[];
var qtys=[];
var itotal=[];
function cadd(id){
	c = Number(document.getElementById(id).innerHTML)

	c = c+1;
	document.getElementById(id).innerHTML = c;
}

function csub(id){
	c = Number(document.getElementById(id).innerHTML)
	if (c==0) {
		document.getElementById(id).innerHTML = 0;
	}
	else {
		c =c-1;
		document.getElementById(id).innerHTML = c;
	}
}

function addcart(id,i,u){
	var item = document.getElementById(i).innerHTML;
	var price = document.getElementById(u).innerHTML;
	var qty = c;
	var itot = c*price;

	if (c!=0) {
		document.getElementById(id).innerHTML = "&emsp;"+c+" Plates added to cart";
	}
	else if(items.includes(item)){
		var n = items.indexOf(item);
		items.splice(n, 1);
		prices.splice(n,1);
		qtys.splice(n,1);
		itotal.splice(n,1);
		document.getElementById(id).innerHTML = "&emsp;Item Removed";
	}
	else{
		document.getElementById(id).innerHTML = "&emsp;Add something to cart";
	}

	if(items.includes(item)){
		var n = items.indexOf(item);
		prices[n] = price;
		qtys[n] = qty;
		itotal[n] = itot;
	}
	else if(qty !=0){
		items.push(item);
		prices.push(price);
		qtys.push(qty);
		itotal.push(itot);
	}

	total = itotal.reduce(function(a, b){
        return a + b;
    }, 0);

	// console.log(items);
	// console.log(prices);
	// console.log(qtys);
	// console.log(itotal);
	// console.log(total);
	// var details = {
	// 	"item_name": item,
	// 	"unit_price": price,
	// 	"qty": c,
	// 	"itotal": itot
	// }
	// console.log(details)

	var text="";
	for(var i=0;i < items.length; i++){
		text += "&emsp;"+items[i]+": &emsp;"+prices[i]+" x "+qtys[i]+" : ₹"+itotal[i]+"<br>";
	}
	
	text += "ITEM TOTAL = <b>₹  "+total+"/-</b><br>";

	if(items.length !=0){
		var tax=0;
		var delivery = 0;
		if(total >= 0 && total < 500){
			tax = 0.05;
			delivery=50;
			text+="<br><b><span>ADD ITEMS WORTH ₹"+(500-total)+" OR MORE FOR <span style=\"color: red;&quot\">FREE</span> DELIVERY</span></b>";
			text += "<br><b>Tax and charges "+(tax*100)+"%:  ₹"+(tax*total)+"<br> Delivery charges: ₹"+delivery+"</b>";
		}
		else{
			tax = 0.025;
			delivery = 0;
			text += "<br><b>Tax and charges "+(tax*100)+"%:  ₹"+(tax*total)+"<br> <span style=\"color: green;&quot\">HURRAY! YOU HAVE UNLOCKED FREE DELIVERY</b></span>";
		}

		
		
		total += (tax*total)+delivery;
		text += "<p style=\"color: red;&quot\" id=\"dis\"><br><b>TO PAY = ₹  "+Math.round(total)+"/-</b></p>";
		text += "<br><a href = \"\" onclick=\"clearcart() history.go(-1)\">Remove all items from cart and back to menu</a>";
	}
	else{
		text += "<b><span style=\"color: red;&quot\">ADD SOMETHING TO YOUR CART</span></b>";
	}

	document.getElementById("disp").innerHTML = text;
	document.getElementById("msg").innerHTML = "";	

	c=0;
}

function clearcart(){
	text = "<b><span style=\"color: red;&quot\">ADD SOMETHING TO YOUR CART</span></b>"
	document.getElementById("disp").innerHTML = text;
	items=[];prices=[];qtys=[];itotal=[];
	total=0;
}

function confirmid(){
	let text1="";
	if(items.length != 0){
		let x = Math.floor((Math.random() * 10000) + 1);
		text1= "<br><b>Your order has been confirmed. Your order number is: </b><i>"+x+"</i>";
		text1 += "<br>Your order will be delivered shortly";
		document.getElementById("msg").innerHTML = text1;
	}
	else{
		document.getElementById("msg").innerHTML = "<br><b><span style=\"color: red;&quot\">ADD SOMETHING TO YOUR CART</span></b>";
	}
}

