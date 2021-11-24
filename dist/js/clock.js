function realtimeClock() {

    var rtClock = new Date()

    var hours = rtClock.getHours();
    var minutes = rtClock.getMinutes();
    var seconds = rtClock.getSeconds();
    var day = rtClock.getDate();
    var month = rtClock.getMonth()+1;
    
    if(month > 12){
        month = 1;
    }

    var year = rtClock.getFullYear();


    hours = ("0" + hours).slice(-2);
    minutes = ("0" + minutes).slice(-2);
    seconds = ("0" + seconds).slice(-2);

    document.getElementById('clock').innerHTML =
    hours + " : " + minutes + " : " + seconds + "<p>___________</p>" + "<p>" + day + "." + month + "." + year + "</p>";
    var t = setTimeout(realtimeClock,500);

}