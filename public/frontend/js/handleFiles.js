$("#up-img-decor").click(function(){
    // alert('test')
    $('#upload-foto-input').trigger("click");
});
// displaying image thumbnails
window.URL = window.URL || window.webkitURL;

const fileSelect = document.getElementById("custom-choose-file"),
    fileList = document.getElementById("upload-img-rack");


function handleFiles(files) {
    if (!files.length) {
        fileList.innerHTML = "<p>No files selected!</p>";
    } else {
        console.log(window.URL)
        const loopRun = files.length;
        for (let i = 0; i < loopRun; i++) {
            let li = document.createElement("li");
            fileList.appendChild(li);


            const img = document.createElement("img");
            img.src = window.URL.createObjectURL(files[i]);
            img.onload = function() {
                window.URL.revokeObjectURL(this.src);
            }
            //li.appendChild(img);
            const info = document.createElement("div");
            info.innerHTML = `<span class="info-image-name">` + files[i].name + `</span><p>`+ (files[i].size/1048576).toFixed(2) + " MB";
            //li.appendChild(info);
            const imgBox=document.createElement("div")
            imgBox.setAttribute("class","img-Box");
            imgBox.append(img)
            imgBox.append(info)

            li.append(imgBox)

            const removeBtn=document.createElement("button")
            removeBtn.setAttribute('class','remove-btn')
            removeBtn.innerHTML=`<i class="far fa-times-circle"></i>`
            li.appendChild(removeBtn)

            $(".remove-btn").on('click',function(e){
                e.preventDefault()
                //alert("hhello")
                console.log("deleted")
                $(this).parent().fadeOut(
                    300, function() { $(this).remove(); }
                );
            })
        }
    }
}


// for edit ad system-single input

function handleFileEdit(files) {
    if (!files.length) {
        fileList.innerHTML = " ";
    } else {
        let li = document.createElement("li");
        fileList.appendChild(li);
        const img = document.createElement("img");
        img.src = window.URL.createObjectURL(files[0]);
        //img.height = 60;
        img.onload = function() {
            window.URL.revokeObjectURL(this.src);
            li.appendChild(img);
            // img.append()
            console.log($(this).parent().append(`<a href="">X</a>`))
            console.log( $(this).parent().find('a').addClass('img-del'))
            $('a.img-del').click(function(e){
                e.preventDefault()
                //alert("hu")
                $(this).parent().fadeOut();
                $(this).parent().remove();
            })
        }
    }
}
$('.remove-btn').click(function(){
    console.log("deleted")
    $(this).parents().find('li').fadeOut();
})


