<html>
	<head>
		<script src="bf.js"></script>
		<title>bf.js</title>
		<script type="text/javascript">
		function callback(output) {
			var ta = document.getElementById("stdout");
			ta.value += output + "\n";
			ta.scrollTop = ta.scrollHeight;
		}
		</script>
	</head>
	<body id="body">
		<h1>BrainF*** Interpreter/Scripting Engine</h1>
		<textarea id="code" placeholder="BrainF*** code" cols="50" rows="10"><?php 
		if($_GET["w"] == "John")
			echo "++++++++++[>+++++++>++++++++++>+++++++++++>+++>+<<<<<-]>++.>---.>++..+++++++++.>++.<<<------.>++++++++.>-------.++.<-.----.---.>+++++.>.<<<++++++++.>>----------.<+++++++.>-.>+.>.";
		else if ($_GET["w"] == "Dario")
			echo "++++++++++[>+++++++>++++++++++>+++++++++++>+++>+<<<<<-]>++.>---.>++..+++++++++.>++.<<<------.>++++++++.>-------.++.<-.----.---.>+++++.>.<<<++.>.>-------.<++++++++.++++++.>>+.>.";
		else
			echo "++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.";
		?></textarea>
		<textarea id="stdin" placeholder="Standard Input" cols="50" rows="10"></textarea>
		<br/>
		<button type="button" onclick="BF_Interpreter(document.getElementById('code').value, {cb: callback, stdin: document.getElementById('stdin').value, quiet:true})">Submit to interpreter</button>
		<button type="button" onclick="BF_Scripter(document.getElementById('code').value, {cb: callback, stdin: document.getElementById('stdin').value, quiet:true})">Submit to scripter</button>
		<button type="button" onclick="resetScripter()">Reset Script Environment</button>
		<h2>Output</h2>
		<textarea id="stdout" cols="50" rows="20"></textarea>
	</body>
</html>