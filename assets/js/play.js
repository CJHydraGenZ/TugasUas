// var baseUrlMusic = 'http://localhost:8080/tugasUas/assets/music/';
// var dataMusic = $('#music').data('music');
// console.log(dataMusic);

var btn = document.getElementById('btn');
var btnStop = document.getElementById('btnStop');
// var durationE = document.getElementById('duration');


// var audio = new Audio(baseUrlMusic + dataMusic);
// var au = 0
// btn.addEventListener('click', () => {
//     var context, analisis, canvas, ctx;
//     audio.play();


//     context = new AudioContext;
//     analisis = context.createAnalyser();


//     canvas = document.getElementById('canvas');

//     ctx = canvas.getContext('2d');

//     var smb = context.createMediaElementSource(audio)

//     smb.connect(analisis);
//     analisis.connect(context.destination);

//     animasi();



//     function animasi() {
//         window.requestAnimationFrame(animasi);
//         var arr = new Uint8Array(analisis.frequencyBinCount);
//         analisis.getByteFrequencyData(arr);


//         ctx.clearRect(0, 0, canvas.width, canvas.height);
//         ctx.fillStyle = '#00ccff';

//         var bars = 100;
//         for (var i = 0; i < bars; i++) {
//             var barX = i * 3;
//             var barW = 2;
//             var barH = -(arr[i] / 2);

//             ctx.fillRect(barX, canvas.height, barW, barH);

//         }
//     }

//     if (audio.readyState > 0) {
//         var Aduration = audio.duration
//         var menit = parseFloat(Aduration / 60).toFixed(2)
//         var detik = parseInt(Aduration % 60);




//         console.log({
//             menit,
//             detik
//         });

//     }



// })

// btnStop.addEventListener('click', () => {
//     audio.pause();

//     audio.currentTime = 0
// })


// console.log(dataMusic);


var analyser, canvas, ctx, random = Math.random,
    circles = [];

btn.addEventListener('click', () => {
    var tampil = document.querySelector('.Tampil')
    canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    tampil.appendChild(canvas);
    ctx = canvas.getContext('2d');

    setupWebAudio();

    for (var i = 0; i < 20; i++) {
        circles[i] = new Circle();
        circles[i].draw();
    }
    draw();
});



function setupWebAudio() {
    var baseUrlMusic = 'http://localhost/tugasUas/assets/music/';
    var dataMusic = $('#music').data('music');


    var tampil = document.querySelector('.Tampil')
    var audio = new Audio(baseUrlMusic + dataMusic);
    // var audio = document.createElement('audio');
    // audio.src = 'music.mp3';
    audio.controls = 'true';
    tampil.appendChild(audio);
    audio.style.width = window.innerWidth + 'px';

    var audioContext = new AudioContext();
    analyser = audioContext.createAnalyser();
    var source = audioContext.createMediaElementSource(audio);
    source.connect(analyser);
    analyser.connect(audioContext.destination);
    audio.play();
}

function draw() {
    requestAnimationFrame(draw);
    var freqByteData = new Uint8Array(analyser.frequencyBinCount);
    analyser.getByteFrequencyData(freqByteData);
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (var i = 1; i < circles.length; i++) {
        circles[i].radius = freqByteData[i] * 2;
        circles[i].y = circles[i].y > canvas.height ? 0 : circles[i].y + 1;
        circles[i].draw();
    }

    for (var i = 1; i < freqByteData.length; i += 10) {
        ctx.fillStyle = 'rgb(' + getRandomColor() + ',' + getRandomColor() + ',' + getRandomColor() + ')';
        ctx.fillRect(i + 400, canvas.height - freqByteData[i] * 1.5, 10, canvas.height);
        ctx.strokeRect(i + 400, canvas.height - freqByteData[i] * 1.5, 10, canvas.height);
    }
}

function getRandomColor() {
    return random() * 255 >> 0;
}

function Circle() {
    this.x = random() * canvas.width;
    this.y = random() * canvas.height;
    this.radius = random() * 100 + 50;
    this.color = 'rgb(' + getRandomColor() + ',' + getRandomColor() + ',' + getRandomColor() + ')';
}

Circle.prototype.draw = function () {
    var that = this;
    ctx.save();
    ctx.beginPath();
    ctx.globalAlpha = random() / 3 + 0.2;
    ctx.arc(that.x, that.y, that.radius, 0, Math.PI * 2);
    ctx.fillStyle = this.color;
    ctx.fill();
    ctx.restore();
}