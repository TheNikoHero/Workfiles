$(document).ready(function () {

    $(".contentForDate").hide();
    $(".cal_header p").click(function (e) {
        $('.cal_header p#selectedDate').removeAttr('id');
        if ($(e.target).is('.cal_header td p')) {
            $(this).attr('id', 'selectedDate');
        }

    });

//******************************************************************************************
//******************************************************************************************
//            WHEN YOU'RE CLICKING ON A CERTAIN EVENT, AND CONTENT SLIDES IN
//******************************************************************************************
//******************************************************************************************

    $("#back_btn").css('visibility', 'hidden'); //makes sure the back button is hidden
    $("#step_back_btn").hide(); //for howto.html

    $('.event-calendar').click(function () {
        $(".event-content").css("width", "100%");
        $("#back_btn").show();
        $("#back_btn").css('visibility', 'visible');
        var contentBox = $('.event-content');
        if (contentBox.hasClass('visible')) {
            $(".event-content").css("width", "25   %");
            contentBox.animate({"left": "-10000px"}, "slow").removeClass('visible');

        } else {
            contentBox.animate({"left": "0"}, "fast").addClass('visible');
        }

    }); // here ends .event-calendar click function

    $(document).on('click', '#back_btn', function () {
        $('.event-content').animate({"left": "-10000px"}, "slow").removeClass('visible');
        $(this).css('visibility', 'hidden');
    });


//******************************************************************************************
//******************************************************************************************
//UNDER THIS COMMENT, IS ALL THE CODE FOR CLICKING ON THE ' + ' ICON IN THE TOP RIGHT CORNER
//******************************************************************************************
//******************************************************************************************

//when clicked on " plus + for creating something (the form) "
    $('#create_plus').click(function () {
        $(".create_form").css("width", "100%"); //shows the create_form
        $("#back_btn").css('visibility', 'visible');
        var createForm = $('.create_form');
        if (createForm.hasClass('visible')) {
            $(".createForm").css("width", "25   %");
            createForm.animate({"left": "-10000px"}, "slow").removeClass('visible'); // hides the create_form

        } else {
            console.log('FIRST CREATE FORM HAS CLASS >VISIBLE<');
            $('#back_btn').addClass('backBtn_normal');

            if ($('#back_btn').hasClass('backBtn_normal')) {
                console.log('TILBAGE KNAPPEN HAR CLASSEN backBtn_normal');
            }

            createForm.animate({"left": "0"}, "fast").addClass('visible');
        }
    }); //here ends create_plus click function

    $(document).on('click', '#back_btn', function () {
        $('.create_form').animate({"left": "-10000px"}, "slow").removeClass('visible');
        $(this).css('visibility', 'hidden');
    });

//******************************************************************************************
//******************************************************************************************
//                   BELOW THIS, IS ALL THE CODE FOR CREATING A STEP/TRIN
//******************************************************************************************
//******************************************************************************************

    $('.create_step_plus').click(function () {
        console.log('create_step_plus_clicked');

        $(".create_form_step").css("width", "100%"); //shows the create form step
        var createForm = $('.create_form_step');
        if (createForm.hasClass('visible_step')) {
            console.log('create_step_plus NO class'); //output text to the console
            $(".create_form_step").css("width", "25%");
            createForm.animate({"left": "-10000px"}, "slow").removeClass('visible_step'); //hides the create form step

        } else {
            console.log('create_step_plus DO HAS class');
            createForm.animate({"left": "0"}, "fast").addClass('visible_step');
            $('#back_btn').addClass('backBtn_step');

            if ($('#back_btn').hasClass('backBtn_step')) {
                console.log('TILBAGE KNAPPEN HAR CLASSEN backBtn_step');
            }
        }

    }); //here ends create_step_plus click function

    $(document).on('click', '#back_btn', function () {
        $('.create_form_step').animate({"left": "-10000px"}, "slow").removeClass('visible_step');
        //$('.create_form_step').hide();
    }); //here ends the back button for create_form_step click function


//******************************************************************************************
//******************************************************************************************
//                  BELOW THIS, ALL JAVASCRIPT FOR ACTIVI.HTML & MAD.HTML
//******************************************************************************************
//******************************************************************************************


    $(document).on('click', '.activate_popup', function () {
        confirm('Vil du tilmelde borgeren denne aktivitet?');
    });

    $(document).on('click', '.add_food', function () {
        confirm('Vil du tilføje denne ret til borgeren?');
    });

    $(document).on('click', '.remove_food', function () {
        confirm('Vil du admelde denne ret til borgeren?');
    });


//******************************************************************************************
//******************************************************************************************
//                  ALL JAVASCRIPT FOR PIC_FRAME(GALLERY) IS HERE
//******************************************************************************************
//******************************************************************************************



});