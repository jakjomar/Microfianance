
	
	var leftdiv1 = document.getElementById("leftdiv1");
	var rightdiv = document.getElementById("rightdiv");
	var menu = document.getElementById("menu");
	var backbtn = document.getElementById("backbtn");
	var btn1 = document.getElementById("btn1");
	
	menu.onclick = function(){

		leftdiv1.style.display="flex";
		leftdiv1.style.width="70%";
		btn1.style.display="flex";
		backbtn.style.display="flex";
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(5px)";

	}
	backbtn.onclick = function(){
		leftdiv1.style.display="none";
		leftdiv1.style.width ="0";
		btn1.style.display="none";
		backbtn.style.display="none";
		rightdiv.style="all";
		rightdiv.style="all";
		rightdiv.style.filter="blur(0px)";

	}
	// for add new user//
	var add = document.getElementById("add");
	var addform = document.getElementById("addform");
	var close = document.getElementById("close");
	var leftdiv = document.getElementById("leftdiv");

	add.onclick = function(){
		addform.style.display="flex";
		
		addform.style.position="absolute";
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(2px)";
		leftdiv.style="user-select: none";
		leftdiv.style="pointer-events: none";
		leftdiv.style.filter="blur(2px)";
	}
	close.onclick = function(){
		addform.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}

	var calculate = document.getElementById("calculate");
	
		calculate.onclick = function(){
		var n5 = parseInt(document.getElementById("months").value);
		var n1 = parseInt(document.getElementById("amount").value);	
		var n7 = parseInt(document.getElementById("monthlypayment").value);
		var n6 = parseInt(document.getElementById("interest").value);	
		var interest = (n1 * (n6 * .01)) / n5;
		var payment = ((n1/n5)+ interest).toFixed(2);
		var payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g,"");
		monthlypayment.value= payment;

		var n5 = parseInt(document.getElementById("months").value);
		var n7 = parseInt(document.getElementById("monthlypayment").value);
		
		var total = n7*n5;
		totalpayment.value = total;

		ami.value = n5*n1+n6*2022;
	
	}
	
	