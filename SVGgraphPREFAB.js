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
 * @version 0.1.0
 */


/**
 * Rend visible l'étiquette affichant la valeur d'une barre du graphique d'un graphique SGP_gb12m.
 * Positionne, change la valeur du texte et rend visible l'étiquette.
 * @param {number} tx - Position de l'abscisse du texte.
 * @param {number} ty - Position de l'ordonnée du texte.
 * @param {string} mouseOverText - Texte affiché.
 * @param {string} couleur - Couleur du texte affiché.
 * @param {number} tbx - Position de l'abscisse du cadre derrière le texte.
 * @param {number} tby - Position de l'ordonnée du cadre derrière le texte.
 * @param {string} finId - Suffix du ID.
 */
function SGP_gb12m_showTooltip(tx, ty, mouseOverText, couleur, tbx, tby, finId) {
	var sgp_gp12m_tooltip_text = document.getElementById("tooltip" + finId);
	sgp_gp12m_tooltip_text.setAttribute("x", tx);
	sgp_gp12m_tooltip_text.setAttribute("y", ty);
	sgp_gp12m_tooltip_text.setAttribute("fill", couleur);
	sgp_gp12m_tooltip_text.textContent = mouseOverText;
	sgp_gp12m_tooltip_text.setAttribute("visibility", "visible");
	
	var sgp_gp12m_tooltip_box = document.getElementById("tooltipbox" + finId);
	sgp_gp12m_tooltip_box.setAttribute("x", tbx);
	sgp_gp12m_tooltip_box.setAttribute("y", tby);
	sgp_gp12m_tooltip_box.setAttribute("visibility", "visible");
	
//	jQuery version.
//	$("#tooltip" + finId).attr({x: tx, y: ty, fill: couleur, visibility: "visible"}).text(mouseOverText);
//	$("#tooltipbox" + finId).attr({x: tbx, y: tby, visibility: "visible"});
}

/**
 * Rend invisible l'étiquette affichant la valeur d'une barre du graphique SGP_gb12m.
 * @param {string} finId - Suffix du ID.
 */
function SGP_gb12m_HideTooltip(finId) {
	var sgp_gp12m_tooltip_text = document.getElementById("tooltip" + finId);
	sgp_gp12m_tooltip_text.setAttribute("visibility", "hidden");
	var sgp_gp12m_tooltip_box = document.getElementById("tooltipbox" + finId);
	sgp_gp12m_tooltip_box.setAttribute("visibility", "hidden");
	
//	jQuery version.
//	$("#tooltip" + finId).attr({visibility: "hidden"});
//	$("#tooltipbox" + finId).attr({visibility: "hidden"});
}
