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
                        <!-- <i class="fas fa-arrow-left d-none"></i> -->
                    </button>
                </div>
                <!-- dashboard cards -->
                <div class="db-body">
                    <h1>Products</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $count=1;?>
                                @foreach($myproducts as $product)
                                <div class="form-card">
                                    <div class="dbproducts">
                                        <div class="dbproducts-card">
                                            <div class="product">
                                                <img src="{{$product->getFeatureImage('small')}}" alt="">
                                                {{$product->name}}
                                            </div>
                                            <div class="price">Rs.{{$product->price}} / {{$product->measure_unit}}</div>
                                            <div class="actions">
                                                <label class="switch">
                                                    <input type="checkbox" {{$product->is_available==1 ?'checked': ''}}>
                                                    <span class="slider round"></span>
                                                </label>
                                                <button class="btn btn-light" data-toggle="collapse" href="#productformcollapse{{$count}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="far fa-edit mr-2"></i>
                                                    Edit
                                                </button>
                                                <a href="" id="deleteProduct" data-toggle="modal" data-value="{{$product->id}}" data-target="#deleteModal" class="btn btn-outline-danger">
                                                    Delete
                                                </a>
                                            </div>

                                        </div>
                                        <form id="productformcollapse{{$count}}" class="row product-edit-collapsible collapse" method="post" action="{{route('myproduct.update',$product->id)}}" enctype="multipart/form-data">
                                            {{method_field('PUT')}}
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Change Product Image</label>
                                                    <input id="upload-foto-input" type="file" name="image" class="custom-file-input" onchange="handleFiles(this.files)" accept="image/*">
                                                    <div class="upload-decor" id="up-img-decor">
                                                        <img src="{{URL::asset('frontend/img/icons/img_up.png')}}" alt="">
                                                        <p>We prefer square shaped image</p>
                                                        <a href="#" class="btn btn-primary">Browse</a>
                                                    </div>
                                                    <ul id="upload-img-rack">

                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text" class="form-control" name="name" id="" value="{{$product->name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Minimum Order</label>
                                                    <input type="number" placeholder="Minimum Order" class="form-control" name="minimum_quantity" id="">
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Price per Unit</label>
                                                    <input type="number" placeholder="price per unit" name="price" id="" value="{{$product->price}}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Unit</label>
                                                    <div class="input-group">
                                                        <select class="custom-select" id="unitSelect" name="measure_unit" required>
                                                            @foreach(measureUnit() as $key=>$value)
                                                                <option value="{{$value}}" @if($product->measure_unit == $value) selected="selected" @endif>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center mt-4">
                                                <button class="btn btn-primary" data-toggle="collapse" href="#productformcollapse1" role="button" aria-expanded="false" aria-controls="collapseExample">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    <?php $count++; ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    delete model--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        <i class="fa fa-trash"></i> Are you sure you want to Delete this Product?
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times; </button>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-danger pull-left" value="Yes, Delete this Product"
                           id="delete_confirm">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    <script>
        AOS.init({
            once:true,
        });
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });


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

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')
            });

        });
    </script>
    <script>
        //ajax code
        (function () {
           document.getElementById('deleteProduct').addEventListener('click',function (e) {
               e.preventDefault();
               let product_id = this.getAttribute('data-value');
               document.getElementById('delete_confirm').addEventListener('click',function () {
                   axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                   axios.delete('/myproduct/'+product_id,{
                       data: {
                           id: product_id,
                           _method: 'DELETE',
                       }
                   })
                    .then(function (response) {
                            window.location = '{{route("myproduct.index")}}'
                       }).catch(function (error) {
                           console.log(error);
                       });
               })
           })
        })()
    </script>
@endsection
