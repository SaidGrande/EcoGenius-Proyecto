:- encoding(utf8).

% =======================================================================
% ECOGENIUS ULTIMATE V5 - BASE DE CONOCIMIENTOS MASIVA
% =======================================================================

% -----------------------------------------------------------------------
% 1. BASE DE HECHOS (Las Fichas de las Plantas)
% Formato: ficha(ID, NombreComun, NombreCientifico, UbicacionIdeal, ReqLuz(0-10), RiegoBase(dias), TempMin, TempMax, Suelo, Fertilizacion, Dificultad).
% -----------------------------------------------------------------------

% --- INTERIOR FACIL ---
ficha(sansevieria, 'Lengua de Suegra', 'Dracaena trifasciata', interior, 2, 20, 10, 35, 'Suelto y drenante', 'Casi nula', 'Muy Facil').
ficha(zamioculcas, 'Planta ZZ', 'Zamioculcas zamiifolia', interior, 2, 18, 12, 30, 'Universal drenado', '1-2 veces al ano', 'Muy Facil').
ficha(potos, 'Potos', 'Epipremnum aureum', interior, 4, 8, 10, 30, 'Universal', 'Bimensual', 'Facil').
ficha(cinta, 'Cinta/Malamadre', 'Chlorophytum comosum', interior, 5, 7, 5, 30, 'Universal', 'Mensual verano', 'Facil').
ficha(arbol_jade, 'Arbol de Jade', 'Crassula ovata', interior_sol, 8, 15, 5, 35, 'Cactus/Suculentas', 'Poco en verano', 'Facil').
ficha(aloe_vera, 'Aloe Vera', 'Aloe barbadensis', interior_sol, 8, 15, 5, 35, 'Arenoso', 'Casi nula', 'Facil').
ficha(cactus_navidad, 'Cactus de Navidad', 'Schlumbergera', interior, 6, 9, 10, 25, 'Rico y drenado', 'Previo floracion', 'Facil').
ficha(aspidistra, 'Aspidistra', 'Aspidistra elatior', interior, 1, 15, 0, 30, 'Cualquiera', 'Ocasional', 'Muy Facil').

% --- INTERIOR TROPICAL ---
ficha(monstera, 'Costilla de Adan', 'Monstera deliciosa', interior, 5, 7, 15, 30, 'Rico en humus, ligero', 'Mensual', 'Media').
ficha(spathi, 'Cuna de Moises', 'Spathiphyllum', interior, 3, 5, 15, 25, 'Humedo, rico', 'Mensual', 'Media').
ficha(ficus_lyrata, 'Ficus Lira', 'Ficus lyrata', interior, 7, 8, 15, 30, 'Fertil, buen drenaje', 'Mensual crecimiento', 'Dificil').
ficha(ficus_elastica, 'Ficus Elastica', 'Ficus elastica', interior, 6, 9, 12, 30, 'Universal', 'Mensual', 'Facil').
ficha(calathea, 'Calathea', 'Calathea spp.', interior, 3, 4, 18, 25, 'Acido, humedo', 'Delicado, diluido', 'Dificil').
ficha(maranta, 'Maranta', 'Maranta leuconeura', interior, 3, 4, 18, 25, 'Humedo, ligero', 'Delicado', 'Media').
ficha(helecho_boston, 'Helecho Boston', 'Nephrolepis exaltata', interior, 4, 3, 10, 25, 'Rico, siempre humedo', 'Liquido quincenal', 'Media').
ficha(anturio, 'Anturio', 'Anthurium andraeanum', interior, 6, 5, 18, 28, 'Esponjoso, orquideas', 'Para floracion', 'Media').
ficha(dieffenbachia, 'Diefembaquia', 'Dieffenbachia seguine', interior, 4, 7, 15, 28, 'Universal humedo', 'Mensual', 'Media').
ficha(aglaonema, 'Aglaonema', 'Aglaonema commutatum', interior, 3, 9, 15, 28, 'Universal ligero', 'Ocasional', 'Facil').
ficha(croton, 'Croton', 'Codiaeum variegatum', interior, 8, 5, 15, 30, 'Fertil', 'Quincenal verano', 'Dificil').
ficha(palma_areca, 'Palma Areca', 'Dypsis lutescens', interior, 7, 6, 15, 30, 'Humedo, bien drenado', 'Mensual', 'Media').
ficha(peperomia, 'Peperomia', 'Peperomia spp.', interior, 5, 8, 15, 26, 'Ligero, aireado', 'Poco', 'Facil').
ficha(begonia_maculata, 'Begonia Maculata', 'Begonia maculata', interior, 6, 5, 15, 25, 'Ligero, no encharcar', 'Quincenal', 'Media').
ficha(alocasia, 'Alocasia', 'Alocasia spp.', interior, 6, 6, 18, 28, 'Muy poroso y rico', 'Frecuente verano', 'Dificil').
ficha(orquidea, 'Orquidea', 'Phalaenopsis', interior, 5, 7, 16, 30, 'Corteza de pino', 'Especifico orquideas', 'Media').

