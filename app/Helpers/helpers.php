<?php

use Carbon\Carbon as Carbon_;

if (!function_exists('filter_data')) {
    function filter_data($filter, $key = null, $value = null) {
        if (!empty($key)) {
            $filter[$key] = $value;
        }

        return $filter;
    }
}

/**
 * Create tabs as - for subcategories
 */
if(!function_exists('sub_category_depth_tab')) {
    function sub_category_depth_tab($tab) {
        if($tab == 0) return '';
        return str_repeat('-', $tab * 4) . ' ';
    }
}

if(!function_exists('price_format')) {
    function price_format($price) {
        return number_format($price) . ' VNĐ';
    }
}

function getToken()
{
    $today = date("dmYHis");
    return $today;
}

function getRandomNumber()
{
    $today = date("dmyHis");
    return $today;
}

function getTokenDateTime()
{
    $today = time();
    return $today;
}

/**
 * addToLog
 *
 * @author  linh
 * @param   string $somecontent
 * @access  public
 * @date    Jul 19, 2006 3:10:43 PM
 */
function addToLog($somecontent) {
    global $paths;
    $is_debug = true;
    if ($is_debug){
        $filename = 'log.txt';
        $somecontent = $somecontent."\n";
        $handle = fopen($filename, 'a');
        fwrite($handle, $somecontent);
        fclose($handle);
    }
}

function addToLogs($arraycontent) {
    $str = "";
    foreach ($arraycontent as $key => $row) {
        $str = $str . $key . "=>" . $row . ", ";
    }
    addToLog($str);
}

function addToLog2s($arraycontent) {
    foreach ($arraycontent as $key => $itemarray) {
        $str = "";
        //$itemarray = $arraycontent[$key];
        foreach ($itemarray as $key => $row) {
            $str = $str . $key . "=>" . $row . ", ";
        }
        addToLog($str);
    }
}

/**
 * writeLog
 *
 * @author  linh
 * @param   string $somecontent
 * @access  public
 * @date    Jul 19, 2006 3:10:43 PM
 */
function writeLog($fn, $somecontent) {
    $filename = $fn;
    $somecontent = $somecontent."\n";
    $handle = fopen($filename, 'a');
    fwrite($handle, $somecontent);
    fclose($handle);
}

/*
* remove a file
*/
function removeLog($file)
{
    if(!@unlink($file)){
        return false;
    }

    return true;
}

function quote_smart($value){

   return $value;
}

/**
 * formatNumber
 *
 * @author  linh
 * @param   string $value
 * @param   int $type 0:no format, 1:format theo num_decimal_places
 * @param   int $num_decimal_places
 * @return  $sb
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function formatNumber($value, $type=0, $num_decimal_places=2, $show_zero=1, $dec_point=".", $thousands_sep=","){
    $sb = "";

    if ($value == 0 and $show_zero == 0){
        return "";
    } else {
        if ($type == 0){
            $sb = $value;
        }else if ($type == 1 and $value != 0){
            $sb = number_format($value, $num_decimal_places, $dec_point, $thousands_sep);
        }else if ($type == 1 and $value == 0){
            $sb = $value;
        }
    }

    return $sb;
}

/**
 * formatNumber
 *
 * @author  linh
 * @param   string $value
 * @param   int $type 0:no format, 1:format theo num_decimal_places
 * @param   int $num_decimal_places
 * @return  $sb
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function formatNumberColor($value, $type=0, $num_decimal_places=2, $show_zero=1, $dec_point=".", $thousands_sep=","){
    $sb = "";
    $indent = ''; $bgcolor = '';

    if($value >= 0){
        $bgcolor = '#1eb40f';
        $indent = '+';
    }else{
        $bgcolor = '#ff423e';
        $indent = '-';
    }                                                                     

    if ($value == 0 and $show_zero == 0){
        return "";
    } else {
        if ($type == 0){
            $sb = $value;
        }else if ($type == 1 and $value != 0){
            $sb = number_format($value, $num_decimal_places, $dec_point, $thousands_sep);
        }else if ($type == 1 and $value == 0){
            $sb = $value;
        }
    }

    $sb = "<font style='color:$bgcolor'>" . $indent . " " . $sb . "</font>";

    return $sb;
}

/**
 * formatNumber
 *
 * @author  linh
 * @param   string $value
 * @param   int $type 0:no format, 1:format theo num_decimal_places
 * @param   int $num_decimal_places
 * @param   int $custom: format color va dau +/-  0:thu nhap, 1:chi phi, 2:mau xanh ko dau, 3: mau do khong dau    
 * @return  $sb
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function formatNumberColorCustom($value, $type=0, $num_decimal_places=2, $show_zero=1, $custom=0, $dec_point=".", $thousands_sep=","){
    $sb = "";
    $indent = ''; $bgcolor = '';

    if($custom == 0){
        $bgcolor = '#1eb40f';
        $indent = '+';
    }elseif($custom == 1){
        $bgcolor = '#ff423e';
        $indent = '-';
    }elseif($custom == 2){
        $bgcolor = '#1eb40f';
        $indent = '';
    }elseif($custom == 3){
        $bgcolor = '#ff423e';
        $indent = '';
    }                                                                     

    if ($value == 0 and $show_zero == 0){
        return "";
    } else {
        if ($type == 0){
            $sb = $value;
        }else if ($type == 1 and $value != 0){
            $sb = number_format($value, $num_decimal_places, $dec_point, $thousands_sep);
        }else if ($type == 1 and $value == 0){
            $sb = $value;
        }
    }
    
    if ($sb != ""){
        $sb = "<font style='color:$bgcolor'>" . $indent . " " . $sb . "</font>";
    }
    return $sb;
}

/**
 * addPadding
 *
 * @author  linh
 * @param   string $sTarget
 * @param   string $iLength
 * @param   string $sToken
 * @return  string
 * @access  public
 * @date    Jan 11, 2007 5:58:27 PM
 */
