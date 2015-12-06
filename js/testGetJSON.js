$(document).ready(function() {
    $.getJSON(
        "testGetJSON.php",
        {
            name: "Robert",
        },
        function(json) {
            alert(json.text);
            
            var tag = document.getElementById("tweetScore");
            tag.href =
                'http://twitter.com/home?status='+escape("Sup, " + json.text + "");
        }
    );
});