% --- CACTUS Y SUCULENTAS ---
ficha(echeveria, 'Echeveria', 'Echeveria spp.', exterior, 9, 12, 5, 35, 'Mineral suculentas', 'Poco', 'Facil').
ficha(haworthia, 'Haworthia', 'Haworthia spp.', interior_sol, 6, 14, 10, 30, 'Mineral', 'Muy poco', 'Facil').
ficha(sedum, 'Sedum', 'Sedum morganianum', exterior, 8, 10, 5, 35, 'Drenante', 'Poco', 'Facil').
ficha(nopal, 'Nopal', 'Opuntia ficus-indica', exterior, 10, 20, 0, 40, 'Arenoso, pobre', 'Casi nula', 'Muy Facil').
ficha(cactus_barril, 'Cactus Barril', 'Echinocactus grusonii', exterior, 10, 30, 5, 40, 'Mineral puro', 'Casi nula', 'Facil').
ficha(kalanchoe, 'Kalanchoe', 'Kalanchoe blossfeldiana', interior_sol, 7, 10, 10, 30, 'Universal drenado', 'Mensual floracion', 'Facil').

% --- EXTERIOR FLORES ---
ficha(geranio, 'Geranio', 'Pelargonium', exterior, 9, 4, 0, 35, 'Universal', 'Constante', 'Facil').
ficha(rosal, 'Rosal', 'Rosa spp.', exterior, 8, 4, -5, 30, 'Arcilloso, rico', 'Especifico rosales', 'Media').
ficha(buganvilla, 'Buganvilla', 'Bougainvillea', exterior, 10, 8, 5, 40, 'Bien drenado', 'Bajo N para flor', 'Facil').
ficha(hortensia, 'Hortensia', 'Hydrangea macrophylla', exterior_sombra, 4, 3, -5, 25, 'Acido, humedo', 'Acidofilas', 'Media').
ficha(lavanda, 'Lavanda', 'Lavandula angustifolia', exterior, 10, 15, -10, 35, 'Calcareo, seco', 'Nula en suelo', 'Facil').
ficha(petunia, 'Petunia', 'Petunia hybrida', exterior, 9, 3, 5, 30, 'Universal fertil', 'Semanal', 'Facil').
ficha(tagete, 'Cempasuchil', 'Tagetes erecta', exterior, 9, 4, 5, 35, 'Universal', 'Quincenal', 'Facil').
ficha(hibisco, 'Hibisco', 'Hibiscus rosa-sinensis', exterior, 8, 5, 10, 35, 'Rico, drenado', 'Frecuente verano', 'Media').
ficha(jazmin, 'Jazmin', 'Jasminum officinale', exterior, 8, 5, -5, 35, 'Universal', 'Mensual', 'Facil').
ficha(gardenia, 'Gardenia', 'Gardenia jasminoides', exterior_sombra, 5, 4, 5, 30, 'Acido, hierro', 'Acidofilas', 'Dificil').
ficha(azalea, 'Azalea', 'Rhododendron simsii', exterior_sombra, 4, 3, 0, 25, 'Acido, turba', 'Acidofilas', 'Media').
ficha(crisantemo, 'Crisantemo', 'Chrysanthemum', exterior, 7, 4, -5, 30, 'Universal', 'Quincenal', 'Facil').
ficha(girasol, 'Girasol', 'Helianthus annuus', exterior, 10, 4, 10, 35, 'Profundo, fertil', 'Frecuente', 'Facil').
ficha(tulipan, 'Tulipan', 'Tulipa', exterior, 7, 6, -10, 20, 'Suelto, arenoso', 'Antes de florar', 'Media').