function addPadding( $sTarget, $iLength, $sToken ) {
    if($iLength <= strlen($sTarget)){
        return $sTarget;
    }

    $sb = "";
    for( $i = 0; $i<($iLength-strlen($sTarget)); $i++ ){
        $sb .= $sToken;
    }

    $sb .= $sTarget;

    return $sb;
}

/**
 * split words
 *
 * @author  linh
 * @param   string $sTarget
 * @param   string $iLength = 50
 * @return  array
 * @access  public
 * @date    Jan 11, 2007 5:58:27 PM
 */
function splitString( $sTarget, $iLength ) {
    $data = array();
    if($iLength >= mb_strlen($sTarget)){
        $data[] = $sTarget;
        return $data;
    }

    $sb = ""; $j = 0;
    $countWords = mb_strlen($sTarget)/$iLength;
    for($i=1; $i<$countWords+1; $i++){
        $sb = mb_substr($sTarget, $j, $iLength);
        $j += $iLength;
        if ($sb != ""){
            $data[] = $sb;
        }
    }

    return $data;
}

/**
 * splitString2Line
 *
 * @author  linh
 * @param   string $sTarget
 * @param   string $iLength = 50
 * @return  array
 * @access  public
 * @date    Jan 11, 2007 5:58:27 PM
 */
function splitStringLines( $sTarget, $iLength, $iLengthSub ) {
    $data = array();

    $temp_array = explode(" ", $sTarget);
    $countWords = count($temp_array);

    if($iLength >= $countWords){
        $data[] = $sTarget;
        return $data;
    }

    $sb = ""; $start = 0; $end = 0;
    for($i=0; $i<=$countWords;){
        $sb = "";
        for($j=$i; $j<$i+$iLength; $j++){
            $sb .= $temp_array[$j] . " ";
        }
        $sb_tmp = ""; $ind = 0;
        while (mb_strlen($sb) < $iLengthSub and (($j+$ind)<=$countWords)){
            $sb_tmp = $temp_array[$j+$ind];
            if (mb_strlen($sb . $sb_tmp) < $iLengthSub){
                $sb = trim($sb);
                $sb .= " " . $sb_tmp;
                $ind++;
            }else{
                break;
            }
        }

        $i = $j + $ind;
        if (mb_strlen(trim($sb)) != 0){
            $data[] = $sb;
        }
    }

    return $data;
}

function roundNumber($value, $type=0, $decimal=0){
    $retvalue = 0;

    if ($type == 0){
        $retvalue = round($value, $decimal);
    }elseif ($type == 1){
        $retvalue = floor($value);
    }elseif ($type == 2){
        $retvalue = ceil($value);
    }

    return $retvalue;
}

