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
 * Fichier qui contient la classe SVGgraphPREFAB_graphBarres12m.
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.2.0
 * @package SVGgraphPREFAB
 */

namespace SVGgraphPREFAB;

require_once(__DIR__ . '/balisePHPlib/classe_html5.php');
require_once(__DIR__ . '/balisePHPlib/classe_svg.php');

require_once(__DIR__ . '/SVGgraphPREFAB_utiles.php');

use balisePHPlib as b;

/**
 * Définie un objet permetant d'afficher un graphique sur 12 mois.
 * 
 */
class SVGgraphPREFAB_graphBarres12m {

	/**
	 * Titre affiché.
	 * @var string $titreGraph
	 */
	private $titreGraph;

	/**
	 * Nom unique qui sera intégré dans les attribut ID des éléments.
	 * @var string $nomGraph
	 */
	private $nomGraph;

	/**
	 * Suffixe de l'ID.
	 * 
	 * Il s'incrémente pour rendre unique les ID à chaque fois que la fonction *dessine()* est appelée.
	 * @var int $suffixeGraphID 0 par défaut
	 */
	private $suffixeGraphID = 0;

	/**
	 * Largeur absolue du dessin SVG.
	 * 
	 * Valeur utilisée pour le paramètre viewBox de la balise <svg>.
	 * @var int $width
	 */
	private $width;

	/**
	 * Hauteur absolue du dessin SVG.
	 * 
	 * Valeur utilisée pour le paramètre viewBox de la balise <svg>.
	 * @var int $height
	 */
	private $height;

	/**
	 * Hauteur forcée (facultative) pour la balise <svg>
	 * @var int $heightAffiche
	 */
	private $heightAffiche;

	/**
	 * Unité des nombres affichés.
	 * Par exemple '€' si on parle de CA ou 'qté' si on parle de nombre de vente.
	 * @var string $unite
	 */
	private $unite;

	/**
	 * Localisation pour le formatage des nombres et deux trois traductions de textes.
	 * Seuls 'fr' et 'en' sont pris en compte pour le moment.
	 * @var string $localisation
	 */
	private $localisation;

	/**
	 * Style CSS utilisé.
	 * @var string $styleCSS
	 */
	private $styleCSSprefix;

	/**
	 * Style CSS utilisé pour le fond du graphique.
	 * @var string $chartBackStyleCSSsuffix
	 */
	private $chartBackStyleCSSsuffix;

	/**
	 * Couleur utilisée pour le texte en fonction du style du fond du graphique.
	 * @var string $chartBackStyleFontColor
	 */
	private $chartBackStyleFontColor;

	/**
	 * Tableau contenant tous les objets SVG du graphique en barres.
	 * @var array $enfants_graph12m
	 */
	private $enfants_graph12m = array();

	/**
	 * Tableau contenant tous les objets SVG du graphique en ligne (cumul).
	 * @var array $enfants_graph12m_cumul
	 */
	private $enfants_graph12m_cumul = array();

	/**
	 * Tableau des données.
	 * @var array $donnees
	 */
	private $donnees = array();

	/**
	 * Nombre de séries de données.
	 * exp: Si les graphique doit afficher le CA pour les années 2015, 2016 et 2017, $nbSeries = 3.
	 * exp: Si les graphique doit afficher le nombre des ventes pour les produits prod1, prod2, prod3 et prod4, $nbSeries = 4.
	 * 
	 * @var int $nbSeries
	 */
	private $nbSeries = 0;

	/**
	 * Ordonnée maximale du graphique en barres.
	 * @var int $ordMax
	 */
	private $ordMax = 1;

	/**
	 * Ordonnée maximale du graphique en ligne (cumul).
	 * @var int $ordMaxCumul
	 */
	private $ordMaxCumul = 1;

