$(document).ready(function() {
    $.getJSON(
        "php/testGetJSON.php",
        function(json) {
            alert(json.text);
        }
    );
});