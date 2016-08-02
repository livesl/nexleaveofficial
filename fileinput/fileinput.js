
var URL = window.URL;

function imageinput(num, section, width, height) {
    var file = "#file" + num;
    var filetxt = "#filetxt" + num;
    var fileimage = "#fileimg" + num;
    var filelabel = "#filelbl" + num;



    if (section === "brow") {

        $(file).click();

        $(file).change(function (e) {
            var fileName = e.target.files[0].name;
            $(filetxt).val(fileName);
            var tmppath = URL.createObjectURL(e.target.files[0]);
            $(fileimage).fadeIn("fast").attr('src', tmppath);
        });

//                    $(file).change(function (event) {
//                        var tmppath = URL.createObjectURL(event.target.files[0]);
//                        $(fileimage).fadeIn("fast").attr('src', tmppath);
//
//                    });

//                    alert("inside");

        $(fileimage).load(function () { // image size check
            var myImg = document.querySelector(fileimage);
            var realWidth = myImg.naturalWidth;
            var realHeight = myImg.naturalHeight;

          
            
//            if (width !== realWidth && ){
//                
//                  alert(width+"  --   "+realWidth);
//            }
            
           
            if (width !== realWidth || height !== realHeight) { 
                clearImage(file, filetxt, fileimage);
                $(filelabel).text("Incorrect Image Width & Height");
            } else {
                $(filelabel).text("");
            }

        });


    } else if (section === "clr") {
        clearImage(file, filetxt, fileimage);
        $(filelabel).text("");
    }

}

function imageinputImageNormal(num, section) {
    var file = "#file" + num;
    var filetxt = "#filetxt" + num;
    var fileimage = "#fileimg" + num;
    var filelabel = "#filelbl" + num;

    if (section === "brow") {

        $(file).click();

        $(file).change(function (e) {
            var fileName = e.target.files[0].name;
            $(filetxt).val(fileName);
            var tmppath = URL.createObjectURL(e.target.files[0]);
            $(fileimage).fadeIn("fast").attr('src', tmppath);
        });


//        $(fileimage).load(function () { // image size check
//            var myImg = document.querySelector(fileimage);
//            var realWidth = myImg.naturalWidth;
//            var realHeight = myImg.naturalHeight;
//
//            if (300 !== realWidth && 400 !== realHeight) {
//                clearImage(file, filetxt, fileimage);
//                $(filelabel).text("Incorrect Image Width & Height");
//            } else {
//                $(filelabel).text("");
//            }
//
//        });


    } else if (section === "clr") {
        clearImage(file, filetxt, fileimage);
        $(filelabel).text("");
    }

}


function clearImage(file, filetxt, fileimage, filelabel) {
    $(file).val("");
    $(filetxt).val("");
    $(fileimage).attr('src', '');
    $(fileimage).css("display", "none");
}

