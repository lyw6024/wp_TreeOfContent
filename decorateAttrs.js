rt = document.getElementsByClassName("entry-content")[0].children
menuArr = [];
h2Name = "root";
h2idx=0;
h3idx=0;
for(i=0;i<rt.length;i++)
{
    switch(rt[i].tagName.toUpperCase())
    {
        case "H2":
            var att = document.createAttribute("id");
            att.value="i"+h2idx;
            rt[i].setAttributeNode(att);
            h2Name = rt[i].innerText;
            menuArr[h2Name]=[];
            h2idx+=1;
            h3idx=0;

            break;
        case "H3":
            var att = document.createAttribute("id");
            att.value="i"+(h2idx-1)+"j"+h3idx;
            rt[i].setAttributeNode(att);
            menuArr[h2Name].push(rt[i].innerText);
            h3idx+=1;
            break;
        default:
            break;
    }
}
