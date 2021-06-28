var profile_picture = document.getElementById('profile_picture');
profile_picture.onchange = function() {
    if(this.files[0].size > 2621440){
        alert('File is too big!');
        this.value = "";
    }
}

$("#profile_picture").change(function() {
  readURL(this);
});

function readURL(input) {
  if (input.files[0]) {
    var reader = new FileReader();
	var image64 = reader.readAsDataURL(input.files[0]);
    reader.onload = function(event) {
	    changeBackground(event.target.result);
	};
  }
}

function changeBackground(image) {
	$("#profile_picture_label").css('background-image', 'url("'+image+'")');
}

function submitForm(){
	if(profile_picture.files.length == 0){
        Swal.fire({
            title: 'Not Allowed!',
            text: "Please select a new profile picture first!",
            type: 'warning',
            confirmButtonColor: '#EE2A7B',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
        })
	}else{
        Swal.fire({
            title: 'Change profile picture',
            text: "Are you sure you want to upload a new profile picture?",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#EE2A7B',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                $('#profile_picture_form').submit();
            }
        })
	}
}