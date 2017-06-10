<?php

/*
 * This file is part of SVGgraphPREFAB
 * 
 * Copyright (C) 2017 Romain DENIS-REMIS <romain at denis-remis.fr>
 *
 * SVGgraphPREFAB is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Fichier qui regroupe les modèles de graphiques de SVGgraphPREFAB.
 * 
 * Ce fichier est dans le namespace global, 
 * on y inclut les fichiers de définition de classe des modèles de graphique, 
 * on créer des classes filles juste pour les renommer avec un nom plus court 
 * et surtout pouvoir les appeler simplement dans le namespace global sans être obligé d'utiliser la forme *\blablablaspace\blablablaClasse*.
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.2.0
 */

/**
 * Inclut SVGgraphPREFAB_graphBarres12m.
 */
require_once(__DIR__ . '/SVGgraphPREFAB_graphBarres12m.php');

require_once(__DIR__ . '/SVGgraphPREFAB_graphPie.php');

/**
 * renomme SVGgraphPREFAB_graphBarres12m en SGP_gb12m utilisable dans le namespace global.
 */
class SGP_gb12m extends \SVGgraphPREFAB\SVGgraphPREFAB_graphBarres12m {
	
}

/**
 * renomme SVGgraphPREFAB_graphPie en SGP_gpie utilisable dans le namespace global.
 */
class SGP_gpie extends \SVGgraphPREFAB\SVGgraphPREFAB_graphPie {
	
}

/**
 * Initialiser les préférences par défaut.
 * 
 * !! A utiliser en premier (si vous voulez l'utiliser bien sûr), avant toute instanciation d'une classe de la bibliothèque SVGgraphPREFAB.
 * 
 * Le tableau des options par défaut est:
 * 
 * ```php
 * array(
 * 		'localization' => ''	// one of the const \SVGgraphPREFAB\LANG_DISPO value, 'fr' or 'en' or ...
 * 		, 'css_style' => ''		// 'bootstrap' | 'default' | 'custom'
 * )
 * ```
 * 
 * @param array $options
 */
function SGP_init_pref(array $options) {
	\SVGgraphPREFAB\reglages_defaut::initialiser_options_defaut($options);
}

?>