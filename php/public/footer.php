<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Initiate AJAX search query -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".select-filter").on('change', function() {
            var seggs = $("#seggs").val();
            var equipment = $("#equipment").val();
            var weightclass = $("#weightclass").val();
            var division = $("#division").val();
            $.ajax({
                url: "search_query.php",
                type: "POST",
                data: {
                    seggs: seggs,
                    equipment: equipment,
                    weightclass: weightclass,
                    division: division,
                },
                beforeSend: function() {
                    $(".main-container").html("<span>Working...</span>");
                },
                success: function(data) {
                    $(".main-container").html(data);
                }
            });
        });
    });

    // TEST
    $('#pagination-change').twbsPagination({
        totalPages: 153,
        visiblePages: 10,
        onPageClick: function(event, page) {
            $('.page-item').html('Page ' + page);
        }
    });
</script>

</body>

</html>