	/**
	 * Variable interne.
	 * Utilisée en interne pour l'utilisation de la fonction *cumulAdd* afin de garder temporairement le cumul des données.
	 * 
	 * @var int $valCumul
	 */
	private $valCumul = 0;

	/**
	 * Constructeur.
	 * 
	 * Le tableau des paramètres par défaut est:
	 * 
	 * ```php
	 * array(
	 * 		'block_title' => 'Données mensuelles'
	 * 		, 'data' => array()
	 * 		, 'units' => '€'
	 * 		, 'localization' => 'fr'
	 * 		, 'css_style' => 'default'		// 'bootstrap' | 'default' | 'custom'
	 * 		, 'chart_back_style' => 'clear'	// 'clear' | 'dark'
	 * 		, 'graph_forced_height' => 0	// If you really want the SVG graph have a forced height (means ratio display is lost)
	 * )
	 * ```
	 * @param array $param Tableau des paramètres
	 */
	public function __construct(array $param) {
		$block_title = 'Données mensuelles';
		$data = array();
		$units = '€';
		$localization = 'fr';
		$css_style = 'default';
		$chart_back_style = 'clear';
		$graph_forced_height = 0;

		extract($param, EXTR_IF_EXISTS);

		$prefGlob = reglages_defaut::initialiser_options_defaut();
		if ($prefGlob->get_local()) {
			$localization = $prefGlob->get_local();
		}
		if ($prefGlob->get_style()) {
			$css_style = $prefGlob->get_style();
		}
		if ($prefGlob->get_chart_back_style()) {
			$chart_back_style = $prefGlob->get_chart_back_style();
		}

		$this->titreGraph = strval($block_title);
		$this->nomGraph = unique_id('sgp_gb12m');
		$this->heightAffiche = (int) $graph_forced_height;
		$this->height = 600;
		$this->width = 1200;
		$this->unite = strval($units);
		$localization = strtolower(strval($localization));
		$this->localisation = in_array($localization, LANG_DISPO) ? $localization : 'en';
		$css_style = strval($css_style);
		$chart_back_style = strval($chart_back_style);
		$this->styleCSSprefix = array_key_exists($css_style, STYLE) ? STYLE[$css_style] : STYLE['default'];
		$this->chartBackStyleCSSsuffix = array_key_exists($chart_back_style, BACK_STYLE_CHART) ? BACK_STYLE_CHART[$chart_back_style] : BACK_STYLE_CHART['clear'];
		$this->chartBackStyleFontColor = $this->chartBackStyleCSSsuffix === 'clear' ? 'rgb(0,0,0)' : 'rgb(250,250,250)';

		if (!is_array($data)) {
			$data = array();
		}
		
		// la constante COLORSET ne possède que 14 couleurs, 
		if (count($data) > 14) {
			$data = array_slice($data, 0, 14);
		}

		foreach ($data as $unAn) {
			if (is_array($unAn)) {
				if (count($unAn) === 13) {
					$tabMois = array_slice($unAn, 1, NULL, TRUE);
					$tabMoisCumul = $tabMois;
					array_walk($tabMoisCumul, array($this, 'cumulAdd'));
					$this->valCumul = 0;
					$this->donnees[] = array('annee' => $unAn[0], 'mois' => $tabMois, 'moisCumul' => $tabMoisCumul);

					rsort($tabMois, SORT_NUMERIC);
					$this->ordMax = $tabMois[0] > $this->ordMax ? $tabMois[0] : $this->ordMax;

					rsort($tabMoisCumul, SORT_NUMERIC);
					$this->ordMaxCumul = $tabMoisCumul[0] > $this->ordMaxCumul ? $tabMoisCumul[0] : $this->ordMaxCumul;

					$this->nbSeries++;
				}
			}
		}
		// détermination de l'ordonnée maximum
		$this->calculOrdonneeMax($this->ordMax);
		$this->calculOrdonneeMax($this->ordMaxCumul);
	}

