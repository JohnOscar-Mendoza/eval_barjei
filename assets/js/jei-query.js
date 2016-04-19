$(function(){

	$("#expiry").change(function(){

		$("#set-expiry").trigger("submit");

	});

	$("#email").change(function(){

		$("#reset-password").trigger("submit");

	});

	function preview(input) {
		if (input.files && input.files[0]) {
			var freader = new FileReader();
			freader.onload = function (e) {
				$("#preview").show();
				$('#preview').attr('src', e.target.result);
			}
			freader.readAsDataURL(input.files[0]);
		}
	}

	function preview2(input) {
		if (input.files && input.files[0]) {
			var freader = new FileReader();
			freader.onload = function (e) {
				$("#preview2").show();
				$('#preview2').attr('src', e.target.result);
			}
			freader.readAsDataURL(input.files[0]);
		}
	}

	function preview3(input) {
		if (input.files && input.files[0]) {
			var freader = new FileReader();
			freader.onload = function (e) {
				$("#preview3").show();
				$('#preview3').attr('src', e.target.result);
			}
			freader.readAsDataURL(input.files[0]);
		}
	}

	function preview4(input) {
		if (input.files && input.files[0]) {
			var freader = new FileReader();
			freader.onload = function (e) {
				$("#preview4").show();
				$('#preview4').attr('src', e.target.result);
			}
			freader.readAsDataURL(input.files[0]);
		}
	}

	$("#img").change(function(){
		preview(this);
	});
	$("#img2").change(function(){
		preview2(this);
	});
	$("#img3").change(function(){
		preview3(this);
	});
	$("#img4").change(function(){
		preview4(this);
	});

});

	// $("#fileUpload").on('change', function () {

 //     //Get count of selected files
 //     var countFiles = $(this)[0].files.length;

 //     var imgPath = $(this)[0].value;
 //     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
 //     var image_holder = $("#image-holder");
 //     image_holder.empty();

 //     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
 //     	if (typeof (FileReader) != "undefined") {

 //             //loop for each file selected for uploaded.
 //             for (var i = 0; i < countFiles; i++) {

 //             	var reader = new FileReader();
 //             	reader.onload = function (e) {
 //             		$("<img />", {
 //             			"src": e.target.result,
 //             			"class": "thumb-image"
 //             		}).appendTo(image_holder);
 //             	}

 //             	image_holder.show();
 //             	reader.readAsDataURL($(this)[0].files[i]);
 //             }

 //         } else {
 //         	alert("This browser does not support FileReader.");
 //         }
 //     } else {
 //     	alert("Please select only images");
 //     }
 // });