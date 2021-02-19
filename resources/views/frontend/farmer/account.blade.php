@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}">
@endsection
@section('content')
    <!-- dashboard wrapper------------------------- -->
    <div class="bg-light-wrapper">
        <div class="db-wrapper">
            <!-- Sidebar -->
            @include('frontend.dashboardincludes.farmersidebar')
            <div id="db-content">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                @include('frontend.dashboardincludes.accountform')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/addressAjax.js')}}"></script>
    <script>
        AOS.init({
            once:true,
        });


        $('#acc-edit').hide()
        $('#edit-acc-btn').click(function(){
            $('#acc-preview').hide()
            $('#acc-edit').fadeIn()
        })


        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')




            });

        });

        //  to select dp
        $("#up-img-decor").click(function(){
            $('#upload-foto-input').trigger("click")
        })

        //displaying image thumbnails

        window.URL = window.URL || window.webkitURL;

        const fileSelect = document.getElementById("custom-choose-file"),
            fileList = document.getElementById("upload-img-rack");


        function handleFiles(files) {
            if (!files.length) {
                fileList.innerHTML = "<p>No files selected!</p>";
            } else {

// fileList.appendChild(list);
                for (let i = 0; i < 10; i++) {
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



    </script>
    <!-- scripts end -->
@endsection
