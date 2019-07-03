var b = document.getElementById("B");
var nb = document.getElementById("nb")
var mask = document.getElementById("idbourse");
var nomask = document.getElementById("idnobourse");
var maskl = document.getElementById("idloger");
var l = document.getElementById("l");
var nl = document.getElementById("nl");
var lnl = document.getElementById("lnl");
var nbr = document.getElementById("nobr");
var nol = document.getElementById("nolog");
var ajout = document.getElementById("ajout");


if (b.checked == true) {
    mask.style.displaye = "block";
} else {
    mask.style.display = "none";
    lnl.style.display = "none";

}
if (nb.checked == true) {
    nomask.style.displaye = "block";
} else {
    nomask.style.display = "none";
}
if (l.checked == true) {
    maskl.style.displaye = "block";
} else {
    maskl.style.display = "none";
}

b.addEventListener('change', function () {
    if (mask.style.display == "none") {
        mask.style.display = "block";
        nbr.style.display="none";
        nomask.style.display = "none";
        lnl.style.display = "block";

    } 
    else {
        mask.style.display = "none";

    }
})
nb.addEventListener('change', function () {
    if (nomask.style.display == "none") {
        nomask.style.display = "block";
        mask.style.display = "none";
        lnl.style.display = "none";
    } 
    else {
        nomask.style.display = "none";
    }
})
l.addEventListener('change', function () {
    if (maskl.style.display == "none") {
        maskl.style.display = "block";
        nol.style.display = "none";
    } 
    else {
        maskl.style.display = "none";
    }
})
nl.addEventListener('change', function () {
    if (maskl.style.display == "bloclk") {
        maskl.style.display = "non";
    } else {
        maskl.style.display = "none";
    }
})
$(document).ready(function () {
    $('#Etudiant').DataTable();
});