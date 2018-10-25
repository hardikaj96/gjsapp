function enable(cara){
    var fieldId = $('#field').data("field-id");
    alert("hardik");
    alert(cara);
    var js_lang = {!! json_encode($js_lang) !!};
    
    alert(js_lang.CLOSE);
    alert("hardik");
    var fs = document.getElementById("fs_select").value;
    var cs = document.getElementById("cs_select").value;  
    var stones = 2;
    var cover = 0;
    var st = [];
    var pc = [];
    var rt = ['MFP', 'MTP', 'MCP', 'MXP'];
    var count = 0;
    var cs1 = cs;
    fs = fs*3.14;
    var select2 = document.getElementById('st_select');
    var select1 = document.getElementById('stone_select');
    var select = document.getElementById('cover_select');
    cs = cs * stones * 0.9 * 100 ;
    cs=cs/fs;
    while(Math.floor(cs)<95){
            st[count] = stones;
            pc[count] = Math.floor(cs);
            stones = stones + 1;
            cs = cs1; 
            cs = cs * stones * 0.9 * 100 ;
            cs=cs/fs;
            count++;
   }  
    select.options.length = 0;
    for(var i = 0; i < pc.length; i++) {
            var opt = pc[i];
            var el = document.createElement("option");
            el.textContent = opt+'%';
            el.value = opt;
            select.appendChild(el);
    }
    select1.options.length = 0;
    for(var i = 0; i < st.length; i++) {
            var opt = st[i];
            var el = document.createElement("option");
            el.textContent = opt+' stones';
            el.value = opt;
            select1.appendChild(el);
    }
    select2.options.length = 0;
    for(var i = 0; i < rt.length; i++) {
            var opt = rt[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            select2.appendChild(el);
    }
    pcselected = document.getElementById('cover_select').value;
    draw(pcselected);
    total_ct();
}
function stone_to_cover(){
    var selected_stone = document.getElementById('stone_select').value;
    var ss = document.getElementById('stone_select');
    var ps = document.getElementById('cover_select');
    var so = ss.options;
    var po = ps.options;
    var loc=0;
    for(i = 0; i < so.length; i++)
    {
            if(selected_stone == so[i].value)
                    loc = i;
    }
    ps.options[loc].selected = true;
    pcselected = document.getElementById('cover_select').value;
    draw(pcselected);
    total_ct();
} 
function cover_to_stone(){
    var selected_cover = document.getElementById('cover_select').value;
    var ss = document.getElementById('stone_select');
    var ps = document.getElementById('cover_select');
    var so = ss.options;
    var po = ps.options;
    var loc=0;
    for(i = 0; i < so.length; i++)
    {
            if(selected_cover == po[i].value)
                    loc = i;
    }
    ss.options[loc].selected = true;
    pcselected = document.getElementById('cover_select').value;
    draw(pcselected);
    total_ct();
}
function imagechange(){
    var x = document.getElementById("styleimage");
    var rs = document.getElementById("st_select").value;
    var image_path='/images/'+rs+'.jpg';
    x.setAttribute("src", image_path);
    document.getElementById('main_title').textContent = rs;
}

function total_ct(){
    var selected_cover = document.getElementById('cs_select').value;
    var ps = document.getElementById('cs_select');
    var po = ps.options;
    var loc=0;
    for(i = 0; i < po.length; i++)
    {
            if(selected_cover == po[i].value)
                    loc = i;
    }
    var nmm = ps.options[loc].textContent;
    var n = nmm.indexOf('-');
    var m = nmm.indexOf('c');
    var nm = nmm.substring(n+1,m);
    var select1 = document.getElementById('stone_select').value;
    document.getElementById('total_carat_weight').value = select1 *nm ;
}

function draw(pcselect){
    pcselect = (pcselect*Math.PI)/100
    var canvas = document.getElementById('myCanvas');
    var context = canvas.getContext('2d');
    var x = 175;
    var y = 130;
    var radius = 110;
    var startAngle = 1.5 * Math.PI - pcselect;
    var endAngle = 1.5 * Math.PI + pcselect;
    var counterClockwise = false;
    context.beginPath();
    context.arc(x, y, 120, 0, 2*Math.PI, counterClockwise);
    context.lineWidth = 0;
    context.fillStyle = '#BFB6B4';
    context.fill();
    context.beginPath();
    context.arc(x, y, 100, 0, 2*Math.PI, counterClockwise);
    context.lineWidth = 0;
    context.fillStyle = 'white';
    context.fill();
    context.beginPath();
    context.arc(x, y, 110, startAngle, endAngle, counterClockwise);
    context.lineWidth = 20;
    context.strokeStyle = 'Red';
    context.stroke();
}
function cost(){

}