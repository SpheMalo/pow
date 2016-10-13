var patients;
function getPatientById() 
{
    var id = $("#ids").val();
    var temp = [];
    var count = 0;

    $.ajax({
        url: "make_booking.php",
        type: "GET",
        data: { idNum: id},
        cache: false,
        success: function (response) {
            patients = response;

            for (var i = 0; i<patients.length; i++) {

                var obj = "";
                if (patients[i]=='[') {
                    i++;
                    while (patients[i] != '}') {
                        obj += (patients[i]);
                        i++;
                    }
                    obj += patients[i++];
                    temp[count] = obj;
                    obj = "";
                    count++;
                }
                if (patients[i] == ']') {
                    break;
                }

                if (patients[i] == '{') {
                    while (patients[i] != '}') {
                        obj += (patients[i]);
                        i++;
                    }
                    obj += patients[i++];
                    temp[count] = obj;
                    obj = "";
                    count++;
                }
            }

            patients = temp;
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

/*function filterIdNums() {
    var currentNumber = $("#ids").val();
    var temp = [];
    var count = 0;

    for (var i=0; i<patients.length; i++) {
        idNumbers[i] = JSON.parse(patients[i]).id;
    }

    for (var i = 0; i<idNumbers.length; i++) {
        if (idNumbers[i].indexOf(currentNumber) != -1) {
            temp[count++] = idNumbers[i];
        }
    }

    //idNumbers = temp;

    var htmlCode = "";
    for (var i = 0; i<temp.length; i++) {
        htmlCode += "<option value='" + temp[i] + "'>";
    }

    document.getElementById("idNums").innerHTML = htmlCode;
}*/

function populateFields() {
    
    //var patient = getPatientById();
    var value = $("#ids").val();
    var patient;
    
    for (var i=0; i<patients.length; i++) {
        if (JSON.parse(patients[i]).id_num == value) {
            patient = JSON.parse(patients[i]);
            break;
        }
    }
    console.log(patient);

    $("#patientName").val(patient.name);
    $("#patientSurname").val(patient.surname);
    $("#patientMedicalAid").val(patient.medical_aid_type);
}

function getBookWeek() {
    var dentist = $("#dentistSelect").val();
    var d = "doc=" + dentist;

    if (dentist != "--select dentist--") 
    {
       $.ajax({
           type: "post",
            url: "../../../inc/calll.php",
            cache: false,
            data: d,
            success: function(result){
                $('#calendar').filter(':last').html(result);
            },
            error: function(){
            //alert('something went wrong');
            }
       });
    }
    else 
    {
        //$("#optionBirchAcres").attr('selected','selected');
    }
}