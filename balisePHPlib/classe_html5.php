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
 * Fichier des définitions des classes pour les balises HTML de balisePHPlib.
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.2.0
 * @package balisePHPlib\html5
 */

namespace balisePHPlib;

require_once(__DIR__ . '/classe_balise.php');

/**
 * Constante liste des types possibles pour les balises input.
 */
const HTML_INPUT_TYPE = array('text', 'password', 'checkbox', 'radio', 'submit', 'reset', 'file', 'hidden', 'image', 'button', 'date', 'datetime', 'datetime-local', 'email', 'month', 'number', 'range', 'tel', 'time', 'url', 'week', 'color', 'search');

/**
 * Définie une balise HTML <a>.
 * @package balisePHPlib\html5
 */
class bls_a extends balise {

	/**
	 * Constructeur.
	 * @param string $href 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($href = '', $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		$attributs['href'] = strval($href);
		parent::__construct('a', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <abbr>.
 * @package balisePHPlib\html5
 */
class bls_abbr extends balise {

	/**
	 * Constructeur.
	 * @param string $texte 
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($texte, $attributs = NULL) {
		if (!is_string($texte)) {
			trigger_error('Une balise abbr ne peut que contenir du texte', E_USER_NOTICE);
		}
		parent::__construct('abbr', TRUE, $texte, $attributs);
	}

}

/**
 * Définie une balise HTML <address>.
 * @package balisePHPlib\html5
 */
class bls_address extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('address', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <audio>.
 * @package balisePHPlib\html5
 */
class bls_audio extends balise {

	/**
	 * Constructeur.
	 * 
	 * @param string $src
	 * @param bool $autoplay
	 * @param bool $controls
	 * @param bool $loop
	 * @param bool $autobuffer
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($src, $autoplay = FALSE, $controls = TRUE, $loop = FALSE, $autobuffer = FALSE, $contenu = NULL, $attributs = NULL) {

		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		$attributs['src'] = strval($src);

		if ($autoplay) {
			$attributs['autoplay'] = 'autoplay';
		}
		if ($controls) {
			$attributs['controls'] = 'controls';
		}
		if ($loop) {
			$attributs['loop'] = 'loop';
		}
		if ($autobuffer) {
			$attributs['autobuffer'] = 'autobuffer';
		}

		parent::__construct('audio', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <b>.
 * @package balisePHPlib\html5
 */
class bls_b extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('b', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <base>.
 * @package balisePHPlib\html5
 */
class bls_base extends balise {

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($attributs = NULL) {
		parent::__construct('base', FALSE, NULL, $attributs);
	}

}

/**
 * Définie une balise HTML <blockquote>.
 * @package balisePHPlib\html5
 */
class bls_blockquote extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('blockquote', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <br>.
 * @package balisePHPlib\html5
 */
class bls_br extends balise {

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($attributs = NULL) {
		parent::__construct('br', FALSE, NULL, $attributs);
	}

}

/**
 * Définie une balise HTML <button>.
 * @package balisePHPlib\html5
 */
class bls_button extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('button', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <canvas>.
 * @package balisePHPlib\html5
 */
class bls_canvas extends balise {

	/**
	 * Constructeur.
	 * 
	 * @param int $width
	 * @param int $height
	 * @param string $id
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($width, $height, $id = NULL, $contenu = NULL, $attributs = NULL) {

		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_numeric($width)) {
			trigger_error('L\'attribut width attend un nombre.', E_USER_WARNING);
		}
		else {
			$attributs['width'] = (int) $width;
		}

		if (!is_numeric($height)) {
			trigger_error('L\'attribut height attend un nombre.', E_USER_WARNING);
		}
		else {
			$attributs['height'] = (int) $height;
		}

		if (!is_null($id)) {
			if (is_string($id)) {
				$attributs['id'] = $id;
			}
			else {
				trigger_error('L\'attribut id attend un string.', E_USER_WARNING);
			}
		}

		parent::__construct('canvas', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <cite>.
 * @package balisePHPlib\html5
 */
class bls_cite extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('cite', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <code>.
 * @package balisePHPlib\html5
 */
class bls_code extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('code', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <code> pour PRISM.
 * Spécialement pour interagir avec [PRISM](http://prismjs.com) vous passez juste le nom du langage.
 * Ici pour la liste et comment doivent être nommés les langages [liste langages](http://prismjs.com/#languages-list).
 * @package balisePHPlib\html5
 */
class bls_codePrism extends bls_code {

	/**
	 * Constructeur.
	 * @param string $lang Nom du langage ('javascript' ou 'css' ...)
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($lang, $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($lang)) {
			trigger_error('Le paramètre $lang attend un string.', E_USER_WARNING);
		}

		$prismClass = 'language-' . $lang;

		if (isset($attributs['class'])) {
			$attributs['class'] .= ' ' . $prismClass;
		}
		else {
			$attributs['class'] = $prismClass;
		}
		parent::__construct($contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <details>.
 * @package balisePHPlib\html5
 */
class bls_details extends balise {

	/**
	 * Constructeur.
	 * @param bool $open Par défaut FALSE
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($open = FALSE, $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}
		$open = (bool) $open;
		if ($open) {
			$attributs['open'] = 'open';
		}
		parent::__construct('details', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <summary>.
 * @package balisePHPlib\html5
 */
class bls_summary extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('summary', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <em>.
 * @package balisePHPlib\html5
 */
class bls_em extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('em', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <strong>.
 * @package balisePHPlib\html5
 */
class bls_strong extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('strong', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <p>.
 * @package balisePHPlib\html5
 */
class bls_p extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('p', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <span>.
 * @package balisePHPlib\html5
 */
class bls_span extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('span', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <h*>.
 * @package balisePHPlib\html5
 */
class bls_h extends balise {

	/**
	 * Constructeur.
	 * @param int $niv de 1 à 6
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($niv, $contenu = NULL, $attributs = NULL) {
		$niv = (int) $niv;
		if ($niv < 1 || $niv > 6) {
			$niv = 2;
		}
		parent::__construct('h' . $niv, TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <div>.
 * @package balisePHPlib\html5
 */
class bls_div extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('div', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <hr>.
 * @package balisePHPlib\html5
 */
class bls_hr extends balise {

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($attributs = NULL) {
		parent::__construct('hr', FALSE, NULL, $attributs);
	}

}

/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  CLASSES CONCERNANT TOUTES LES BALISES DU SQUELETTE DE BASE ET DU HEAD
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

/**
 * Définie une balise HTML <html>.
 * @package balisePHPlib\html5
 */
class bls_html extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('html', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <head>.
 * @package balisePHPlib\html5
 */
class bls_head extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('head', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <body>.
 * @package balisePHPlib\html5
 */
class bls_body extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('body', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <link>.
 * @package balisePHPlib\html5
 */
class bls_link extends balise {

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($attributs = NULL) {
		parent::__construct('link', FALSE, NULL, $attributs);
	}

}

/**
 * Définie une balise HTML <link> pour favicon.
 * @package balisePHPlib\html5
 */
class bls_linkFavicon extends bls_link {

	/**
	 * Constructeur.
	 * @param string $iconPath Chemin du fichier exp: 'favicon.ico' ou 'img/favicon.png'
	 */
	public function __construct($iconPath) {
		if (!is_string($iconPath)) {
			trigger_error('Le paramètre $iconPath attend un string.', E_USER_WARNING);
		}
		$extension = substr($iconPath, -3);
		$type = 'image/';
		switch ($extension) {
			case 'ico':
				$type .= 'x-icon';
				break;
			case 'jpg':
				$type .= 'jpeg';
				break;
			case 'png':
			case 'jpeg':
			case 'gif':
				$type .= $extension;
				break;
			default:
				break;
		}
		$attributs = array();
		$attributs['rel'] = 'icon';
		$attributs['type'] = $type;
		$attributs['href'] = $iconPath;

		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <link> pour CSS.
 * @package balisePHPlib\html5
 */
class bls_linkCSS extends bls_link {

	/**
	 * Constructeur.
	 * @param string $filePath Chemin du fichier exp: 'css/style.css'
	 */
	public function __construct($filePath) {
		if (!is_string($filePath)) {
			trigger_error('Le paramètre $filePath attend un string.', E_USER_WARNING);
		}
		$attributs = array();
		$attributs['rel'] = 'stylesheet';
		$attributs['type'] = 'text/css';
		$attributs['href'] = $filePath;

		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <title>.
 * @package balisePHPlib\html5
 */
class bls_title extends balise {

	/**
	 * Constructeur.
	 * @param string $title 
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($title, $attributs = NULL) {
		if (!is_string($title)) {
			trigger_error('Le paramètre $title attend un string.', E_USER_WARNING);
		}
		parent::__construct('title', TRUE, $title, $attributs);
	}

}

/**
 * Définie une balise HTML <meta>.
 * @package balisePHPlib\html5
 */
class bls_meta extends balise {

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($attributs = NULL) {
		parent::__construct('meta', FALSE, NULL, $attributs);
	}

}

/**
 * Définie une balise HTML <meta> charset.
 * @package balisePHPlib\html5
 */
class bls_metaCharset extends bls_meta {

	/**
	 * Constructeur.
	 * @param string $charset 'UTF-8' par défaut
	 */
	public function __construct($charset = 'UTF-8') {
		if (!is_string($charset)) {
			trigger_error('Le paramètre $charset attend un string.', E_USER_WARNING);
		}
		$attributs['charset'] = $charset;
		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <meta> viewport.
 * @package balisePHPlib\html5
 */
class bls_metaViewport extends bls_meta {

	/**
	 * Constructeur.
	 * @param string $viewport 'width=device-width, initial-scale=1.0' par défaut
	 */
	public function __construct($viewport = 'width=device-width, initial-scale=1.0') {
		if (!is_string($viewport)) {
			trigger_error('Le paramètre $viewport attend un string.', E_USER_WARNING);
		}
		$attributs['name'] = 'viewport';
		$attributs['content'] = $viewport;
		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <meta> author.
 * @package balisePHPlib\html5
 */
class bls_metaAuthor extends bls_meta {

	/**
	 * Constructeur.
	 * @param string $author 
	 */
	public function __construct($author) {
		if (!is_string($author)) {
			trigger_error('Le paramètre $author attend un string.', E_USER_WARNING);
		}
		$attributs['name'] = 'author';
		$attributs['content'] = $author;
		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <meta> description.
 * @package balisePHPlib\html5
 */
class bls_metaDescription extends bls_meta {

	/**
	 * Constructeur.
	 * @param string $description 
	 */
	public function __construct($description) {
		if (!is_string($description)) {
			trigger_error('Le paramètre $description attend un string.', E_USER_WARNING);
		}
		$attributs['name'] = 'description';
		$attributs['content'] = $description;
		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <meta> keywords.
 * @package balisePHPlib\html5
 */
class bls_metaKeywords extends bls_meta {

	/**
	 * Constructeur.
	 * @param string $keywords 
	 */
	public function __construct($keywords) {
		if (!is_string($keywords)) {
			trigger_error('Le paramètre $keywords attend un string.', E_USER_WARNING);
		}
		$attributs['name'] = 'keywords';
		$attributs['content'] = $keywords;
		parent::__construct($attributs);
	}

}

/**
 * Définie une balise HTML <script>.
 * @package balisePHPlib\html5
 */
class bls_script extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('script', TRUE, $contenu, $attributs);
	}

}

/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  CLASSES CONCERNANT TOUTES LES BALISES EN RAPPORT AVEC LA STRUCTURE GENERALE DE LA PAGE
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

/**
 * Définie une balise HTML <nav>.
 * @package balisePHPlib\html5
 */
class bls_nav extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('nav', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <section>.
 * @package balisePHPlib\html5
 */
class bls_section extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('section', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <header>.
 * @package balisePHPlib\html5
 */
class bls_header extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('header', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <footer>.
 * @package balisePHPlib\html5
 */
class bls_footer extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('footer', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <article>.
 * @package balisePHPlib\html5
 */
class bls_article extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('article', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <aside>.
 * @package balisePHPlib\html5
 */
class bls_aside extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('aside', TRUE, $contenu, $attributs);
	}

}

/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  CLASSES CONCERNANT TOUTES LES BALISES EN RAPPORT AVEC LES LISTES
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

/**
 * Définie une balise HTML <li>.
 * @package balisePHPlib\html5
 */
class bls_li extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('li', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <ul>.
 * @package balisePHPlib\html5
 */
class bls_ul extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('ul', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * redéfinition de la fonction de la classe mère.
	 * Seul un objet de la classe **bls_li** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_li)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise ul qui n\'est pas une balise li ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <ol>.
 * @package balisePHPlib\html5
 */
class bls_ol extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('ol', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * redéfinition de la fonction de la classe mère.
	 * Seul un objet de la classe **bls_li** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_li)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise ol qui n\'est pas une balise li ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <dl>.
 * @package balisePHPlib\html5
 */
class bls_dl extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('dl', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * redéfinition de la fonction de la classe mère.
	 * Seul un objet de la classe **bls_dt** ou **bls_dd** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_dt || $enfant instanceof bls_dd)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise dl qui n\'est pas une balise dt ou dd ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <dt>.
 * @package balisePHPlib\html5
 */
class bls_dt extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('dt', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <dd>.
 * @package balisePHPlib\html5
 */
class bls_dd extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('dd', TRUE, $contenu, $attributs);
	}

}

/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  CLASSES CONCERNANT TOUTES LES BALISES EN RAPPORT AVEC LES FORMULAIRES
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

/**
 * Définie une balise HTML <form>.
 * @package balisePHPlib\html5
 */
class bls_form extends balise {

	/**
	 * Constructeur.
	 * @param string $action
	 * @param string $method Par défaut 'post'
	 * @param string $enctype Par défaut 'multipart/form-data'
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($action, $method = 'post', $enctype = 'multipart/form-data', $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($action)) {
			trigger_error('Le paramètre $action attend un string.', E_USER_WARNING);
		}
		else {
			$attributs['action'] = $action;
		}

		if (!is_string($method)) {
			trigger_error('Le paramètre $method attend un string.', E_USER_WARNING);
		}
		else {
			if (in_array($method, array('post', 'get'))) {
				$attributs['method'] = $method;
			}
			else {
				trigger_error('Le paramètre $method fournit est invalide.', E_USER_WARNING);
			}
		}

		if (!is_string($enctype)) {
			trigger_error('Le paramètre $enctype attend un string.', E_USER_WARNING);
		}
		else {
			if (in_array($enctype, array('multipart/form-data', 'application/x-www-form-urlencoded', 'text/plain'))) {
				$attributs['enctype'] = $enctype;
			}
			else {
				trigger_error('Le paramètre $enctype fournit est invalide.', E_USER_WARNING);
			}
		}

		parent::__construct('form', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <option>.
 * @package balisePHPlib\html5
 */
class bls_option extends balise {

	/**
	 * Constructeur.
	 * @param string|int|float $label
	 * @param string|int|float $value Par défaut NULL
	 * @param boll $selected Par défaut FALSE
	 * @param array $attributs Par défaut NULL
	 */
	public function __construct($label, $value = NULL, $selected = FALSE, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (is_string($label) || is_numeric($label)) {
			$label = strval($label);
			if (is_null($value)) {
				$value = $label;
			}
			$attributs['label'] = $label;
		}
		else {
			trigger_error('Le paramètre label attend un string ou un nombre.', E_USER_WARNING);
		}

		if (is_string($value) || is_numeric($value)) {
			$value = strval($value);
			$attributs['value'] = $value;
		}
		else {
			trigger_error('Le paramètre value attend un string ou un nombre.', E_USER_WARNING);
		}

		$selected = (bool) $selected;
		if ($selected) {
			$attributs['selected'] = 'selected';
		}

		parent::__construct('option', TRUE, $label, $attributs);
	}

}

/**
 * Définie une balise HTML <select>.
 * @package balisePHPlib\html5
 */
class bls_select extends balise {

	/**
	 * Constructeur.
	 * @param string $name Attribut name (donné à l'attribut id aussi)
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($name, $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($name)) {
			trigger_error('Le paramètre $name attend un string.', E_USER_WARNING);
		}
		else {
			$attributs['name'] = $name;
			$attributs['id'] = $name;
		}
		parent::__construct('select', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * redéfinition de la fonction de la classe mère.
	 * Seul un objet de la classe **bls_option** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_option)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise select qui n\'est pas une balise option ', E_USER_WARNING);
		}
	}

	/**
	 * Ajouter une liste d'options d'un coup dans la balise datalist.
	 * On passe un tableau associatif dans lequel les paires clés=>valeur seront respectivement utilisées pour les attributs 'value' et 'label' des balises options 
	 * @param array $options un tableau associatif
	 */
	public function add_options(array $options, $valSelect = NULL) {
		if (!is_null($valSelect) && (is_string($valSelect) || is_numeric($valSelect))) {
			$valSelect = strval($valSelect);
		}
		elseif (!is_null($valSelect)) {
			$valSelect = NULL;
			trigger_error('Le paramètre $valSelect attend un string ou un nombre.', E_USER_NOTICE);
		}

		if (is_null($valSelect)) {
			foreach ($options as $uneVal => $unLab) {
				$this->add_enfants(new bls_option($unLab, $uneVal));
			}
		}
		else {
			foreach ($options as $uneVal => $unLab) {
				if ($uneVal == $valSelect) {
					$this->add_enfants(new bls_option($unLab, $uneVal, TRUE));
				}
				else {
					$this->add_enfants(new bls_option($unLab, $uneVal));
				}
			}
		}
	}

}

/**
 * Définie une balise HTML <datalist>.
 * @package balisePHPlib\html5
 */
class bls_datalist extends balise {

	/**
	 * Constructeur.
	 * @param string id Attribut id
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($id, $listeOptions = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($id)) {
			trigger_error('Le paramètre id attend un string.', E_USER_WARNING);
		}
		$attributs['id'] = $id;
		parent::__construct('datalist', TRUE, NULL, $attributs);

		if (!is_null($listeOptions) && is_array($listeOptions)) {
			$this->add_options($listeOptions);
		}
	}

	/**
	 * Ajouter un enfant.
	 * redéfinition de la fonction de la classe mère.
	 * Seul un objet de la classe **bls_option** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_option)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise datalist qui n\'est pas une balise option ', E_USER_WARNING);
		}
	}

	/**
	 * Ajouter une liste d'options d'un coup dans la balise datalist.
	 * @param array $options
	 */
	public function add_options(array $options) {
		foreach ($options as $uneOption) {
			$this->add_enfants(new bls_option($uneOption));
		}
	}

}

/**
 * Définie une balise HTML <fieldset>.
 * @package balisePHPlib\html5
 */
class bls_fieldset extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('fieldset', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <legend>.
 * @package balisePHPlib\html5
 */
class bls_legend extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('legend', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <label>.
 * @package balisePHPlib\html5
 */
class bls_label extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($for, $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (is_string($for) || is_numeric($for)) {
			$for = strval($for);
			$attributs['for'] = $for;
		}
		else {
			trigger_error('Le paramètre "for" attend un string ou un nombre.', E_USER_WARNING);
		}

		parent::__construct('label', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <textarea>.
 * @package balisePHPlib\html5
 */
class bls_textarea extends balise {

	/**
	 * Constructeur.
	 * @param string $name pour les attributs 'name' et 'id'
	 * @param bool $required Par défaut FALSE
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($name, $required = FALSE, $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($name)) {
			trigger_error('Le paramètre $name attend un string.', E_USER_WARNING);
		}
		else {
			$attributs['name'] = $name;
			$attributs['id'] = $name;
		}

		$required = (bool) $required;
		if ($required) {
			$attributs['required'] = 'required';
		}
		$attributs['rows'] = 5;
		parent::__construct('textarea', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <input>.
 * @package balisePHPlib\html5
 */
class bls_input extends balise {

	/**
	 * Constructeur.
	 * @param string $name pour les attributs 'name' et 'id'
	 * @param string $type Par défaut 'text'
	 * @param bool $required Par défaut FALSE
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($name, $type = 'text', $required = FALSE, $contenu = NULL, $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($name)) {
			trigger_error('Le paramètre $name attend un string.', E_USER_WARNING);
		}
		else {
			$attributs['name'] = $name;
			$attributs['id'] = $name;
		}

		if (!is_string($type)) {
			trigger_error('Le paramètre $type attend un string.', E_USER_WARNING);
		}
		else {
			if (in_array($type, HTML_INPUT_TYPE)) {
				$attributs['type'] = $type;
			}
			else {
				trigger_error('Le paramètre $type fournit est invalide.', E_USER_WARNING);
			}
		}

		$required = (bool) $required;
		if ($required) {
			$attributs['required'] = 'required';
		}
		parent::__construct('input', FALSE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <input> de type submit.
 * @package balisePHPlib\html5
 */
class bls_inputSubmit extends bls_input {
	/**
	 * 
	 * @param string $value Par défaut 'Valider'
	 * @param string $name Par défaut 'inputSub'
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($value = "Valider", $name = 'inputSub', $attributs = NULL) {
		if (is_null($attributs) || !is_array($attributs)) {
			$attributs = array();
		}

		if (!is_string($value)) {
			trigger_error('Le paramètre $value attend un string.', E_USER_WARNING);
		}
		else {
			$attributs['value'] = $value;
		}

		parent::__construct($name, 'submit', FALSE, NULL, $attributs);
	}

}

/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  CLASSES CONCERNANT TOUTES LES BALISES EN RAPPORT AVEC LES TABLEAUX
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

/**
 * Définie une balise HTML <td>.
 * @package balisePHPlib\html5\table
 */
class bls_td extends balise {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('td', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <td> contenu aligné à gauche.
 * @package balisePHPlib\html5\table
 */
class bls_td_l extends bls_td {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct($contenu, $attributs);
		$this->add_class('balisePHPlib_HTML-tal');
	}

}

/**
 * Définie une balise HTML <td> contenu centré.
 * @package balisePHPlib\html5\table
 */
class bls_td_c extends bls_td {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct($contenu, $attributs);
		$this->add_class('balisePHPlib_HTML-tac');
	}

}

/**
 * Définie une balise HTML <td> contenu aligné à droite.
 * @package balisePHPlib\html5\table
 */
class bls_td_r extends bls_td {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct($contenu, $attributs);
		$this->add_class('balisePHPlib_HTML-tar');
	}

}

/**
 * Définie une balise HTML <th>.
 * @package balisePHPlib\html5\table
 */
class bls_th extends balise {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('th', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <th> contenu aligné à gauche.
 * @package balisePHPlib\html5\table
 */
class bls_th_l extends bls_th {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct($contenu, $attributs);
		$this->add_class('balisePHPlib_HTML-tal');
	}

}

/**
 * Définie une balise HTML <th> contenu centré.
 * @package balisePHPlib\html5\table
 */
class bls_th_c extends bls_th {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct($contenu, $attributs);
		$this->add_class('balisePHPlib_HTML-tac');
	}

}

/**
 * Définie une balise HTML <th> contenu aligné à droite.
 * @package balisePHPlib\html5\table
 */
class bls_th_r extends bls_th {

	/**
	 * Constructeur.
	 * 
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct($contenu, $attributs);
		$this->add_class('balisePHPlib_HTML-tar');
	}

}

/**
 * Définie une balise HTML <tr>.
 * @package balisePHPlib\html5\table
 */
class bls_tr extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('tr', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * 
	 * Seul un objet de la classe **bls_td** ou **bls_th** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_td || $enfant instanceof bls_th)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise tr qui n\'est pas une balise td ou th ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <thead>.
 * @package balisePHPlib\html5\table
 */
class bls_thead extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('thead', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * 
	 * Seul un objet de la classe **bls_tr** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_tr)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise thead qui n\'est pas une balise tr ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <tfoot>.
 * @package balisePHPlib\html5\table
 */
class bls_tfoot extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('tfoot', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * 
	 * Seul un objet de la classe **bls_tr** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_tr)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise tfoot qui n\'est pas une balise tr ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <tbody>.
 * @package balisePHPlib\html5\table
 */
class bls_tbody extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('tbody', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * 
	 * Seul un objet de la classe **bls_tr** sera accepté.
	 * 
	 * @param object $enfant
	 */
	protected function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_tr)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise tbody qui n\'est pas une balise tr ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <col>.
 * @package balisePHPlib\html5\table
 */
class bls_col extends balise {

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($attributs = NULL) {
		parent::__construct('col', FALSE, NULL, $attributs);
	}

}

/**
 * Définie une balise HTML <colgroup>.
 * @package balisePHPlib\html5\table
 */
class bls_colgroup extends balise {

	/**
	 * Constructeur.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	function __construct($contenu = NULL, $attributs = NULL) {
		parent::__construct('colgroup', TRUE, $contenu, $attributs);
	}

	/**
	 * Ajouter un enfant.
	 * 
	 * Seul un objet de la classe **bls_col** sera accepté.
	 * 
	 * @param object $enfant
	 */
	public function add_enfant($enfant, $push = TRUE) {
		if (is_object($enfant) && ($enfant instanceof bls_col)) {
			parent::add_enfant($enfant, $push);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise colgroup qui n\'est pas une balise col ', E_USER_WARNING);
		}
	}

}

/**
 * Définie une balise HTML <caption>.
 * @package balisePHPlib\html5\table
 */
class bls_caption extends balise {

	/**
	 * Constructeur.
	 * 
	 * @param string $texte Texte de la balise.
	 * @param string $side 't' ou 'b' attendu, 't' par défaut.
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	function __construct($texte, $side = 't', $contenu = NULL, $attributs = NULL) {
		if (is_null($contenu)) {
			$contenu = $texte;
		}
		elseif (is_array($contenu)) {
			array_unshift($contenu, $texte);
		}
		else {
			$contenu = array($texte, $contenu);
		}

		if ($side === 't') {
			$side = 'classe_php_html-caption-side-top';
		}
		elseif ($side === 'b') {
			$side = 'classe_php_html-caption-side-bottom';
		}
		else {
			$side = 'classe_php_html-caption-side-top';
		}

		if (is_null($attributs)) {
			$attributs = array('class' => $side);
		}
		elseif (is_array($attributs)) {
			if (isset($attributs['class'])) {
				$attributs['class'] .= ' ' . $side;
			}
			else {
				$attributs['class'] = $side;
			}
		}
		else {
			$attributs = array('class' => $side);
		}
		parent::__construct('caption', TRUE, $contenu, $attributs);
	}

}

/**
 * Définie une balise HTML <table>.
 * 
 * Les méthodes *add_enfant* et *add_enfants* ne doivent pas êtres utilisées dans cette balise, 
 * si elles le sont elles n'auront aucun effet.
 * La classe **bls_table** possède des propriétés représentant les seules balises filles acceptables (sémantiquement parlant) par une balise table:
 * * caption, une balise de type **bls_caption**
 * * colgroups, un tableau de balises de type **bls_colgroup**
 * * thead, une balise de type **bls_thead**
 * * tfoot, une balise de type **bls_tfoot**
 * * tbody, une balise de type **bls_tbody**
 * 
 * Ils faut donc utiliser les méthodes spécifiques à la classe **bls_table** pour remplir le tableau.
 * 
 * @package balisePHPlib\html5\table
 */
class bls_table extends balise {

	/**
	 * La balise <caption> du tableau.
	 * @var bls_caption $caption
	 */
	protected $caption = NULL;

	/**
	 * Un tableau contenant si besoin la(les) balise(s) <colgroup> du tableau.
	 * @var bls_colgroup[] $colgroup
	 */
	protected $colgroups = array();

	/**
	 * La balise <thead> du tableau.
	 * @var bls_thead $thead
	 */
	protected $thead = NULL;

	/**
	 * La balise <tfoot> du tableau.
	 * @var bls_tfoot $tfoot
	 */
	protected $tfoot = NULL;

	/**
	 * La balise <tbody> du tableau.
	 * @var bls_tbody $tbody
	 */
	protected $tbody = NULL;

	/**
	 * Constructeur.
	 * @param array $attributs NULL par défaut
	 */
	function __construct($attributs = NULL) {
		parent::__construct('table', TRUE, NULL, $attributs);
	}

	/**
	 * Ajouter une balise <caption> au tableau.
	 * 
	 * @param string $texte Texte de la balise.
	 * @param string $side 't' ou 'b' attendu, 't' par défaut.
	 * @param array $contenu NULL par défaut.
	 * @param array $attributs NULL par défaut.
	 */
	public function add_caption($texte, $side = 't', $contenu = NULL, $attributs = NULL) {
		$this->caption = new bls_caption($texte, $side, $contenu, $attributs);
	}

	/**
	 * Ajouter une balise <colgroup> au tableau.
	 * @param \SVGgraph12M_PHPlib\bls_colgroup $colGroup
	 */
	public function add_colgroup(bls_colgroup $colGroup) {
		$this->colgroups[] = $colGroup;
	}

	/**
	 * Ajouter une balise <thead> au tableau.
	 * @param array $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function add_thead($contenu = NULL, $attributs = NULL) {
		$this->thead = new bls_thead($contenu, $attributs);
	}

	/**
	 * Ajouter une balise <tfoot> au tableau.
	 * @param array $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function add_tfoot($contenu = NULL, $attributs = NULL) {
		$this->tfoot = new bls_tfoot($contenu, $attributs);
	}

	/**
	 * Ajouter une balise <tbody> au tableau.
	 * @param array $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function add_tbody($contenu = NULL, $attributs = NULL) {
		$this->tbody = new bls_tbody($contenu, $attributs);
	}

	/**
	 * Ajouter du contenu dans la balise <thead> du tableau.
	 * 
	 * Si *add_thead* n'a pas été appelée, créer d'abord la balise <thead> du tableau.
	 * 
	 * @param array|object $contenu NULL par défaut
	 */
	public function in_thead($contenu = NULL) {
		if (is_null($this->thead)) {
			$this->thead = new bls_thead();
		}
		$this->thead->add_enfants($contenu);
	}

	/**
	 * Ajouter du contenu dans la balise <tfoot> du tableau.
	 * 
	 * Si *add_tfoot* n'a pas été appelée, créer d'abord la balise <tfoot> du tableau.
	 * 
	 * @param array|object $contenu NULL par défaut
	 */
	public function in_tfoot($contenu = NULL) {
		if (is_null($this->tfoot)) {
			$this->tfoot = new bls_tfoot();
		}
		$this->tfoot->add_enfants($contenu);
	}

	/**
	 * Ajouter du contenu dans la balise <tbody> du tableau.
	 * 
	 * Si *add_tbody* n'a pas été appelée, créer d'abord la balise <tbody> du tableau.
	 * 
	 * @param array|object $contenu NULL par défaut
	 */
	public function in_tbody($contenu = NULL) {
		if (is_null($this->tbody)) {
			$this->tbody = new bls_tbody();
		}
		$this->tbody->add_enfants($contenu);
	}

	/**
	 * Affiche la balise table et tout son contenu.
	 * 
	 * Les éléments de la table seront affichés dans le bon ordre.
	 * caption - colgroup - thead - tfoot - tbody
	 * 
	 * @param bool $printed  Par defaut: TRUE , si FALSE retourne un string
	 * @return bool|string  suivant la valeur de $printed
	 */
	public function ecrire($printed = TRUE) {
		$printed = (bool) $printed;
		$this->del_enfants(); // au cas où add_enfants() ai été utilisé improprement.
		$this->add_enfants($this->caption);
		if (!empty($this->colgroups)) {
			foreach ($this->colgroups as $unColgroup) {
				$this->add_enfants($unColgroup);
			}
		}
		$this->add_enfants(array($this->thead, $this->tfoot, $this->tbody));
		if ($printed) {
			return parent::ecrire();
		}
		else {
			return parent::ecrire(FALSE);
		}
	}

}

?>
