function toggle5(showHideDiv, switchImgTag) {
	var ele = document.getElementById(showHideDiv);
	var imageEle = document.getElementById(switchImgTag);
	if(ele.style.display == "block") {
			ele.style.display = "none";
			imageEle.innerHTML = '&#9660;';
	}
	else {
			ele.style.display = "block";
			imageEle.innerHTML = '&#9650;';
	}
}