% --- HUERTO HORTALIZAS ---
ficha(tomate, 'Tomatera', 'Solanum lycopersicum', exterior, 9, 3, 12, 35, 'Muy rico, profundo', 'Muy exigente', 'Media').
ficha(lechuga, 'Lechuga', 'Lactuca sativa', exterior_sombra, 5, 2, 5, 25, 'Suelto, humedo', 'Nitrogeno suave', 'Facil').
ficha(zanahoria, 'Zanahoria', 'Daucus carota', exterior, 7, 5, 5, 25, 'Arenoso, sin piedras', 'Bajo en nitrogeno', 'Media').
ficha(pimiento, 'Pimiento', 'Capsicum annuum', exterior, 9, 4, 15, 35, 'Fertil, calido', 'Exigente', 'Media').
ficha(pepino, 'Pepino', 'Cucumis sativus', exterior, 8, 3, 15, 35, 'Rico, humedo', 'Frecuente', 'Media').
ficha(calabacin, 'Calabacin', 'Cucurbita pepo', exterior, 8, 3, 15, 35, 'Muy rico', 'Exigente', 'Facil').
ficha(espinaca, 'Espinaca', 'Spinacia oleracea', exterior_sombra, 5, 3, -5, 25, 'Rico en materia organica', 'Nitrogeno', 'Facil').
ficha(cebolla, 'Cebolla', 'Allium cepa', exterior, 9, 6, -5, 30, 'Suelto, no encharcar', 'Potasio/Fosforo', 'Facil').
ficha(ajo, 'Ajo', 'Allium sativum', exterior, 9, 10, -10, 30, 'Suelto, drenado', 'Poco', 'Muy Facil').
ficha(patata, 'Patata', 'Solanum tuberosum', exterior, 8, 7, 5, 25, 'Suelto, profundo', 'Rico en Potasio', 'Facil').
ficha(rabano, 'Rabano', 'Raphanus sativus', exterior, 6, 3, 5, 25, 'Suelto', 'Casi nula', 'Muy Facil').
ficha(berenjena, 'Berenjena', 'Solanum melongena', exterior, 10, 4, 15, 35, 'Muy fertil', 'Muy exigente', 'Media').
ficha(calabaza, 'Calabaza', 'Cucurbita maxima', exterior, 9, 4, 15, 35, 'Rico, mucho espacio', 'Exigente', 'Facil').
ficha(judia, 'Judia Verde', 'Phaseolus vulgaris', exterior, 8, 4, 10, 30, 'Universal', 'Poco (fijan nitrogeno)', 'Facil').
ficha(guisante, 'Guisante', 'Pisum sativum', exterior, 6, 5, 5, 25, 'Suelto', 'Poco', 'Facil').
ficha(fresa, 'Fresas', 'Fragaria ananassa', exterior, 7, 3, -5, 25, 'Acido, rico, drenado', 'Especifico frutos rojos', 'Media').