/**
 * removeFormatNumber
 *
 * @author  linh
 * @param   string $value
 * @return  $sb
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function removeFormatNumber($value){
    $retvalue = 0;

    $retvalue = str_replace(',', '', $value);
//    $retvalue = str_replace(',', '.', $retvalue);

    return $retvalue;
}

/**
 * setFormatNumber
 *
 * @author  linh
 * @param   string $value
 * @param   int $type 0:no format, 1:format theo num_decimal_places
 * @param   int $num_decimal_places
 * @return  $sb
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function setFormatNumber($value, $type=1, $num_decimal_places=2, $show_zero=1, $dec_point=",", $thousands_sep="."){
    $sb = "";

    if ($value == 0 and $show_zero == 0){
        return "";
    } else {
        if ($type == 0){
            $sb = $value;
        }else if ($type == 1 and $value != 0){
            $sb = number_format($value, $num_decimal_places, $dec_point, $thousands_sep);
        }else if ($type == 1 and $value == 0){
            $sb = $value;
        }
    }

    return $sb;
}

/**
 * getCurrentDate
 *
 * @author  linh
 * @return  $date
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function getCurrentDate($type){
    $DefaultDateFormat = config('app.defaultdateformat');
    
    $dt = Carbon_::now();
       
    $ret = "";
    switch ($type) {
        case 'dt': //fulldatetime
            $ret = $dt->format($DefaultDateFormat . ' h:i:s');
            break;
        case 'd': //date
            $ret = $dt->format($DefaultDateFormat);
            break;
        case 't': //time
            $ret = $dt->toTimeString();
            break;
        default:
            return "";
    }

    return $ret;
}

/**
 * getLastDayMonth
 *
 * @author  linh
 * @param   string $month, $year
 * @return  $day
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function getLastDayMonth($month, $year){
    $lastdate = 0;

    $firstdate = Carbon_::parse($year."/".$month."/01");
    $lastdate = $firstdate->lastOfMonth()->toArray();

    return $lastdate['day'];
}

/**
 * getListDayMonth
 *
 * @author  linh
 * @param   string $month, $year
 * @return  $day
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function getListDayMonth($month, $year){
    $reportList = array();
    $dayArray = array("CN", "T2", "T3", "T4", "T5", "T6", "T7");
        
    $lastDate = getLastDayMonth($month, $year);
    $firstdate = Carbon_::parse($year."/".$month."/01");

    $dateArray = $firstdate->toArray();
    $day = $dateArray['day'];                 
    $dayOfWeek = $dateArray['dayOfWeek']; 
    $sday = $dayArray[$dayOfWeek];
    $reportList[$day] = $sday;             
    for($i=0; $i<$lastDate-1; $i++){
        $searchDate = $firstdate->addDay(1);
        $dateArray = $searchDate->toArray();
        $day = $dateArray['day'];                 
        $dayOfWeek = $dateArray['dayOfWeek']; 
        $sday = $dayArray[$dayOfWeek];
        $reportList[$day] = $sday;                                
    }
    
    return $reportList;
}

/**
 * getDayOfWeek
 *
 * @author  linh
 * @param   string $month, $year
 * @return  $day
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function getDayOfWeek($searchdate){
    $dayArray = array("Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy");
        
    $firstdate = Carbon_::parse($searchdate);
    $dateArray = $firstdate->toArray();
    $day = $dateArray['day'];                 
    $dayOfWeek = $dateArray['dayOfWeek']; 
    $sday = $dayArray[$dayOfWeek];
    
    return $sday;
}

/**
 * getListDateMonth
 *
 * @author  linh
 * @param   string $month, $year
 * @return  $day
 * @access  public
 * @date    Jul 14, 2006 8:47:43 AM
 */
function getListDateMonth($month, $year){
    $reportList = array();
        
    $lastDate = getLastDayMonth($month, $year);
    for($i=1; $i<=$lastDate; $i++){
        $sI = "$i";
        if ($i < 10){
        	$sI = "0$i";
        }
        $reportList[] = $sI;                                
    }
    
    return $reportList;
}

/*
 * For MySQL dates are in the format YYYY-mm-dd. This function is used to
 * convert it into user-selected date format
 * 
 */ 
