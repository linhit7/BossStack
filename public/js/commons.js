
function processReports(frm_id, type_value){
	document.all["typereport"].value = type_value;
	document.all[frm_id].submit();	
}

function processSubmitOpenWindow(frm_id, type_value, starget, smodule, submit){
	document.all[frm_id].target = starget;
	document.all[frm_id].action = smodule;

	if (submit == "1"){
    	document.all[frm_id].submit();	
	}
	
}

function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}
function decimalsonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789.-").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}

function removeText (key, textbox, svalue)
{
    if (textbox.value.indexOf("__.__.__") > -1 ){
        textbox.value = svalue;
    }

    return false;
}

function submitenter(e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13)
   {
    processReports('');
    return false;
   }
else
   return true;
}

function formatCurrency(num) { 
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    cents = num%100;
    num = Math.floor(num/100).toString();
    if(cents<10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
        num = num.substring(0,num.length-(4*i+3))+','+num.substring(num.length-(4*i+3));
    
    return (((sign)?'':'-') + num);
}

function removeCharacter(v, ch){
  var tempValue = v+"";
  var becontinue = true;
  while(becontinue == true){
   var point = tempValue.indexOf(ch);
   if( point >= 0 ){
        var myLen = tempValue.length;
        tempValue = tempValue.substr(0,point)+tempValue.substr(point+1,myLen);
        becontinue = true;
   }else{
        becontinue = false;
   }
  }
  return tempValue;
}
 
function characterControl(value) {
  var tempValue = "";
  var len = value.length;
  for(i=0; i<len; i++){
       var chr = value.substr(i,1);
       if( (chr < '0' || chr > '9') && chr != '.' && chr != ',' ){
            chr = '';
       }
       tempValue = tempValue + chr;
  }
  return tempValue;
}
 
function formatNumberDecimal(value, digit){
  var thausandSepCh = ",";
  var decimalSepCh = ".";
  
  var tempValue = "";
  var realValue = value+"";
  var devValue = "";
  realValue = characterControl(realValue);
  var comma = realValue.indexOf(decimalSepCh);

  if(comma != -1 ){
       tempValue = realValue.substr(0,comma);
       devValue = realValue.substr(comma);
       devValue = removeCharacter(devValue,thausandSepCh);
       devValue = removeCharacter(devValue,decimalSepCh);
       devValue = decimalSepCh+devValue;
       if( devValue.length > 3){
            devValue = devValue.substr(0,3);
       }
  }else{
       tempValue = realValue;
  }
  tempValue = removeCharacter(tempValue,thausandSepCh);
   
  var result = "";
  var len = tempValue.length;
  while (len > 3){
       result = thausandSepCh+tempValue.substr(len-3,3)+result;
       len -=3;
  }
  result = tempValue.substr(0,len)+result;
  return result+devValue;
}

function goToPage(page){
	window.location.href = page;
} 
 
function onChangeSelect(){
    document.frm.typeReport.value = "";
	document.frm.submit();
}

function closeWindow() {
    window.open('','_parent','');
    window.close();
}

function checkAll(frmName,objName)
{
	var iElement = frmName.elements;
    for (var i=0; i < iElement.length; i++)
	{
    	if ( (iElement[i].type.toString() == 'checkbox') && (iElement[i].name == objName))
		iElement[i].checked = true;  
	}    
}

function clearAll(frmName,objName)
{
	var iElement = frmName.elements;
	for (var i=0; i < iElement.length; i++) 
	{
		if ((iElement[i].type.toString()=='checkbox') && (iElement[i].name == objName))
		iElement[i].checked = false;
	}
}

function getDDMMYYY(dateString) {
    var dateParts = dateString.split("/");
 
    // Tháng b?t ??u t? 0 nên ta ph?i gi?m ?i 1: dataParts[1] - 1
    return new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
}
function setDDMMYYY(date) {
    //+ 1 do thang bat dau tu 0
    var y = date.getFullYear(),
        m = date.getMonth() + 1,
        d = date.getDate();
    dates = d + "/" + m + "/" + y;
    return dates; 
}

function DateAdd(dates, type, amount){
    date = getDDMMYYY(dates); 
    var y = date.getFullYear(),
        m = date.getMonth(),
        d = date.getDate();
    if(type === 'y'){
        y += amount;
    };
    if(type === 'm'){
        m += amount;
    };
    if(type === 'd'){
        d += amount;
    };
    newdate = new Date(y, m, d);
    newdates = setDDMMYYY(newdate);
    return newdates;
}