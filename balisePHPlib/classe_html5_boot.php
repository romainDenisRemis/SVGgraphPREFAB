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
 * Fichier des définitions des classes pour les balises HTML de balisePHPlib à la sauce Bootstrap.
 * 
 * @author Romain DENIS-REMIS <romain at denis-remis.fr>
 * @copyright (c) 2017, Romain DENIS-REMIS
 * @license http://www.gnu.org/licenses/ GNU Lesser General Public License 3
 * @version 0.2.0
 * @package balisePHPlib\html5
 */

namespace balisePHPlib;

require_once(__DIR__ . '/classe_html5.php');


class blsboot_inputSubmit extends bls_inputSubmit {
	public function __construct($value = "Valider", $name = 'inputSub', $attributs = NULL) {
		parent::__construct($value, $name, $attributs);
		$this->add_class('btn btn-primary btn-lg');
	}
}
?>