function ConvertSQLDate($DateEntry,$includeTimeStuff=0) {
    $DefaultDateFormat = config('app.defaultdateformat');
    
    if ($DateEntry == null or $DateEntry == '0000-00-00'){
    	return "";
    }
    
    if (strpos($DateEntry,'/')) {
        $Date_Array = explode('/',$DateEntry);
    } elseif (strpos ($DateEntry,'-')) {
        $Date_Array = explode('-',$DateEntry);
    }

    if (strlen($Date_Array[2])>4) {  
        $TimeStuff = substr($Date_Array[2],2);
        $Date_Array[2]= substr($Date_Array[2],0,2); /*chop off the time stuff */
    }

    if ($DefaultDateFormat=='d/m/Y'){
        $ConvertedDate =  $Date_Array[2] . '/' . $Date_Array[1] . '/' . $Date_Array[0];
    } elseif ($DefaultDateFormat=='m/d/Y'){
        $ConvertedDate =  $Date_Array[1] . '/' . $Date_Array[2] . '/' . $Date_Array[0];
    }

    if ($includeTimeStuff) {
        $ConvertedDate = $ConvertedDate . " " . $TimeStuff;
    }
    
    return $ConvertedDate;
    
} // End function ConvertSQLDate

/* Takes a date in a the format specified in $DefaultDateFormat
 * and converts to a yyyy-mm-dd format 
 */
function FormatDateForSQL($DateEntry) {
    $DefaultDateFormat = config('app.defaultdateformat');    
    $DateEntry = trim($DateEntry);

    if (strpos($DateEntry,'/')) {
        $Date_Array = explode('/',$DateEntry);
    } elseif (strpos ($DateEntry,'-')) {
        $Date_Array = explode('-',$DateEntry);
    } elseif (strlen($DateEntry)==6) {
        $Date_Array[0]= substr($DateEntry,0,2);
        $Date_Array[1]= substr($DateEntry,2,2);
        $Date_Array[2]= substr($DateEntry,4,2);
    } elseif (strlen($DateEntry)==8) {
        $Date_Array[0]= substr($DateEntry,0,4);
        $Date_Array[1]= substr($DateEntry,4,2);
        $Date_Array[2]= substr($DateEntry,6,2);
    }

    
    // To modify assumption in 2030

    if ((int)$Date_Array[2] <60) {
        $Date_Array[2] = '20'.$Date_Array[2];
    } elseif ((int)$Date_Array[2] >59 AND (int)$Date_Array[2] <100) {
        $Date_Array[0] = '19'.$Date_Array[2];
    } elseif ((int)$Date_Array[2] >9999) {
        return 0;
    }

    if ($DefaultDateFormat=='d/m/Y'){
        return $Date_Array[2] . '-' . $Date_Array[1] . '-' . $Date_Array[0];

    } elseif ($DefaultDateFormat=='m/d/Y') {
        return $Date_Array[2] . '-' . $Date_Array[0] . '-' . $Date_Array[1];

    }

} // End of function

/* 
 * Returns 1 true if Date1 is greater than Date 2 
 * 
 */
function Date1GreaterThanDate2 ($Date1, $Date2) {
    $DefaultDateFormat = config('app.defaultdateformat');
    $Date1 = trim($Date1);
    $Date2 = trim($Date2);
    $Date1_array = explode('/', $Date1);
    $Date2_array = explode('/', $Date2);

    /*Try to make the year of each date comparable - if one date is specified as just 
    2 characters and the other >2 then take the last 2 characters of the other date only */
    if (strlen($Date1_array[2])>2 AND strlen($Date2_array[2])==2){
        $Date1_array[2] = substr($Date1_array[2], strlen($Date1_array[2])-2);
    }
    if (strlen($Date2_array[2])>2 AND strlen($Date1_array[2])==2){
        $Date2_array[2] = substr($Date2_array[2], strlen($Date2_array[2])-2);
    }
    
    /*The 2 element of the array will be the year in either d/m/Y or m/d/Y formats */

    if (($Date1_array[2] - $Date2_array[2]) >0){
        return 1;
    } elseif (($Date1_array[2] - $Date2_array[2]) ==0){

    /*The 0 and 1 elements of the array are switched depending on the format used */

        if ($DefaultDateFormat=='d/m/Y'){
            if ( ($Date1_array[1] -  $Date2_array[1]) >0){
                return 1;
            } elseif (($Date1_array[1] - $Date2_array[1])==0){
                if (($Date1_array[0] -  $Date2_array[0])>0){
                    return 1;
                }
            }

        } elseif ($DefaultDateFormat =='m/d/Y'){
            if (($Date1_array[0] - $Date2_array[0])>0){
                return 1;
            } elseif (($Date1_array[0] - $Date2_array[0])==0){
                if (($Date1_array[1] - $Date2_array[1])>0){
                    return 1;
                }
            }
        }
    }
    
    Return 0;
}

