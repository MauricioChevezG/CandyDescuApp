

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <script src="assets/js/Winwheel.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>

<div class="col-sm-offset-4 col-sm-4">
     <br />
     <br />
    <button type="button" class="btn btn btn-success"value="Girar" onclick="miRuleta.startAnimation();"><span class="glyphicon glyphicon-play"></span> Jugar</button>
    
    <br />
   
    <br />
    <canvas id='canvas' height="400" width="400"></canvas>

 <script>
     var miRuleta = new Winwheel({
           'numSegments': 9, // Número de segmentos
           'outerRadius'    : 170, // Radio externo
            'segments':[ // Datos de los segmentos
                { 'fillStyle': '#f1c40f', 'text': 'Premio 1' },
                { 'fillStyle': '#2ecc71', 'text': 'Premio 2' },
                { 'fillStyle': '#e67e22', 'text': 'Premio 3' },
                { 'fillStyle': '#e74c3c', 'text': 'Confite' },
                { 'fillStyle': '#8e44ad', 'text': 'Premio 4' },
                { 'fillStyle': '#f1c40f', 'text': 'Premio 5' },
                { 'fillStyle': '#2ecc71', 'text': 'Confite' },
                { 'fillStyle': '#e67e22', 'text': 'Premio 6' },
                { 'fillStyle': '#e74c3c', 'text': 'Confite' },
               
            ],
            'animation': { 
                'type': 'spinToStop', // Giro y alto
                'duration': 5, // Duración de giro
                'callbackFinished': 'Mensaje()', // Función para mostrar mensaje
                'callbackAfter': 'dibujarIndicador()' // Funciona de pintar indicador
            }
         });
       
         dibujarIndicador();
       function Mensaje() {
           var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
           var frutas = ["Confite", "Premio 1", "Premio 2", "Premio 3","Premio 4","Premio 5","Premio 6"];
           var a = frutas.indexOf(SegmentoSeleccionado.text);


           miRuleta.stopAnimation(false);
           miRuleta.rotationAngle = 0;
           miRuleta.draw();
           dibujarIndicador();
           console.log(a);
           alertify.alert("Premio","Elemento seleccionado: " + a + "!", function(){
            alertify.success('Ok');
            location.href = '?c=classjuego&m=ganaPremio&id='+a;
           });
           console.log(a);
       }
       function dibujarIndicador() {
            var ctx = miRuleta.ctx;
            ctx.strokeStyle = '#000000';
    ctx.fillStyle   = 'yellow';
    ctx.lineWidth   = 2;
    ctx.beginPath();
    ctx.moveTo(195, 10);
    ctx.lineTo(195, 30);
    ctx.lineTo(165, 30);
    ctx.lineTo(205, 70);
    ctx.lineTo(245, 30);
    ctx.lineTo(215, 30);
    ctx.lineTo(215, 10);
    ctx.lineTo(195, 10);
    ctx.stroke();
    ctx.fill();                 
       }
 </script>
</div>