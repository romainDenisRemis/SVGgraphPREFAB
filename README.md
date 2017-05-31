# SVGgraphPREFAB
*PHP SVG prefab graph Library*

* **category**    Library
* **author**      Romain DENIS-REMIS <romain@denis-remis.fr>
* **copyright**   2017 Romain DENIS-REMIS
* **license**     http://www.gnu.org/licenses/ GNU-LGPL v3 (see LICENSE.TXT)
* **link**        http://www.denis-remis.fr/svggraphprefab.php
* **source**      https://github.com/romainDenisRemis/SVGgraphPREFAB


## Description

A PHP library for generating prefab SVG graph, **PHP version >= 5.6**.
The goal is to provide a simple way to generate often used graph types, such as a 12-month bar chart with a data table and an line chart for the cumulative version.

## Installation
Copy all project files to a folder named "SVGgraphPREFAB" in your project (e.g. in your *vendor* folder).

Insert these 2 lines in your HTML `<head>` section:
*Adapt the path to your configuration*

```html
<link rel="stylesheet" href="vendor/SVGgraphPREFAB/SVGgraphPREFAB.css">
```

```html
<script type="text/javascript" src="vendor/SVGgraphPREFAB/SVGgraphPREFAB.js"></script>
```

Somewhere in your PHP code:
```php
require_once(__DIR__ . '/vendor/SVGgraphPREFAB/SVGgraphPREFAB.php');
```

## Use

### Setting global parameters:
You can, if you want, set once for all the following options:  
* Localization:   'en', 'fr', 'de', 'es' currently available (Used for some translations and for formatting numbers)
* Used CSS style: 'default', 'bootstrap', 'custom'  (see the *SVGgraphPREFAB.css* file)

**The function *SGP_init_pref()* must be called first, before any object is created.**

```php
// e.g. (1)
SGP_init_pref(array('localization' => 'de', 'css_style' => 'bootstrap'));

// e.g. (2)
SGP_init_pref(array('localization' => 'es')); // means you could set 'css_style' as you want later

// e.g. (3)
SGP_init_pref(array('css_style' => 'custom')); // means you could set 'localization' as you want later
```
You can not change them afterwards !

---
## SGP_gb12m
*A prefab model with a title, a chart and a data table that can be displayed in normal ou cumulative version*

**!! Currently we can not handle more than six data sets !!**
It is planned to move to ten or twelve data sets, but no more because a graph with too many data sets becomes unreadable and therefore not very useful.

### SGP_gb12m Features:
* A 12-month bar chart
* A data table for the 12-month bar chart
* A 12-month line chart for cumulative data
* A data table for the cumulative 12-month line chart
* General display options:
    * Default version (bar chart) or Cumulative version (line chart)
    * Chart and data table
    * Chart only
    * Data table only
    * Legend chart position: top or bottom
* Data table display options:
    * Default data table
        * row average 
        * col average 
    * Cumulative data table
        * col sum 

### SGP_gb12m use:

```php
// for the examples we manualy initialise the data

$cars_sales_this_year_DATA = array(
	  array('Citadines', 452, 224, 652, 587, 388, 570, 155, 35, 367, 690, 544, 783)
	, array('Berlines',  334, 281, 555, 487, 295, 411,  95, 22, 284, 519, 387, 638)
	, array('SUV',       252, 121, 452, 333, 354, 630, 142, 11, 124, 367, 222, 512)
	, array('Sportives', 145, 122,  87, 145, 166, 214,  67, 17,  70,  91, 102, 184)
);

$turnover_last_3years_DATA = array(
	  array('2014', 256335, 324224, 289652, 247587, 200388, 310570, 185155, 61035, 184367, 200690, 283544, 304783)
	, array('2015', 268334, 285281, 240555, 234487, 215295, 334411, 194095, 78622, 160284, 254519, 344387, 360638)
	, array('2016', 284252, 330121, 334402, 354333, 234004, 366630, 200142, 80711, 178124, 270367, 361222, 390512)
);

// In this case we don't use SGP_init_pref() so we can use 'localization' and 'css_style' in the parameters

$cars_sales_this_year_GRAPH = new SGP_gb12m(array('block_title' => 'Ventes par modèles pour 2016', 'data' => $cars_sales_this_year_DATA, 'units' => 'Qté', 'localization' => 'fr'));
$turnover_last_3years_GRAPH = new SGP_gb12m(array('block_title' => 'Turnover for the last 3 Years', 'data' => $turnover_last_3years_DATA, 'units' => '£', 'css_style' => 'bootstrap', 'localization' => 'en'));
```
To initialise a SGP_gb12m, the parameters default values are:
```php
array(
      'block_title' => 'Données mensuelles'
    , 'data' => array()
    , 'units' => '€'              // what you want: '£', 'qty.', '€', 'marbles', 'bananas' ...
    , 'localization' => 'fr'      // 'en' | 'fr' | 'de' | 'es'  /!\ NO EFFECT if SGP_init_pref() used in first
    , 'css_style' => 'default'    // 'bootstrap' | 'default' | 'custom'  /!\ NO EFFECT if SGP_init_pref() used in first
    , 'graph_forced_height' => 0  // If you really want the SVG graph have a forced height (means ratio display is lost !)
)
```


