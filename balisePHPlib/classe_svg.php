<?php

/*
 * This file is part of balisePHPlib
 * 
 * Copyright (C) 2017 Romain DENIS-REMIS <romain at denis-remis.fr>
 *
 * balisePHPlib is free software: you can redistribute it and/or modify
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
 * Fichier des définitions des classes pour les balises SVG de balisePHPlib.
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.1.0
 * @package balisePHPlib\svg
 */

namespace balisePHPlib;

require_once(__DIR__ . '/classe_balise.php');

/**
 * Définit les valeurs possibles pour l'attribut stroke-linecap. 
 */
const STROKE_LINECAP = array('butt', 'round', 'square');

/**
 * Définit les valeurs possibles pour l'attribut text-anchor. 
 */
const TEXT_ANCHOR = array('start', 'middle', 'end');

/**
 * Définie une balise SVG <svg>.
 * @package balisePHPlib\svg
 */
class bls_svg extends balise_x {

	/**
	 * Constructeur.
	 * 
	 * @param string $id
	 * @param string $viewBox
	 * @param string $class
	 * @param mixed $enfantsTAB
	 * @param array $autresAttr
	 */
	function __construct($id, $viewBox, $class, $enfantsTAB = NULL, $autresAttr = NULL) {
		$attrTAB = NULL;
		$requisAttr = array();
		$requisAttr['id'] = $id;
		$requisAttr['viewBox'] = $viewBox;
		$requisAttr['preserveAspectRatio'] = 'none';
		$requisAttr['class'] = $class;
		if (is_null($autresAttr) === FALSE && is_array($autresAttr)) {
			$attrTAB = array_merge($requisAttr, $autresAttr);
		}
		else {
			$attrTAB = $requisAttr;
		}
		parent::__construct('svg', TRUE, $enfantsTAB, $attrTAB);
	}

}

/**
 * Définie une balise SVG <rect>.
 * @package balisePHPlib\svg
 */
class bls_svg_rect extends balise_x {

	/**
	 * Constructeur.
	 * 
	 * @param float $x
	 * @param float $y
	 * @param float $width
	 * @param float $height
	 * @param string $fill
	 * @param array $autresAttr NULL par défaut
	 */
	function __construct($x, $y, $width, $height, $fill, $autresAttr = NULL) {
		$attrTAB = NULL;
		$requisAttr = array();
		$requisAttr['x'] = $x;
		$requisAttr['y'] = $y;
		$requisAttr['width'] = $width;
		$requisAttr['height'] = $height;
		$requisAttr['fill'] = $fill;
		if (is_null($autresAttr) === FALSE && is_array($autresAttr)) {
			$attrTAB = array_merge($requisAttr, $autresAttr);
		}
		else {
			$attrTAB = $requisAttr;
		}
		parent::__construct('rect', FALSE, NULL, $attrTAB);
	}

}

/**
 * Définie une balise SVG <line>.
 * @package balisePHPlib\svg
 */
class bls_svg_line extends balise_x {

	/**
	 * Constructeur.
	 * @param float $x1
	 * @param float $y1
	 * @param float $x2
	 * @param float $y2
	 * @param string $stroke 'rgb(0,0,0)' par défaut
	 * @param float $strokeWidth 1 par défaut
	 * @param string $strokeLinecap 'butt' par défaut
	 * @param array $autresAttr NULL par défaut
	 */
	function __construct($x1, $y1, $x2, $y2, $stroke = 'rgb(0,0,0)', $strokeWidth = 1, $strokeLinecap = 'butt', $autresAttr = NULL) {
		$attrTAB = NULL;
		$requisAttr = array();
		$requisAttr['x1'] = $x1;
		$requisAttr['y1'] = $y1;
		$requisAttr['x2'] = $x2;
		$requisAttr['y2'] = $y2;
		$requisAttr['stroke'] = $stroke;
		$requisAttr['stroke-width'] = $strokeWidth;
		if (in_array($strokeLinecap, STROKE_LINECAP, TRUE)) {
			$requisAttr['stroke-linecap'] = $strokeLinecap;
		}
		else {
			$requisAttr['stroke-linecap'] = 'butt';
		}

		if (is_null($autresAttr) === FALSE && is_array($autresAttr)) {
			$attrTAB = array_merge($requisAttr, $autresAttr);
		}
		else {
			$attrTAB = $requisAttr;
		}
		parent::__construct('line', FALSE, NULL, $attrTAB);
	}

}

/**
 * Définie une balise SVG <path>.
 * @package balisePHPlib\svg
 */
class bls_svg_path extends balise_x {

	/**
	 * Contructeur.
	 * @param string $d
	 * @param string $stroke 'rgb(0,0,0)' par défaut
	 * @param float $strokeWidth 1 par défaut
	 * @param string $strokeLinecap 'butt' par défaut
	 * @param array $autresAttr NULL par défaut
	 */
	function __construct($d, $stroke = 'rgb(0,0,0)', $strokeWidth = 1, $strokeLinecap = 'butt', $autresAttr = NULL) {
		$dd = '';
		foreach ($d as $unPoint) {
			$dd .= ' L ' . $unPoint[0] . ',' . $unPoint[1];
		}

		$attrTAB = NULL;
		$requisAttr = array();
		$requisAttr['d'] = 'M' . substr($dd, 2);
		$requisAttr['stroke'] = $stroke;
		$requisAttr['stroke-width'] = $strokeWidth;
		$requisAttr['fill'] = 'none';
		if (in_array($strokeLinecap, STROKE_LINECAP, TRUE)) {
			$requisAttr['stroke-linecap'] = $strokeLinecap;
		}
		else {
			$requisAttr['stroke-linecap'] = 'butt';
		}

		if (is_null($autresAttr) === FALSE && is_array($autresAttr)) {
			$attrTAB = array_merge($requisAttr, $autresAttr);
		}
		else {
			$attrTAB = $requisAttr;
		}
		parent::__construct('path', FALSE, NULL, $attrTAB);
	}

}

/**
 * Définie une balise SVG <text>.
 * @package balisePHPlib\svg
 */
class bls_svg_text extends balise_x {

	/**
	 * Constructeur.
	 * @param string $texte
	 * @param float $x
	 * @param float $y
	 * @param float $fontSize
	 * @param string $textAnchor 'start' par défaut
	 * @param string $fill 'rgb(0,0,0)' par défaut
	 * @param string $fontFam 'Arial' par défaut
	 * @param array $autresAttr NULL par défaut
	 */
	function __construct($texte, $x, $y, $fontSize, $textAnchor = 'start', $fill = 'rgb(0,0,0)', $fontFam = 'Arial', $autresAttr = NULL) {
		$attrTAB = NULL;
		$requisAttr = array();
		$requisAttr['x'] = $x;
		$requisAttr['y'] = $y;
		$requisAttr['font-size'] = $fontSize;
		$requisAttr['font-family'] = $fontFam;
		$requisAttr['fill'] = $fill;
		if (in_array($textAnchor, TEXT_ANCHOR, TRUE)) {
			$requisAttr['text-anchor'] = $textAnchor;
		}
		else {
			$requisAttr['text-anchor'] = 'start';
		}

		if (is_null($autresAttr) === FALSE && is_array($autresAttr)) {
			$attrTAB = array_merge($requisAttr, $autresAttr);
		}
		else {
			$attrTAB = $requisAttr;
		}
		parent::__construct('text', TRUE, array($texte), $attrTAB);
	}

}

?>
