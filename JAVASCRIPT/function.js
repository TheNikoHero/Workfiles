$(document).ready(function () {
    moment.locale('da');   //danish language
    //startdate = moment("2016-06-07");  //todays date (yy-mm-dd-h:i:s) not sure if right format thought

    //var selected_date = moment(startdate, "DD").add(5, 'days');

    //var day = selected_date.format('ddd');
    // var month = new_date.format('MM');
    // var year = new_date.format('YYYY');

    var dataSet = {
        dates: []
    }

    //var today = moment();
    //var todayDay = today.format('ddd'); // get TODAY date (ex; 2nd)


    var selectedDate = new Date();
    selectedDate.setHours(0);
    selectedDate.setMinutes(0);
    selectedDate.setSeconds(0);

    function init() {
        buildInterface();
        $(document).on('click', '#right_arrow', nextWeek);
        $(document).on('click', '#left_arrow', prevWeek);
    }

    function buildInterface(){
        generateDaterange();
        buildDaterange();
    }

    function nextWeek(){
        var calendarDays = $(".calendar");

        selectedDate.setDate(selectedDate.getDate() + 7);
        calendarDays.fadeOut(250, function(){
            buildInterface();
            calendarDays.fadeIn();
        });
    }
    function prevWeek(){
        var calendarDays = $(".calendar");
        selectedDate.setDate(selectedDate.getDate() - 7);
        calendarDays.fadeOut(250, function(){
            buildInterface();
            calendarDays.fadeIn();
        });
    }


    init();


    function generateDaterange() {
        var start = getMonday(selectedDate); // monday in this week

        var dates = [];

        for (var i = 0; i < 7; i++) {
            var d = new Date(start.getTime());
            d.setDate(d.getDate() + i);
//                console.log(d);
            var date = {
                date: d,
                date_human: moment(d).format('ddd'),
                date_humanDays: moment(d).format('Do')
                //date_human_today: moment(d).text("hello")
            }
            dates.push(date);
        }
        dataSet.dates = dates;
    }

//    var dataSetToday = dataSet[0];               //todays date in our array
//    var val_to_replace = ",";                    //this is what has to be replaced
//    var replace_with = "--";                     //this is what shall be there instead
//            $.each(dataSetToday, function(key, val){
//                dataSetToday[key] = val.replace(val_to_replace, replace_with);
//          }
//        console.log(dataSetToday);


    function getMonday(d) {
        d = new Date(d);
        var day = d.getDay(),
            diff = d.getDate() - day + (day == 0 ? -6 : 1); // adjust when day is sunday
        return new Date(d.setDate(diff));
    }

    function buildDaterange() {

        $.each(dataSet.dates, function (k, v) {

            var title = String(v.date_human).substr(0, 1);

            if (dateIsToday(new Date(), v.date))
                title = 'I DAG';


            $('.cal_header thead th').eq(k).text(title)
            $('.cal_header tbody td p').eq(k).text(v.date_humanDays)

        })
    }
    var weekNumber = moment().week(); //the current week number
    var firstDayOfWeek = moment().startOf(weekNumber);
//        console.log("HERUNDER BURDE DER STÅ D.6");
//        console.log(firstDayOfWeek);

    function dateIsToday(date_a, date_b) {

        return (
            date_a.getDate() == date_b.getDate() &&
            date_a.getMonth() == date_b.getMonth() &&
            date_a.getFullYear() == date_b.getFullYear()

        )
    }

    function thisWeek(date_c, date_d) {

    }


});

