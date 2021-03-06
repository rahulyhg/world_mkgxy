<?php require_once('../../../Connections/connMain.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO sexoffender (country, `state`, city, name, crime, address, zipcode, gender, dob, eyecolor, haircolor, height, weight, ethnicity, lat, lon, `raw`, marks) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['crime'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['zipcode'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['dob'], "text"),
                       GetSQLValueString($_POST['eyecolor'], "text"),
                       GetSQLValueString($_POST['haircolor'], "text"),
                       GetSQLValueString($_POST['height'], "text"),
                       GetSQLValueString($_POST['weight'], "text"),
                       GetSQLValueString($_POST['ethnicity'], "text"),
                       GetSQLValueString($_POST['lat'], "double"),
                       GetSQLValueString($_POST['lon'], "double"),
                       GetSQLValueString($_POST['raw'], "text"),
                       GetSQLValueString($_POST['marks'], "text"));

  mysql_select_db($database_connMain, $connMain);
  $Result1 = mysql_query($insertSQL, $connMain) or die(mysql_error());
}

function pr($d) { echo '<pre>'; print_r($d); echo '</pre>'; }

if (!function_exists('regexp')) {
	function regexp($input, $regexp, $casesensitive=false)
	{
		if ($casesensitive === true) {
			if (preg_match_all("/$regexp/sU", $input, $matches, PREG_SET_ORDER)) {
				return $matches;
			}
		} else {
			if (preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
				return $matches;
			}
		}

		return false;
	}
}


