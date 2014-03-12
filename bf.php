<html>
	<head>
		<script src="bf.js"></script>
		<title>bf.js</title>
	</head>
	<body id="body">
		<h1>BrainF*** Interpreter/Scripting Engine</h1>
		<textarea id="code" placeholder="BrainF*** code" cols="50" rows="10"><?php 
		if($_GET["w"] == "John")
			echo "++++++++++[>+++++++>++++++++++>+++++++++++>+++>+<<<<<-]>++.>---.>++..+++++++++.>++.<<<------.>++++++++.>-------.++.<-.----.---.>+++++.>.<<<++++++++.>>----------.<+++++++.>-.>+.>.";
		else
			echo "++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.";
		?></textarea>
		<textarea id="stdin" placeholder="Standard Input" cols="50" rows="10"></textarea>
		<br/>
		<button type="button" onclick="BF_Interpreter(document.getElementById('code').value, {id: 'body', stdin: document.getElementById('stdin').value})">Submit to interpreter</button>
		<button type="button" onclick="BF_Scripter(document.getElementById('code').value, {id: 'body', stdin: document.getElementById('stdin').value})">Submit to scripter</button>
		<button type="button" onclick="resetScripter()">Reset Script Environment</button>
		<h2>Output</h2>
	</body>
</html>