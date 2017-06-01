/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function genPDF() {
                var display = document.getElementById("el").style.display;
                
                if (display === "none") {
                    document.getElementById("el").style.display = 'block';
//                    document.getElementById("rel1").style.display = 'block';
//                    document.getElementById("rel2").style.display = 'block';
//                    document.getElementById("rel3").style.display = 'block';
//                    document.getElementById("rel4").style.display = 'block';
//                    document.getElementById("rel5").style.display = 'block';
//                    document.getElementById("rel6").style.display = 'block';
                    
                    
                } else {
                    document.getElementById("el").style.display = 'none';
//                    document.getElementById("rel1").style.display = 'none';
//                    document.getElementById("rel2").style.display = 'none';
//                    document.getElementById("rel3").style.display = 'none';
//                    document.getElementById("rel4").style.display = 'none';
//                    document.getElementById("rel5").style.display = 'none';
//                    document.getElementById("rel6").style.display = 'none';
                    
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
                display = document.getElementById("el").style.display;
                if (display === "none") {
                    document.getElementById("el").style.display = 'block';
                    document.getElementById("rel1").style.display = 'block';
                    document.getElementById("rel2").style.display = 'block';
                    document.getElementById("rel3").style.display = 'block';
                    document.getElementById("rel4").style.display = 'block';
                    document.getElementById("rel5").style.display = 'block';
                    document.getElementById("rel6").style.display = 'block';
                   
                    
                    
                } else {
                    document.getElementById("el").style.display = 'none';
                    document.getElementById("rel1").style.display = 'none';
                    document.getElementById("rel2").style.display = 'none';
                    document.getElementById("rel3").style.display = 'none';
                    document.getElementById("rel4").style.display = 'none';
                    document.getElementById("rel5").style.display = 'none';
                    document.getElementById("rel6").style.display = 'none';
                    
                }

            }