$data['name'] = array("Alvin Nunes<br/><small> (<b>Aliases:</b> Nunes, Alvin E; Nunes, Alvin Edward; Nunex, Alvin; Nunez, Alvin Edward)</small>","Andrew Trejo Baca<br/><small> (<b>Aliases:</b> Baca, Andrew; Bacatrejo, Andrew)</small>","Anna Marie Cardoza<br/><small> (<b>Aliases:</b> Cardoza, Anna; Robbins, Anna Marie; Robbins, Anna)</small>","Anthony Joseph Marinelli<br/><small> (<b>Aliases:</b> Marinelli, Tony)</small>","Babak Monshizadez Kamkar<br/><small> (<b>Aliases:</b> Kamkar, Babak M; Kamkar, Babak Monshizadah)</small>","Bawa Singh<br/><small> (<b>Aliases:</b> Singh, Bawa Atkar; Atkar, Bawa Singh; Atkar, Bawa)</small>","Ben Vardaman Williams<br/><small> (<b>Aliases:</b> Williams, Ben V)</small>","Billy Ray Hardin<br/><small> (<b>Aliases:</b> Hardin, William Ray; Hardin, Billy; Hardin, Billyray)</small>","Brian Martinez<br/><small> (<b>Aliases:</b> Martinez, Brian A; Martinez, Brian Anthony)</small>","Calvin Lee Kelly<br/><small> (<b>Aliases:</b> Calvin, Kelly; Kelley, Calvin Lee; Kelley, Calvin; Kelly, Calvin L; Kelly, Calvin)</small>","Calvin Sylver<br/><small> (<b>Aliases:</b> Sylver, Calvin Newyork; Sylver, Calvin Rudolph)</small>","Carlos Enriques Villatoro","Carol Elizabeth Johnson<br/><small> (<b>Aliases:</b> Bilodean, Carol Elizabeth; Bilodeau, Carol Elizabeth)</small>","Charles Hardrick<br/><small> (<b>Aliases:</b> Hardrict, Charles Adam)</small>","Charles Lane Aaron<br/><small> (<b>Aliases:</b> Aaron, Charles; Lane, Aaron Charles; Lane, Aaron)</small>","Charles Joseph Barron<br/><small> (<b>Aliases:</b> Barron, Charles J; Barron, Charles)</small>","Cheuk Bor Li<br/><small> (<b>Aliases:</b> Li, Cheuk B)</small>","Christopher Thomas Wilhite<br/><small> (<b>Aliases:</b> Wilhite, Christopher T)</small>","Christopher George Walton<br/><small> (<b>Aliases:</b> Walton, Christopher G; Walton, Chris George; Walton, Chris)</small>","Cottrell Robie Delane<br/><small> (<b>Aliases:</b> Delane, Catrell; Delane, Cottrell Sc; Delane, Cottrell; Peterson, Charles)</small>","Creed Anthony Black<br/><small> (<b>Aliases:</b> Black, Creed A)</small>","Daniel James Nickell<br/><small> (<b>Aliases:</b> Nickell, Daniel; Nickell, Daniel J)</small>","Darrell James Morse<br/><small> (<b>Aliases:</b> Morse, Darrell)</small>","David C Spencer<br/><small> (<b>Aliases:</b> Spencer, David)</small>","David D Bechtold<br/><small> (<b>Aliases:</b> Bechtold, David Domenic)</small>","Dennis Weiglein<br/><small> (<b>Aliases:</b> Weiglein, Dennis B; Weiglein, Dennis Bert; Weiglein, Dennis Burt)</small>","Donald Michael Wilber<br/><small> (<b>Aliases:</b> Wilber, Donald M)</small>","Douglas Gerald Tavis<br/><small> (<b>Aliases:</b> Tauis, Douglas Gerald; Tavis, Douglas G; Tavis, Douglas G)</small>","Ehsan Arashfar","Eric Francis Larson<br/><small> (<b>Aliases:</b> Larson, Eric)</small>","Eric Anthony Empert<br/><small> (<b>Aliases:</b> Empert, Erick Anthony; Empert, Erik Anthony)</small>","Eric Lee Ruenz<br/><small> (<b>Aliases:</b> Ruenz, Eric L)</small>","Eric Randolph Avilla","Erick Munoz<br/><small> (<b>Aliases:</b> Munoz, Erick Filberto; Munoz, Erick Filberto)</small>","Eugenio Peres<br/><small> (<b>Aliases:</b> Peres, Euguenio; Peres, Gene)</small>","Farrokh Frank Ghoddoucy<br/><small> (<b>Aliases:</b> Ghoddoucy, Farrokh F)</small>","Fasi Nico Nazar<br/><small> (<b>Aliases:</b> Nazar, Fasi N; Nazar, Nico)</small>","Fawad M Roshaan<br/><small> (<b>Aliases:</b> Roshaan, Fawad Mustapha; Roshaan, Fawad)</small>","Fernando Blas Valdes","Fred Consepcion Hernandez<br/><small> (<b>Aliases:</b> Hernandez, Fernando Consepcion; Hernandez, Fred)</small>","Fredrick Lawrence Hodsoll<br/><small> (<b>Aliases:</b> Hodsoll, Fredrick; Hodsol, Frederick; Hodsoll, Frederick Lawrence)</small>","Gary Leroy Freeman","Gary James Ganaden","George Villa<br/><small> (<b>Aliases:</b> Villa, George Junior)</small>","George Andrew Sam<br/><small> (<b>Aliases:</b> Sam, George)</small>","Glenn Robert Wiegand<br/><small> (<b>Aliases:</b> Wiegand, Gelnn Robert)</small>","Gonzalo Gamboa Gonzales<br/><small> (<b>Aliases:</b> Gonzales, Gonzalo G; Gonzales, Gonzalo)</small>","Harry Lewis Negron<br/><small> (<b>Aliases:</b> Blackfoot, Michael Lewis; Hernandez, Michael Lewis; Negron, Harry)</small>","Harry Laiming Luke<br/><small> (<b>Aliases:</b> Luke, Harry; Luke, Harry Lai Ming)</small>","Hong Ta<br/><small> (<b>Aliases:</b> Ta, Hong V; Ta, Hong Vi)</small>","Jacob Cornejo<br/><small> (<b>Aliases:</b> Cornejo, Jacob James; Cornejo, Jacobo James; Cornejo, Jacobo)</small>","Javier Ramirez<br/><small> (<b>Aliases:</b> Ramirez, Javier Villalobos)</small>","Jeff Alan Benard<br/><small> (<b>Aliases:</b> Benard, Jeff Allan)</small>","Jeffrey Louis Wells","Jerry Arthur Johnson","John Archangle Caro<br/><small> (<b>Aliases:</b> Caro, John Archangel; Caro, John Archangel)</small>","John Pacheco","John Wayne Martin<br/><small> (<b>Aliases:</b> Martin, John W)</small>","John Manuel Picazo<br/><small> (<b>Aliases:</b> Picazo, John M)</small>","John Hernandez<br/><small> (<b>Aliases:</b> Hernandez, John Michael)</small>","Jonathan Ryan Prasad","Jose Luis Araujo<br/><small> (<b>Aliases:</b> Araijoibarra, Jose Luis; Araujo, Jose; Araujo-ibarra, Jose Luis; Araujoibarra, Jose Luis; Arujo, Jose Luis)</small>","Joseph Kangwon Choi","Joseph Richard Appling<br/><small> (<b>Aliases:</b> Appling, Joseph)</small>","Justin Dwaine Carruth<br/><small> (<b>Aliases:</b> Carruth, Justin D)</small>","Keith Hollister<br/><small> (<b>Aliases:</b> Hollister, Keith Eugene)</small>","Kenneth E Bake<br/><small> (<b>Aliases:</b> Bake, Kenneth Eural; Bake, Kenneth Eural)</small>","Kevin Robert Greene","Kirk Hartley Lesser","Kristina Anna Baeta<br/><small> (<b>Aliases:</b> Baeta, Kristina A)</small>","Lamont Elliott Payton<br/><small> (<b>Aliases:</b> Payton, Lamont E; Payton, Lamont Elliot)</small>","Lance R Albert<br/><small> (<b>Aliases:</b> Albert, Lance Rodney; Albert, Lance; Albert, Lanced Rodney)</small>","Mark Kevin Luttrell","Mark Jimenez Acosta","Martin Flores Guerra<br/><small> (<b>Aliases:</b> Guerra, Alan; Guerra, Martin)</small>","Martin Corey Dill<br/><small> (<b>Aliases:</b> Dill, Martin C; Dill, Martin)</small>","Marvin Charles Jimerson<br/><small> (<b>Aliases:</b> Jimerson, Marvin C)</small>","Michael Luis Edwards","Michael John Knight<br/><small> (<b>Aliases:</b> Knight, Michael)</small>","Mikehiep Thanh Tra<br/><small> (<b>Aliases:</b> Tra, Hiep Thanh; Tra, Mike-hiep Thanh; Tra, Mikehiep)</small>","Mitchell Lewis Carter<br/><small> (<b>Aliases:</b> Carter, Mitch L; Carter, Mitch)</small>","Nick B Kooy<br/><small> (<b>Aliases:</b> Kooy, Nick Brian)</small>","Pamela Michelle Kreiger<br/><small> (<b>Aliases:</b> Kreiger, Pamela M; Krieger, Pam Michelle; Krieger, Pam; Krieger, Pamela M; Krieger, Pamela Michelle; Krieger, Pamela)</small>","Patrick Joseph Crabb","Paul Martin Krueger<br/><small> (<b>Aliases:</b> Krueger, Paul M; Krueger, Paul)</small>","Raymond Anthony Martinez","Reginald Bernard Barrow<br/><small> (<b>Aliases:</b> Barrow, Reginald; Robertson, Robert; Barrow, Reginaldb; Borrow, Reginald; Barrow, Riginold Bernard; Barrow, Reginald B)</small>","Richard Raymond Craig<br/><small> (<b>Aliases:</b> Craig, Richard R; Craig, Richard)</small>","Robert Velez<br/><small> (<b>Aliases:</b> Valez, Robert)</small>","Robert Mathies","Roger Vandepolder Boots<br/><small> (<b>Aliases:</b> Boots, Roger V)</small>","Ronald James Simpson<br/><small> (<b>Aliases:</b> Simpson, Ronald J; Simpson, Ronald)</small>","Ronald Leroy Mauck<br/><small> (<b>Aliases:</b> Mauck, Ronald L; Mauck, Ronald)</small>","Ronnie Stringer<br/><small> (<b>Aliases:</b> Nassirruddin, Abdullah Muhammad)</small>","Roy Edward Jones<br/><small> (<b>Aliases:</b> Jones, Ray Edward; Jones, Roy)</small>","Samuela Leleva Fanua<br/><small> (<b>Aliases:</b> Famua, Samuela Leleva)</small>","Sergio Garcia Silva<br/><small> (<b>Aliases:</b> Silva, Sergio)</small>","Stephen Earl Elijah","Stephen George Marghiem","Steve Wayne Lamar<br/><small> (<b>Aliases:</b> Lamar, Stevie)</small>","Terry Lee Russell<br/><small> (<b>Aliases:</b> Russell, Terry L; Russell, Terry)</small>","Terry Leonard Sparks","Timothy Vaughn Miller","Vernon Weber","William Angus Davis<br/><small> (<b>Aliases:</b> Davis, Bill; Davis, William A; Davis, William)</small>","William Franklin Apple<br/><small> (<b>Aliases:</b> Apple, William; Apple Jr, Billie Franklin; Apple Jr, William Franklin; Apple, Billy)</small>","Brian Arthur Cote<br/><small> (<b>Aliases:</b> Cote, Brian Authur)</small>","Michael Eldon Watson");

