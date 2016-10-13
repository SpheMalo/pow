function backUp()
{
    $.ajax({
        url: "index.php",
        type: "GET",
        data: { "backUp": true},
        cache: false,
        success: function (response) {
           
            //////Download the file ///////////////////
            document.getElementById("downLink").click();

            var getHead_o = document.getElementById("head_o");
            getHead_o.innerHTML = "System backup successful";
        },
        error: function (error) {
            console.log(error);
        }
    });
}