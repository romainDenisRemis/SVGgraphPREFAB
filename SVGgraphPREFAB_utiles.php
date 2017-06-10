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
 * Fichier qui contient les constantes et fonctions utiles pour SVGgraphPREFAB.
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.2.0
 * @package SVGgraphPREFAB
 */

namespace SVGgraphPREFAB;

/**
 * Espace insécable en UTF-8.
 */
const UTF8NBSP = "\xC2\xA0";

/**
 * Symbole 'presque égale' en UTF8.
 */
const UTF8APEQUTO = "\xe2\x89\x85";

/**
 * Symbole 'Somme' (sigma majuscule) en UTF8.
 */
const UTF8SOMME = "\xe2\x88\x91";

/**
 * Constante Tableau des langues disponibles.
 * Pour le moment.
 */
const LANG_DISPO = array('fr', 'en', 'de', 'es');

/**
 * Constante Tableau des noms abbrégés des 12 mois.
 */
const MOIS_COURT = array(
	1 => array('fr' => 'Janv', 'en' => 'Jan', 'de' => 'Jan.', 'es' => 'enero')
	, array('fr' => 'Févr', 'en' => 'Feb', 'de' => 'Febr.', 'es' => 'feb.')
	, array('fr' => 'Mars', 'en' => 'Mar', 'de' => 'März', 'es' => 'marzo')
	, array('fr' => 'Avr', 'en' => 'Apr', 'de' => 'Apr.', 'es' => 'abr.')
	, array('fr' => 'Mai', 'en' => 'May', 'de' => 'Mai', 'es' => 'mayo')
	, array('fr' => 'Juin', 'en' => 'Jun', 'de' => 'Juni', 'es' => 'jun')
	, array('fr' => 'Juil', 'en' => 'Jul', 'de' => 'Juli', 'es' => 'jul')
	, array('fr' => 'Août', 'en' => 'Aug', 'de' => 'Aug.', 'es' => 'agosto')
	, array('fr' => 'Sept', 'en' => 'Sep', 'de' => 'Sept.', 'es' => 'sept.')
	, array('fr' => 'Oct', 'en' => 'Oct', 'de' => 'Okt.', 'es' => 'oct.')
	, array('fr' => 'Nov', 'en' => 'Nov', 'de' => 'Nov.', 'es' => 'nov.')
	, array('fr' => 'Déc', 'en' => 'Dec', 'de' => 'Dez.', 'es' => 'dic.')
);

/**
 * Constante Tableau des noms entiers des 12 mois.
 */
const MOIS_LONG = array(
	1 => array('fr' => 'Janvier', 'en' => 'January', 'de' => 'Januar', 'es' => 'enero')
	, array('fr' => 'Février', 'en' => 'February', 'de' => 'Februar', 'es' => 'febrero')
	, array('fr' => 'Mars', 'en' => 'March', 'de' => 'März', 'es' => 'marzo')
	, array('fr' => 'Avril', 'en' => 'April', 'de' => 'April', 'es' => 'abril')
	, array('fr' => 'Mai', 'en' => 'May', 'de' => 'Mai', 'es' => 'mayo')
	, array('fr' => 'Juin', 'en' => 'June', 'de' => 'Juni', 'es' => 'junio')
	, array('fr' => 'Juillet', 'en' => 'July', 'de' => 'Juli', 'es' => 'julio')
	, array('fr' => 'Août', 'en' => 'August', 'de' => 'August', 'es' => 'agosto')
	, array('fr' => 'Septembre', 'en' => 'September', 'de' => 'September', 'es' => 'septiembre')
	, array('fr' => 'Octobre', 'en' => 'October', 'de' => 'Oktober', 'es' => 'octubre')
	, array('fr' => 'Novembre', 'en' => 'November', 'de' => 'November', 'es' => 'noviembre')
	, array('fr' => 'Décembre', 'en' => 'December', 'de' => 'Dezember', 'es' => 'diciembre')
);

/**
 * Constante pour le formatage des nombres.
 */
const FORMATAGE_NB = array(
	'sep_decimale' => array('fr' => ',', 'en' => '.', 'de' => ',', 'es' => ',')
	, 'sep_millier' => array('fr' => UTF8NBSP, 'en' => ',', 'de' => '.', 'es' => '.')
	, 'position_symbole' => array('fr' => 'post', 'en' => 'pre', 'de' => 'post', 'es' => 'post')
);

/**
 * Constante pour la traduction.
 */
const TRADUCTION = array(
	'Cumul' => array('fr' => 'Cumul', 'en' => 'Cumulative', 'de' => 'Pluralität', 'es' => 'pluralidad')
	, 'Moyenne' => array('fr' => 'Moyenne', 'en' => 'Average', 'de' => 'Durchschnitt', 'es' => 'mediana')
);

/**
 * Constante pour le style.
 */
const STYLE = array(
	'bootstrap' => ''
	, 'default' => 'SVGgraphPREFAB-'
	, 'custom' => 'SVGgraphPREFAB_custom-'
);

/**
 * Constante pour le style du bloc graphique.
 */
const BACK_STYLE_CHART = array(
	'clear' => 'clear'
	, 'dark' => 'dark'
);

/**
 * Constante pour la couleur de texte foncée.
 */
const FONTDARK = 'rgb(10, 10, 10)';

/**
 * Constante pour la couleur de texte claire.
 */
const FONTCLEAR = 'rgb(250, 250, 250)';

/**
 * Constante pour la série de couleurs utilisées pour les graphiques.
 */
