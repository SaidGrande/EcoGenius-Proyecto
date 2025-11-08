<?php
// AJUSTA ESTA RUTA SI ES NECESARIO (en Linux suele bastar 'swipl')
$prolog_path = 'swipl'; 
$knowledge_base = 'basemejor.pl';

$salida = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo_consulta'];

    if ($tipo == 'informe') {
        $p = $_POST['planta'];
        $consulta = "informe_tecnico($p, HTML), write(HTML).";
    } elseif ($tipo == 'diagnostico') {
        $p = $_POST['planta'];
        $s = $_POST['sintoma'];
        $consulta = "diagnosticar($p, $s, HTML), write(HTML).";
    } elseif ($tipo == 'compatibilidad') {
        $p1 = $_POST['p1']; $p2 = $_POST['p2'];
        $consulta = "compatibilidad($p1, $p2, HTML), write(HTML).";
    }

    $cmd = "\"$prolog_path\" -f $knowledge_base -g \"$consulta\" -t halt";
    $process = proc_open($cmd, [1 => ["pipe", "w"], 2 => ["pipe", "w"]], $pipes);

    if (is_resource($process)) {
        $stdout = stream_get_contents($pipes[1]);
        fclose($pipes[1]); fclose($pipes[2]);
        proc_close($process);
        $salida = !empty(trim($stdout)) ? $stdout : "<div class='error-box'>🤔 Mmm... No encontré información para esa combinación. Intenta con otras plantas.</div>";
    }
}

// Si es una ficha técnica, procesamos el formato
if ($_POST['tipo_consulta'] == 'informe' && !empty(trim($salida))) {
    $salida = formatearFichaTecnica($salida);
}
// Si es un diagnóstico, procesamos el formato específico
elseif ($_POST['tipo_consulta'] == 'diagnostico' && !empty(trim($salida))) {
    $salida = formatearDiagnostico($salida);
}

