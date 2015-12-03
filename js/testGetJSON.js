$(document).ready(function() {
    $.getJSON(
        "php/testGetJSON.php",
        {
            name: "Robert",
        },
        function(json) {
            alert(json.text);
        }
    );
});