const COLORSET = array(
	array('back' => 'rgb(122, 159, 192)', 'font' => FONTDARK)  //  1
	, array('back' => 'rgb(209, 159, 100)', 'font' => FONTDARK)  //  2
	, array('back' => 'rgb(101, 93, 91)', 'font' => FONTCLEAR) //  3
	, array('back' => 'rgb(154, 155, 35)', 'font' => FONTDARK)  //  4
	, array('back' => 'rgb(54, 59, 91)', 'font' => FONTCLEAR) //  5
	, array('back' => 'rgb(64, 129, 97)', 'font' => FONTCLEAR)  //  6
	, array('back' => 'rgb(253, 116, 0)', 'font' => FONTDARK)  //  7
	, array('back' => 'rgb(190, 219, 57)', 'font' => FONTDARK)  //  8
	, array('back' => 'rgb(0, 67, 88)', 'font' => FONTCLEAR) //  9
	, array('back' => 'rgb(31, 138, 112)', 'font' => FONTCLEAR)  // 10
	, array('back' => 'rgb(255, 225, 26)', 'font' => FONTDARK)  // 11
	, array('back' => 'rgb(1, 114, 179)', 'font' => FONTCLEAR)  // 12
	, array('back' => 'rgb(166, 55, 59)', 'font' => FONTCLEAR)  // 13
	, array('back' => 'rgb(158, 116, 93)', 'font' => FONTCLEAR)  // 14
);

/**
 * Retourne un nombre formaté sous une forme monétaire.
 * 
 * Le symbole monétaire peut être vide.
 * @param float $somme
 * @param int $nbDecimales 2 par défaut
 * @param string $symboleMonétaire '€' par défaut
 * @param string $localisation 'fr' par défaut
 * @return string
 */
function currency_format($somme, $nbDecimales = 2, $symboleMonétaire = '€', $localisation = 'fr') {
	$sepDecimales = FORMATAGE_NB['sep_decimale'][$localisation];
	$sepMillier = FORMATAGE_NB['sep_millier'][$localisation];
	$positionSymbole = FORMATAGE_NB['position_symbole'][$localisation];
	if ($positionSymbole === 'post') {
		$smbMoney = $symboleMonétaire ? UTF8NBSP . $symboleMonétaire : '';
		return number_format($somme, $nbDecimales, $sepDecimales, $sepMillier) . $smbMoney;
	}
	else {
		$smbMoney = $symboleMonétaire ? $symboleMonétaire : '';
		return $smbMoney . number_format($somme, $nbDecimales, $sepDecimales, $sepMillier);
	}
}

/**
 * Retourne un nombre dont on a enlevé les 0 à droite.
 * 
 * Exp: reduction_dix(26000) retourne array(26, 3).
 * Exp: reduction_dix(458) retourne array(458, 0).
 * Exp: reduction_dix(60) retourne array(6, 1).
 * @param int $nombre
 * @param int $nb10 0 par défaut
 * @return array
 */
function reduction_dix($nombre, $nb10 = 0) {
	if (($nombre % 10) === 0) {
		return reduction_dix(($nombre / 10), ++$nb10);
	}
	else {
		return array($nombre, $nb10);
	}
}

/**
 * Retourne un nom unique.
 * Utilisé pour avoir un ID unique pour les graphiques SVG.
 * @staticvar int $compteur
 * @param string $graphType
 * @return string
 */
function unique_id($graphType) {
	static $compteur = 0;
	return $graphType . ++$compteur;
}

/**
 * Singleton pour gérer les préférences
 */
class reglages_defaut {

	/**
	 * instance statique unique de la classe.
	 * @var reglages_defaut|NULL $instance
	 */
	private static $instance = NULL;

	/**
	 * Préférence de localisation.
	 * @var string $localisation one of the const **LANG_DISPO**  value
	 */
	private $localisation = '';

	/**
	 * Préférence de style.
	 * @var string $cssStyle 'bootstrap' | 'default' | 'custom'
	 */
	private $cssStyle = '';

	/**
	 * Préférence de style pour le graphique.
	 * @var string $chartBackStyle 'clear' | 'dark'
	 */
	private $chartBackStyle = '';
	
	/**
	 * Constructeur.
	 * Le tableau des paramètres par défaut est:
	 * 
	 * ```php
	 * array(
	 * 		'localization' => ''		// one of the const LANG_DISPO value
	 * 		, 'css_style' => ''			// 'bootstrap' | 'default' | 'custom'
	 * 		, 'chart_back_style' => ''	// 'clear' | 'dark'
	 * )
	 * ```
	 * 
	 * @param array $param
	 */
	private function __construct(array $param) {
		$localization = '';
		$css_style = '';
		$chart_back_style = '';

		extract($param, EXTR_IF_EXISTS);

		$this->localisation = $localization;
		$this->cssStyle = $css_style;
		$this->chartBackStyle = $chart_back_style;
	}

	/**
	 * Function statique d'initialisation.
	 * Le tableau des paramètres par défaut est:
	 * 
	 * ```php
	 * array(
	 * 		'localization' => ''		// one of the const LANG_DISPO value
	 * 		, 'css_style' => ''			// 'bootstrap' | 'default' | 'custom'
	 * 		, 'chart_back_style' => ''	// 'clear' | 'dark'
	 * )
	 * ```
	 * 
	 * @param array $param
	 * @return reglages_defaut
	 */
	public static function initialiser_options_defaut(array $param = array()) {
		if (is_null(self::$instance)) {
			self::$instance = new reglages_defaut($param);
		}
		return self::$instance;
	}

	/**
	 * Retourne la préférence de localisation.
	 * @return string
	 */
	public function get_local() {
		return $this->localisation;
	}

	/**
	 * Retourne la préférence de style.
	 * @return string
	 */
	public function get_style() {
		return $this->cssStyle;
	}
	
	/**
	 * Retourne la préférence de style pour le graphique.
	 * @return string
	 */
	public function get_chart_back_style() {
		return $this->chartBackStyle;
	}

}

?>
