//number of operations completed
var completed = 0;
var addScore = 0;
var mulScore = 0;
var subScore = 0;
var mixScore = 0;
//times the user tried
var count = 0;
//correct result
var result = 0;

var originalOp;
var currentOp;

function reset(){
	$score = $count = $result = 0;
	document.getElementById("completed").value = completed;
	document.getElementById("score").value = 0;
}

//randomly generate operands and calculate correct result
function generateNum(op) {
	var maxNum = document.querySelector('input[name="maxNum"]:checked').value;
	originalOp = op;
	var formName = document.getElementById("myForm").name;
	var operand1 = Math.floor((Math.random() * maxNum));
	var operand2 = Math.floor((Math.random() * maxNum));

	//randomly generate an operator for mix operation
	if (originalOp == "mix"){
	var pick = ["add", "sub", "mul"];
	var picked = pick[Math.floor(Math.random() * pick.length)];
	currentOp = picked;
	document.getElementById("operator").value = picked;
	} else {
		currentOp = originalOp;
	}

	//make sure the first operand is bigger than the second in subtraction
	if(currentOp == "-" && operand1 < operand2) {
	var temp = operand1;
	operand1 = operand2;
	operand1 = temp;
	}

	//evaluate the expression
	var opSymbol;
	switch(currentOp){
	case "add":
	opSymbol = '+';
	result = parseInt(operand1) + parseInt(operand2);
	break;
	case "sub":
	opSymbol = '-';
	result = parseInt(operand1) - parseInt(operand2);
	break;
	case "mul":
	opSymbol = '*';
	result = parseInt(operand1) * parseInt(operand2);
	break;
	default:
	result = 0;
	}

	if (op == 'mix') {
		document.getElementById("operator").value = opSymbol;
	}
	document.getElementById("operand1").value = operand1;
	document.getElementById("operand2").value = operand2;

	//change the background color, so the user is more clear that operands change.
	var colors = ["Blue", "Brown", "Red", "Orange", "Cyan", "Green", "Maroon", "Magenta"];
	document.body.style.backgroundColor=colors[Math.floor(Math.random() * colors.length)];
}

//check user's result
function check() {
	if (currentOp == undefined) {
		alert("Generate numbers first!");
		return;
	}
	++count;   // increment number of tries
	// var formName = document.getElementById("myForm").name;
	var myInput = document.getElementById("calculation").value;
	var isCorrect = (result == myInput);
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","updateStats.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("op=" + currentOp + "&correct=" + isCorrect);

	switch(currentOp){
	case "add":
	addScore = display(addScore, myInput);
	document.getElementById("score").value = addScore;
	break;

	case "sub":
	subScore = display(subScore, myInput);
	document.getElementById("score").value = subScore;
	break;

	case "mul":
	mulScore = display(mulScore, myInput);
	document.getElementById("score").value = mulScore;
	break;

	case "mix":
	mixScore = display(mixScore, myInput);
	document.getElementById("score").value = mixScore;
	break;
	}
	document.getElementById("completed").value = completed;
}

function display(tempScore, input) {
    if(result == input){
		alert("congratulations! This is the "+ count +" time you try! Now you will get new operands.");
		++completed;
		++tempScore;
		count = 0;
		document.getElementById("count").value = count;
		generateNum(originalOp);
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
		generateNum(originalOp);
	}
	return tempScore;
}