	/**
	 * Calcule le nombre qui sera utilisé comme ordonnée maximum sur le graphique.
	 * @param float $ordMax
	 */
	private function calculOrdonneeMax(&$ordMax) {
		$caMax_txt = strval(intval($ordMax));
		$caMax_txt_long = strlen($caMax_txt);
		$caMax_txt_prem = (int) substr($caMax_txt, 0, 1);
		if ($caMax_txt_long <= 1) {
			$ordMax = 10;
		}
		else {
			$caMax_txt_sec = (int) substr($caMax_txt, 1, 1);
			if ($caMax_txt_sec >= 5) {
				$caMax_txt_prem++;
				$ordMax = ($caMax_txt_prem * (10 ** ($caMax_txt_long - 1)));
			}
			else {
				$ordMax = ((($caMax_txt_prem * 10) + 5) * (10 ** ($caMax_txt_long - 2)));
			}
		}
	}

	/**
	 * Fonction interne utilisée pour un array_walk dans le constructeur.
	 * @param float $valeur
	 * @param int $clef
	 */
	private function cumulAdd(&$valeur, $clef) {
		$this->valCumul += $valeur;
		$valeur = $this->valCumul;
	}

	/**
	 * Fonction interne utilisée pour un array_walk dans la fonction dessine.
	 * @param float $valeur
	 * @param int $clef
	 */
	private function to_bool(&$valeur, $clef) {
		$valeur = (bool) $valeur;
	}

