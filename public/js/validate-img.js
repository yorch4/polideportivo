document.getElementById("img").onchange = function () {
        if(this.files[0].type.indexOf("image")==-1){
            $('#error').css("display", "block");
            $('#img').wrap('<form>').closest('form').get(0).reset();
            $('#img').unwrap();
            return false;
        } else {
            $('#error').css("display", "none");
        }
    }
