<html>
    <head>
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
        <style>
            .search-detail{
                font-size: 12px;
            }
            .farm-detail{
                line-height: 0.1em;
                font-size: 12px;
            }
            h6{
                font-size: 12px;
            }
            * {
                box-sizing: border-box;
            }

            /* Create two equal columns that floats next to each other */
            .column {
                float: left;
                width: 50%;
                height: 300px; /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <strong>Report Of Farmer of Following Detail</strong>
                    <div class="search-detail">
                        <strong>Category:</strong><br>
                        <strong>Province:</strong><br>
                        <strong>District:</strong><br>
                    </div>
                   <br>
                   <br>
                   <br>
                   {{--  <hr>  --}}

                </div>


            </div>
            @foreach($items as $item)
            {{--  {{dd($item)}}  --}}
            <div class="row">
                <div class="col-md-12" style="">
                    {{--  <hr style="">  --}}
                    <strong style="">Farm Name : <span class="pull-right">{{$item->name}} </span></strong>
                    <hr style="">
                </div>
            </div>
            <div class="row" style="">
                <div class="column farm-detail">
                    <strong>Details</strong>:
                    <p class="farm-detail">Address &nbsp; &nbsp;: {{$item->short_address}}</p>
                    <p class="farm-detail">Phone &nbsp; &nbsp;&nbsp; &nbsp;: {{$item->phone}}</p>
                    <p class="farm-detail">Category &nbsp;: {{$item->rel_category->title}}</p>
                    <p class="farm-detail">Email &nbsp; &nbsp; &nbsp; : {{$item->email}}</p>
                </div>
                <div class="column farm-detail">
                    <strong>Products</strong>:
                    @foreach ($item->product_list as $list)
                        <p>{{$list}}</p>
                    @endforeach
            </div>
        @endforeach
        </div>
    </body>
</html>