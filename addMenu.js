
function do_scrollDown()
{
    var moveHeight=90;
    window.scrollBy(0,-moveHeight);
}
function scrollDown()
{
    setTimeout("do_scrollDown()",1);
}

function Add_the_li_elem(prefix,h2content)
{
	var liElem = document.createElement("li");
	var elem = document.createElement("a");
	var att = document.createAttribute("href");
	att.value="#"+prefix+"_"+h2content;
	elem.setAttributeNode(att);

    var scrollDownAction = document.createAttribute("onclick");
    scrollDownAction.value="scrollDown()";
    elem.setAttributeNode(scrollDownAction);

	txt=document.createTextNode(h2content);
	elem.appendChild(txt);
	liElem.appendChild(elem);
	return liElem;
}

var menu = document.createElement("div");
var clAtt = document.createAttribute("class");
clAtt.value ="malicTOC";
menu.setAttributeNode(clAtt);

var ulElem = document.createElement("ul");

for(h2 in menuArr)
{
	ulElem.appendChild(Add_the_li_elem("h2",h2));
	if(menuArr[h2].length>0)
	{
		var sub_ulElem = document.createElement("ul");
		
		for(h3 in menuArr[h2])
		{
			sub_ulElem.appendChild(Add_the_li_elem("h3",menuArr[h2][h3]));
		}
		ulElem.appendChild(sub_ulElem);
	}
}
menu.appendChild(ulElem);

document.getElementsByClassName("post-content")[0].insertBefore(menu,document.getElementsByClassName("entry-content")[0]);
