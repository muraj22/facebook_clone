<?php include("headerjs.php"); 
echo'
String.prototype.strReverse = function() {
	var newstring = "";
	for (var s=0; s < this.length; s++) {
		newstring = this.charAt(s) + newstring;
	}
	return newstring;
};

function setps(v) {
if(v==""){$("#pstrengthv").css("visibility","hidden"); $("#pstrengthvv").css("visibility","hidden"); return false;}

	var nScore=0, nLength=0, nAlphaUC=0, nAlphaLC=0, nNumber=0, nSymbol=0, nMidChar=0, nRequirements=0, nAlphasOnly=0, nNumbersOnly=0, nUnqChar=0, nRepChar=0, nRepInc=0, nConsecAlphaUC=0, nConsecAlphaLC=0, nConsecNumber=0, nConsecSymbol=0, nConsecCharType=0, nSeqAlpha=0, nSeqNumber=0, nSeqSymbol=0, nSeqChar=0, nReqChar=0, nMultConsecCharType=0;
	var nMultRepChar=1, nMultConsecSymbol=1;
	var nMultMidChar=2, nMultRequirements=2, nMultConsecAlphaUC=2, nMultConsecAlphaLC=2, nMultConsecNumber=2;
	var nReqCharType=3, nMultAlphaUC=3, nMultAlphaLC=3, nMultSeqAlpha=3, nMultSeqNumber=3, nMultSeqSymbol=3;
	var nMultLength=4, nMultNumber=4;
	var nMultSymbol=6;
	var nTmpAlphaUC="", nTmpAlphaLC="", nTmpNumber="", nTmpSymbol="";
	var sAlphaUC="0", sAlphaLC="0", sNumber="0", sSymbol="0", sMidChar="0", sRequirements="0", sAlphasOnly="0", sNumbersOnly="0", sRepChar="0", sConsecAlphaUC="0", sConsecAlphaLC="0", sConsecNumber="0", sSeqAlpha="0", sSeqNumber="0", sSeqSymbol="0";
	var sAlphas = "abcdefghijklmnopqrstuvwxyz";
	var sNumerics = "01234567890";
	var sSymbols = ")!@#$%^&*()";
	var sComplexity = "Too Short";
	var sStandards = "Below";
	var nMinvLen = 6;
	if (document.all) { var nd = 0; } else { var nd = 1; }
	if (v) {
		nScore = parseInt(v.length * nMultLength);
		nLength = v.length;
		var arrv = v.replace(/\s+/g,"").split(/\s*/);
		var arrvLen = arrv.length;
		

		for (var a=0; a < arrvLen; a++) {
			if (arrv[a].match(/[A-Z]/g)) {
				if (nTmpAlphaUC !== "") { if ((nTmpAlphaUC + 1) == a) { nConsecAlphaUC++; nConsecCharType++; } }
				nTmpAlphaUC = a;
				nAlphaUC++;
			}
			else if (arrv[a].match(/[a-z]/g)) { 
				if (nTmpAlphaLC !== "") { if ((nTmpAlphaLC + 1) == a) { nConsecAlphaLC++; nConsecCharType++; } }
				nTmpAlphaLC = a;
				nAlphaLC++;
			}
			else if (arrv[a].match(/[0-9]/g)) { 
				if (a > 0 && a < (arrvLen - 1)) { nMidChar++; }
				if (nTmpNumber !== "") { if ((nTmpNumber + 1) == a) { nConsecNumber++; nConsecCharType++; } }
				nTmpNumber = a;
				nNumber++;
			}
			else if (arrv[a].match(/[^a-zA-Z0-9_]/g)) { 
				if (a > 0 && a < (arrvLen - 1)) { nMidChar++; }
				if (nTmpSymbol !== "") { if ((nTmpSymbol + 1) == a) { nConsecSymbol++; nConsecCharType++; } }
				nTmpSymbol = a;
				nSymbol++;
			}
	
			var bCharExists = false;
			for (var b=0; b < arrvLen; b++) {
				if (arrv[a] == arrv[b] && a != b) { 
					bCharExists = true;

					nRepInc += Math.abs(arrvLen/(b-a));
				}
			}
			if (bCharExists) { 
				nRepChar++; 
				nUnqChar = arrvLen-nRepChar;
				nRepInc = (nUnqChar) ? Math.ceil(nRepInc/nUnqChar) : Math.ceil(nRepInc); 
			}
		}
		

		for (var s=0; s < 23; s++) {
			var sFwd = sAlphas.substring(s,parseInt(s+3));
			var sRev = sFwd.strReverse();
			if (v.toLowerCase().indexOf(sFwd) != -1 || v.toLowerCase().indexOf(sRev) != -1) { nSeqAlpha++; nSeqChar++;}
		}
		

		for (var s=0; s < 8; s++) {
			var sFwd = sNumerics.substring(s,parseInt(s+3));
			var sRev = sFwd.strReverse();
			if (v.toLowerCase().indexOf(sFwd) != -1 || v.toLowerCase().indexOf(sRev) != -1) { nSeqNumber++; nSeqChar++;}
		}
		

		for (var s=0; s < 8; s++) {
			var sFwd = sSymbols.substring(s,parseInt(s+3));
			var sRev = sFwd.strReverse();
			if (v.toLowerCase().indexOf(sFwd) != -1 || v.toLowerCase().indexOf(sRev) != -1) { nSeqSymbol++; nSeqChar++;}
		}
		
		
		if (nAlphaUC > 0 && nAlphaUC < nLength) {	
			nScore = parseInt(nScore + ((nLength - nAlphaUC) * 2));
			sAlphaUC = "+ " + parseInt((nLength - nAlphaUC) * 2); 
		}
		if (nAlphaLC > 0 && nAlphaLC < nLength) {	
			nScore = parseInt(nScore + ((nLength - nAlphaLC) * 2)); 
			sAlphaLC = "+ " + parseInt((nLength - nAlphaLC) * 2);
		}
		if (nNumber > 0 && nNumber < nLength) {	
		
			nScore = parseInt(nScore + (nNumber * nMultNumber));
			sNumber = "+ " + parseInt(nNumber * nMultNumber);
		}
		if (nSymbol > 0) {	
			nScore = parseInt(nScore + (nSymbol * nMultSymbol));
			sSymbol = "+ " + parseInt(nSymbol * nMultSymbol);
		}
		if (nMidChar > 0) {	
			nScore = parseInt(nScore + (nMidChar * nMultMidChar));
			sMidChar = "+ " + parseInt(nMidChar * nMultMidChar);
		}
	
		
	
		if ((nAlphaLC > 0 || nAlphaUC > 0) && nSymbol === 0 && nNumber === 0) {  
			nScore = parseInt(nScore - nLength);
			nAlphasOnly = nLength;
			sAlphasOnly = "- " + nLength;
		}
		if (nAlphaLC === 0 && nAlphaUC === 0 && nSymbol === 0 && nNumber > 0) {  
			nScore = parseInt(nScore - nLength); 
			nNumbersOnly = nLength;
			sNumbersOnly = "- " + nLength;
		}
		if (nRepChar > 0) {  
			nRepInc=Math.floor(nRepInc/2);
			nScore = parseInt(nScore - nRepInc);
			sRepChar = "- " + nRepInc;
		}
		if (nConsecAlphaUC > 0) { 
			nScore = parseInt(nScore - (nConsecAlphaUC * nMultConsecAlphaUC)); 
			sConsecAlphaUC = "- " + parseInt(nConsecAlphaUC * nMultConsecAlphaUC);
		}
		if (nConsecAlphaLC > 0) {  
			nScore = parseInt(nScore - (nConsecAlphaLC * nMultConsecAlphaLC)); 
			sConsecAlphaLC = "- " + parseInt(nConsecAlphaLC * nMultConsecAlphaLC);
		}
		if (nConsecNumber > 0) { 
			nScore = parseInt(nScore - (nConsecNumber * nMultConsecNumber));  
			sConsecNumber = "- " + parseInt(nConsecNumber * nMultConsecNumber);
		}
		if (nSeqAlpha > 0) {  
			nScore = parseInt(nScore - (nSeqAlpha * nMultSeqAlpha)); 
			sSeqAlpha = "- " + parseInt(nSeqAlpha * nMultSeqAlpha);
		}
		if (nSeqNumber > 0) { 
			nScore = parseInt(nScore - (nSeqNumber * nMultSeqNumber)); 
			sSeqNumber = "- " + parseInt(nSeqNumber * nMultSeqNumber);
		}
		if (nSeqSymbol > 0) { 
			nScore = parseInt(nScore - (nSeqSymbol * nMultSeqSymbol)); 
			sSeqSymbol = "- " + parseInt(nSeqSymbol * nMultSeqSymbol);
		}


		if (nScore > 100) { nScore = 100; } else if (nScore < 0) { nScore = 0; }
		if (nScore >= 0 && nScore < 20) { sComplexity = "Weak"; }
		else if (nScore >= 20 && nScore < 40) { if((nNumber>0) && (v.length>7)){sComplexity="Medium";}else{sComplexity = "Weak";} }
		else if (nScore >= 40 && nScore < 60) { if(nSymbol>0){sComplexity = "Strong";}else{sComplexity="Medium";} if((nNumber>0) && (nAlphaUC>0) && (nAlphaLC>0)){sComplexity="Strong";} }
		else if (nScore >= 60 && nScore < 80) { if(nSymbol>0){sComplexity = "Strong";}else{sComplexity="Medium";} if((nNumber>0) && (nAlphaUC>0) && (nAlphaLC>0)){sComplexity="Strong";} }
		else if (nScore >= 80 && nScore <= 100) { if(nSymbol>0){sComplexity = "Strong";}else{sComplexity="Medium";}
		if((nNumber>0) && (nAlphaUC>0) && (nAlphaLC>0)){sComplexity="Strong";}
		 }
if(sComplexity=="Medium"){$("#pstrength").css("color","rgb(0, 0, 255)");}
else if(sComplexity=="Weak"){$("#pstrength").css("color","grey");}
else{$("#pstrengh").css("color","green");}
	$("#pstrength").html(sComplexity);
if(v.length<6){$("#pstrengthv").css("visibility","hidden"); $("#pstrengthv").css("position","absolute"); $("#pstrengthvv").css("position","relative"); $("#pstrengthvv").css("visibility","visible");}
else{
$("#pstrengthvv").css("visibility","hidden");  $("#pstrengthvv").css("position","absolute"); $("#pstrengthv").css("position","relative"); $("#pstrengthv").css("visibility","visible");	
}	

	}	
}


function dopwm(v){
var dp=$("#npass").val();
if((v=="") && (dp=="")){$("#pmatch").css("visibility","hidden"); return false;}
var dpl=dp.length;
var vl=v.length;
if(vl==dpl){
if(v==dp){
$("#pmatch").html("Passwords match");
$("#pmatch").css("color","green");
$("#pmatch").css("visibility","visible");	
}
}
else if(vl<dpl){
$("#pmatch").html("Match password too short");
$("#pmatch").css("color","orange");
$("#pmatch").css("visibility","visible");			
}
else if(vl>dpl){
$("#pmatch").html("Passwords do not match");
$("#pmatch").css("color","orange");
$("#pmatch").css("visibility","visible");		
}
}
';
?>