$data['address'] = array("42829 Isle Royal St","3889 Decoto Rd","42257 Forsythia Dr","42483 Greenbrier Park Dr","","","34456 Colville Pl","","4231 Pecos St","","35101 Ramblewood Ct","","4141 Deep Creek Apt # 85","37343 Sequoia Rd","4401 Central Ave Apt # 3","40782 Capa Dr","","","3457 High Co","4299 Bay St Apt # 104","41962 Mckay St","681 Plomosa Ct","3518 Pepperwood Terrace Apt # 113","4101 Mowry Ave Apt # 240","","35420 Eden Ct","2057 Olive Ave","40184 Marietta Dr","6 Gazania Ter","39550 Benavente Ave","32495 Lake Barlee La","3568 Independence Rd","","","42260 Troyer Ave","4261 Stevenson Blvd Apt # 102","5268 Mathew Terrace","","","3234 Red Cedar Ter","42949 Homewood St","","","42744 Roberts Ave","","","41866 Higgins Way","4303 Stevenson Blvd","327 Riverside Ave Apt # A","","3611 Jamestown Rd","","39428 Wilford St","74 Santos Ct","616 Starlite Way","4373 Doane St","40071 Leslie St","5692 Antone Rd","4573 Margery Dr","","","3562 Peralta Blvd","37901 Camden Streeet","15 Calle Amigo Dr","41616 Carmen St","","38891 Fremont Blvd Apt # 10","5223 Lawler Ave","4135 Cushing Pkwy Apt # 343","40801 Sundale Dr","40892 Inglewood Common","","4141 Deep Creek Road Apt # 198","41543 Patton Terrace","42822 Robert Ave","41164 Ellen Ct","","3047 Mountain Dr","35256 Aquado Ct","","","2334 Bishop Ave","40452 Dolerita Ave","405 Rancho Arroyo Pkwy Apt # 310","37474 Stonewood Dr","","","39663 Leslie St Apt # 389","35104 Lancero St","38627 Cherry La Apt # 57","4667 Hampshire Way","3641 Pintail Terr","42561 Saratoga Park St","","","36035 Blair Pl","","225 Merrill Ave","48400 Ursa Dr","3806 Burton Cmn","4412 Millard Ave","3454 Bridgewood Tr Apt # 212","3695 Stevenson Blvd Apt # 201","36231 San Pedro Dr","34359 Enea Terrace","","43643  Mission Blvd Unit 117","43249  Gallegos Ave");

