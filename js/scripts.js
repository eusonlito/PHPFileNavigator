/*******************************************************************************
* js/scripts.js
*
* Funciones de javascript
*

PHPfileNavigator versión 2.1.1

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

var isOpera, isIE, isNav, isFox, isOther = false;
var posicion = new Array();

if (navigator.userAgent.indexOf("Opera")!=-1) {
	 isOpera = true;
} else if (navigator.userAgent.indexOf("Firefox")!=-1) {
	 isFox = true;
} else if (navigator.appName == "Microsoft Internet Explorer") {
	 isIE = true;
} else if (navigator.appName == "Netscape") {
	 isNav = true;
} else {
	isOther = true;
}

function MM_findObj (n, d) {
	var p,i,x;	if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) { d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p); } if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n]; for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers () {
	var i,p,v,obj,args=MM_showHideLayers.arguments;
	for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
		if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
		obj.visibility=v; }
}

function submitonce () {
	for (i=0; i<document.forms.length; i++) {
		for (b=0; b<document.forms[i].length; b++) {
			var tempobj = document.forms[i].elements[b]
		 
			if(tempobj.type && (tempobj.type.toLowerCase()=="submit" || tempobj.type.toLowerCase()=="reset"))
				tempobj.disabled = true
		}
	}
	
	return true;
}

function amosa () {
	obj = amosa.arguments;

	for (i=0; i<obj.length; i++) {
		escolle = MM_findObj(obj[i]);

		if (escolle) {
			escolle.style.display = '';
		}
	}
}

function oculta () {
	obj = oculta.arguments;

	for (i=0; i<obj.length; i++) {
		escolle = MM_findObj(obj[i]);

		if (escolle) {
			escolle.style.display = 'none';
		}
	}
}

function cambia_outros () {
	obj = cambia_outros.arguments;

	for (i=1; i<obj.length; i++) {
		escolle = MM_findObj(obj[i]);

		if (escolle) {
			escolle.style.display = 'none';
		}
	}

	escolle = MM_findObj(obj[0]);

	if (escolle) {
		escolle.style.display = '';
	}
}

function axuda (sid) {
	txt = "toolbar=no,location=no,directories=no,status=no,framespacing=0,border=0";
	txt = txt+",resizable=yes,menubar=no,frameborder=0,fullscreen=no,scrollbars=yes,scroll=yes";
	txt = txt+",width=350,height=450,alwaysRaised=yes";

	window.open("axuda.php?"+sid,"Axuda",txt);
}

function Xcambia_opcion (id) {
	id = (id == 0)?1:id;

	for (xi=1; xi<5; xi++) {
		if (xi != id) {
			objenlace = MM_findObj('Xenlace'+xi);
			objli = MM_findObj('XLIopcion'+xi);

			oculta('XidOpcion'+xi);

			objenlace.className = '';
			objli.className = '';
		}
	}

	objenlace = MM_findObj('Xenlace'+id);
	objenlace.className = 'Xmarcado';

	objli = MM_findObj('XLIopcion'+id);
	objli.className = 'active';

	amosa('XidOpcion'+id);
}

function Xamosa_axuda (num) {
	obx_tr = MM_findObj('tr_axuda'+num);

	if (obx_tr.style) {
		if (obx_tr.style.display == 'none') {
			obx_tr.style.display = '';
		} else {
			obx_tr.style.display = 'none';
		}
	}
}

function amosa_axuda (nom) {
	obx_nom = MM_findObj(nom);

	if (obx_nom.style) {
		if (obx_nom.style.display == 'none') {
			obx_nom.style.display = '';
		} else {
			obx_nom.style.display = 'none';
		}
	}
}

function enlace () {
	var dir = arguments[0];
	var destino = arguments[1];

	url = dir.replace(/&amp;/g, '&');

	if (destino == '_blank') {
		window.open(url, '_blank');
	} else {
		location.href = url;
	}

	return false;
}

function ancho_fiestra () {
	if (self.innerHeight) {
		var max_ancho = document.body.clientWidth;
	} else if (document.documentElement && document.documentElement.clientHeight) {
		var max_ancho = document.documentElement.clientWidth;
	} else if (document.body) {
		var max_ancho = document.body.clientWidth;
	}

	return (max_ancho - 22)+'px';
}

function marca_ancho_corpo (directo) {
	if (directo) {
 		var obx_corpo = MM_findObj('corpo');
		var obx_pe = MM_findObj('pe');
		var max_ancho = ancho_fiestra();

		maximo = (obx_corpo.style.width == max_ancho);

		obx_corpo.style.width = maximo?(isIE?'760px':'740px'):max_ancho;
		obx_pe.style.width = obx_corpo.style.width;

		PFN_createCookie('PFN_anchoCorpo', (maximo?'':max_ancho), 365);
	} else {
		ancho_corpo = PFN_readCookie('PFN_anchoCorpo');

		if (ancho_corpo != '' && ancho_corpo != null) {
			document.write('<style type="text/css">');
			document.write("\n#corpo, #pe { width: "+ancho_corpo+"; }");
			document.write('</style>');
		}
	}

	return false;
}

function PFN_createCookie (name,value,days) {
	if (days) {
		var date = new Date();

		date.setTime(date.getTime()+(days*24*60*60*1000));

		var expires = '; expires='+date.toGMTString();
	} else { 
		expires = '';
	}

	document.cookie = name+'='+value+expires+'; path=/';
}

function PFN_readCookie (name) {
	var nameEQ = name + '=';
	var ca = document.cookie.split(';');

	for (var i=0;i < ca.length;i++) {
		var c = ca[i];

		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}

	return null;
}
