$(document).ready(function () {
    $('#province').change(function (e) {
        e.preventDefault();
        var province = $('#province').val();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': 'SC1HKotLuw5BH6JJRuNiFsjNHxGs5vEGRmGolmbK'}
        });
        // alert($.ajaxSetup())
        $.ajax({
            type: 'GET',
            url: '{{url('api/getdistrict')}}' + '/' + province,
            dataType: 'json',
            success: function (result) {
            $( "#district" ).empty();
            var appenddata1 = "";
            var jsonData1 = result.data;
            i = 0 ;
            $.each(jsonData1, function( index, value ) {
                appenddata1 += "<option value = '" + index+ " '>" + value + " </option>";
            });
            $("#district").append(appenddata1);
            $('.enableOnInput').prop('disabled',false)
        },
        error: function (result) {
            console.log(result)
            // window.location = 'http://bucketlistbtl.com/dashboard/package';
        }
    });
    })
})