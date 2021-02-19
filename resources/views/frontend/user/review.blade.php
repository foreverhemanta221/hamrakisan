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
            @include('frontend.dashboardincludes.usersidebar')
            <div id="db-content">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <!-- dashboard cards -->
                <div class="db-body">
                    <h1>Reviews</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <form id="reviewSearch" action="">
                                    <label for="">Search reviews</label>
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" id="">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="reviewTable" class="db-table-wrapper">
                                    <table   class="table dashboard-table reviews">
                                        <tbody>
                                        @foreach($myreviews as $review)
                                            <tr>
                                                <td class="reviewed-farm">
                                                    <a href="">
                                                        {{$review->rel_listing->name}}
                                                        <img src="{{count($review->rel_listing->getGalleryImage('medium'))>0 ? $review->rel_listing->getGalleryImage('medium')[0] :'' }}" alt="">
                                                    </a>
                                                </td>
                                                <td class="review-text">
                                                    {{$review->description}}
                                                </td>
                                                <td class="published-on">
                                                    {{\Carbon\Carbon::parse($review->created_at)->format('D d M Y')}}
                                                </td>
                                                <td>
                                                    <div class="review-stars farm-rating">
                                                        @for($i=0;$i<$review->star;$i++)
                                                        <span class="fa fa-star checked"></span>
                                                        @endfor
                                                        @for($i=$review->star;$i<5;$i++)
                                                        <span class="fa fa-star"></span>
                                                        @endfor
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation example" class="mt-5 d-flex justify-content-end">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item ">
                                            <a class="page-link" href="#" tabindex="-1"><</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item "><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">10</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>

    <script>
        AOS.init({
            once:true,
        });
        $("#reviewSearch input").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            $("#reviewTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')
            });
        });
    </script>
    <!-- scripts end -->
@endsection