	/**
	 * Calcul et création du graphique SVG pour la version non cumulée.
	 * Fonction appelée dans la fonction *dessine* si la version normale est choisie.
	 */
	private function calcul() {
		$largeurReduite = $this->width - 30;
		$hautZoneBarre = (int) ($this->height * 0.9);
		$largZoneBarre = (int) ($largeurReduite / 13) * 12;
		$largZoneOrdonnees = $largeurReduite - $largZoneBarre;
		$ratio = ($hautZoneBarre / $this->ordMax);
		$largZoneMois = (int) ($largZoneBarre / 12);
		$largeurCol = (($largZoneBarre / 12) / ($this->nbSeries + 1));

		// Abscisse - Ecriture des noms des 12 mois -----------------------------------------------
		for ($index = 1; $index <= 12; $index++) {
			$fontSize = (int) ($largZoneBarre * 0.02);
			$x = (int) $largZoneOrdonnees + (($index - 1) * ($this->nbSeries + 1) * $largeurCol) + ($largZoneMois / 2);
			$y = (int) $hautZoneBarre + $fontSize;
			$this->enfants_graph12m[] = new b\bls_svg_text(MOIS_COURT[$index][$this->localisation], $x, $y, $fontSize, 'middle', $this->chartBackStyleFontColor);
		}

		// Ordonnées - calcul et Ecriture sur l'échelle des ordonnées ------------------------------
		$fontSize = 15;
		$ordonneeMax = reduction_dix($this->ordMax);

		if ($ordonneeMax[0] < 10) {
			$ordonneeMax[0] *= 10;
			$ordonneeMax[1] --;
		}
		$ord = $ordonneeMax[0];
		$ordTAB = array();
		while ($ord > 0) {
			$ordTAB[] = $ord;
			$ord -= 5;
		}
		foreach ($ordTAB as $uneOrd) {
			$nombreOrd = $uneOrd * (10 ** $ordonneeMax[1]);
			$nombreOrdY = (int) ($nombreOrd * $ratio);
			$this->enfants_graph12m[] = new b\bls_svg_text(currency_format($nombreOrd, 0, '', $this->localisation), $largZoneOrdonnees - 4, $hautZoneBarre - $nombreOrdY + 4, $fontSize, 'end', $this->chartBackStyleFontColor);
			$this->enfants_graph12m[] = new b\bls_svg_line($largZoneOrdonnees - 2, $hautZoneBarre - $nombreOrdY, $largeurReduite, $hautZoneBarre - $nombreOrdY, 'rgb(150,150,150)', 1, 'butt');
		}
		// le zéro
		$this->enfants_graph12m[] = new b\bls_svg_text(currency_format(0, 0, '', $this->localisation), $largZoneOrdonnees - 4, $hautZoneBarre + 4, $fontSize, 'end', $this->chartBackStyleFontColor);

		// Création des barres mensuelles de données
		foreach ($this->donnees as $cle => $uneAnnee) {
			$couleur = COLORSET[$cle]['back'];
			$couleurFont = COLORSET[$cle]['font'];
			for ($index = 1; $index <= 12; $index++) {
				$x = $largZoneOrdonnees + ($largeurCol * $index) + ($cle * $largeurCol) + (($index - 1) * $this->nbSeries * $largeurCol);
				$height = (int) ($uneAnnee['mois'][$index] * $ratio);
				$y = $hautZoneBarre - $height;
				// calcul pour la gestion de la position de l'étiquette d'affichage de la valeur de la barre
				$xTooltip = $x + $largeurCol;
				$xTooltipBox = $xTooltip - $largZoneMois + 2;
				$yTooltip = $y - 3;
				$yTooltipBox = $yTooltip - 15 + 2;
				$nombreTooltip = currency_format($uneAnnee['mois'][$index], 0, '', $this->localisation);
				$codeJSpourCacherTooltip = "SGP_gb12m_HideTooltip('{$this->nomGraph}');";
				$codeJSpourAfficherTooltip = "SGP_gb12m_showTooltip({$xTooltip}, {$yTooltip}, '{$nombreTooltip}', '{$couleurFont}', '{$couleur}', {$xTooltipBox}, {$yTooltipBox}, '{$this->nomGraph}');";
				// TODO: Voir ici et dans le fichier .js pour gérer le Show et Hide du Tooltip lors d'un clic sur une barre (Pour les tablette et smartPhone)), il faudra sans doute ajouter un ID à chaque barre.
				// $codeJSpourClicTooltip = "graphSVG_ClicTooltip(evt, {$xTooltip}, {$yTooltip}, '{$nombreTooltip}', '{$couleur}', {$xTooltipBox}, {$yTooltipBox}, '{$this->nomGraph}');";
				$attrSup = array('onmouseout' => $codeJSpourCacherTooltip, 'onmouseover' => $codeJSpourAfficherTooltip);
				$this->enfants_graph12m[] = new b\bls_svg_rect($x, $y, $largeurCol, $height, $couleur, $attrSup);
			}
		}

		// abscisses et ordonnées -------------------------------------------------------
		// barres des ordonnées
		$this->enfants_graph12m[] = new b\bls_svg_line($largZoneOrdonnees, 0, $largZoneOrdonnees, $hautZoneBarre, $this->chartBackStyleFontColor, 1, 'butt');
		// barres des abscisses
		$this->enfants_graph12m[] = new b\bls_svg_line($largZoneOrdonnees - 2, $hautZoneBarre, $largeurReduite, $hautZoneBarre, $this->chartBackStyleFontColor, 1, 'butt');

		// Cadre et texte servant à afficher la valeur lorsque une barre est survolée par la souris
		$this->enfants_graph12m[] = new b\bls_svg_rect(0, 0, $largZoneMois, 15, 'rgb(250,250,250)', array('visibility' => 'hidden', 'id' => 'tooltipbox' . $this->nomGraph));
		$this->enfants_graph12m[] = new b\bls_svg_text('', 0, 0, 15, 'end', 'rgb(0,0,0)', 'Arial', array('visibility' => 'hidden', 'id' => 'tooltip' . $this->nomGraph));
	}

