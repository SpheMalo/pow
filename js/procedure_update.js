var procedure;
function getProcedureById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_procedure.php",
        type: "GET",
        data: { idNum: id},
        cache: false,
        success: function (response) {

            for (var i = 0; i<response.length; i++) 
            {

                var obj = "";
                if (response[i]=='[') 
                {
                    i++;
                    while (response[i] != '}') 
                    {
                        obj += (response[i]);
                        i++;
                    }
                    obj += response[i++];
                    temp[count] = obj;
                    obj = "";
                    count++;
                }
                if (response[i] == ']') 
                {
                    break;
                }
            }

            procedure = temp[0];
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields() 
{
    procedure = JSON.parse(procedure);
    $("#descId").val(procedure.desc);
    $("#codeId").val(procedure.code);
    $("#descId").val(procedure.desc);
    $("#priceId").val(procedure.price);

    if(procedure.fav == 1)
    {
      $("#favoId").attr("checked", "checked");
    }

    procedure.type = procedure.type.split("_");
    $("#p_t_codeId").val(procedure.type[0]);
    $("#p_t_descId").val(procedure.type[1]);
}