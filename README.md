# 🌱 EcoGenius Ultimate V5  
### 🧠 Sistema Experto Basado en Conocimiento para Diagnóstico y Manejo de Cultivos  
**Universidad de Guadalajara – CUCEI**  
**Materia:** Seminario de Solución de Problemas de Sistemas Basados en Conocimiento (D05 – 2025B)  
**Profesor:** Julio Esteban Valdés López  

---

# 📘 Descripción General

EcoGenius Ultimate V5 es un **sistema experto web** diseñado para diagnosticar, analizar y recomendar cuidados para plantas, basado en **conocimiento empírico real**, no solo teoría académica.

Este sistema digitaliza la experiencia de agricultores y horticultores, tomando como estudio de caso el **huerto experimental del estudiante Said Omar Hernández Grande**, donde se validaron reglas y comportamientos reales de cultivos como:

- Cítricos (limón, mandarina dulce y agria)
- Frutales (papaya, guayaba, ciruela)
- Hortalizas (pepino, jícama, jamaica)
- Plantas nativas (nopal)

El software razona igual que un agricultor experimentado: evaluando síntomas visibles, comparando condiciones ambientales y proponiendo acciones basadas en experiencia práctica.

---

# 👥 Integrantes del Equipo

- 👤 **Said Omar Hernández Grande** – 218515598  
- 👤 **Tania Joseline Reséndiz Díaz** – 220779713  
- 👤 **Clio Vanessa Guzmán Ruiz** – 219543854  

---

# 🏗️ Arquitectura del Sistema

## 1. 🌐 Interfaz Web (PHP + HTML + CSS)
Permite:
- Consultar plantas
- Solicitar fichas técnicas
- Generar diagnósticos
- Ver compatibilidad entre cultivos

## 2. 🧠 Motor de Conocimiento (Prolog – SWI-Prolog)
Archivo principal: **basemejor.pl**

Incluye:
- Más de **100 fichas botánicas**
- Reglas de diagnóstico basadas en observación del huerto
- Compatibilidad/incompatibilidad entre cultivos
- Reglas de manejo y recomendaciones de riego, luz y suelo

## 3. 🔗 Integración PHP ↔ Prolog
El archivo **procesar.php** ejecuta consultas utilizando:

swipl -f basemejor.pl -g "consulta(X)" -t halt

Lo que permite que la información sea generada dinámicamente.

---

# 🔍 Módulos Funcionales

## ✅ A. Enciclopedia Viva – Fichas Técnicas Dinámicas
Genera información detallada como:
- Requerimientos de luz
- Frecuencia de riego
- Temperatura óptima
- Suelo recomendado
- Nivel de dificultad
- Fertilización ideal

Todo se obtiene consultando directamente la base de conocimiento.

---

## ✅ B. Doctor Plantas – Diagnóstico Inteligente

Evalúa síntomas como:
- 🟡 Hojas amarillas  
- 🍂 Puntas secas  
- 🥀 Hojas caídas  
- 🐛 Presencia de plagas  
- 🛑 Falta de crecimiento  

Produce un análisis compuesto por:
- Síntoma identificado  
- Causa probable  
- Nivel de urgencia  
- Plan de recuperación  
- Consejos adicionales  

---

## ✅ C. Compatibilidad entre Plantas (Tinder Vegetal)

Determina si dos plantas pueden convivir según:
- Tipo de luz  
- Frecuencia de riego  
- Tipo de suelo  
- Requerimientos del entorno  
- Reglas agrícolas tradicionales  

Ejemplo:  
- ❌ Tomate + Patata → Se enferman entre sí  
- ✅ Jamaica + Pepino → Alta compatibilidad  

---

# 🛠️ Tecnologías Utilizadas

- ⚙️ **Backend:** PHP 8+
- 🧠 **Motor Lógico:** SWI-Prolog  
- 🖥️ **Servidor:** Apache (XAMPP / Render)  
- 🐳 **Docker:** Para despliegue en Render  
- 🎨 **Frontend:** HTML + CSS + JS  
- 🔌 **Integración:** `proc_open()` para ejecutar consultas Prolog  

---

# ✅ Estado Actual del Proyecto

- Motor de inferencia funcional  
- Más de 100 reglas registradas  
- Diagnósticos reales basados en experiencia  
- Fichas técnicas completamente dinámicas  
- Proyecto listo para presentarse y desplegarse  

---

# 📄 Licencia  
Proyecto académico sin fines de lucro. Uso exclusivo para fines educativos dentro de la Universidad de Guadalajara.

