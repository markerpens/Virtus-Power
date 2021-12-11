<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Initiate AJAX search query -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".select-filter").on('change', function() {
            var seggs = $("#seggs").val();
            var equipment = $("#equipment").val();
            var division = $("#division").val();
            // alert(seggs);
            // alert(equipment);
            $.ajax({
                url: "search_query.php",
                type: "POST",
                data: {
                    seggs: seggs,
                    equipment: equipment,
                    division: division,
                    // seggs: $('#seggs').val(),
                    // equipment: $('#equipment').val(),

                    // year: year
                },
                beforeSend: function() {
                    $(".main-container").html("<span>Working...</span>");
                },
                success: function(data) {
                    $(".main-container").html(data);
                }
            });
        });
        // $("#equipment").trigger("change");
    });

    // $(document).ready(function() {
    //     $(".select-filter").on('change', function() {
    //         var seggs = $("#seggs").val();
    //         var equipment = $("#equipment").val();
    //         $.ajax({
    //             type: "POST",
    //             url: "search_query.php",
    //             data: {
    //                 seggs: seggs,
    //                 equipment: equipment,
    //             },

    //             beforeSend: function() {
    //                 $(".main-container").html("<span>Working...</span>");
    //             },
    //             success: function(result) {
    //                 $("#main-container").html(result);
    //             }
    //         });
    //     });
    // });

    // $(document).ready(function() {

    //     filter_data();

    //     function filter_data() {
    //         $('.main-container').html(data);
    //         var action = 'search_query';
    //         var brand = get_filter('seggs');
    //         var ram = get_filter('equipment');
    //         $.ajax({
    //             url: "search_query.php",
    //             method: "POST",
    //             data: {
    //                 action: action,
    //                 seggs: seggs,
    //                 equipment: equipment,
    //             },
    //             success: function(data) {
    //                 $('.main-container').html(data);
    //             }
    //         });
    //     }

    //     function get_filter(class_name) {
    //         var filter = [];
    //         $('.' + class_name + ':checked').each(function() {
    //             filter.push($(this).val());
    //         });
    //         return filter;
    //     }

    //     $('.select-filter').click(function() {
    //         filter_data();
    //     });
    // });



    // $(document).ready(function() {
    //     $('#seggs').change(function() {
    //         var seggs = $('#seggs').val();
    //         // var equipment = $(this).val();
    //         // var year = $(this).val();
    //         // alert(seggs);
    //         $.ajax({
    //             url: "search_query.php",
    //             method: "POST",
    //             data: {
    //                 seggs: seggs,
    //                 // equipment: equipment,
    //                 // year: year
    //             },
    //             beforeSend: function() {
    //                 $(".main-container").html("<span>Working...</span>");
    //             },
    //             success: function(data) {
    //                 $('.main-container').html(data);
    //             }
    //         });
    //     });
    // });

    // $(document).ready(function() {

    //     filter_data();


    //     function filter_data() {

    //         const action = 'fetch_data';
    //         let sexdivision = get_filter('sexdivision');
    //         let equipment = get_filter('equipment')
    //         let division = get_filter('division')
    //         let weightclass = get_filter('weightclass')

    //         $.ajax({
    //             url: "search_query.php",
    //             method: "POST",
    //             data: {
    //                 request: request,
    //                 sexdivision: sexdivision,
    //                 equipment: equipment,
    //                 division: division,
    //                 weightclass: weightclass
    //             },

    //             success: function(data) {
    //                 $('#fetchval').html(data);
    //             },
    //         });
    //     }

    //     function get_filter(class_name) {
    //         var filter = [];
    //         $('.' + class_name).each(function() {
    //             filterData = $(this).val();
    //             filter.push(filterData)

    //         });
    //         console.log(filter)
    //         return filter;
    //     }

    //     $('.form-control').change(function() {
    //         filter_data();
    //     });

    // });
</script>

</body>


</html>