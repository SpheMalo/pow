var patients;
function getPatientById() {
    var id = $("#ids").val();
    var temp = [];
    var count = 0;

    $.ajax({
        url: "make_booking.php",
        type: "GET",
        //data: { idNum: id},
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
            return patients;
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

    var patient// = getPatientById();
    var value = $("#ids").val();
    //var patient;

    //alert(patient + " " + value);
    for (var i=0; i<patients.length; i++) {
        if (JSON.parse(patients[i]).id_number == value) {
            patient = JSON.parse(patients[i]);
            break;
        }
    }

    
 
    $("#patientName").val(patient.name);
    $("#patientSurname").val(patient.surname);
    $("#patientMedicalAid").val(patient.medical_aid_type);
}

function setPracticeLocation() {
    var dentist = $("#dentistSelect").val();

    if (dentist == "Dr J.P. Maponya") 
    {
       $("#optionThembisa").attr('selected','selected');
    }
<<<<<<< HEAD
    else {
=======
    else 
    {
>>>>>>> dd0318a771faeec8e43091b72f28128c21cd1278
        $("#optionBirchAcres").attr('selected','selected');
    }
}