$data['lat'] = array(37.515895,-1,37.538278,37.519916,-1,-1,37.571615,-1,37.570365,-1,37.573907,-1,37.578239,37.5477251,37.5511916,-1,-1,-1,37.5365774,37.5335499,37.534768,37.472017,37.5614909,37.5477251,-1,37.5698313,37.534963,37.523103,37.567839,37.562379,-1,37.516702,-1,-1,37.533871,37.53852,37.563294,-1,-1,37.561982,37.51902,-1,-1,37.521689,-1,-1,37.538305,37.537553,37.573726,-1,37.516481,-1,37.538093,37.5672691,37.477288,37.513656,37.543241,37.5148889,37.533026,-1,-1,37.559381,37.5600249,37.563008,37.535899,-1,37.4671848,-1,37.4916234,37.5243775,37.5369654,-1,-1,37.358484,-1,37.529961,-1,-1,37.567259,-1,-1,37.563585,37.5558142,37.578139,37.548105,-1,-1,37.5450758,37.56669,-1,37.5283392,37.58139,37.518652,-1,-1,37.460043,-1,37.480772,37.473241,37.554471,37.533228,37.5626729,37.024225,37.553436,37.575057,-1,37.5270177,39.175316);

$data['lon'] = array(-121.97011,-1,-121.935459,-121.971969,-1,-1,-122.043333,-1,-122.038785,-1,-122.029157,-1,-122.052977,-121.9892192,-122.0083068,-1,-1,-1,-121.9578386,-121.9647061,-121.946052,-121.911009,-122.005097,-121.9892192,-1,-122.0261055,-121.940451,-121.984613,-121.963977,-121.954007,-1,-121.949052,-1,-1,-121.94103,-121.97515,-122.060184,-1,-1,-122.003385,-121.957603,-1,-1,-121.954547,-1,-1,-121.940366,-121.977183,-121.977309,-1,-121.948809,-1,-121.988119,-121.9624043,-121.913925,-121.958766,-121.969649,-121.972894,-121.978287,-1,-1,-122.002242,-121.9965515,-121.958858,-121.948782,-1,-122.2267812,-1,-121.9503371,-121.973331,-121.9568378,-1,-1,-121.865266,-1,-121.968628,-1,-1,-122.031686,-1,-1,-121.990947,-121.9463175,-121.995231,-122.012681,-1,-1,-121.9761853,-122.0338,-1,-121.9725339,-122.046657,-121.969879,-1,-1,-121.905149,-1,-121.9217,-121.913478,-121.997795,-121.972057,-122.005485,-121.64158,-122.027346,-122.043181,-1,-121.9184224,-119.76997);

