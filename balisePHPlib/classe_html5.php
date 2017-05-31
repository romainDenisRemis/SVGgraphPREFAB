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
 * @version 0.1.0
 * @package balisePHPlib\html5
 */

namespace balisePHPlib;

require_once(__DIR__ . '/classe_balise.php');

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
	protected function add_enfant($enfant) {
		if (is_object($enfant) && ($enfant instanceof bls_td || $enfant instanceof bls_th)) {
			$this->liste_enfants[] = array(TRUE, $enfant);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise tr qui n\'est pas une balise td ou th ', E_USER_NOTICE);
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
	protected function add_enfant($enfant) {
		if (is_object($enfant) && ($enfant instanceof bls_tr)) {
			$this->liste_enfants[] = array(TRUE, $enfant);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise thead qui n\'est pas une balise tr ', E_USER_NOTICE);
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
	protected function add_enfant($enfant) {
		if (is_object($enfant) && ($enfant instanceof bls_tr)) {
			$this->liste_enfants[] = array(TRUE, $enfant);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise tfoot qui n\'est pas une balise tr ', E_USER_NOTICE);
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
	protected function add_enfant($enfant) {
		if (is_object($enfant) && ($enfant instanceof bls_tr)) {
			$this->liste_enfants[] = array(TRUE, $enfant);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise tbody qui n\'est pas une balise tr ', E_USER_NOTICE);
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
	public function add_enfant($enfant) {
		if (is_object($enfant) && ($enfant instanceof bls_col)) {
			$this->liste_enfants[] = array(TRUE, $enfant);
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise colgroup qui n\'est pas une balise col ', E_USER_NOTICE);
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
