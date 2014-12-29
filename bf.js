// Interprets code written in BrainF***
// code is the BrainF*** to interpret.
// opts is an object containing function options.
// opts.memory is the size of the memory to make available. The
// default is 30000 words.
// opts.stdin is a string of program input. The default is "". 
// opts.quiet is used to silence console output. If it is true
// nothing will be written to the console.
// opts.cb is a function called at the end of execution.
function BF_Interpreter(code, opts) {
	var state = Scripter;
	resetScripter();
	BF_Scripter(code, opts);
	Scripter = state;
}

resetScripter();

function BF_Scripter(code, opts) {
	Scripter.stdout = "";
	opts = opts || {};
	opts.quiet = opts.quiet || false;
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

	if (!opts.quiet) {
		console.log(Scripter.stdout);
	}

	if (typeof opts.cb !== "undefined")
		opts.cb(Scripter.stdout);
	else
		return Scripter.stdout;
}

function resetScripter() {
	window["Scripter"] = {memory: [], mem_ptr: 0, 
				in_loop: false,
				loop: "", loop_start_indices: [],
				stdin: "", stdout: "",
				stdin_ptr: 0,
				initialized: false}
}
