/*@cc_on @if (@_win32 && @_jscript_version >= 5) if (!window.XMLHttpRequest)
window.XMLHttpRequest = function() { return new ActiveXObject('Microsoft.XMLHTTP') }
@end @*/

var tree = {
	table: '',
	disp: null,
	selNode: false,
	edit: null,
	order: false,
	attributes: false,
	classattr: false,
	nodis: false,

	show_node:function(pParent, pOpen, pLast) {
		var oMaster = document.getElementById(pParent);
		var cId = pParent.substr(2);
		var oNode = document.getElementById('n_'+cId);
		if (oNode) {
			var oParent = oNode.parentNode;
			oParent.removeChild(oNode);
		}
		var lOpen = true;
		if (oMaster.state == 'open' && pOpen == 1) {
			lOpen = false;
		}
		var oSym = document.getElementById('s_'+cId);
		if (lOpen) {
			var cParameters = 'parent='+cId+'&last='+pLast;
			oSym.className=oSym.className.replace(/_closed/, '_animation');
			var oRq = new XMLHttpRequest();
			oRq.open('POST', location.pathname, true);
			oRq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			oRq.onreadystatechange = function() {
				if (oRq.readyState == 4) {
					if (oRq.status == 200) {
						var oHelp = document.createElement('div');
						oHelp.innerHTML = oRq.responseText;
						oMaster.parentNode.insertBefore(oHelp.firstChild, oMaster.nextSibling);
						oMaster.state = 'open';
						oSym.className = oSym.className.replace(/_animation/, '_open');
						oSym.previousSibling.className = oSym.previousSibling.className.replace(/pNode/, 'mNode');
					}
				}
			}
			oRq.send(cParameters);
		} else {
			oMaster.state = 'closed';
			oSym.className = oSym.className.replace(/_open/, '_closed');
			oSym.previousSibling.className = oSym.previousSibling.className.replace(/mNode/, 'pNode');
		}
		return;
	},

	sel_node:function(pNode, pFunc) {
		if (this.selNode) {
			this.selNode.className='tree_text';
		}
		if (pNode == null) {
			this.selNode = null;
		} else {
			this.selNode = pNode;
			if (this.selNode) {
				this.selNode.className='tree_text tree_text_sel';
				if (pFunc) {
					eval(pFunc);
				}
			}
		}
	}
};