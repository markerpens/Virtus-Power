<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Initiate AJAX search query -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#fetchval").on('change', function() {
            var value = $(this).val();
            // alert(value);
            $.ajax({
                url: "search_query.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend: function() {
                    $(".container").html("<span>Working...</span>");
                },
                success: function(data) {
                    $(".container").html(data);
                }
            });
        });
    });
</script>

</body>


</html>