<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>

<html>
<input type="text"  id="datepicker">
<?php

$ran=rand('000000', '999999');

echo $ran;

?>
</html>
