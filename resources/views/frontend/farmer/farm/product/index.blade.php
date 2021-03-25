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
                    <div class="d-flex justify-content-between mb-2">
                        <h1>{{__('product.products')}}</h1>
                        <a id="view-farm-btn" href="{{route('myproduct.create')}}" class="btn btn-outline-secondary mr-3">{{__('product.add_a_product')}}</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            @isset($myproducts)
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
                                                    <input type="checkbox"
                                                    {{$product->is_available== 1 ?'checked': ''}}
                                                     {{--  onclick="changeStatus({{$product->id}},{{$product->is_available}})"  --}}
                                                     onclick="ajaxForStatusChange({{$product->id}})"
                                                    />
                                                    <td>
                                                    </td>
                                                    <span class="slider round"></span>
                                                </label>
                                                <button class="btn btn-light" data-toggle="collapse" href="#productformcollapse{{$count}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="far fa-edit mr-2"></i>
                                                    {{__('product.edit')}}
                                                </button>
                                                <a id="productDelete" data-toggle="modal" data-value="{{$product->id}}" data-target="#deleteModal" class="btn btn-outline-danger productDelete">
                                                    {{__('product.delete')}}
                                                </a>
                                            </div>

                                        </div>
                                        <form id="productformcollapse{{$count}}" class="row product-edit-collapsible collapse" method="post" action="{{route('myproduct.update',$product->id)}}" enctype="multipart/form-data">
                                            {{method_field('PUT')}}
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{__('form.change_product_image')}}</label>
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
                                                    <label for="">{{__('form.product_name')}}</label>
                                                    <input type="text" class="form-control" name="name" id="" value="{{$product->name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">{{__('form.minimum_order')}}</label>
                                                    <input type="number" placeholder="Minimum Order" class="form-control" name="minimum_quantity"  value="{{$product->minimum_quantity}}" />
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{__('form.price_per_unit')}}</label>
                                                    <input type="number" placeholder="price per unit" name="price" id="" value="{{$product->price}}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{__('form.unit')}}</label>
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
                                                <button class="btn btn-primary" data-toggle="collapse" href="#productformcollapse1" role="button" aria-expanded="false" aria-controls="collapseExample">{{__('form.update')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <?php $count++; ?>
                                @endforeach
                            @endisset
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
                        <i class="fa fa-trash"></i> {{__('product.delete_message')}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times; </button>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-danger pull-left delete_confirm" value="{{__('product.delete_confirm')}}"
                           id="delete_confirm">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{__('product.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/handleFiles.js')}}"></script>
    <script>
        AOS.init({
            once:true,
        });
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')
            });

        });
    </script>
     <script>
       
        function ajaxForStatusChange(productID) {

            let base_url = 'http://127.0.0.1:8000';
            axios.post(base_url+'/myproduct/changestatus',{
                productID: productID,

            }).then(function (response) {
                
                if(response.data.status===false){

                    window.location = '{{route('userlogin')}}'
                }
                if(response.status===200){
                    swal({
                        buttons: false,
                        icon: "success",
                        timer: 2500,
                        text: 'Order Status Changed Successfully !!!'
                    });

                    {{--  window.location.reload();  --}}
                    // document.getElementById('minicart').innerHTML = '';
                }else{
                     swal({
                        buttons: false,
                        icon: "warning",
                        timer: 2500,
                        text: 'Order Status Not  Changed !!!'
                    });
                }
                
            }).catch(function (error) {
                console.log(error);
            });
        }

    </script>

     <script>
        $(document).ready(function (e) {
            $(document).on('click', '#productDelete', function (e) {
                var product_id = $(this).attr('data-value');
                $("#delete_confirm").click(function () {
                    console.log( '{{ url('/myproduct') }}' + '/' + product_id)

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/myproduct') }}' + '/' + product_id,
                        type: 'DELETE',
                        data: {
                            "id": product_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('myproduct.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            {{--window.location = '{{route('myproduct.index')}}';--}}
                        }
                    });
                });
            });
            //change status
        });
    </script>
@endsection
