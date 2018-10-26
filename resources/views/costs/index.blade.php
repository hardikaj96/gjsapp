@extends('layouts.app1')
@section('content')
        @include('footer')
        <script>
                var Color = window.Color;
                var SI2 = window.SI2;
                var VS2_SI1 = window.VS2_SI1;
                var diamond_size= window.diamond_size;
                var costs=window.costs;
                var ring_style = window.ring_style;
                function enable(){ 
                        var fs = document.getElementById("fs_select").value;
                        var cs = document.getElementById("cs_select").value;  
                        var stones = 2;
                        var cover = 0;
                        var st = [];
                        var pc = [];
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
                        /*select2.options.length = 0;
                        for(var i = 0; i < ring_style.length; i++) {
                                var opt = ring_style[i];
                                var el = document.createElement("option");
                                el.textContent = opt;
                                el.value = opt;
                                select2.appendChild(el);
                        }*/
                        pcselected = document.getElementById('cover_select').value;
                        
                        draw(pcselected);
                        total_ct();
                        estimate();
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
                        estimate();
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
                        estimate();
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
                        document.getElementById('total_carat_weight').value =  (select1 *nm) ;
                        //('\xB1')+' '
                }
                
                function draw(pcselect){
                        pcselect = (pcselect*Math.PI)/100;
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
                function estimate(){
                        //alert(ring_style);
                        var i=0;
                        var gold = 1200;
                        var st = document.getElementById('st_select').value;
                        var fsv = document.getElementById('fs_select').value;
                        var dsv = document.getElementById('cs_select').value;
                        var ss = document.getElementById('stone_select').value;
                        var ds = document.getElementById('diamond_style').value;
                
                        //alert(ds);
                        fsv = fsv * 3.14;
                        var d_radius=fsv/2;
                        //alert(fsv);
                        var inner_area = (3.14 * d_radius * d_radius);
                        //alert(inner_area);
                        var temp = (1+d_radius)+parseFloat(dsv) ;
                        var outer_area = (3.14 * temp * temp);
                        //alert(outer_area + 'outer area');
                        var total_area = outer_area - inner_area;
                       // alert(total_area);
                        var fsvolume = total_area * (parseFloat(dsv)+0.5);
                        //alert(fsvolume);
                        var gwt = (fsvolume * 0.019 * 14)/24;
                        //alert(gwt);
                        var gcost = gold *1.02*0.0188;
                        //alert(gcost);
                        var loc=0;
                        for(i=0;i<ring_style.length;$i++){
                                if(ring_style[i] == st){
                                        loc = i;
                                        break;
                                }
                        }
                        dst = costs[loc];
                        //alert(dst);
                        var diamond_cost=0;
                        var ps = document.getElementById('cs_select');
                        var po = ps.options;
                        var loc=0;
                        for(i = 0; i < po.length; i++)
                        {
                                if(dsv == po[i].value)
                                        loc = i;
                        }
                        if(ds == 'VS2_SI1')
                                diamond_cost = VS2_SI1[loc]*ss;
                        if(ds == 'SI2')
                                diamond_cost = SI2[loc]*ss;
                        if(ds == 'Color')
                                diamond_cost = Color[loc]*ss;
                        //alert(diamond_cost);
                        var polish = 20;
                        var setting_cost = Math.floor(ss * dst + polish);
                        //alert(setting_cost);
                        var labor =6.5;
                        var metal_factor = 1.05;
                        var metal_weight=1.05;
                        var m14 = Math.floor((gcost + labor) * metal_factor * metal_weight * gwt );
                        //alert(m14);
                        var m18 =Math.floor((gcost*(18/14) + labor) * metal_factor * metal_weight * gwt *1.4) ;
                        //alert(m18);
                        var plat = Math.floor(gwt * 1.85 * 50);
                        //alert(plat);
                        m14 = m14 +parseFloat(diamond_cost);
                        m18 = m18 +parseFloat(diamond_cost);
                        plat = plat +parseFloat(diamond_cost);
                        //alert(m14);
                        var tbody = '';
                        tbody = tbody +'<th scope="row">'+setting_cost+'</th>';
                        tbody = tbody +'<td>'+m14+'</td>';
                        tbody = tbody +'<td>'+m18+'</td>';
                        tbody = tbody +'<td>'+plat+'</td>';
                        document.getElementById('settcost').innerHTML=tbody;
                        var tbody = '';
                        tbody = tbody +'<td>'+(m14+setting_cost)+'</td>';
                        tbody = tbody +'<td>'+(m18+setting_cost)+'</td>';
                        tbody = tbody +'<td>'+(plat+setting_cost)+'</td>';
                        document.getElementById('totalcost').innerHTML=tbody;
                        
                }
        </script>
        <form>
                <b>       
                <p id="text5"></p>
                <div class="row">
                        <div class="col-sm-4 col-lg-5">
                                        <div class="text-light bg-dark text-center">
                                                        <h1> <b><span id='main_title' class="label label-info">MCP</span></b></h1>
                                        </div>
                                        <img id="styleimage" src="/images/MCP.jpg" width="440" height="440" alt="noimage"/>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                                
                                        <div class="form-group">
                                                <label  for="st_select" >Choose Ring style <b>:</b></label>
                                                <select id="st_select" name="ringstyle" class="form-control" onchange = "imagechange()">
                                                        @foreach ($stylet as $st)
                                                                <option value="{{ $st->stylename }}">{{ $st->stylename}}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label  for="fs_select" >Finger-size <b>:</b></label>
                                                <select id="fs_select" name="fingersize" class="form-control" onchange = "enable()">
                                                                @foreach ($fingersize as $fs)
                                                                        @if( $fs->size == '7.00')         
                                                                                <option value="{{ $fs->size_mm }}" selected>{{ $fs->size}} ({{$fs->size_mm}}mm)</option>
                                                                        @else
                                                                                <option value="{{ $fs->size_mm }}">{{ $fs->size}} ({{$fs->size_mm}}mm)</option>        
                                                                        @endif                                                
                                                                @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label class="mr-sm-2" for="cs_select">Diamond <b>:</b></label>
                                                <select id="cs_select" name="carat" class="form-control" onchange = "enable()">
                                                        @foreach ($carat as $ca)
                                                                @if( $ca->diamond_mm == '1.30')         
                                                                        <option value="{{ $ca->diamond_mm }}" selected>({{ $ca->diamond_mm}}mm)-{{$ca->carat_size}}ct</option>
                                                                @else
                                                                        <option value="{{ $ca->diamond_mm }}">({{ $ca->diamond_mm}}mm)-{{$ca->carat_size}}ct</option>
                                                                @endif  
                                                        @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label class="mr-sm-2" for="stone_select">Stone quantity <b>:</b></label>
                                                <select id="stone_select" name="diamond" class="form-control" onchange="stone_to_cover()"  >
                                                        
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label class="mr-sm-2" for="cover_select">Ring Covered <b>:</b></label>
                                                <select id="cover_select" name="cover" class="form-control" onchange="cover_to_stone()">
                                                        
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label class="mr-sm-2" for="total_carat_weight">Total carat weight <b>:</b></label>
                                                <b><input type="text" name="total_carat" class="form-control" value="" id="total_carat_weight" readonly></b><br>
                                        </div>
                                        <div class="form-group">
                                                <label class="mr-sm-2" for="diamond_style">Select Diamond Style <b>:</b></label>
                                                <select id="diamond_style" name="diamond" class="form-control" onchange="cover_to_stone()">
                                                        @for ($i=2; $i<count($diamond); $i++)
                                                                <option value="{{$diamond[$i]}}">{{$diamond[$i]}}</option>
                                                        @endfor
                                                </select>
                                        </div>
                                
                        </div>
                        <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                        
                                                <canvas id="myCanvas" width="400" height="250"></canvas>
                                        
                                </div>
                                <div class="form-group">
                                        <div class='text-center'>
                                        <div class="border rounded">
                                                <H3>Estimated Prices</H3>
                                                <table class="table">
                                                        
                                                        <thead>
                                                                <tr>
                                                                <th scope="col">Setting Cost</th>
                                                                <th scope="col">14K</th>
                                                                <th scope="col">18K</th>
                                                                <th scope="col">Plat</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody id="settcost">
                                                                
                                                        </tbody>
                                                </table> 
                                                
                                        </div>
                                        <br>
                                        <div class="border rounded">
                                                
                                                <H3>Total Cost</H3>
                                                <table class="table">
                                                        <thead>
                                                                <tr>
                                                                <th scope="col">14K</th>
                                                                <th scope="col">18K</th>
                                                                <th scope="col">Plat</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody id="totalcost">
                                                                
                                                        </tbody>
                                                </table>  
                                        </div>
                                </div>
                                </div>
                        </div>
                </div>
        </b>
        </FORM>
        
@endsection