$contents = file_get_contents('fremont-ca-div.html');
//$regexp = '<div class=\'[odd|even].*\'>.*<ul>(.*)<\/ul>.*<\/a><br\/>(.*)<br><a.*<\/div>';
$regexp = '<div class=\'[odd|even].*\'>(.*)<\/div>';
$matches = regexp($contents, $regexp);
if (!empty($matches)) {
	foreach ($matches as $k => $v) {
		$data['raw'][] = $v[0];
		$regexp2 = '<ul>(.*)<\/ul>';
		$matches2 = regexp($v[0], $regexp2);
		$data['crime'][] = $matches2[0][1];
		$regexp2 = '<b>Zip Code: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['zipcode'][] = $matches2[0][1];
		$regexp2 = '<b>Sex: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['gender'][] = $matches2[0][1];
		$regexp2 = '<b>Date of birth: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['dob'][] = $matches2[0][1];
		$regexp2 = '<b>Eye color: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['eyecolor'][] = $matches2[0][1];
		$regexp2 = '<b>Hair color: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['haircolor'][] = $matches2[0][1];
		$regexp2 = '<b>Height: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['height'][] = $matches2[0][1];
		$regexp2 = '<b>Weight: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['weight'][] = $matches2[0][1];
		$regexp2 = '<b>Marks\/Scars\/Tattoos: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$data['marks'][] = $matches2[0][1];
		$regexp2 = '<b>Ethnicity: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$e = $matches2[0][1];
		$regexp2 = '<b>Race: <\/b>(.*)<br>';
		$matches2 = regexp($v[0], $regexp2);
		$r = $matches2[0][1];
		$data['ethnicity'][] = !empty($e) ? $e : $r;
		$data['city'][] = 'Fremont';
		$data['state'][] = 'California';
		$data['country'][] = 'US';
	}
}
$newData = array();
foreach ($data as $k => $v) {
	foreach ($v as $k1 => $v2) {
		$newData[$k1][$k] = $v2;
	}
}

$sql = '';
if (!empty($newData)) {
	foreach ($newData as $k => $v) {
		$sql .= 'Insert into sexoffender SET ';
		foreach ($v as $k1 => $v1) {
			$sql .= "$k1 = ".GetSQLValueString($v1, "text").", ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= ";\n\n";
	}
}
echo $sql;
?>