% --- HUERTO AROMATICAS ---
ficha(albahaca, 'Albahaca', 'Ocimum basilicum', exterior, 7, 3, 10, 30, 'Humedo, fertil', 'Quincenal', 'Facil').
ficha(menta, 'Menta', 'Mentha', exterior_sombra, 4, 3, -15, 30, 'Humedo (invasiva)', 'Ocasional', 'Muy Facil').
ficha(romero, 'Romero', 'Salvia rosmarinus', exterior, 10, 15, -10, 35, 'Pobre, seco, calcareo', 'Nula', 'Muy Facil').
ficha(tomillo, 'Tomillo', 'Thymus vulgaris', exterior, 10, 15, -10, 35, 'Pobre, drenado', 'Nula', 'Muy Facil').
ficha(oregano, 'Oregano', 'Origanum vulgare', exterior, 9, 10, -5, 35, 'Bien drenado', 'Poco', 'Facil').
ficha(perejil, 'Perejil', 'Petroselinum crispum', exterior_sombra, 5, 4, 5, 30, 'Rico, humedo', 'Mensual', 'Facil').
ficha(cilantro, 'Cilantro', 'Coriandrum sativum', exterior, 6, 4, 10, 30, 'Suelto, drenado', 'Ocasional', 'Facil').
ficha(salvia, 'Salvia', 'Salvia officinalis', exterior, 9, 10, -10, 35, 'Drenado, calcareo', 'Poco', 'Facil').
ficha(eneldo, 'Eneldo', 'Anethum graveolens', exterior, 8, 5, 5, 30, 'Suelto', 'Ocasional', 'Facil').
ficha(cebollino, 'Cebollino', 'Allium schoenoprasum', exterior, 7, 4, -5, 30, 'Rico, fresco', 'Ocasional', 'Facil').
ficha(laurel, 'Laurel', 'Laurus nobilis', exterior, 7, 10, -5, 35, 'Cualquiera drenado', 'Primavera', 'Facil').

% --- FRUTALES ---
ficha(limonero, 'Limonero', 'Citrus x limon', exterior, 9, 6, 3, 35, 'Franco, drenado', 'Citricos (hierro)', 'Media').
ficha(naranjo, 'Naranjo', 'Citrus x sinensis', exterior, 9, 7, 5, 35, 'Franco, drenado', 'Citricos', 'Media').
ficha(olivo, 'Olivo', 'Olea europaea', exterior, 10, 20, -8, 40, 'Pobre, pedregoso', 'Poco', 'Muy Facil').
ficha(manzano, 'Manzano', 'Malus domestica', exterior, 7, 10, -20, 30, 'Profundo, fresco', 'Invierno/Primavera', 'Media').
ficha(peral, 'Peral', 'Pyrus communis', exterior, 7, 10, -15, 30, 'Arcilloso, fresco', 'Primavera', 'Media').
ficha(higuera, 'Higuera', 'Ficus carica', exterior, 9, 15, -5, 40, 'Cualquiera', 'Poco', 'Muy Facil').
ficha(papaya, 'Papaya', 'Carica papaya', exterior, 9, 5, 15, 35, 'Muy fertil, suelto', 'Constante', 'Media').
ficha(mango, 'Mango', 'Mangifera indica', exterior, 9, 7, 10, 38, 'Profundo, drenado', 'Regular', 'Media').
ficha(aguacate, 'Aguacate', 'Persea americana', exterior, 8, 6, 5, 35, 'Suelto, sin encharcar', 'Exigente', 'Dificil').
ficha(guayaba, 'Guayaba', 'Psidium guajava', exterior, 9, 6, 10, 35, 'Drenado', 'Regular', 'Facil').

% -----------------------------------------------------------------------
% 2. MOTOR DE INFERENCIA: "DOCTOR PLANTAS"
% -----------------------------------------------------------------------

diagnosticar(Planta, Sintoma, Diagnostico) :-
    ficha(Planta, Nombre, _, _, _, RiegoBase, _, _, Suelo, _, _),
    causa_probable(Sintoma, RiegoBase, Suelo, Causa, Solucion),
    format(atom(Diagnostico),
           'Diagnostico para ~w\nLo que veo: ~w\nCausa probable: ~w\nSolucion: ~w',
           [Nombre, Sintoma, Causa, Solucion]).

