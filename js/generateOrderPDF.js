function generateOrderListPDF()
{
    var newHeader = $(document.createElement('div'));

    var image = $( document.createElement('img'));
    var heading = $( document.createElement('p'));
    var currentDate = $( document.createElement('p'));

    heading.get(0).innerHTML = "<strong>Monthly Order List Report</strong>";
    heading.get(0).style.textAlign='center';
    currentDate.get(0).innerHTML = "<strong>Date: </strong>" + new Date().toLocaleString();
    image.get(0).src='../../img/header.png';
    image.get(0).width='522';
    newHeader.get(0).width='522';

    newHeader.append(image);
    newHeader.append(heading);
    newHeader.append(currentDate);
    newHeader.append($('#order').html()); //table

    var doc = new jsPDF('p', 'pt', 'letter');

    // doc.setFont('helvetica');
    // doc.setFontType('bold');
    // doc.setFontSize(20);


    var specialElementHandlers = {
        '#editor': function(element, renderer){
            return true;
        }
    };

    var source = newHeader.get(0); //div created
    var margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
// All units are in the set measurement for the document
// This can be changed to "pt" (points), "mm" (Default), "cm", "in"
    doc.fromHTML(
        source,
        margins.left,
        margins.top, {
            'width': margins.width,
            'elementHandlers': specialElementHandlers
        },
        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF
            //          this allow the insertion of new lines after html
            doc.save('Monthly Order List Report.pdf');
        }, margins
    );
}

