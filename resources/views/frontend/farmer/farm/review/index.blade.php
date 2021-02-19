@extends('frontend.layout.layout')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                        @foreach($reviews as $review)
                                            <tr>
                                                <td class="review-text">
                                                    {{$review->description}}
                                                </td>
                                                <td class="published-on ">
                                                    {{\Carbon\Carbon::parse($review->created_At)->setTimezone('Asia/Kathmandu')->format('D d M Y')}}
                                                </td>
                                                <td>
                                                    <span class="review-name">

                                                        {{$review->rel_user->name}}
                                                    </span>
                                                    <div class="review-stars farm-rating">
                                                        @for($i=0;$i<$review->star;$i++)
                                                            <span class="fa fa-star checked"></span>
                                                        @endfor
                                                        @for($i=$review->star;$i<5;$i++)
                                                                <span class="fa fa-star "></span>
                                                        @endfor
                                                    </div>

                                                </td>
                                                <td>
                                                    @if($review->status ==null)
                                                        <a href="" id="approveReview" data-toggle="modal" data-value="{{$review->id}}" data-target="#approveModal" class="btn btn-outline-success"><i class="far fa-thumbs-up"></i> Approve</a>
                                                    @elseif($review->status==1)
                                                        <a href="" id="disapproveReview" data-toggle="modal" data-value="{{$review->id}}" data-target="#disapproveModal" class="btn btn-outline-danger"><i class="far fa-thumbs-down"></i> Dissapprove</a>
                                                    @else
                                                        <a href="" id="approveReview" data-toggle="modal" data-value="{{$review->id}}" data-target="#approveModal" class="btn btn-outline-success"><i class="far fa-thumbs-up"></i> Approve</a>
                                                        <a href="" id="disapproveReview" data-toggle="modal" data-value="{{$review->id}}" data-target="#disapproveModal" class="btn btn-outline-danger"><i class="far fa-thumbs-down"></i> Dissapprove</a>
                                                    @endif


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

{{--    disapprove model--}}
    <div class="modal fade" id="disapproveModal" tabindex="-1" role="dialog" aria-labelledby="disapproveModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        <i class="fa fa-trash"></i> Are you sure you want to Disapprove this review?
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times; </button>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-danger pull-left" value="Yes, Disapprove this Review"
                           id="disapprove_confirm">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
{{--    approve--}}
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        <i class="fa fa-align-right"></i> Are you sure you want to approve this review?
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times; </button>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-success pull-left" style="width: 205px;" value="Yes, Approve this Review"
                           id="approve_confirm">
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
{{--    ajax--}}
    <script>
        (function () {
            //for disapprove
                let disapproveRevieew =  document.getElementById('disapproveReview');
                if(disapproveRevieew!=null){
                    disapproveRevieew.addEventListener('click',function (e) {
                        e.preventDefault();
                        var review_id = this.getAttribute('data-value');
                        document.getElementById('disapprove_confirm').addEventListener('click',function () {
                            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                            axios.post('/changestatus', {
                                reiview_id: review_id,
                                status: 0
                            }).then(function (response) {
                                window.location ='{{URL::to('farmreview')}}';
                            })
                                .catch(function (error) {
                                    console.log("error"+error);
                                });
                        })


                    })
                }

            //for approve
                let approveReview = document.getElementById('approveReview');
                if(approveReview!=null){
                    approveReview.addEventListener('click',function (e) {
                        e.preventDefault()
                        var review_id = this.getAttribute('data-value');
                        document.getElementById('approve_confirm').addEventListener('click',function () {
                            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                            axios.post('/changestatus', {
                                reiview_id: review_id,
                                status: 1
                            }).then(function (response) {
                                window.location ='{{URL::to('farmreview')}}';
                            })
                                .catch(function (error) {
                                    console.log("error"+error);
                                });
                        })
                    })
                }
        })()
    </script>
    <!-- scripts end -->
@endsection
