<?php
//number of operations completed
$completed = 0;
$addScore = 0;
$mulScore = 0;
$subScore = 0;
$mixScore = 0;
//times the user tried 
$count = 0;
//correct result
$result = 0;

function reset(){
	$score = $count = $result = 0;
	document.getElementById("completed").value = completed; 
	document.getElementById("score").value = 0; 
}

//randomly generate operands and calculate correct result
function generateNum() {
	
	var maxNum = document.querySelector('input[name="maxNum"]:checked').value;
	var operator = document.getElementById("operator").value
	var formName = document.getElementById("myForm").name;
	var operand1 = Math.floor((Math.random() * maxNum)); 
	var operand2 = Math.floor((Math.random() * maxNum)); 
	
	//randomly generate an operator for mix operation
	if(formName == "mix"){
	var pick = ["+", "-", "*"];
	var picked = pick[Math.floor(Math.random() * pick.length)];
	operator = picked;
	document.getElementById("operator").value = picked;
	}
	
	//make sure the first operand is bigger than the second in subtraction
	if(operator == "-" && operand1 < operand2) {
	var temp = operand1;
	operand1 = operand2;
	operand1 = temp;
	}

	//evaluate the expression
	switch(operator){
	case "+":
	result = parseInt(operand1) + parseInt(operand2); 
	break;
	case "-":
	result = parseInt(operand1) - parseInt(operand2); 
	break;
	case "*":
	result = parseInt(operand1) * parseInt(operand2); 
	break;
	default:
	result = 0;
	}
	
	document.getElementById("operand1").value = operand1; 
	document.getElementById("operand2").value = operand2;
	
	//change the background color, so the user is more clear that operands change.
	var colors = ["Blue", "Brown", "Red", "Orange", "Cyan", "Green", "Maroon", "Magenta"];
	document.body.style.backgroundColor=colors[Math.floor(Math.random() * colors.length)];
}

//check user's result
function check() {
	++count;   // incrtement number of tries
	var formName = document.getElementById("myForm").name;
	switch(formName){
	case "add":
	addScore = display(addScore);
	document.getElementById("score").value = addScore;
	break;
	
	case "sub":
	subScore = display(subScore);
	document.getElementById("score").value = subScore;
	break;
	
	case "mul":
	mulScore = display(mulScore);
	document.getElementById("score").value = mulScore;
	break;
	
	case "mix":
	mixScore = display(mixScore);
	document.getElementById("score").value = mixScore;
	break;
	}
	document.getElementById("completed").value = completed; 
	}
	
	function display(tempScore){
	var myInput = document.getElementById("calculation").value;
    if(result == myInput){
		alert("congratulations! This is the "+ count +" time you try! Now you will get new operands.");
		++completed;
		++tempScore;
		count = 0;
		document.getElementById("count").value = count;
		generateNum();
	}
	else if (count < 3){
		alert("Error! This is the "+count+" time you try!");
		document.getElementById("count").value = count;
		}
	else{
		alert("You have tried 3 times, the right answer is: " + result+". Now you will get new operands.");
		++completed; 
		count = 0;
		document.getElementById("count").value = count;
		generateNum();
	}
	return tempScore;
}
?>
