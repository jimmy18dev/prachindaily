function UpdateAnalytics(type){
    var href    = 'api.page.php';
    var page_id = $('#page_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'Page',
            action              :'UpdateAnalytics',
            type                :type,
            page_id             :page_id,
        },
        error: function (request, status, error) {
            console.log("=> Request Error!");
        }
    }).done(function(data){
        console.log('=> '+data.message);
        $('#process_update').fadeIn(300).html('<i class="fa fa-circle"></i> Updated...').delay(3000).fadeOut(300);
    }).error();
}

function UpdateStatus(page_id,status){
    var href    = 'api.page.php';

    if(status == "fail"){
        var del = confirm('Not audited ?');
        if(!del)
            return false;
    }
    else if(status == "delete_request"){
        var del = confirm('คุณต้องการลบธุรกิจนี้หรือไม่ ?');
        if(!del)
            return false;
    }

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'Page',
            action              :'UpdateStatus',
            status              :status,
            page_id             :page_id,
        },
        error: function (request, status, error) {
            console.log("=> Request Error!");
        }
    }).done(function(data){
        console.log('=> '+data.message);
        $('#items-'+page_id).slideUp(500);
    }).error();
}

function ChartLocation(){
    // URL API
    var href = 'api.page.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"GET",
        data:{
            calling             :'Page',
            action              :'LocationAnalytics',
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        // Build the chart
        $('#location').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.0f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: "Brands",
            colorByPoint: true,
            data: data.data.items,
        }]
    });
    }).error();
}