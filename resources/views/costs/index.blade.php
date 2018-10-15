@extends('layouts.app')
@section('content')
        <script>
                function enable_stone() {
                        var fs = document.getElementById("fs_select").value;
                        var cs = document.getElementById("cs_select").value;  
                        var stones = 2;
                        var cover = 0;
                        var st = [];
                        var pc = []
                        var count = 0;
                        var cs1 = cs;
                        fs = fs*3.14;
                        document.getElementById("text1").innerHTML = fs;
                        cs = cs * stones * 0.9 * 100 / fs;
                        document.getElementById("text2").innerHTML = cs;
                        pc=cs/fs;
                        while(pc.floor<100){
                                st[count] = stones;
                                pc[count] = cover;
                                stones = stones + 2;
                                cs = cs1; 
                                cs = cs * stones * 0.9 * 100 / fs;
                                pc=cs/fs;
                                document.write(st);
                                count++;
                       }
                        document.getElementById("text5").innerHTML = pc;   
                        document.getElementById('cover_select').disabled = false; 
                        document.getElementById('stone_select').disabled = false;               
                }
        </script>
        <form>
       <div class="col-sm-4">
                <div class="input-group">
                        <label class="mr-sm-2" for="fs_select">Finger-size</label>
                        <select id="fs_select" name="fingersize" class="form-control">
                                <option>Select finger size</option>
                                        @foreach ($fingersize as $fs)
                                                <option value="{{ $fs->size_mm }}">{{ $fs->size}} ({{$fs->size_mm}}mm)</option>
                                        @endforeach
                        </select>
                </div>
        </div> 
        <br>
        <p id="text1"></p>
        <p id="text2"></p>
        <p id="text3"></p>
        <p id="text4"></p>
        <p id="text5"></p>
        <div class="col-sm-4">
                <div class="input-group">
                        <label class="mr-sm-2" for="cs_select">Diamond:</label>
                        <select id="cs_select" name="carat" class="form-control" onchange = "enable_stone()">
                                <option>Select stone size</option>
                                        @foreach ($carat as $ca)
                                                <option value="{{ $ca->diamond_mm }}">({{ $ca->diamond_mm}}mm)&nbsp;-&nbsp;{{$ca->carat_size}}&nbsp;ct</option>
                                        @endforeach
                        </select>
                </div>
        </div> 
        <br>
        <div class="col-sm-4">
                <div class="input-group">
                        <label class="mr-sm-2" for="stone_select">Stone quantity:</label>
                        <select id="stone_select" name="diamond" class="form-control" disabled>
                                <option>2</option>
                        </select>
                </div>
        </div> 
        <br>
        <div class="col-sm-4">
                <div class="input-group">
                        <label class="mr-sm-2" for="cover_select">Ring Covered:</label>
                        <select id="cover_select" name="cover" class="form-control" disabled>
                                <option>20%</option>
                        </select>
                </div>
        </div> 
</FORM>
@endsection