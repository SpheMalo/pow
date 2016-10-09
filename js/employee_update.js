var employee;
function getEmployeeById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_employee.php",
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

            employee = temp[0];
            console.log(employee);
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields() 
{
    employee = JSON.parse(employee);
  //console.log(employee);
    $("#proPicId").attr("src","http://localhost/Prac/qualit1/pow/img/profilePic/"+ employee.img);
    $("#nameId").val(employee.name);
    $("#surnameId").val(employee.surname);

    var titleId = "#"+employee.title;
    $(titleId).attr("selected", "selected");
    
    var genderId ="#"+employee.gender;
    $(genderId).attr("selected", "selected");

    $("#id_Id").val(employee.idnum);
    $("#bankingId").val(employee.bank);
    $("#cellId").val(employee.cell);
    $("#telId").val(employee.tel);
    $("#emailId").val(employee.email);

    employee.postal =  employee.postal.split("_");
    $("#add_line_po1").val(employee.postal[0]);
    $("#add_line_po2").val(employee.postal[1]);
    $("#add_line_po3").val(employee.postal[2]);
    var city = "#"+employee.postal[3];
    $(city).attr("selected", "selected");
    $("#add_line_po5").val(employee.postal[4]);

    employee.physical =  employee.physical.split("_");
    $("#add_line_ph1").val(employee.physical[0]);
    $("#add_line_ph2").val(employee.physical[1]);
    $("#add_line_ph3").val(employee.physical[2]);
    var city = "#"+employee.physical[3];
    $(city).attr("selected", "selected");
    $("#add_line_ph5").val(employee.physical[4]);

    var locc = "#"+employee.loc;
    $(locc).attr("selected", "selected");
    var typee = "#"+employee.type;
    $(typee).attr("selected", "selected");

    $("#statusId").val(employee.status);
    
}