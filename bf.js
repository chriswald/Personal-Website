// Interprets code written in BrainF***
// code is the BrainF*** to interpret.
// opts is an object containing function options.
// opts.memory is the size of the memory to make available. The
// default is 30000 * 30000.toString(2).length / 8 bytes.
// opts.stdin is a string of program input. The default is "".
// opts.id is the HTML document element ID to append the program's
// output to. If non is provided ouput is sent to the terminal. 
// opts.quiet is used to silence console output. If it is true
// nothing will be written to the console or added to the DOM
// opts.cb is a function called at the end of execution.
function BF_Interpreter(code, opts) {
	opts = opts || {};
	var mem_size = opts.memory || 30000;
	var stdin = opts.stdin || "";

	var memory = [];
	for (var j = 0; j < mem_size; j ++) memory.push(0);
	var mem_ptr = 0;
	var loop_start_indices = [];
	var stdin_ptr = 0;
	var stdout = "";

	for (var i = 0; i < code.length; i ++) {
		var tok = code[i];
		if (tok === ">")
			mem_ptr ++;
		else if (tok === "<")
			mem_ptr --;
		else if (tok === "+")
			memory[mem_ptr]++;
		else if (tok === "-")
			memory[mem_ptr]--;
		else if (tok === ".")
			stdout += String.fromCharCode(memory[mem_ptr]);
		else if (tok === ",")
			memory[mem_ptr] = stdin.charCodeAt(stdin_ptr++) || 0;
		else if (tok === "[")
			loop_start_indices.push(i);
		else if (tok === "]")
			if (memory[mem_ptr] === 0)
				loop_start_indices.pop();
			else
				i = loop_start_indices[loop_start_indices.length-1];
	}

	if (typeof opts.quiet === "undefined" || !opts.quiet) {
		if (typeof opts.id === "undefined") {
				console.log(stdout);
		}
		else {
			var div = document.createElement("div");
			div.setAttribute("class", "bfjs");
			div.appendChild(document.createTextNode(stdout));
			var id = document.getElementById(opts.id).appendChild(div);
		}
	}

	if (typeof opts.cb !== "undefined")
		opts.cb(stdout);
	else
		return stdout;
}

var Scripter = {memory: [], mem_ptr: 0, 
				in_loop: false,
				loop: "", loop_start_indices: [],
				stdin: "", stdout: "",
				stdin_ptr: 0,
				initialized: false}

function BF_Scripter(code, opts) {
	Scripter.stdout = "";
	opts = opts || {};
	if (!Scripter.initialized) {
		for (var j = 0; j < (opts.memory || 30000); j ++)
			Scripter.memory.push(0);
		Scripter.initialized = true;
	}
	Scripter.stdin += (opts.stdin || "");

	if (Scripter.loop_start_indices.length > 0) {
		var closed = 0;
		while (code.indexOf("]") !== -1) {
			var part = code.substring(0, code.indexOf("]")+1);
			code = code.substring(code.indexOf("]")+1);
			Scripter.loop += part;
			closed ++;
		}

		if (closed !== Scripter.loop_start_indices.length)
			return;
		else {
			code = Scripter.loop + code;
			Scripter.loop = "";
			Scripter.loop_start_indices = [];
		}
	}

	for (var i = 0; i < code.length; i ++) {
		var tok = code[i];
		if (tok === ">")
			Scripter.mem_ptr ++;
		else if (tok === "<")
			Scripter.mem_ptr --;
		else if (tok === "+")
			Scripter.memory[Scripter.mem_ptr]++;
		else if (tok === "-")
			Scripter.memory[Scripter.mem_ptr]--;
		else if (tok === ".")
			Scripter.stdout += String.fromCharCode(Scripter.memory[Scripter.mem_ptr]);
		else if (tok === ",")
			Scripter.memory[Scripter.mem_ptr] = Scripter.stdin.charCodeAt(Scripter.stdin_ptr++) || 0;
		else if (tok === "[") {
			Scripter.loop_start_indices.push(i);
			var depth = 1;
			var k;
			for (var k = i+1; k < code.length && depth !== 0; k ++) {
				if (code[k] === "[") {
					depth ++;
					Scripter.loop_start_indices.push(k);
				}
				if (code[k] === "]")
					depth --;
			}
			if (depth !== 0) {
				Scripter.loop = code.substring(i);
				break;
			}
		}
		else if (tok === "]")
			if (Scripter.memory[Scripter.mem_ptr] === 0)
				Scripter.loop_start_indices.pop();
			else
				i = Scripter.loop_start_indices[Scripter.loop_start_indices.length-1];
	}

	if (typeof opts.quiet === "undefined" || !opts.quiet) {
		if (typeof opts.id === "undefined") {
				console.log(Scripter.stdout);
		}
		else {
			var div = document.createElement("div");
			div.setAttribute("class", "bfjs");
			div.appendChild(document.createTextNode(Scripter.stdout));
			var id = document.getElementById(opts.id).appendChild(div);
		}
	}

	if (typeof opts.cb !== "undefined")
		opts.cb(Scripter.stdout);
	else
		return Scripter.stdout;
}