/**
 * Created by Administrator on 10/14/2016.
 */
function restore()
{
    $.ajax({
        url: "index.php",
        type: "GET",
        data: { "restore": true},
        cache: false,
        success: function (response) {

            //////Download the file ///////////////////
           // document.getElementById("downLink").click();
            var getHead_o = document.getElementById("head_o");
            getHead_o.innerHTML = "System restore successful";
        },
        error: function (error) {
            console.log(error);
        }
    });
}