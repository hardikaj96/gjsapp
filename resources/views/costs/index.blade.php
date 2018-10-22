@extends('layouts.app1')
@section('content')
        
        <script>
                function enable(){
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
                        context.fillStyle = 'grey';
                        context.fill();
                        context.beginPath();
                        context.arc(x, y, 100, 0, 2*Math.PI, counterClockwise);
                        context.lineWidth = 0;
                        context.fillStyle = 'white';
                        context.fill();
                        context.beginPath();
                        context.arc(x, y, 110, startAngle, endAngle, counterClockwise);
                        context.lineWidth = 20;
                        context.strokeStyle = 'yellow';
                        context.stroke();
                }
                function cost(){

                }
        </script>
        <form>
                <b>       
                <p id="text5"></p>
                <div class="row">
                        <div class="col-sm-4 col-lg-5">
                                        <div class="text-light bg-dark text-center">
                                                        <h1> <b><span id='main_title' class="label label-info">MFP</span></b></h1>
                                        </div>
                                        <img id="styleimage" src="/images/MFP.jpg" width="440" height="440" alt="noimage"/>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                                
                                        <div class="form-group">
                                                <label  for="st_select" >Choose Ring style <b>:</b></label>
                                                <select id="st_select" name="ringstyle" class="form-control" onchange = "imagechange()">
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
                                                <select id="diamond_style" name="diamond" class="form-control">
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
                                        <div class="border rounded">
                                                <H3 align="center">Estimated Prices</H3>
                                                <table class="table">
                                                        
                                                        <thead>
                                                                <tr>
                                                                <th scope="col">Setting</th>
                                                                <th scope="col">14K</th>
                                                                <th scope="col">18K</th>
                                                                <th scope="col">Platinum</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                <th scope="row">50</th>
                                                                <td>500</td>
                                                                <td>600</td>
                                                                <td>800</td>
                                                                </tr>
                                                        </tbody>
                                                </table> 
                                                <HR>
                                        </div>
                                        <div class="border rounded">
                                                <HR>
                                                
                                                <H3>Total Cost</H3>
                                                <table class="table">
                                                        <thead>
                                                                <tr>
                                                                <th scope="col">14K</th>
                                                                <th scope="col">18K</th>
                                                                <th scope="col">Platinum</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                <td>550</td>
                                                                <td>650</td>
                                                                <td>850</td>
                                                                </tr>
                                                        </tbody>
                                                </table>  
                                        </div>
                                </div>
                        </div>
                </div>
        </b>
        </FORM>
<p id="text1"></p>
        <p id="text2"></p>
        <p id="text3"></p>
        <p id="text4"></p>
        <p id="text5"></p>
@endsection