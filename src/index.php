<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGenius Ultimate | Tu Asistente Verde</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00b894; --primary-dark: #006266;
            --secondary: #fdcb6e; --accent: #e17055;
            --bg: #dfe6e9; --card-bg: #ffffff; --text: #2d3436;
        }
        body {
            font-family: 'Nunito', sans-serif; background-color: var(--bg);
            color: var(--text); margin: 0; padding: 20px; min-height: 100vh;
        }
        .main-wrapper { max-width: 1000px; margin: 0 auto; }
        
        /* HEADER */
        .app-header {
            text-align: center; padding: 40px 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white; border-radius: 30px; margin-bottom: 30px;
            box-shadow: 0 15px 30px -10px rgba(0,184,148,0.5);
        }
        .app-header h1 { margin: 0; font-size: 3rem; font-weight: 800; letter-spacing: -1px; }
        .app-header p { font-size: 1.2rem; opacity: 0.9; margin-top: 10px; }

        /* TABS DE NAVEGACIÓN */
        .nav-tabs {
            display: flex; justify-content: center; gap: 15px; margin-bottom: 30px; flex-wrap: wrap;
        }
        .nav-btn {
            background: var(--card-bg); border: none; padding: 15px 30px;
            border-radius: 20px; font-size: 1.1rem; font-weight: 700; color: var(--text);
            cursor: pointer; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex; align-items: center; gap: 10px;
        }
        .nav-btn.active {
            background: var(--primary); color: white; transform: translateY(-3px);
            box-shadow: 0 10px 20px -5px rgba(0,184,148,0.4);
        }
        .nav-btn:hover:not(.active) { transform: translateY(-2px); background: #f1f2f6; }

        /* CONTENIDO DE LAS SECCIONES */
        .tab-content { display: none; animation: fadeIn 0.5s ease; }
        .tab-content.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .card-tool {
            background: var(--card-bg); padding: 40px; border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        }
        .tool-header { margin-bottom: 30px; text-align: center; }
        .tool-header h2 { color: var(--primary-dark); margin: 0 0 10px 0; font-size: 2rem; }

        /* FORMULARIOS */
        .form-group { margin-bottom: 25px; }
        .form-group label { display: block; margin-bottom: 10px; font-weight: 700; color: var(--primary-dark); }
        select, .btn-submit {
            width: 100%; padding: 15px 20px; border-radius: 15px;
            border: 2px solid #eee; font-size: 1rem; font-family: inherit;
            transition: all 0.3s; appearance: none; background-color: #fafafa;
        }
        select:focus { border-color: var(--primary); outline: none; background-color: white; }
        .btn-submit {
            background: var(--primary-dark); color: white; border: none;
            font-weight: 800; cursor: pointer; letter-spacing: 1px; text-transform: uppercase;
            margin-top: 20px;
        }
        .btn-submit:hover { background: var(--primary); transform: scale(1.02); }
        .btn-submit.secondary { background: var(--accent); }

        /* IFRAME PARA RESULTADOS (TRUCO PARA NO RECARGAR PAGINA COMPLETA) */
        #resultado-frame {
            width: 100%; height: 500px; border: none; border-radius: 30px;
            margin-top: 40px; display: none; /* Se muestra al enviar */
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <header class="app-header">
            <h1>🌿 EcoGenius V5</h1>
            <p>Tu Experto en Jardinería de Bolsillo. ¡Cualquiera puede tener mano verde!</p>
        </header>

        <nav class="nav-tabs">
            <button class="nav-btn active" onclick="openTab('ficha')">📋 Ficha Técnica</button>
            <button class="nav-btn" onclick="openTab('doctor')">🩺 Doctor Plantas</button>
            <button class="nav-btn" onclick="openTab('tinder')">💘 Compatibilidad</button>
        </nav>

        <div id="ficha" class="tab-content active">
            <div class="card-tool">
                <div class="tool-header">
                    <h2>Enciclopedia Vegetal</h2>
                    <p>Descubre los secretos de más de 80 especies para cuidarlas como un profesional.</p>
                </div>
                <form action="procesar.php" method="POST" target="resultado_target" onsubmit="showFrame()">
                    <input type="hidden" name="tipo_consulta" value="informe">
                    <div class="form-group">
                        <label>🌱 ¿Qué planta quieres conocer?</label>
                        <select name="planta" required>
                            <option value="">-- Selecciona una especie --</option>
                            <?php include 'catalog_plantas.php'; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit">✨ Generar Ficha Maestra</button>
                </form>
            </div>
        </div>

        <div id="doctor" class="tab-content">
            <div class="card-tool" style="border-top: 5px solid var(--accent);">
                <div class="tool-header">
                    <h2>Hospital Verde</h2>
                    <p>¿Tu planta se ve triste? Cuéntame qué le pasa y te diré cómo salvarla.</p>
                </div>
                <form action="procesar.php" method="POST" target="resultado_target" onsubmit="showFrame()">
                    <input type="hidden" name="tipo_consulta" value="diagnostico">
                    <div class="form-group">
                        <label>🤒 Paciente (Planta):</label>
                        <select name="planta" required>
                            <option value="">-- ¿Quién está enferma? --</option>
                            <?php include 'catalog_plantas.php'; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>🤢 Síntoma principal:</label>
                        <select name="sintoma" required>
                            <option value="">-- ¿Qué le notas? --</option>
                            <option value="hojas_amarillas">🟡 Hojas amarillas</option>
                            <option value="hojas_secas_puntas">🍂 Puntas secas o crujientes</option>
                            <option value="hojas_caidas_tristes">🥀 Hojas caídas / Tristes</option>
                            <option value="manchas_marrones">🟤 Manchas marrones o negras</option>
                            <option value="no_crece">🛑 No crece nada</option>
                            <option value="bichitos">🐛 Tiene bichitos visible</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit secondary">🚑 ¡Diagnosticar Ahora!</button>
                </form>
            </div>
        </div>

        <div id="tinder" class="tab-content">
            <div class="card-tool" style="border-top: 5px solid #e84393;">
                <div class="tool-header">
                    <h2>"Tinder" Vegetal</h2>
                    <p>¿Quieres plantarlas juntas en la misma maceta o bancal? Veamos si hacen match.</p>
                </div>
                <form action="procesar.php" method="POST" target="resultado_target" onsubmit="showFrame()">
                    <input type="hidden" name="tipo_consulta" value="compatibilidad">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label>💖 Planta 1:</label>
                            <select name="p1" required>
                                <option value="">-- Selecciona --</option>
                                <?php include 'catalog_plantas.php'; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>💙 Planta 2:</label>
                            <select name="p2" required>
                                <option value="">-- Selecciona --</option>
                                <?php include 'catalog_plantas.php'; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit" style="background: #e84393;">💘 Ver Compatibilidad</button>
                </form>
            </div>
        </div>

        <iframe name="resultado_target" id="resultado-frame"></iframe>

    </div>

    <script>
        function openTab(tabId) {
            // Ocultar todos
            document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
            // Mostrar seleccionado
            document.getElementById(tabId).classList.add('active');
            event.currentTarget.classList.add('active');
            // Ocultar iframe al cambiar de tab para limpiar
             document.getElementById('resultado-frame').style.display = 'none';
        }
        function showFrame() {
            document.getElementById('resultado-frame').style.display = 'block';
             // Scroll suave hacia el resultado
             setTimeout(() => {
                 document.getElementById('resultado-frame').scrollIntoView({ behavior: 'smooth' });
             }, 300);
        }
    </script>
</body>
</html>