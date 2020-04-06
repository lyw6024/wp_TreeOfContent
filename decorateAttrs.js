rt = document.getElementsByClassName("entry-content")[0].children
menuArr = [];
h2Name = "root";
for(i=0;i<rt.length;i++)
{
    if(rt[i].tagName.toUpperCase()=="H2")
    {
        h2Name = rt[i].innerText;
        menuArr[h2Name]=[];
    }
    else if(rt[i].tagName.toUpperCase()=="H3")
    {
        menuArr[h2Name].push(rt[i].innerText);
    }  

}