causa_probable(hojas_amarillas, Riego, _, 'Exceso de agua o falta de nutrientes', 'Deja secar la tierra o aplica abono rico en nitrogeno') :- Riego < 10.
causa_probable(hojas_amarillas, Riego, _, 'Riego excesivo para planta de secano', 'Asegura drenaje y espera a que se seque la tierra') :- Riego >= 10.
causa_probable(hojas_secas_puntas, _, _, 'Falta de humedad ambiental', 'Pulveriza hojas o alejala de corrientes de aire').
causa_probable(hojas_caidas_tristes, _, _, 'Falta de riego o golpe de calor', 'Riégala por inmersion si la tierra esta seca').
causa_probable(manchas_marrones, _, _, 'Posibles hongos o quemaduras solares', 'Mueve planta y aplica fungicida natural').
causa_probable(no_crece, _, _, 'Falta de luz o maceta pequena', 'Acercala a ventana o trasplanta').
causa_probable(bichitos, _, _, 'Plaga (pulgon, cochinilla o araña roja)', 'Limpia hojas con agua y jabon potasico').

% -----------------------------------------------------------------------
% 3. MOTOR DE INFERENCIA: "TINDER VEGETAL"
% -----------------------------------------------------------------------

odio(tomate, patata, 'Son familia y se pasan mismas enfermedades').
odio(cebolla, judia, 'La cebolla inhibe crecimiento de judias').
odio(ajo, guisante, 'El ajo no deja crecer bien guisantes').
odio(menta, _, 'La menta es invasiva, mejor sola').
odio(_, menta, 'La menta es invasiva, mejor sola').

compatibilidad(P1, P2, Resultado) :-
    ficha(P1, N1, _, Ubi1, Luz1, R1, _, _, _, _, _),
    ficha(P2, N2, _, Ubi2, Luz2, R2, _, _, _, _, _),
    (
        odio(P1, P2, Razon) -> format(atom(Resultado), 'Relacion toxica: ~w', [Razon])
        ;
        (Ubi1 \= Ubi2, \+ (sub_atom(Ubi1,_,_,_,Ubi2); sub_atom(Ubi2,_,_,_,Ubi1))) ->
             format(atom(Resultado), 'Viven en mundos distintos: ~w y ~w', [Ubi1, Ubi2])
        ;
        DiffLuz is abs(Luz1 - Luz2), DiffLuz > 3 ->
             format(atom(Resultado), 'Problema de Luz: ~w y ~w tienen diferencias grandes', [N1, N2])
        ;
        DiffRiego is abs(R1 - R2), DiffRiego > 4 ->
             format(atom(Resultado), 'Incompatibilidad de sed: diferencias de riego muy grandes')
        ;
        format(atom(Resultado), 'Match Perfecto: ~w y ~w pueden convivir', [N1, N2])
    ).

% -----------------------------------------------------------------------
% 4. GENERADOR DE INFORME TECNICO
% -----------------------------------------------------------------------

informe_tecnico(Planta, Informe) :-
    ficha(Planta, Nombre, Cientifico, Ubi, Luz, Riego, TMin, TMax, Suelo, Ferti, Dificultad),
    (Luz < 3 -> LuzTxt = 'Sombra o poca luz'
    ; Luz >= 3, Luz < 7 -> LuzTxt = 'Luz brillante pero sin sol directo'
    ; LuzTxt = 'Sol directo'),
    format(atom(Informe),
           'Ficha Tecnica: ~w (~w)\nDificultad: ~w\nUbicacion: ~w\nLuz: ~w (Nivel ~d/10)\nRiego Base: cada ~d dias\nTemperatura: entre ~d y ~d C\nSuelo ideal: ~w\nAbono: ~w',
           [Nombre, Cientifico, Dificultad, Ubi, LuzTxt, Luz, Riego, TMin, TMax, Suelo, Ferti]).
