<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elipsă și curbă aliniate</title>
    <style>
        #videoContainer {
            position: relative;
            width: 800px; /* Ajustează dimensiunile în funcție de nevoile tale */
            height: 1300px; /* Ajustează dimensiunile în funcție de nevoile tale */
        }

        video {
            position: absolute;
            top: 510px; /* Ajustează poziția video-ului pe axa Y */
            left: 370px; /* Ajustează poziția video-ului pe axa X */
            z-index: 1; /* Asigură că video-ul se va afișa deasupra canvasului */
        }

        #myCanvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
            border: 4px solid #000000;
        }
    </style>
</head>
<body>
    <div id="videoContainer">
        <video width="320" height="240" autoplay controls>
            <source src="mov_bbb.mp4" type="video/mp4">
            <source src="mov_bbb.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
    </div>

    <canvas id="myCanvas" width="800" height="1100"></canvas>

    <script>
        const canvas = document.getElementById('myCanvas');
        const ctx = canvas.getContext('2d');

        // Setează culoarea conturului dreptunghiului și grosimea liniei
        ctx.lineWidth = 4;
        ctx.strokeStyle = '#f5c800';

        // Desenează dreptunghiul fără împărțire
        const rectangleX = 100; // Coordonata X a colțului din stânga sus
        const rectangleY = 100; // Coordonata Y a colțului din stânga sus
        const rectangleWidth = 600; // Lățimea dreptunghiului
        const rectangleHeight = 400; // Înălțimea dreptunghiului
        ctx.strokeRect(rectangleX, rectangleY, rectangleWidth, rectangleHeight);

        // Setează culoarea conturului cercului
        ctx.strokeStyle = '#f5c800';

        // Desenează cercul în interiorul dreptunghiului (oval)
        const ovalCenterX = canvas.width / 2 - 120; // Mutăm centrul cercului la stânga
        const ovalCenterY = canvas.height / 4.2;
        const ovalRadiusX = 150; // Ajustăm raza orizontală pentru a face ovalul
        const ovalRadiusY = 100; // Ajustăm raza verticală pentru a face ovalul
        ctx.beginPath();
        ctx.ellipse(ovalCenterX, ovalCenterY, ovalRadiusX, ovalRadiusY, 0, 0, 2 * Math.PI);
        ctx.stroke();

        // Desenează curba în interiorul dreptunghiului
        ctx.strokeStyle = '#ff0000';
        ctx.beginPath();
        ctx.moveTo(500, 220);
        ctx.quadraticCurveTo(440, 440, 680, 280);
        ctx.stroke();

        // Adaugă linia orizontală dreapta deasupra dreptunghiului
        ctx.strokeStyle = '#0000ff'; 
        ctx.beginPath();
        ctx.moveTo(80, 80); 
        ctx.lineTo(200, 80); 
        ctx.stroke(); 

        // Adaugă textul deasupra liniei albastre
        ctx.fillStyle = '#0019f5';
        ctx.font = '20px Arial'; 
        ctx.fillText('Aplică textul și efecte de animație imaginii', 80, 60); 

        // Adaugă imaginea sub dreptunghiul portocaliu
        const img = new Image();
        img.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQt5h5Y3hJ1lM0jLirxF-FFUNnYD2dsn1ym5gATIynuZQ&s';
        img.onload = function() {
            ctx.drawImage(img, 100, 550, 260, 150); 
        };
        
        // Adaugă linia orizontală dreapta deasupra dreptunghiului
        ctx.strokeStyle = '#0000ff'; 
        ctx.beginPath();
        ctx.moveTo(80, 780); 
        ctx.lineTo(700, 780); 
        ctx.stroke(); 

        // Adaugă textul deasupra liniei albastre
        ctx.fillStyle = '#0019f5'; 
        ctx.font = '20px Arial'; 

        // Definirea poeziei
        const poem = [
            'Lacul codrilor albastru',
            'Nuferi galbeni îl încarcă',
            'Tresărind în cercuri albe',
            'El cutremură o barcă',
            'Şi eu trec de-a lung de maluri',
            'Parc-ascult şi parc-aştept',
            'Ea din trestii să răsară',
            'Şi să-mi cadă lin pe piept;'
        ];

        // Desenează fiecare vers al poeziei la coordonatele corespunzătoare
        const lineHeight = 25; 
        const startY = 810; 
        poem.forEach((line, index) => {
            ctx.fillText(line, 80, startY + index * lineHeight); 
        });
    
    </script>
</body>
</html>
