@extends('layouts.app1')
@section('content')
        
        <script>
                /*function enable_stone() {
                        var fs = document.getElementById("fs_select").value;
                        var cs = document.getElementById("cs_select").value;  
                        var stones = 2;
                        var cover = 0;
                        var st = [];
                        var pc = [];
                        var count = 0;
                        var cs1 = cs;
                        fs = fs*3.14;
                        var select1 = document.getElementById('stone_select');
                        var select = document.getElementById('cover_select');
                        //document.getElementById("text1").innerHTML = fs;
                        cs = cs * stones * 0.9 * 100 ;
                        //document.getElementById("text2").innerHTML = cs;
                        cs=cs/fs;
                        
                        //document.getElementById("text3").innerHTML = Math.floor(cs);

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
                        //document.getElementById('total_carat_weight').value =  ; 
                       //document.getElementById("text4").innerHTML = st.toString();
                       //document.getElementById("text5").innerHTML = pc.toString();
                        //document.getElementById('cover_select').disabled = false; 
                        //document.getElementById('stone_select').disabled = false;               
                }*/
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
                        //document.getElementById("text5").innerHTML = 'Hardik';
                        ps.options[loc].selected = true;
                        pcselected = document.getElementById('cover_select').value;
                        draw(pcselected);
                        total_ct
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
                        //document.getElementById("text5").innerHTML = 'Hardisk';
                        ss.options[loc].selected = true;
                        pcselected = document.getElementById('cover_select').value;
                        draw(pcselected);
                        total_ct();
                }
                function enable(carat){
                        var fs = document.getElementById("fs_select").value;
                        var cs = document.getElementById("cs_select").value;  
                        var stones = 2;
                        var cover = 0;
                        var st = [];
                        var pc = [];
                        var count = 0;
                        var cs1 = cs;
                        fs = fs*3.14;
                        var select1 = document.getElementById('stone_select');
                        var select = document.getElementById('cover_select');
                        //document.getElementById("text1").innerHTML = fs;
                        cs = cs * stones * 0.9 * 100 ;
                        //document.getElementById("text2").innerHTML = cs;
                        cs=cs/fs;
                        
                        //document.getElementById("text3").innerHTML = Math.floor(cs);

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
                        pcselected = document.getElementById('cover_select').value;
                        draw(pcselected);
                        total_ct();

                         
                        //alert('hardik');
                        pcsele = document.getElementById('cs_select').value;
                        //alert(pcsele);
                        //alert('hardik');
                        //
                       
                        // line color
                        //var am = nm.split();
                        //document.getElementById("text4").innerHTML = nmm[14];
                       //document.getElementById("text5").innerHTML = pc.toString();
                        //document.getElementById('cover_select').disabled = false; 
                        //document.getElementById('stone_select').disabled = false;    
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
                        //document.getElementById("text5").innerHTML = 'Hardisk';
                        var nmm = ps.options[loc].textContent;
                        var n = nmm.indexOf('-');
                        var m = nmm.indexOf('c');
                        var nm = nmm.substring(n+1,m);
                        var select1 = document.getElementById('stone_select').value;
                        //alert(select1);
                        document.getElementById('total_carat_weight').value = select1 *nm ;
                }
                function draw(pcselect){
                        //pcselect /=2;
                        pcselect = (pcselect*Math.PI)/100
                        var canvas = document.getElementById('myCanvas');
                        var context = canvas.getContext('2d');
                        var x = 150;
                        var y = 150;
                        var radius = 110;
                        var startAngle = 1.5 * Math.PI - pcselect;
                        var endAngle = 1.5 * Math.PI + pcselect;
                        var counterClockwise = false;
                        context.beginPath();
                        context.arc(x, y, 120, 0, 2*Math.PI, counterClockwise);
                        context.lineWidth = 0;
                        // line color
                        context.fillStyle = 'grey';
                        context.fill();
                        context.beginPath();
                        context.arc(x, y, 100, 0, 2*Math.PI, counterClockwise);
                        context.lineWidth = 0;
                        // line color
                        context.fillStyle = 'white';
                        context.fill();
                        context.beginPath();
                        context.arc(x, y, 110, startAngle, endAngle, counterClockwise);
                        context.lineWidth = 20;
                        // line color
                        
                        context.strokeStyle = 'yellow';
                        context.stroke();
                                   
                }
        </script>
        <form>
                
                        <div class="col-sm-4 col-lg-8">
                                <div class="col-sm-6">
                                <div class="input-group">
                                        <label class="mr-sm-2" for="fs_select">Finger-size</label>
                                        <select id="fs_select" name="fingersize" class="form-control" onchange = "enable()">
                                                <option>Select finger size</option>
                                                        @foreach ($fingersize as $fs)
                                                                @if( $fs->size == '7.00')         
                                                                        <option value="{{ $fs->size_mm }}" selected>{{ $fs->size}} ({{$fs->size_mm}}mm)</option>
                                                                @else
                                                                        <option value="{{ $fs->size_mm }}">{{ $fs->size}} ({{$fs->size_mm}}mm)</option>        
                                                                @endif                                                
                                                        @endforeach
                                        </select>
                                </div>
                        </div> 
                        <br>
                        <div class="col-sm-6">
                                <div class="input-group">
                                        <label class="mr-sm-2" for="cs_select">Diamond:</label>
                                        <select id="cs_select" name="carat" class="form-control" onchange = "enable()">
                                                <option>Select stone size</option>
                                                        @foreach ($carat as $ca)
                                                                @if( $ca->diamond_mm == '1.30')         
                                                                        <option value="{{ $ca->diamond_mm }}" selected>({{ $ca->diamond_mm}}mm)-{{$ca->carat_size}}ct</option>
                                                                @else
                                                                        <option value="{{ $ca->diamond_mm }}">({{ $ca->diamond_mm}}mm)-{{$ca->carat_size}}ct</option>
                                                                @endif  
                                                        @endforeach
                                        </select>
                                </div>
                        </div> 
                        <br>
                        <div class="col-sm-6">
                                <div class="input-group">
                                        <label class="mr-sm-2" for="stone_select">Stone quantity:</label>
                                        <select id="stone_select" name="diamond" class="form-control" onchange="stone_to_cover()"  >
                                                
                                        </select>
                                </div>
                        </div> 
                        <br>
                        <div class="col-sm-6">
                                <div class="input-group">
                                        <label class="mr-sm-2" for="cover_select">Ring Covered:</label>
                                        <select id="cover_select" name="cover" class="form-control" onchange="cover_to_stone()">
                                                
                                        </select>
                                </div>
                        </div> 
                        <br>
                        <div class="col-sm-6">
                                <div class="input-group">
                                        <label class="mr-sm-2" for="total_carat_weight">Total carat weight</label>
                                        <b><input type="text" name="total_carat" class="form-control" value="" id="total_carat_weight" readonly></b><br>
                                </div>
                        </div> 
                        
                        <div class="col-sm-6">
                                        
                                        <canvas id="myCanvas" width="550" height="500">
                                                        
                                        </canvas>
                                                
  
                                                      
                                </div>
                        </div>
                        
               
</FORM>
<p id="text1"></p>
        <p id="text2"></p>
        <p id="text3"></p>
        <p id="text4"></p>
        <p id="text5"></p>
@endsection