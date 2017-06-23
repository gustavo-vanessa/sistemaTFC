/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function genPDF() {
    var display = document.getElementById("el").style.display;
    var display2 = null;
    if (document.getElementById("filtro")) {
        display2 = document.getElementById("filtro").style.display;
    }
    var x = document.getElementsByClassName("btn");
    var i;
    for (i = 0; i < x.length; i++) {
        if (x[i].style.display === "none")
            x[i].style.display = '';
        else
            x[i].style.display = 'none';
    }

    if (display === "none") {
        document.getElementById("el").style.display = 'block';

    } else {

        document.getElementById("el").style.display = 'none';

    }
    if (display2 === "none") {
        document.getElementById("filtro").style.display = 'block';
    } else {
        if (document.getElementById("filtro")) {
            document.getElementById("filtro").style.display = 'none';
        }
    }
    var teste = document.body;
    html2canvas(teste, {
        onrendered: function (canvas) {
            //document.body.appendChild(canvas);
            var img = canvas.toDataURL("image/png");
            var doc = new jsPDF('landscape');
            doc.addImage(img, 'JPEG', 0, 0);
            doc.save('relatorio.pdf');
        }, width: 400
    });
    x = document.getElementsByClassName("btn");
    for (i = 0; i < x.length; i++) {
        if (x[i].style.display === "none")
            x[i].style.display = '';
        else
            x[i].style.display = 'none';
    }
    display = document.getElementById("el").style.display;
    if (document.getElementById("filtro")) {
        display2 = document.getElementById("filtro").style.display;
    }


    if (display === "none") {
        document.getElementById("el").style.display = 'block';

    } else {
        document.getElementById("el").style.display = 'none';

    }
    if (display2 === "none") {
        document.getElementById("filtro").style.display = 'block';
    } else {
        if (document.getElementById("filtro")) {
            document.getElementById("filtro").style.display = 'none';
        }
    }

}

function apresentar() {
    var display = document.getElementById("apresenta").style.display;
    var display2 = document.getElementById("filtrando").style.display;
    if (display === "none") {
        document.getElementById("apresenta").style.display = 'block';
    } else {
        document.getElementById("apresenta").style.display = 'none';
    }
    
    if (display2 === "none") {
        document.getElementById("filtrando").style.display = 'inline-block';
    } else {
        document.getElementById("filtrando").style.display = 'none';
    }

}

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}
