document.addEventListener('DOMContentLoaded', function() {
    // Variables globales
    let earthRotations = 0;
    let asteroidInterval;
    let audioPlayed = false;

    // Inicialización
    function init() {
        document.body.classList.remove('opening');
        document.body.classList.add('view-3D');
        setTimeout(() => {
            document.body.classList.add('set-speed');
        }, 2000);
    }

    // Controles de UI
    document.getElementById('toggle-data').addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.toggle('data-open');
        document.body.classList.toggle('data-close');
    });

    document.getElementById('toggle-controls').addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.toggle('controls-open');
        document.body.classList.toggle('controls-close');
    });

    // Selección de planetas
    document.querySelectorAll('#data a').forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            let ref = this.getAttribute('class');
            document.getElementById('solar-system').className = ref;
            document.querySelectorAll('#data a').forEach(a => a.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Controles de vista
    document.querySelector('.set-view').addEventListener('click', function() {
        document.body.classList.toggle('view-3D');
        document.body.classList.toggle('view-2D');
    });

    document.querySelector('.set-zoom').addEventListener('click', function() {
        document.body.classList.toggle('zoom-large');
        document.body.classList.toggle('zoom-close');
    });

    // Monitoreo de rotaciones de la Tierra
    function checkEarthRotations() {
        const earth = document.querySelector('#earth .pos');
        if (earth) {
            const transform = window.getComputedStyle(earth).getPropertyValue('transform');
            const values = transform.split('(')[1].split(')')[0].split(',');
            const angle = Math.round(Math.atan2(values[1], values[0]) * (180/Math.PI));
            
            if (angle === 0) {
                earthRotations++;
                
                // Cada 5 vueltas
                if (earthRotations % 5 === 0 && !audioPlayed) {
                    createAsteroid();
                    playGohanAudio();
                    audioPlayed = true;
                    
                    setTimeout(() => {
                        audioPlayed = false;
                    }, 5000);
                }
            }
        }
    }

    // Crear asteroide
    function createAsteroid() {
        const asteroid = document.createElement('div');
        asteroid.className = 'asteroid';
        asteroid.style.top = '50%';
        document.getElementById('solar-system').appendChild(asteroid);

        // Eliminar el asteroide después de la animación
        asteroid.addEventListener('animationend', function() {
            asteroid.remove();
        });
    }

    // Reproducir audio
    function playGohanAudio() {
        const audio = new Audio('gohan-audio.mp3');
        audio.play();
    }

    // Iniciar monitoreo de rotaciones
    setInterval(checkEarthRotations, 100);

    // Inicializar
    init();
});