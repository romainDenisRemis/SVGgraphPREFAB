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
 * Fichier de base de balisePHPlib.
 * 
 * Contenant la définition des classes de base **balise** et **attribut**
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.1.0
 * @package balisePHPlib
 */

namespace balisePHPlib;

/**
 * La classe attribut désigne un attribut d'une balise.
 * 
 * Utilisée par la classe balise par la propriété {@see balise::$liste_attributs} qui est un tableau d'objets **attribut**.
 * @package balisePHPlib
 */
class attribut {

	// xxxxxxxx  ATTRIBUTS  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	/**
	 * Nom de l'attribut
	 * @var string $attribut_nom
	 */
	private $attribut_nom;

	/**
	 * Valeur de l'attribut
	 * @var string $attribut_contenu
	 */
	private $attribut_valeur;

	/**
	 * Indique si on est dans un contexte HTML ou XML.
	 * @var bool $isXML
	 */
	private $isXML = FALSE;

	// xxxxxxxx  CONSTRUCTEUR  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	/**
	 * Constructeur.
	 * @param string $nom
	 * @param string $valeur
	 * @param bool $isXML
	 */
	public function __construct($nom, $valeur, $isXML = FALSE) {
		$this->attribut_nom = strtolower($nom);
		$this->attribut_valeur = $valeur;
		$this->isXML = (bool) $isXML;
	}

	// xxxxxxxx  METHODES  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	/**
	 * Affiche (ou retourne) le nom et la valeur de l'attribut formatés correctement.
	 * @param bool $printed Par defaut: TRUE , si FALSE retourne un string
	 * @return bool|string  suivant la valeur de $printed
	 */
	public function ecrire($printed = TRUE) {
		$printed = (bool) $printed;
		$returnVal = '';
		if ($this->isXML) {
			$returnVal = ' ' . $this->attribut_nom . '="' . htmlspecialchars($this->attribut_valeur, ENT_QUOTES | ENT_XML1) . '"';
		}
		else {
			$returnVal = ' ' . $this->attribut_nom . '="' . htmlspecialchars($this->attribut_valeur, ENT_COMPAT | ENT_HTML5) . '"';
		}
		if ($printed) {
			echo $returnVal;
			return TRUE;
		}
		else {
			return $returnVal;
		}
	}

	/**
	 * Lire la valeur de l'attribut
	 * @return string
	 */
	public function get_attr_val() {
		return $this->attribut_valeur;
	}

	/**
	 * Ecrire la valeur de l'attribut
	 * @param string $valeur
	 * @return void
	 */
	public function set_attr_val($valeur) {
		if (is_string($valeur)) {
			$this->attribut_valeur = $valeur;
		}
		else {
			trigger_error('tentative d\'attribuer une valeur à un attribut qui n\'est pas une valeur de type string.', E_USER_NOTICE);
		}
	}

}

/**
 * La classe balise est la classe de base pour une balise HTML5 ou XML (HTML5 par défaut).
 * 
 * C'est la classe mère de toutes les autres balises
 * @package balisePHPlib
 */
class balise {

	// xxxxxxxx  ATTRIBUTS  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	/**
	 * le nom de la balise.
	 * exp: *fieldset*
	 * @var string $balise_nom
	 */
	protected $balise_nom;

	/**
	 * Indique si la balise a une balise de fermeture.
	 * 
	 * exp: **TRUE** pour `<p></p>`
	 * **FALSE** pour `<br>`
	 * 
	 * @var bool $baliseFermeture
	 */
	protected $baliseFermeture;

	/**
	 * Liste des attributs de la balise indexée avec le nom des attributs
	 * @var attribut[] $liste_attributs
	 */
	protected $liste_attributs = array();

	/**
	 * Listes des "enfants" de la balise.
	 * 
	 * C'est un tableau contenant des sous-tableaux dont le premier élément est un booléen indiquant la nature de l'enfant.
	 * * Si le premier élément vaux TRUE alors cela indique que le second élément est un objet de la classe **balise** ou d'une classe fille.
	 * * Si le premier élément vaux FALSE alors cela indique que le second élément est du texte.
	 * 
	 * @var array[] $liste_enfants
	 */
	public $liste_enfants = array();

	/**
	 * Indique si on est dans un contexte HTML ou XML.
	 * @var bool $isXML
	 */
	protected $isXML = FALSE;

	// xxxxxxxx  CONSTRUCTEUR  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	/**
	 * Constructeur.
	 * @param string $nom
	 * @param bool $fermee TRUE par défaut
	 * @param mixed $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 * @param bool $isXML FALSE par défaut
	 */
	public function __construct($nom, $fermee = TRUE, $contenu = NULL, $attributs = NULL, $isXML = FALSE) {
		if (is_string($nom)) {
			$this->balise_nom = strtolower($nom);
			if ($fermee) {
				$this->baliseFermeture = TRUE;
				if (!is_null($contenu)) {
					$this->add_enfants($contenu);
				}
			}
			else {
				$this->baliseFermeture = FALSE;
			}
			if (!is_null($attributs) && is_array($attributs)) {
				$this->add_attributs($attributs);
			}
			$this->isXML = (bool) $isXML;
		}
	}

	// xxxxxxxx  METHODES  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	/**
	 * Ajouter un attribut à la balise.
	 * 
	 * Si l'attribut existe déjà dans la liste des attributs de cette balise, alors la valeur sera écrasée.
	 * @param string $nom
	 * @param string|int|float $valeur
	 */
	public function add_attribut($nom, $valeur) {
		if (is_string($nom) && (is_string($valeur) || is_numeric($valeur))) {
			$valeur = strval($valeur); // Au cas ou la valeur est numérique
			// Ajoute un objet de type attribut à la liste des attributs en l'indexant avec le nom de l'attribut
			// et en même temps en indiquant le contexte: HTML ou XML
			$this->liste_attributs[$nom] = new attribut($nom, $valeur, $this->isXML);
		}
		else {
			trigger_error('Tentative d\'ajouter un attribut incorrect à une balise', E_USER_NOTICE);
		}
	}

