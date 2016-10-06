var patient;
function getPatientById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_patient.php",
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

            patient = temp[0];
           
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields() 
{
    patient = JSON.parse(patient);
    console.log(patient);
    $("#proPicId").attr("src","http://localhost/Prac/qualit1/pow/img/profilePic/"+ patient.img);
    $("#nameId").val(patient.name);
    $("#surnameId").val(patient.surname);

    var genderId ="#"+patient.gender;
    $(genderId).attr("selected", "selected");

    var titleId = "#"+patient.title;
    $(titleId).attr("selected", "selected");

    $("#id_Id").val(patient.id_num);

    patient.dob = patient.dob.split("-");
    $("#dob1Id").val(patient.dob[0]);
    $("#dob2Id").val(patient.dob[1]);
    $("#dob3Id").val(patient.dob[2]);

    $("#emailId").val(patient.email);
    $("#p_t_nameId").val(patient.file);
    $("#tellId").val(patient.tell);
    $("#cellId").val(patient.cell);

    patient.physical =  patient.physical.split("_");
    $("#add_line_ph1").val(patient.physical[0]);
    $("#add_line_ph2").val(patient.physical[1]);
    $("#add_line_ph3").val(patient.physical[2]);

    var city = "#"+ patient.physical[3];
    $(city).attr("selected", "selected");

    $("#add_line_ph5").val(patient.physical[4]);

    var med = "#"+ patient.med_type;
    $(med).attr("selected", "selected");

    $("#medical_m_iId").val(patient.mem_type);
    $("#medical_m_nId").val(patient.mem_type);
    
}