	/**
	 * Calcul et création du graphique SVG pour la version cumulée.
	 * Fonction appelée dans la fonction *dessine* si la version cumulée est choisie.
	 */
	private function calculcumule() {
		$largeurReduite = $this->width - 30;
		$hautZoneBarre = (int) ($this->height * 0.9);
		$largZoneBarre = (int) ($largeurReduite / 13) * 12;
		$largZoneOrdonnees = $largeurReduite - $largZoneBarre;
		$ratio = ($hautZoneBarre / $this->ordMaxCumul);
		$largZoneMois = (int) ($largZoneBarre / 12);
		$largeurCol = (($largZoneBarre / 12) / ($this->nbSeries + 1));

		// Ecriture des noms des 12 mois -----------------------------------------------
		for ($index = 1; $index <= 12; $index++) {
			$fontSize = (int) ($largZoneBarre * 0.02);
			$x = (int) $largZoneOrdonnees + (($index - 1) * ($this->nbSeries + 1) * $largeurCol) + ($largZoneMois / 2);
			$y = (int) $hautZoneBarre + $fontSize;
			$this->enfants_graph12m_cumul[] = new b\bls_svg_text(MOIS_COURT[$index][$this->localisation], $x, $y, $fontSize, 'middle', $this->chartBackStyleFontColor);
		}

		// abscisses et ordonnées -------------------------------------------------------
		// chiffres
		$fontSize = 14;
		$ordonneeMax = reduction_dix($this->ordMaxCumul);

		if ($ordonneeMax[0] < 10) {
			$ordonneeMax[0] *= 10;
			$ordonneeMax[1] --;
		}
		$ord = $ordonneeMax[0];
		$ordTAB = array();
		while ($ord > 0) {
			$ordTAB[] = $ord;
			$ord -= 5;
		}
		foreach ($ordTAB as $uneOrd) {
			$nombreOrd = $uneOrd * (10 ** $ordonneeMax[1]);
			$nombreOrdY = (int) ($nombreOrd * $ratio);
			$this->enfants_graph12m_cumul[] = new b\bls_svg_text(currency_format($nombreOrd, 0, '', $this->localisation), $largZoneOrdonnees - 4, $hautZoneBarre - $nombreOrdY + 4, $fontSize, 'end', $this->chartBackStyleFontColor);
			$this->enfants_graph12m_cumul[] = new b\bls_svg_line($largZoneOrdonnees - 2, $hautZoneBarre - $nombreOrdY, $largeurReduite, $hautZoneBarre - $nombreOrdY, 'rgb(150,150,150)', 1, 'butt');
		}

		$this->enfants_graph12m_cumul[] = new b\bls_svg_text(currency_format(0, 0, '', $this->localisation), $largZoneOrdonnees - 4, $hautZoneBarre + 4, $fontSize, 'end', $this->chartBackStyleFontColor);

		// barre vertcale intermédiaires
		for ($index = 1; $index <= 12; $index++) {
			$x = $largZoneOrdonnees + ($largeurCol * $index) + ($largZoneMois / 3) + (($index - 1) * $this->nbSeries * $largeurCol);
			$this->enfants_graph12m_cumul[] = new b\bls_svg_line($x, 0, $x, $hautZoneBarre, 'rgb(150,150,150)', 1, 'butt');
		}

		// Création des lignes
		foreach ($this->donnees as $cle => $uneAnnee) {
			$couleur = COLORSET[$cle]['back'];
			$ligne = array();
			$ligne[] = array($largZoneOrdonnees, $hautZoneBarre);
			for ($index = 1; $index <= 12; $index++) {

				$x = $largZoneOrdonnees + ($largeurCol * $index) + ($largZoneMois / 3) + (($index - 1) * $this->nbSeries * $largeurCol);
				$height = (int) ($uneAnnee['moisCumul'][$index] * $ratio);
				$y = $hautZoneBarre - $height;
				$ligne[] = array($x, $y);
			}
			$this->enfants_graph12m_cumul[] = new b\bls_svg_pathLine($ligne, $couleur, 3);
		}

		// abscisses et ordonnées -------------------------------------------------------
		// barres
		// ordonnées
		$this->enfants_graph12m_cumul[] = new b\bls_svg_line($largZoneOrdonnees, 0, $largZoneOrdonnees, $hautZoneBarre, $this->chartBackStyleFontColor, 1, 'butt');
		// abscisses
		$this->enfants_graph12m_cumul[] = new b\bls_svg_line($largZoneOrdonnees - 2, $hautZoneBarre, $largeurReduite, $hautZoneBarre, $this->chartBackStyleFontColor, 1, 'butt');
	}

