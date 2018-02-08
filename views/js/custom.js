// Countries
var country_arr = new Array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Mumbai", "Singapore");

function populateCountries(countryElementId) {
    // given the id of the <select> tag as function argument, it inserts <option> tags
    var countryElement = document.getElementById(countryElementId);
    countryElement.length = 0;
    countryElement.options[0] = new Option('Select Country', '-1');
    countryElement.selectedIndex = 0;
    for (var i = 0; i < country_arr.length; i++) {
        countryElement.options[countryElement.length] = new Option(country_arr[i], country_arr[i]);
    }
}

var monthtext=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
var monthvalue=['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

function populatedropdown(dayfield, monthfield, yearfield) {
    var today=new Date()
    var dayfield=document.getElementById(dayfield)
    var monthfield=document.getElementById(monthfield)
    var yearfield=document.getElementById(yearfield)
    for (var i=0; i<31; i++)
    dayfield.options[i]=new Option(i+1, i+1)
    dayfield.options[today.getDate()]=new Option(today.getDate(), today.getDate(), true, true) //select today's day
    for (var m=0; m<12; m++)
    monthfield.options[m]=new Option(monthtext[m], monthvalue[m])
    monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthvalue[today.getMonth()], true, true) //select today's month
    var thisyear=today.getFullYear()
    for (var y=0; y<20; y++){
    yearfield.options[y]=new Option(thisyear, thisyear)
    thisyear+=1
    }
    yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
}

var number = new Array('0', '1', '2', '3', '4', '5');

function populatePassengers (personElementId) {
	var person = document.getElementById(personElementId);
	person.length = 0;
    person.selectedIndex = 0;
    for (var i = 0; i < number.length; i++) {
        person.options[person.length] = new Option(number[i], number[i]);
    }
}

function timedMsg() {
    currMsg++;
    document.getElementById('timedMsgDiv').innerHTML = msgArr[currMsg%msgArr.length];
};

function init() {
    currMsg = -1;
    msgArr = Array('Cheapest flights guaranteed', 'Direct flights only', 'Hassle-free one-click bookings', 'Super-easy payments');
    timedMsg();
    var t=setInterval("timedMsg()",4000);
};

function checkInput() {
    var everythingOk = 1;

    var countryFrom = document.getElementById("countryFrom").value;
    var countryTo = document.getElementById("countryTo").value;

    if (countryFrom == -1) {
        document.getElementById("fromText").innerHTML = "  (Choose a country)";
        everythingOk = 0;
    } else {document.getElementById("fromText").innerHTML = "";}
    if (countryTo == -1) {
        document.getElementById("toText").innerHTML = "  (Choose a country)";
        everythingOk = 0;
    } else if (countryFrom == countryTo) {
        document.getElementById("toText").innerHTML = "  (Choose a different country)";
        everythingOk = 0;
    } else {document.getElementById("fromText").innerHTML = "";}

    var departureYear = document.getElementById("departureyeardropdown").value;
    var departureMonth = document.getElementById("departuremonthdropdown").selectedIndex;
    var departureDay = document.getElementById("departuredaydropdown").value;

    var returnYear = document.getElementById("returnyeardropdown").value;
    var returnMonth = document.getElementById("returnmonthdropdown").selectedIndex;
    var returnDay = document.getElementById("returndaydropdown").value;

    var roundTrip = document.getElementById("roundTrip").value;

    if (document.getElementById("roundTrip").checked) {
        if (departureYear > returnYear) {
            document.getElementById("returnText").innerHTML = " Please check the dates!";
            everythingOk = 0;
        } else if (departureYear == returnYear && departureMonth > returnMonth){
            document.getElementById("returnText").innerHTML = " Please check the dates!";
            everythingOk = 0;
        }  else if (departureYear == returnYear && departureMonth == returnMonth && departureDay > returnDay){
            document.getElementById("returnText").innerHTML = " (Please check the dates!)";
            everythingOk = 0;
        } else {document.getElementById("returnText").innerHTML = "";}
    }

    var adult = document.getElementById("noofadult").value;

    if (adult == 0) {
        document.getElementById("people").innerHTML = " (How many people?)";
        everythingOk = 0;
    } else {document.getElementById("people").innerHTML = "";}

    if (everythingOk) {
        document.getElementById("flightInfo").submit();
    }
}