	/**
	 * Ajouter plusieurs attributs à la balise.
	 * 
	 * Sous la forme d'un tableau indexé par les noms des attributs
	 * exp: `array('id'=>'input_name', 'type'=>'text', 'placeholder'=>'Your name')`
	 * 
	 * @param array $tab_att
	 */
	public function add_attributs(array $tab_att) {
		foreach ($tab_att as $key => $value) {
			$this->add_attribut($key, $value);
		}
	}

	/**
	 * Ajouter un enfant à la balise.
	 * 
	 * Soit un objet de la classe (ou classe fille de) **balise**.
	 * Soit une valeur de type string ou numérique.
	 * 
	 * @param object|string|int|float $enfant
	 */
	protected function add_enfant($enfant) {
		if ($this->baliseFermeture) {
			if (!is_null($enfant)) {
				if (is_object($enfant) && ($enfant instanceof balise)) {
					$this->liste_enfants[] = array(TRUE, $enfant);
				}
				elseif (is_string($enfant) || is_numeric($enfant)) {
					if ($this->isXML) {
						$this->liste_enfants[] = array(FALSE, htmlspecialchars($enfant, ENT_QUOTES | ENT_XML1));
					}
					else {
						$this->liste_enfants[] = array(FALSE, htmlspecialchars($enfant, ENT_QUOTES | ENT_HTML5));
					}
				}
				else {
					trigger_error('Tentative d\'ajouter un enfant de type incorrect à une balise  ', E_USER_NOTICE);
				}
			}
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise sans fermeture (type br, hr ...) ', E_USER_NOTICE);
		}
	}

	/**
	 * Ajouter un(des) enfant(s) à la balise.
	 * 
	 * @param mixed $contenu
	 */
	public function add_enfants($contenu) {
		if ($this->baliseFermeture) {
			if (is_array($contenu)) {
				foreach ($contenu as $value) {
					$this->add_enfant($value);
				}
			}
			else {
				$this->add_enfant($contenu);
			}
		}
		else {
			trigger_error('Tentative d\'ajouter un enfant à une balise sans fermeture (type br, hr ...) ', E_USER_NOTICE);
		}
	}

	/**
	 * Vide les liste des enfants (balises filles ou texte) contenus dans cette balise.
	 */
	public function del_enfants() {
		$this->liste_enfants = array();
	}

	/**
	 * Ajouter une classe CSS à l'attribut **class** de la balise.
	 * 
	 * Si l'attribut **class** existe déjà alors la classe CSS passée en argument est ajoutée à la valeur existante, sauf si cette classe CSS est déjà présente.
	 * Sinon, l'attribut **class** est créé avec comme valeur la classe CSS passée en argument.
	 * @param string $class
	 */
	public function add_class($class) {
		if (is_string($class)) {
			if (isset($this->liste_attributs['class'])) {
				$texteclass = $this->liste_attributs['class']->get_attr_val();
				if (strpos($texteclass, $class) === FALSE) {
					$texteclass .= ' ' . $class;
					$this->liste_attributs['class']->set_attr_val($texteclass);
				}
			}
			else {
				$this->add_attribut('class', $class);
			}
		}
	}

	/**
	 * Affiche (ou retourne) la balise complète (ses attributs et ses enfants)
	 * @param bool $printed Par defaut: TRUE , si FALSE retourne un string
	 * @return bool|string  suivant la valeur de $printed
	 */
	public function ecrire($printed = TRUE) {
		$printed = (bool) $printed;
		if ($printed) {
			echo '<' . $this->balise_nom;
			foreach ($this->liste_attributs as $value) {
				$value->ecrire();
			}
			if ($this->baliseFermeture) {
				echo '>';
				foreach ($this->liste_enfants as $value) {
					if ($value[0]) {
						$value[1]->ecrire();
					}
					else {
						echo $value[1];
					}
				}
				echo '</' . $this->balise_nom . ">\n";
			}
			else {
				if ($this->isXML) {
					echo " />\n";
				}
				else {
					echo ">\n";
				}
			}
			return TRUE;
		}
		else {
			$returnVal = '';
			$returnVal .= '<' . $this->balise_nom;
			foreach ($this->liste_attributs as $value) {
				$returnVal .= $value->ecrire(FALSE);
			}
			if ($this->baliseFermeture) {
				$returnVal .= '>';
				foreach ($this->liste_enfants as $value) {
					if ($value[0]) {
						$returnVal .= $value[1]->ecrire(FALSE);
					}
					else {
						$returnVal .= $value[1];
					}
				}
				$returnVal .= '</' . $this->balise_nom . ">\n";
			}
			else {
				if ($this->isXML) {
					$returnVal .= " />\n";
				}
				else {
					$returnVal .= ">\n";
				}
			}
			return $returnVal;
		}
	}

}

/**
 * La classe balise_x est la classe de base pour une balise xml.
 * 
 * Identique à la classe balise, mais avec le paramètre $isXML automatiquement mis à TRUE.
 * @package balisePHPlib
 */
class balise_x extends balise {

	/**
	 * Constructeur.
	 * 
	 * @param string $nom
	 * @param bool $fermee TRUE par défaut
	 * @param array $contenu NULL par défaut
	 * @param array $attributs NULL par défaut
	 */
	public function __construct($nom, $fermee = TRUE, $contenu = NULL, $attributs = NULL) {
		parent::__construct($nom, $fermee, $contenu, $attributs, TRUE);
	}

}

?>