function DateAdd ($DateToAddTo,$PeriodString,$NumberPeriods){
    $DefaultDateFormat = config('app.defaultdateformat');
    $Date_array = explode('/', trim($DateToAddTo));
    if ($DefaultDateFormat=='d/m/Y'){
        
        switch ($PeriodString) {
        case 'd': //Days
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1],(int)$Date_array[0]+$NumberPeriods ,(int)$Date_array[2]));
            break;
        case 'w': //weeks
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1],(int)$Date_array[0]+($NumberPeriods*7),(int)$Date_array[2]));
            break;
        case 'm': //months
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1]+$NumberPeriods,(int)$Date_array[0],(int)$Date_array[2]));
            break;
        case 'y': //years
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1],(int)$Date_array[0],(int)$Date_array[2]+$NumberPeriods));
            break;
        default:
            return 0;
        }
    } elseif ($DefaultDateFormat=='m/d/Y'){
        
        switch ($PeriodString) {
        case 'd':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0],(int)$Date_array[1]+$NumberPeriods,(int)$Date_array[2]));
            break;
        case 'w':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0],(int)$Date_array[1]+($NumberPeriods*7),(int)$Date_array[2]));
            break;
        case 'm':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0]+$NumberPeriods,(int)$Date_array[1],(int)$Date_array[2]));
            break;
        case 'y':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0],(int)$Date_array[1],(int)$Date_array[2]+$NumberPeriods));
            break;
        default:
            return 0;
        }
    }   
}

function DateAddCal ($DateToAddTo,$PeriodString,$NumberPeriods){
    $DefaultDateFormat = config('app.defaultdateformat');
    $Date_array = explode('/', trim($DateToAddTo));
    if ($DefaultDateFormat=='d/m/Y'){
        
        switch ($PeriodString) {
        case 'd': //Days
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1],(int)$Date_array[0]+$NumberPeriods ,(int)$Date_array[2]));
            break;
        case 'w': //weeks
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1],(int)$Date_array[0]+($NumberPeriods*7),(int)$Date_array[2]));
            break;
        case 'm': //months
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1]+$NumberPeriods,1,(int)$Date_array[2]));
            break;
        case 'y': //years
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[1],(int)$Date_array[0],(int)$Date_array[2]+$NumberPeriods));
            break;
        default:
            return 0;
        }
    } elseif ($DefaultDateFormat=='m/d/Y'){
        
        switch ($PeriodString) {
        case 'd':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0],(int)$Date_array[1]+$NumberPeriods,(int)$Date_array[2]));
            break;
        case 'w':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0],(int)$Date_array[1]+($NumberPeriods*7),(int)$Date_array[2]));
            break;
        case 'm':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0]+$NumberPeriods,1,(int)$Date_array[2]));
            break;
        case 'y':
            return Date($DefaultDateFormat,mktime(0,0,0, (int)$Date_array[0],(int)$Date_array[1],(int)$Date_array[2]+$NumberPeriods));
            break;
        default:
            return 0;
        }
    }   
}

function DateDiff ($Date1, $Date2, $Period) {
    $DefaultDateFormat = config('app.defaultdateformat');
/* expects dates in the format specified in $DefaultDateFormat - period can be one of 'd','w','y','m'
months are assumed to be 30 days and years 365.25 days This only works
provided that both dates are after 1970. Also only works for dates up to the year 2035 ish */

    $Date1 = trim($Date1);
    $Date2 = trim($Date2);
    $Date1_array = explode('/', $Date1);
    $Date2_array = explode('/', $Date2);

    if ($DefaultDateFormat=='d/m/Y'){
        $Date1_Stamp = mktime(0,0,0, (int)$Date1_array[1],(int)$Date1_array[0],(int)$Date1_array[2]);
        $Date2_Stamp = mktime(0,0,0, (int)$Date2_array[1],(int)$Date2_array[0],(int)$Date2_array[2]);
    } elseif ($DefaultDateFormat=='m/d/Y'){
        $Date1_Stamp = mktime(0,0,0, (int)$Date1_array[0],(int)$Date1_array[1],(int)$Date1_array[2]);
        $Date2_Stamp = mktime(0,0,0, (int)$Date2_array[0],(int)$Date2_array[1],(int)$Date2_array[2]);
    }
    $Difference = $Date1_Stamp - $Date2_Stamp;

    /* Difference is the number of seconds between each date negative if Date 2 > Date 1 */
//addToLog("date1=$Date1" . " date2=$Date2" . " =" . ($Difference/(24*60*60)));
    switch ($Period) {
    case 'd':
//      return (int) ($Difference/(24*60*60));
        return round ($Difference/(24*60*60),0);
        break;
    case 'w':
        return (int) ($Difference/(24*60*60*7));
        break;
    case 'm':
        return (int) ($Difference/(24*60*60*30));
        break;
    case 's':
        return $Difference;
        break;
    case 'y':
        return (int) ($Difference/(24*60*60*365.25));
        break;
    default:
        return 0;
    }

}

