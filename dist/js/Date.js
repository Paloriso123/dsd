function realtimeClock() {

    var rtClock = new Date()

    var day = rtClock.getDate();
    var month = rtClock.getMonth();
    var year = rtClock.getFullYear();


    hours = ("0" + hours).slice(-2);
    minutes = ("0" + minutes).slice(-2);
    seconds = ("0" + seconds).slice(-2);

    document.getElementById('clock').innerHTML =
        hours + " : " + minutes + " : " + seconds + " " + day + "." + month + "." + year;
    var t = setTimeout(realtimeClock,500);

}