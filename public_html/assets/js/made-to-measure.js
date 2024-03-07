const previewContainer = document.querySelectorAll("#preview-container");

function Base64ToImg(src, callback) {
	var img = new Image();
  	img.onload = function() {
    	callback(img);
  	};
  	img.src = src;
  	return img;
}

previewContainer.forEach(function(container) {
    container.addEventListener("click", function() {
        const chooseFile  = container.getElementsByTagName("input")[0];
        chooseFile.addEventListener("change", function() {
			const files = chooseFile.files[0];
			if(files) {
				const fileReader = new FileReader();
				fileReader.readAsDataURL(files);
				fileReader.addEventListener("load", function() {
					Base64ToImg(fileReader.result, function(img) {
						if(img.width <= img.height) {
							document.getElementById("invalid-msg").style = "display: none";
							container.getElementsByTagName("img")[0].src = fileReader.result;
							container.getElementsByTagName("input")[1].value = fileReader.result;
							container.getElementsByTagName("img")[0].style = "display: block";
							container.getElementsByTagName("div")[1].style = "display: none";

						} else {
							document.getElementById("invalid-msg").style = "display: block";
							container.getElementsByTagName("img")[0].style = "display: none";
							container.getElementsByTagName("img")[0].src = "";
							container.getElementsByTagName("input")[1].value = "";
							container.getElementsByTagName("div")[1].style = "display: block";
						}
							
					});
				});
			}
		});
		chooseFile.click();
    });
})

const verifyCheckBox = document.getElementById("verify-checkbox");
verifyCheckBox.addEventListener("click", function() {
	if(verifyCheckBox.checked) {
		document.getElementById("place-order-button").classList.remove("disabled");
	} else {
		document.getElementById("place-order-button").classList.add("disabled");
	}
})