/**
 * Thu vien thanh toan MOMO
 *
 * @author  linh
 * @access  public
 * @date    April 19, 2020 3:10:43 PM
 */
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

/**
 * Xu ly thong tin gui request toi he thong Vi MOMO
 *
 * @author  linh
 * @param   string $somecontent
 * @access  public
 * @date    April 19, 2020 3:10:43 PM
 */
function processSendRequestToMOMO($orderId, $orderInfo, $amount, $returnUrl, $notifyurl)
{
    //Thong tin key ma hoa lay tu config rbooks
    $endpoint = config('momo.endpoint');
    $partnerCode = config('momo.partnerCode');
    $accessKey = config('momo.accessKey');
    $secretKey = config('momo.secretKey');
    // Lưu ý: link notifyUrl không phải là dạng localhost
    $extraData = "merchantName=MoMo Partner";
    $requestId = time() . "";
    $requestType = "captureMoMoWallet";

    //before sign HMAC SHA256 signature
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'accessKey' => $accessKey,
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'returnUrl' => $returnUrl,
        'notifyUrl' => $notifyurl,
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));

    $jsonResult = json_decode($result, true);  // decode json

    return $jsonResult;
}

/**
 * Kiem tra ket qua sau khi thanh toan MOMO => thanh cong hay that bai
 *
 * @author  linh
 * @param   string $somecontent
 * @access  public
 * @date    April 19, 2020 3:10:43 PM
 */
function checkResultSendRequestToMOMO($partnerCode, $accessKey, $requestId, $amount, $orderId, $orderInfo, $orderType, $transId, $message, $localMessage, $responseTime, $errorCode, $payType, $extraData, $m2signature)
{
    //Thong tin key ma hoa lay tu config rbooks
    $endpoint = config('momo.endpoint');
    $partnerCode = config('momo.partnerCode');
    $accessKey = config('momo.accessKey');
    $secretKey = config('momo.secretKey');

    //Checksum
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
        "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
        "&payType=" . $payType . "&extraData=" . $extraData;

    $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);
   
    $error = '';
    $message = '';   
    if ($m2signature == $partnerSignature) {
        if ($errorCode == '0') {
            $error = '0';
            $message = 'Thanh toán dịch vụ thành công.';
        } else {
            $error = '2';
            $message = 'Thanh toán lỗi: ' . $message .'/'.$localMessage;
        }
    } else {
        $error = '2';
        $message = 'Giao dịch bị lỗi, vui lòng kiểm tra lại chữ ký điện tử của ban và chữ ký điện tử của hệ thống momo phản hồi';
    }

    $data = ['error' => $error,'message' => $message];

    return $data;
}

/**
 * Ham tao password voi ngau nhien phuc tap
 *
 * @author  linh
 * @param   string $somecontent
 * @access  public
 * @date    April 19, 2020 3:10:43 PM
 */
function passGen($length,$nums){
    $lowLet = "abcdefghijklmnopqrstuvwxyz";
    $highLet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "123456789@#";
    $pass = "";
    $i = 1;
    while ($i <= $length){
        $type = rand(0,1);
        if ($type == 0){
            if (($length-$i+1) > $nums){
                $type2 = rand(0,1);
                if ($type2 == 0){
                    $ran = rand(0,25);
                    $pass .= $lowLet[$ran];
                }else{
                    $ran = rand(0,25);
                    $pass .= $highLet[$ran];
                }
            }else{
            $ran = rand(0,10);
            $pass .= $numbers[$ran];
            $nums--;
            }
        }else{
            if ($nums > 0){
                $ran = rand(0,10);
                $pass .= $numbers[$ran];
                $nums--;
            }else{
                $type2 = rand(0,1);
                if ($type2 == 0){
                    $ran = rand(0,25);
                    $pass .= $lowLet[$ran];
                }else{
                    $ran = rand(0,25);
                    $pass .= $highLet[$ran];
                }
            }
        }
        $i++;
    }
    return $pass;
}