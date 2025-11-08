✅ EcoGenius Ultimate V5
Sistema Experto Basado en Conocimiento para Diagnóstico y Manejo de Cultivos

Universidad de Guadalajara (UDG) – CUCEI
Materia: Seminario de Solución de Problemas de Sistemas Basados en Conocimiento (D05 – 2025B)
Profesor: Julio Esteban Valdés López

📘 Descripción General

EcoGenius Ultimate V5 es un sistema experto web orientado al análisis, diagnóstico y recomendación de cuidados para plantas de huerto y jardín. Su propósito es democratizar el conocimiento agrícola digitalizando la experiencia real de agricultores y horticultores.

A diferencia de las enciclopedias botánicas tradicionales basadas en teoría, EcoGenius se fundamenta en conocimiento empírico, validado directamente en el huerto experimental del estudiante Said Omar Hernández Grande, donde se observaron cultivos reales como cítricos, frutales, jamaica, pepino, jícama, nopal y otros.

El sistema razona como un agricultor experimentado, interpretando síntomas visibles y condiciones ambientales para ofrecer diagnósticos y recomendaciones prácticas.

EcoGenius combina una interfaz web en PHP con un motor de inferencia desarrollado en Prolog (SWI-Prolog).

👥 Integrantes del Equipo

Said Omar Hernández Grande	218515598

Tania Joseline Reséndiz Díaz	220779713

Clio Vanessa Guzmán Ruiz	219543854

🧠 Arquitectura del Sistema

El sistema está compuesto por tres elementos principales:

1. Interfaz Web (PHP + HTML + CSS)

Interfaz amigable que permite al usuario seleccionar una planta, ingresar síntomas o elegir dos cultivos para verificar compatibilidad.

2. Motor de Conocimiento (Prolog)

Archivo principal: basemejor.pl
Incluye:

Más de 100 fichas botánicas.

Reglas basadas en observación directa de campo.

Conocimiento agrícola específico para plantas mexicanas y universales.

Relación entre requerimientos de luz, suelo, riego y temperatura.

3. Integración PHP ↔ Prolog

procesar.php ejecuta consultas Prolog mediante:

swipl -f basemejor.pl -g "consulta(X)" -t halt


Esto permite generar diagnósticos y fichas técnicas dinámicas.

🌿 Módulos Funcionales
✅ A. Fichas Técnicas Inteligentes

Genera fichas dinámicas basadas en hechos Prolog. Incluye:

Nivel real de luz requerida

Temperatura tolerada

Frecuencia óptima de riego

Tipo de suelo

Fertilización recomendada

Dificultad de cultivo

✅ B. Doctor Plantas – Diagnóstico Inteligente

Interpreta síntomas como:

Hojas amarillas

Manchas marrones

Caída de hojas

Plagas

Falta de crecimiento

El sistema determina:

Causa probable

Nivel de urgencia

Plan de recuperación

✅ C. Tinder Vegetal – Compatibilidad entre Plantas

Evalúa si dos plantas pueden convivir considerando:

Requerimientos de luz

Frecuencia de riego

Tipo de suelo

Incompatibilidades tradicionales de cultivo

Rivalidades agrícolas (“relaciones tóxicas”)