So now we can display (or not, see the first case in the Example below) our graph like we want with the `dessine()` method.

The default values option are:
```php
array(
      'cumul_version' => FALSE
    , 'with_table' => TRUE
    , 'with_graph' => TRUE
    , 'caption_position_top' => TRUE
    , 'table_row_average' => TRUE    // available for no-cumul version
    , 'table_col_average' => TRUE    // available for no-cumul version
    , 'table_cumul_col_sum' => FALSE // available for cumul version
)
```

Example:
```php
/* CASE 1 - display all in normal version */
/*----------------------------------------*/
$paramDessin = array('caption_position_top' => FALSE, 'table_cumul_col_sum' => TRUE);
// SPECIAL CASE: you can return a string instead of display the graph block
// to do this the dessine() method accept a second optionnal parameter: TRUE by default (display), FALSE return string
$tringReturn = $cars_sales_this_year_GRAPH->dessine($paramDessin, FALSE);
echo $tringReturn;

/* CASE 2 - display all in cumulative version */
/*----------------------------------------*/
$paramDessin['cumul_version'] = TRUE;
$cars_sales_this_year_GRAPH->dessine($paramDessin);

/* CASE 3 - display in normal version without the data table */
/*----------------------------------------*/
$paramDessin['cumul_version'] = FALSE;
$paramDessin['with_table'] = FALSE;
$turnover_last_3years_GRAPH->dessine($paramDessin);

/* CASE 4 - display in cumulative version without the data table and the chart caption on top */
/*----------------------------------------*/
$paramDessin['cumul_version'] = TRUE;
$paramDessin['caption_position_top'] = TRUE;
$turnover_last_3years_GRAPH->dessine($paramDessin);

/* CASE 5 - display in normal version with the data table only and with the two average options IN */
/*----------------------------------------*/
$paramDessin['cumul_version'] = FALSE;
$paramDessin['with_table'] = TRUE;
$paramDessin['with_graph'] = FALSE;
$turnover_last_3years_GRAPH->dessine($paramDessin);

/* CASE 6 - display in cumulative version with the data table only and with the Sum options OFF */
/*----------------------------------------*/
$paramDessin['cumul_version'] = TRUE;
$paramDessin['table_cumul_col_sum'] = FALSE;
$turnover_last_3years_GRAPH->dessine($paramDessin);

/* CASE 7 - display in normal version with the data table only and with row average option IN and col average option OFF */
/*----------------------------------------*/
$paramDessin['cumul_version'] = FALSE;
$paramDessin['table_row_average'] = TRUE;
$paramDessin['table_col_average'] = FALSE;
$turnover_last_3years_GRAPH->dessine($paramDessin);

/* CASE 8 - display in normal version with the data table only and with row average option OFF and col average option IN */
/*----------------------------------------*/
$paramDessin['table_row_average'] = FALSE;
$paramDessin['table_col_average'] = TRUE;
$turnover_last_3years_GRAPH->dessine($paramDessin);
```
---
