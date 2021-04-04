var year_month=document.getElementById('year_month');
var now = new Date();
var year= now.getFullYear();
var tbody=document.getElementById('tbody');
var m=[];
for(var i=0;i<12;i++){
    var s=new Date(Date.UTC(now.getFullYear(),i)).toLocaleString('en',{month:'long'}); 
    m.push(s);  
}
var now_month=now.getMonth().toLocaleString();
year_month.innerHTML=m[now_month]+" "+year;
Calendar();

    function Calendar(){
    var start=new Date(Date.UTC(year,now_month));
    var end=new Date(Date.UTC(year,Number(now_month)+1));
    var dates=[];
    while(start<end){
        dates.push({date:start.getDate(),day:start.getDay(),year:start.getFullYear(),month:start.getMonth()});
        start.setDate(start.getDate()+1)
    }
    var r="<tr>";
    for(var i=0;i<dates[0].day;i++){
        r+="<td class='day'></td>";
    }
    for(var j=0;j<7-i;j++){
        r+=checkToday(dates[j]);
    }
    r+="</tr>";
    while(dates.length>j){
        r+="<tr>";
        for(var k=j;dates.length>k && k<j+7;k++){
        r+=checkToday(dates[k]);
        }
        r+="</tr>";
        j+=7;
    }
    tbody.innerHTML=r;
}
function checkToday(args){
if(args.year==now.getFullYear()&& args.month==now.getMonth()&& args.date==now.getDate()){
    return "<td class='day active today'>"+args.date+"</td>";
}
else{
    return "<td class='day'>"+args.date+"</td>";
}
}

function nextMonth(){
    if(now_month<11){    
   now_month= Number(now_month)+1;
   year_month.innerHTML=m[now_month]+" "+year;
   Calendar();
    }
    else{
        now_month=0;
        year++;
        year_month.innerHTML=m[now_month]+" "+year;
        Calendar();
    }
}
function previousMonth(){
    if(now_month>0){    
   now_month= Number(now_month)-1;
   year_month.innerHTML=m[now_month]+" "+year;
   Calendar();
    }
    else{
        now_month=11;
        year--;
        year_month.innerHTML=m[now_month]+" "+year;
        Calendar();
    }
}
 

