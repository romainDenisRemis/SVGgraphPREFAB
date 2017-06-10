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
 * Fichier qui contient la classe SVGgraphPREFAB_graphPie.
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
 * Classe witch define a Pie Chart.
 * Définie un objet permetant d'afficher un graphique en camembert.
 * 
 */
class SVGgraphPREFAB_graphPie {

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
	private $enfants_graph = array();

	/**
	 * Tableau des données.
	 * @var array $donnees
	 */
	private $donnees = array();

	/**
	 * Nombre de séries de données.
	 * 
	 * @var int $nbSeries
	 */
	private $nbSeries = 0;

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
	 * 		'block_title' => 'Répartition'
	 * 		, 'data' => array()
	 * 		, 'units' => 'Qté'
	 * 		, 'localization' => 'fr'
	 * 		, 'css_style' => 'default'		// 'bootstrap' | 'default' | 'custom'
	 *      , 'chart_back_style' => 'clear'	// 'clear' | 'dark'
	 * 		, 'graph_forced_height' => 0	// If you really want the SVG graph have a forced height (means ratio display is lost)
	 * )
	 * ```
	 * @param array $param Tableau des paramètres
	 */
	public function __construct(array $param) {
		$block_title = 'Répartition';
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
		$this->nomGraph = unique_id('sgp_gpie');
		$this->heightAffiche = (int) $graph_forced_height;
		$this->height = 600;
		$this->width = 600;
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

		foreach ($data as $unCouple) {
			if (is_array($unCouple)) {
				if (isset($unCouple[0])) {
					$this->donnees[$unCouple[0]] = $unCouple[1];
					$this->valCumul += $unCouple[1];
					$this->nbSeries++;
				}
				if (isset($unCouple['label'])) {
					$this->donnees[$unCouple['label']] = $unCouple['val'];
					$this->valCumul += $unCouple['val'];
					$this->nbSeries++;
				}
			}
		}
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
	 * Calcul et création du graphique SVG.
	 * Fonction appelée dans la fonction *dessine*.
	 */
	private function calcul() {
		$tipX = $this->height / 2;
		$radius = ($this->height / 2) - 10;
		$ratio360 = 360 / $this->valCumul;
		$ratio100 = 100 / $this->valCumul;
		// Création des parts de tartes
		$i = 0;
		$startAngle = 0;
		foreach ($this->donnees as $cle => $val) {
			$j = $i % 14;
			$fill = COLORSET[$j]['back'];
			$couleurFont = COLORSET[$j]['font'];
			$endAngle = ($ratio360 * $val) + $startAngle;

			$texteEtiquette = currency_format($val, 0, '', $this->localisation);
			$texteEtiquettePourcent = currency_format(($val * $ratio100), 2, '', $this->localisation) . ' %';
			$codeJSpourCacherTooltip = "SGP_gpie_hideTooltip('{$this->nomGraph}');";
			$codeJSpourAfficherTooltip = "SGP_gpie_showTooltip('{$texteEtiquette}', '{$texteEtiquettePourcent}', '{$couleurFont}', '{$fill}', '{$this->nomGraph}');";
			$attrSup = array('onmouseout' => $codeJSpourCacherTooltip, 'onmouseover' => $codeJSpourAfficherTooltip);
			$this->enfants_graph[] = new b\bls_svg_pathPieceOfPie($tipX, $tipX, $radius, $startAngle, $endAngle, $fill, '#000', 0, 'butt', $attrSup);

			$startAngle = $endAngle;
			$i++;
		}

		// Cadre et texte servant à afficher la valeur lorsque une partie est survolée par la souris
		$this->enfants_graph[] = new b\bls_svg_rect(10, 10, 90, 20, 'rgb(250,250,250)', array('visibility' => 'hidden', 'id' => 'tooltipbox' . $this->nomGraph));
		$this->enfants_graph[] = new b\bls_svg_text('', 96, 25, 16, 'end', 'rgb(0,0,0)', 'Arial', array('visibility' => 'hidden', 'id' => 'tooltip' . $this->nomGraph));
		// pour l'affichage en pourcentages
		$this->enfants_graph[] = new b\bls_svg_rect(10, 40, 90, 20, 'rgb(250,250,250)', array('visibility' => 'hidden', 'id' => 'ptooltipbox' . $this->nomGraph));
		$this->enfants_graph[] = new b\bls_svg_text('', 96, 55, 16, 'end', 'rgb(0,0,0)', 'Arial', array('visibility' => 'hidden', 'id' => 'ptooltip' . $this->nomGraph));
	}

	/**
	 * Afficher (ou retourne) Le bloc contenant le titre, le graphique .
	 * Le tableau des options par défaut est:
	 * 
	 * ```php
	 * array(
	 * 		'caption_position_top' => TRUE
	 * 		, 'sort_by_label' => FALSE
	 * )
	 * ```
	 * 
	 * @param array $param Tableau des options d'affichage.
	 * @param bool $printed Par defaut: TRUE , si FALSE retourne un string.
	 * @return bool|string retourne FALSE si les données sont vides, sinon TRUE ou un string en fonction de $printed.
	 */
	public function dessine(array $param = array(), $printed = TRUE) {
		$printed = (bool) $printed;
		if (empty($this->donnees)) {
			return FALSE;
		}
		$caption_position_top = TRUE;
		$sort_by_label = FALSE;

		array_walk($param, array($this, 'to_bool'));

		extract($param, EXTR_IF_EXISTS);

		if ($sort_by_label) {
			ksort($this->donnees);
		}
		else {
			arsort($this->donnees);
		}

		$this->nomGraph = ++$this->suffixeGraphID > 1 ? substr($this->nomGraph, 0, -2) : $this->nomGraph;
		$this->nomGraph .= '_' . $this->suffixeGraphID;

		$prefixIDgraph = 'gsc_pie';

		$divWell = new b\bls_div(NULL, array('class' => $this->styleCSSprefix . 'well ' . $this->styleCSSprefix . 'well-sm SVGgraphPREFAB_graphPie'));
		$titreGraphe = new b\bls_h(3, $this->titreGraph . ' (' . $this->unite . ')');
		$divWell->add_enfants($titreGraphe);

		$legende = new b\bls_p(NULL, array('class' => 'graphPie-legende'));

		$i = 0;
		foreach ($this->donnees as $cle => $uneval) {
			$j = $i % 14;
			$fill = COLORSET[$j]['back'];
			$couleurFont = COLORSET[$j]['font'];
			$legende->add_enfants(new b\bls_span($cle, array('class' => $this->styleCSSprefix . 'label', 'style' => 'background-color: ' . $fill . '; color: ' . $couleurFont . ';')));
			$i++;
		}

		$leGraphAttr = array();
		if ($this->heightAffiche > 0) {
			$leGraphAttr['height'] = $this->heightAffiche;
		}

		$this->calcul();
		$contenuDuGraph = $this->enfants_graph;

		$leGraph = new b\bls_svg($prefixIDgraph . $this->nomGraph, "0 0 {$this->width} {$this->height}", 'svg-' . $this->chartBackStyleCSSsuffix, $contenuDuGraph, $leGraphAttr);
		if ($caption_position_top) {
			$divWell->add_enfants(array($legende, $leGraph));
		}
		else {
			$divWell->add_enfants(array($leGraph, $legende));
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