function formatearFichaTecnica($texto) {
    // Parsear el texto de Prolog
    $lineas = explode("\n", $texto);
    $datos = [];
    
    foreach ($lineas as $linea) {
        if (strpos($linea, 'Ficha Tecnica:') !== false) {
            preg_match('/Ficha Tecnica: (.*?) \((.*?)\)/', $linea, $matches);
            $datos['nombre'] = $matches[1] ?? '';
            $datos['cientifico'] = $matches[2] ?? '';
        } elseif (strpos($linea, 'Dificultad:') !== false) {
            preg_match('/Dificultad: (.*)/', $linea, $matches);
            $datos['dificultad'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Ubicacion:') !== false) {
            preg_match('/Ubicacion: (.*)/', $linea, $matches);
            $datos['ubicacion'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Luz:') !== false) {
            preg_match('/Luz: (.*?) \(Nivel (\d+)\/10\)/', $linea, $matches);
            $datos['luz_desc'] = $matches[1] ?? '';
            $datos['luz_nivel'] = $matches[2] ?? '5'; // Valor por defecto si no se encuentra
        } elseif (strpos($linea, 'Riego Base:') !== false) {
            preg_match('/Riego Base: cada (\d+) dias/', $linea, $matches);
            $datos['riego'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Temperatura:') !== false) {
            preg_match('/Temperatura: entre (-?\d+) y (-?\d+) C/', $linea, $matches);
            $datos['temp_min'] = $matches[1] ?? '';
            $datos['temp_max'] = $matches[2] ?? '';
        } elseif (strpos($linea, 'Suelo ideal:') !== false) {
            preg_match('/Suelo ideal: (.*)/', $linea, $matches);
            $datos['suelo'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Abono:') !== false) {
            preg_match('/Abono: (.*)/', $linea, $matches);
            $datos['abono'] = $matches[1] ?? '';
        }
    }

    // Asegurar que todos los datos tengan valores por defecto
    $datos = array_merge([
        'nombre' => 'Planta no identificada',
        'cientifico' => 'Dificultad:',
        'dificultad' => 'Media',
        'ubicacion' => 'No especificada',
        'luz_desc' => 'Luz moderada',
        'luz_nivel' => '5',
        'riego' => '7',
        'temp_min' => '15',
        'temp_max' => '25',
        'suelo' => 'Universal bien drenado',
        'abono' => 'Ocasional'
    ], $datos);

    // Construir HTML organizado
    return '
    <div class="ficha-tecnica">
        <div class="ficha-header">
            <h2>🌿 ' . htmlspecialchars($datos['nombre']) . '</h2>
            <span class="cientifico">' . htmlspecialchars($datos['cientifico']) . '</span>
            <span class="tag-dificultad ' . htmlspecialchars($datos['dificultad']) . '">' . htmlspecialchars($datos['dificultad']) . '</span>
        </div>

        <div class="categoria-grupo">
            <h3 class="categoria-titulo">📍 Ubicación y Entorno</h3>
            <div class="ficha-grid">
                <div class="item">
                    <strong>🏠 Ubicación Ideal</strong>
                    <p>' . htmlspecialchars($datos['ubicacion']) . '</p>
                </div>
                <div class="item">
                    <strong>💡 Requerimientos de Luz</strong>
                    <p>' . htmlspecialchars($datos['luz_desc']) . '</p>
                    <div class="barra-luz">
                        <div class="barra-progreso" style="width: ' . (intval($datos['luz_nivel']) * 10) . '%;"></div>
                        <span>Nivel: ' . htmlspecialchars($datos['luz_nivel']) . '/10</span>
                    </div>
                </div>
                <div class="item">
                    <strong>🌡️ Rango de Temperatura</strong>
                    <p>' . htmlspecialchars($datos['temp_min']) . '°C a ' . htmlspecialchars($datos['temp_max']) . '°C</p>
                </div>
            </div>
        </div>

        <div class="categoria-grupo">
            <h3 class="categoria-titulo">💧 Cuidados Esenciales</h3>
            <div class="ficha-grid">
                <div class="item">
                    <strong>🚰 Frecuencia de Riego</strong>
                    <p>Cada ' . htmlspecialchars($datos['riego']) . ' días</p>
                </div>
                <div class="item">
                    <strong>🧪 Fertilización</strong>
                    <p>' . htmlspecialchars($datos['abono']) . '</p>
                </div>
            </div>
        </div>

        <div class="categoria-grupo">
            <h3 class="categoria-titulo">🌱 Sustrato y Suelo</h3>
            <div class="item-full">
                <strong>🪴 Tipo de Suelo Recomendado</strong>
                <p>' . htmlspecialchars($datos['suelo']) . '</p>
            </div>
        </div>

        <div class="resumen-cuidados">
            <h3 class="categoria-titulo">📋 Resumen de Cuidados</h3>
            <div class="tips-grid">
                <div class="tip-item">
                    <span class="tip-icon">💡</span>
                    <span>Luz: ' . htmlspecialchars($datos['luz_desc']) . '</span>
                </div>
                <div class="tip-item">
                    <span class="tip-icon">💧</span>
                    <span>Riego: Cada ' . htmlspecialchars($datos['riego']) . ' días</span>
                </div>
                <div class="tip-item">
                    <span class="tip-icon">🌡️</span>
                    <span>Temperatura: ' . htmlspecialchars($datos['temp_min']) . '°C - ' . htmlspecialchars($datos['temp_max']) . '°C</span>
                </div>
                <div class="tip-item">
                    <span class="tip-icon">🏷️</span>
                    <span>Dificultad: ' . htmlspecialchars($datos['dificultad']) . '</span>
                </div>
            </div>
        </div>
    </div>';
}

function formatearDiagnostico($texto) {
    // Parsear el diagnóstico de Prolog
    $lineas = explode("\n", $texto);
    $datos = [];
    
    foreach ($lineas as $linea) {
        if (strpos($linea, 'Diagnostico para') !== false) {
            preg_match('/Diagnostico para (.*)/', $linea, $matches);
            $datos['planta'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Lo que veo:') !== false) {
            preg_match('/Lo que veo: (.*)/', $linea, $matches);
            $datos['sintoma'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Causa probable:') !== false) {
            preg_match('/Causa probable: (.*)/', $linea, $matches);
            $datos['causa'] = $matches[1] ?? '';
        } elseif (strpos($linea, 'Solucion:') !== false) {
            preg_match('/Solucion: (.*)/', $linea, $matches);
            $datos['solucion'] = $matches[1] ?? '';
        }
    }

    // Mapear síntomas a iconos y colores
    $sintomaIconos = [
        'hojas_amarillas' => ['🟡', '#fdcb6e', 'Amarillo'],
        'hojas_secas_puntas' => ['🍂', '#e17055', 'Naranja'],
        'hojas_caidas_tristes' => ['🥀', '#e84393', 'Rosa'],
        'manchas_marrones' => ['🟤', '#a29bfe', 'Morado'],
        'no_crece' => ['🛑', '#636e72', 'Gris'],
        'bichitos' => ['🐛', '#00b894', 'Verde']
    ];

    $sintomaKey = strtolower(str_replace(' ', '_', $datos['sintoma'] ?? ''));
    $icono = $sintomaIconos[$sintomaKey][0] ?? '🤒';
    $color = $sintomaIconos[$sintomaKey][1] ?? '#74b9ff';
    $colorNombre = $sintomaIconos[$sintomaKey][2] ?? 'Azul';

    // Determinar gravedad basada en el síntoma
    $gravedad = match($sintomaKey) {
        'bichitos', 'hojas_amarillas' => 'urgente',
        'hojas_caidas_tristes', 'manchas_marrones' => 'moderado',
        default => 'leve'
    };

    $gravedadTextos = [
        'urgente' => ['🚨 Atención Urgente', 'bg-urgente'],
        'moderado' => ['⚠️ Atención Moderada', 'bg-moderado'],
        'leve' => ['ℹ️ Atención Leve', 'bg-leve']
    ];

    return '
    <div class="diagnostico-card">
        <div class="diagnostico-header ' . $gravedadTextos[$gravedad][1] . '">
            <div class="header-icon">' . $icono . '</div>
            <div class="header-info">
                <h2>' . $gravedadTextos[$gravedad][0] . '</h2>
                <p class="planta-nombre">Paciente: <strong>' . htmlspecialchars($datos['planta'] ?? 'Planta no identificada') . '</strong></p>
            </div>
        </div>

        <div class="diagnostico-grid">
            <div class="diagnostico-item">
                <div class="item-icon" style="background-color: ' . $color . '">' . $icono . '</div>
                <div class="item-content">
                    <h3>Síntoma Identificado</h3>
                    <p>' . htmlspecialchars($datos['sintoma'] ?? 'Síntoma no especificado') . '</p>
                </div>
            </div>

            <div class="diagnostico-item">
                <div class="item-icon" style="background-color: #74b9ff">🔍</div>
                <div class="item-content">
                    <h3>Causa Probable</h3>
                    <p>' . htmlspecialchars($datos['causa'] ?? 'Causa no identificada') . '</p>
                </div>
            </div>

            <div class="diagnostico-item solucion">
                <div class="item-icon" style="background-color: #00b894">💡</div>
                <div class="item-content">
                    <h3>Plan de Recuperación</h3>
                    <div class="solucion-box">
                        <p>' . htmlspecialchars($datos['solucion'] ?? 'Consulta con un especialista') . '</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="consejos-adicionales">
            <h3>📝 Consejos Adicionales</h3>
            <div class="consejos-grid">
                <div class="consejo-item">
                    <span class="consejo-icon">⏱️</span>
                    <span>Actúa pronto - Los primeros días son cruciales</span>
                </div>
                <div class="consejo-item">
                    <span class="consejo-icon">👀</span>
                    <span>Monitorea los cambios cada 2-3 días</span>
                </div>
                <div class="consejo-item">
                    <span class="consejo-icon">🌡️</span>
                    <span>Revisa temperatura y humedad ambiental</span>
                </div>
                <div class="consejo-item">
                    <span class="consejo-icon">💧</span>
                    <span>Ajusta el riego según la estación</span>
                </div>
            </div>
        </div>

        <div class="seguimiento">
            <h3>🔄 Progreso Esperado</h3>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <strong>Primeros 3-5 días:</strong> Detención del avance del problema
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <strong>1-2 semanas:</strong> Mejora visible en el follaje
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <strong>3-4 semanas:</strong> Recuperación completa en casos leves/moderados
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif; 
            background: #f5f6fa; 
            padding: 20px; 
            text-align: center;
        }

        /* ESTILOS PARA LA FICHA TÉCNICA MEJORADA */
        .ficha-tecnica {
            background: white; 
            border-radius: 20px; 
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            text-align: left;
            max-width: 700px; 
            margin: 0 auto;
            border: 1px solid #e9ecef;
        }

        .ficha-header { 
            display: flex; 
            align-items: center; 
            gap: 15px; 
            flex-wrap: wrap; 
            margin-bottom: 30px; 
            border-bottom: 2px solid #f1f2f6; 
            padding-bottom: 20px; 
        }

        .ficha-header h2 { 
            margin: 0; 
            color: #006266; 
            font-size: 1.8rem;
            flex: 1;
        }

        .cientifico { 
            font-style: italic; 
            color: #7f8c8d;
            font-size: 1rem;
        }

        .tag-dificultad { 
            padding: 8px 20px; 
            border-radius: 50px; 
            font-size: 0.9rem; 
            font-weight: bold; 
            color: white;
            text-transform: capitalize;
        }

        .tag-dificultad.Muy.Fácil, 
        .tag-dificultad.Fácil { 
            background: #00b894; 
        }

        .tag-dificultad.Media { 
            background: #fdcb6e; 
            color: #2d3436;
        }

        .tag-dificultad.Difícil { 
            background: #e17055; 
        }

        /* CATEGORÍAS */
        .categoria-grupo {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 4px solid #00b894;
        }

        .categoria-titulo {
            color: #006266;
            margin: 0 0 15px 0;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ficha-grid {
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 15px;
        }

        .item {
            background: white; 
            padding: 15px; 
            border-radius: 12px;
            border: 1px solid #e9ecef;
        }

        .item-full {
            background: white; 
            padding: 15px; 
            border-radius: 12px;
            border: 1px solid #e9ecef;
            grid-column: 1 / -1;
        }

        .item strong {
            color: #2d3436;
            display: block;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .item p {
            margin: 0;
            color: #636e72;
            line-height: 1.4;
        }

        /* BARRA DE LUZ */
        .barra-luz {
            margin-top: 10px;
        }

        .barra-progreso {
            height: 8px;
            background: linear-gradient(90deg, #00b894, #fdcb6e);
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .barra-luz span {
            font-size: 0.85rem;
            color: #636e72;
        }

        /* RESUMEN DE CUIDADOS */
        .resumen-cuidados {
            background: #e8f6f3;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }

        .tip-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: white;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .tip-icon {
            font-size: 1.2rem;
        }

        /* ========================================================================= */
        /* ESTILOS ESPECÍFICOS PARA DIAGNÓSTICO (DOCTOR PLANTAS) */
        /* ========================================================================= */

        .diagnostico-card {
            background: white; 
            border-radius: 20px; 
            padding: 0;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1); 
            text-align: left;
            max-width: 800px; 
            margin: 0 auto;
            overflow: hidden;
        }

        .diagnostico-header {
            padding: 30px;
            color: white;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .bg-urgente { background: linear-gradient(135deg, #e17055, #d63031); }
        .bg-moderado { background: linear-gradient(135deg, #fdcb6e, #e67e22); }
        .bg-leve { background: linear-gradient(135deg, #74b9ff, #0984e3); }

        .header-icon {
            font-size: 3rem;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .header-info h2 {
            margin: 0 0 10px 0;
            font-size: 1.8rem;
            font-weight: 800;
        }

        .planta-nombre {
            margin: 0;
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .diagnostico-grid {
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .diagnostico-item {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 5px solid;
            transition: transform 0.2s ease;
        }

        .diagnostico-item:hover {
            transform: translateX(5px);
        }

        .diagnostico-item.solucion {
            background: #e8f6f3;
            border-left-color: #00b894;
        }

        .item-icon {
            font-size: 1.5rem;
            background: white;
            border-radius: 12px;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .item-content h3 {
            margin: 0 0 10px 0;
            color: #2d3436;
            font-size: 1.2rem;
        }

        .item-content p {
            margin: 0;
            color: #636e72;
            line-height: 1.5;
            font-size: 1rem;
        }

        .solucion-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #00b894;
            margin-top: 10px;
        }

        .solucion-box p {
            color: #006266;
            font-weight: 600;
            margin: 0;
        }

        .consejos-adicionales {
            padding: 25px 30px;
            background: #f8f9fa;
            margin: 0 30px 30px 30px;
            border-radius: 15px;
        }

        .consejos-adicionales h3 {
            margin: 0 0 20px 0;
            color: #2d3436;
            font-size: 1.3rem;
        }

        .consejos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .consejo-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            background: white;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #636e72;
        }

        .consejo-icon {
            font-size: 1.2rem;
        }

        .seguimiento {
            padding: 0 30px 30px 30px;
        }

        .seguimiento h3 {
            margin: 0 0 20px 0;
            color: #2d3436;
            font-size: 1.3rem;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #00b894;
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
        }

        .timeline-marker {
            width: 12px;
            height: 12px;
            background: #00b894;
            border-radius: 50%;
            position: absolute;
            left: -33px;
            top: 5px;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #00b894;
        }

        .timeline-content {
            flex: 1;
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 10px;
            border-left: 4px solid #00b894;
        }

        .timeline-content strong {
            color: #006266;
        }

        /* ESTILOS PARA COMPATIBILIDAD (mantenidos) */
        .alerta {
            background: white; 
            border-radius: 20px; 
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            text-align: left;
            max-width: 600px; 
            margin: 0 auto;
            font-size: 1.2rem;
        }

        .alerta.grave { background: #fab1a0; color: #c0392b; }
        .alerta.riesgo { background: #ffeaa7; color: #d35400; }
        .alerta.exito { background: #55efc4; color: #006266; }
        
        .error-box { 
            background: #fab1a0; 
            padding: 20px; 
            border-radius: 15px; 
            color: #c0392b; 
            font-weight: bold; 
        }
    </style>
</head>
<body>
    <?php echo $salida; ?>
</body>
</html>