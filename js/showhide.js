function showhide(String id) {
    var x = document.getElementById(id);
    if (x.style.display === "none") {
        show();
    } else {
        hide();
    }
}

function show(){
	x.style.display = "block";
}

function hide(){
	x.style.display = "none";
}