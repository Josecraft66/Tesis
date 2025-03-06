<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Proyectos</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding: 2rem;
            overflow-x: hidden;
        }

        .table-container {
            background: rgba(255, 0, 0, 0.1);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 32px 0 rgba(255, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 0, 0, 0.5);
            width: 100%;
            max-width: 900px;
            margin-top: 20px;
        }

        .arrow {
            text-decoration: none;
            font-size: 3em;
            display: inline-block;
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
            animation: gradient 2s ease infinite;
            background-size: 200% 200%;
        }

        .arrow::before {
            content: '⤴';
            display: inline-block;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Efecto de brillo alrededor */
        .arrow::after {
            content: '';
            position: absolute;
            inset: -10px;
            background: radial-gradient(circle,
                    rgba(255, 0, 0, 0.2),
                    transparent 70%);
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .arrow:hover {
            transform: scale(1.2);
            filter: brightness(1.2);
        }

        .arrow:hover::before {
            content: '➤';
            transform: rotate(-45deg) scale(1.1);
            text-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
        }

        .arrow:hover::after {
            opacity: 1;
            animation: pulse 1s infinite;
        }

        .arrow.flying {
            animation:
                fly 0.6s cubic-bezier(0.4, 0, 1, 1) forwards,
                spin 0.6s ease-out forwards;
        }

        /* Partículas para el efecto de vuelo */
        .particle {
            position: fixed;
            pointer-events: none;
            background: linear-gradient(45deg, #ff0000, #ff7300);
            border-radius: 50%;
            animation: particle 0.6s ease-out forwards;
        }

        @keyframes particle {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0) translate(var(--tx), var(--ty));
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }
        }

        @keyframes fly {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }

            50% {
                transform: translate(50vw, -50vh) scale(1.5);
                opacity: 0.5;
            }

            100% {
                transform: translate(100vw, -100vh) scale(0);
                opacity: 0;
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(720deg);
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            font-family: 'Staatliches', sans-serif;
            color: #f0f0f0;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7),
                0 0 20px rgba(255, 0, 0, 0.5),
                0 0 30px rgba(255, 0, 0, 0.3);
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 0, 0, 0.3);
        }

        th {
            background-color: rgba(255, 0, 0, 0.5);
        }

        tr:hover {
            background-color: rgba(255, 0, 0, 0.2);
        }

        .btn-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .btn-dark {
            transition: all 0.3s ease;
        }

        .btn-dark:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <h1>Proyectos de Administracion</h1>
    <div class="btn-container">
        <a href="../../../../proyecto/index.html" class="btn btn-dark">Regresar</a>
    </div>
    <div class="table-container">
        <table>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre del proyecto</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Proyecto 1</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/album1/index.html"></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Proyecto 2</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/album3/index.html"></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Proyecto 3</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/albumlibro/index.html"></a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Proyecto 4</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/albumrueda/index.html"></a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Proyecto 5</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/super/index.html"></a>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Proyecto 6</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/Sistemasolar/index.html"></a>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Proyecto 7</td>
                    <td>
                        <a href="#" class="arrow" data-url="../proyecto/proyectos/Exel/index.html"></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function createParticles(x, y) {
            const particleCount = 10;
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';

                // Tamaño aleatorio entre 5 y 10px
                const size = Math.random() * 5 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Posición inicial
                particle.style.left = `${x}px`;
                particle.style.top = `${y}px`;

                // Dirección aleatoria
                const angle = (Math.random() * 360) * (Math.PI / 180);
                const distance = Math.random() * 100 + 50;
                const tx = Math.cos(angle) * distance;
                const ty = Math.sin(angle) * distance;

                particle.style.setProperty('--tx', `${tx}px`);
                particle.style.setProperty('--ty', `${ty}px`);

                document.body.appendChild(particle);

                // Limpiar partículas
                setTimeout(() => {
                    particle.remove();
                }, 600);
            }
        }

        document.querySelectorAll('.arrow').forEach((arrow) => {
            arrow.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.getAttribute('data-url');

                // Obtener la posición del click para las partículas
                const rect = this.getBoundingClientRect();
                const x = rect.left + (rect.width / 2);
                const y = rect.top + (rect.height / 2);

                // Crear efecto de partículas
                createParticles(x, y);

                // Añadir clase flying para la animación
                this.classList.add('flying');

                // Redireccionar después de la animación
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        window.location.href = url;
                    }, 500);
                });
            });
        });
    </script>
</body>

</html>