	/**
	 * Afficher (ou retourne) Le bloc contenant le titre, le graphique et le tableau.
	 * Le tableau des options par défaut est:
	 * 
	 * ```php
	 * array(
	 * 		'cumul_version' => FALSE
	 * 		, 'with_table' => TRUE
	 * 		, 'with_graph' => TRUE
	 * 		, 'caption_position_top' => TRUE
	 * 		, 'table_row_average' => TRUE	// available for no-cumul version -- Applicable uniquement pour le tableau dans la version non cumulée des données
	 * 		, 'table_col_average' => TRUE	// available for no-cumul version -- Applicable uniquement pour le tableau dans la version non cumulée des données
	 * 		, 'table_cumul_col_sum' => FALSE	// available for cumul version -- Applicable uniquement pour le tableau dans la version cumulée des données
	 * )
	 * ```
	 * 
	 * @param array $param Tableau des options d'affichage.
	 * @param bool $printed Par defaut: TRUE , si FALSE retourne un string.
	 * @return bool|string retourne FALSE si les données sont vides, sinon TRUE ou un string en fonction de $printed.
	 */
	public function dessine(array $param, $printed = TRUE) {
		$printed = (bool) $printed;
		if (empty($this->donnees)) {
			return FALSE;
		}
		$cumul_version = FALSE;
		$with_table = TRUE;
		$with_graph = TRUE;
		$caption_position_top = TRUE;
		$table_row_average = TRUE;
		$table_col_average = TRUE;
		$table_cumul_col_sum = TRUE;

		array_walk($param, array($this, 'to_bool'));

		extract($param, EXTR_IF_EXISTS);

		$this->nomGraph = ++$this->suffixeGraphID > 1 ? substr($this->nomGraph, 0, -2) : $this->nomGraph;
		$this->nomGraph .= '_' . $this->suffixeGraphID;

		if (!$cumul_version) {
			$titreTexteCumul = '';
			$quelDonnees = 'mois';
			$prefixIDgraph = 'gsc12_camois';
		}
		else {
			$titreTexteCumul = ' - ' . TRADUCTION['Cumul'][$this->localisation];
			$quelDonnees = 'moisCumul';
			$prefixIDgraph = 'gsc12_camoiscumul';
		}

		$divWell = new b\bls_div(NULL, array('class' => $this->styleCSSprefix . 'well ' . $this->styleCSSprefix . 'well-sm SVGgraphPREFAB_graphBarres12m'));
		$titreGraphe = new b\bls_h(3, $this->titreGraph . $titreTexteCumul . ' (' . $this->unite . ')');
		$divWell->add_enfants($titreGraphe);

		if ($with_graph) {
			$legende = new b\bls_p(NULL, array('class' => 'graphBarres12m-legende'));
			foreach ($this->donnees as $cle => $uneAnnee) {
				$legende->add_enfants(new b\bls_span($uneAnnee['annee'], array('class' => $this->styleCSSprefix . 'label', 'style' => 'background-color: ' . COLORSET[$cle]['back'] . '; color: ' . COLORSET[$cle]['font'] . ';')));
			}

			$leGraphAttr = array();
			if ($this->heightAffiche > 0) {
				$leGraphAttr['height'] = $this->heightAffiche;
			}

			if (!$cumul_version) {
				$this->calcul();
				$contenuDuGraph = $this->enfants_graph12m;
			}
			else {
				$this->calculcumule();
				$contenuDuGraph = $this->enfants_graph12m_cumul;
			}

			$leGraph = new b\bls_svg($prefixIDgraph . $this->nomGraph, "0 -20 {$this->width} {$this->height}", 'svg-' . $this->chartBackStyleCSSsuffix, $contenuDuGraph, $leGraphAttr);
			if ($caption_position_top) {
				$divWell->add_enfants(array($legende, $leGraph));
			}
			else {
				$divWell->add_enfants(array($leGraph, $legende));
			}
		}

		if ($with_table) {
			$leTableaux = new b\bls_table(array('class' => $this->styleCSSprefix . 'table ' . $this->styleCSSprefix . 'table-bordered ' . $this->styleCSSprefix . 'table-striped ' . $this->styleCSSprefix . 'table-condensed'));
			$leTableaux_ligne_entete = new b\bls_tr(new b\bls_th_c($this->unite));
			for ($index = 1; $index <= 12; $index++) {
				$leTableaux_ligne_entete->add_enfants(new b\bls_th_c(MOIS_COURT[$index][$this->localisation]));
			}
			if (!$cumul_version && $table_row_average) {
				$leTableaux_ligne_entete->add_enfants(new b\bls_th_c(UTF8APEQUTO . UTF8NBSP . TRADUCTION['Moyenne'][$this->localisation]));
			}
			$tab_moyennes = array(1 => 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
			$leTableaux->in_thead(array($leTableaux_ligne_entete));
			foreach ($this->donnees as $uneAnnee) {
				$leTableaux_ligne_donnee = new b\bls_tr(new b\bls_th_c($uneAnnee['annee']));
				for ($index = 1; $index <= 12; $index++) {
					$leTableaux_ligne_donnee->add_enfants(new b\bls_td_r(currency_format($uneAnnee[$quelDonnees][$index], 0, '', $this->localisation)));
					$tab_moyennes[$index] += $uneAnnee[$quelDonnees][$index];
				}
				if (!$cumul_version && $table_row_average) {
					$leTableaux_ligne_donnee->add_enfants(new b\bls_th_r(currency_format(($uneAnnee['moisCumul'][12] / 12), 0, '', $this->localisation)));
					$tab_moyennes[13] += ($uneAnnee['moisCumul'][12] / 12);
				}
				$leTableaux->in_tbody($leTableaux_ligne_donnee);
			}
			if (!$cumul_version && $table_col_average) {
				$leTableaux_ligne_pied = new b\bls_tr(new b\bls_th_c(UTF8APEQUTO . UTF8NBSP . TRADUCTION['Moyenne'][$this->localisation]));
				$index12ou13 = $table_row_average ? 13 : 12;
				for ($index = 1; $index <= $index12ou13; $index++) {
					$leTableaux_ligne_pied->add_enfants(new b\bls_th_r(currency_format(($tab_moyennes[$index] / $this->nbSeries), 0, '', $this->localisation)));
				}
				$leTableaux->in_tfoot($leTableaux_ligne_pied);
			}
			elseif ($cumul_version && $table_cumul_col_sum) {
				$leTableaux_ligne_pied = new b\bls_tr(new b\bls_th_c(UTF8SOMME));
				$index12ou13 = 12;
				for ($index = 1; $index <= $index12ou13; $index++) {
					$leTableaux_ligne_pied->add_enfants(new b\bls_th_r(currency_format($tab_moyennes[$index], 0, '', $this->localisation)));
				}
				$leTableaux->in_tfoot($leTableaux_ligne_pied);
			}
			$divWell->add_enfants(new b\bls_div($leTableaux, array('class' => $this->styleCSSprefix . 'table-responsive')));
		}
		if ($printed) {
			return $divWell->ecrire();
		}
		else {
			return $divWell->ecrire(FALSE);
		}
	}

}

?>
