<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
    <!-- Styles -->


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 100;
        }

        .columnZ{
            float:left;
            width:100%;
            height: 300px;
            background-color: silver;
        }

        .columnX{
            float:left;
            height:1000px;
            width:100%;
        }

        .columnA{
            float:left;
            width:80%;
            height: auto;
        }

        .columnB{
           float:left;
           width:20%;
           height: 100%;
           background-color: silver;
        }

        .ui-slider-range {
            background-color: black;
        }

        .ui-slider-handle {
            margin-top: -5px;
            display: inline-block;
            border-radius: 50%;
        }

        .i-corner-all .ui-state-default {
            background-color: black;
        }


        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default,
        .ui-button,
        html .ui-button.ui-state-disabled:hover,
        html .ui-button.ui-state-disabled:active {
            background-color: black;
        }

        #filtrar {
            float: right;
            margin-top: 20px;

        }

        .btn {
            background-image: none;
            background-color: white;
            color: black;
        }

        .contentSlide {
            float: left;
            width: 100%;
            height: 40px;
        }

        .filterA {
            float: left;
            width: 50%;
            height: 30px;
        }

        .filterB {
            float: left;
            width: 50%;
            height: 30px;
        }

        .filterText {

            margin-top: 20px;
        }

        .filtertxt {
            float: left;
            height: 20px;
            width: 100%;
        }

        .custom-select {
            width: 100%;
            height: 35px;
        }

        #catalogos {
            background-color: white;
            border: 1px solid silver;
            border-radius: 4px;
            font-weight: bold;
        }

        #categorias {
            background-color: white;
            border: 1px solid silver;
            border-radius: 4px;
            font-weight: bold;
        }

        .ya {
            background-color: #f08300;
            background-image: unset;
            margin-top: -50%;
            position: relative;
            width: 50%;
            margin-left: 25%;
            color: white;
            font-weight: bold;
            border: none !important;
        }

        .cont-center {
            width: 98%;
            margin-left: 2%;
        }

        .card-P {
            width: 90%;
            margin-left: 5%;
            margin-top: 5%;
            height: 90%;
            text-align: center;

        }

        .card-title-P {
            width: 100%;
            overflow: hidden;
            height: 30px;
            text-align: center;
        }

        .col-md-4-P {

            width: 300px;
            height: 300px;

        }

        .image-P {
            width: 100%;
            height: 70%;
            display: inline-block;
            vertical-align: middle;
        }

        .name-P {
            width: 100%;
            height: 15%;
        }

        .points-P {
            width: 100%;
            height: 15%;
        }

        .card-img-top-P {

            max-width: 80%;
            max-height: 80%;
            vertical-align: middle;

        }

        .frame {
            height: 160px;
            /* equals max image height */
            width: 230px;

            white-space: nowrap;
            margin: auto;

            text-align: center;
        }

        .helper {
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }

        img {
            background: #3A6F9A;
            vertical-align: middle;
            max-height: 130px;
            max-width: 130px;
        }


        @media (max-width: 800px) {

            .columnA{
               width: 90%;
               margin-left:5%;
            }


            .columnB{
                display: none;
            }
  

            .contentSlide {
             float: left;
            width: 100%;
            height: 80px;
            }

            #catalogos{
              margin-top:20px;

            }

            #categorias{
              margin-top:20px;

            }

            #ver_todo{
                margin-top:20px;
            }

            .col-md-4-P{
                width:450px;
                height:450px;
                margin:auto;
            }

        }



    </style>
    <script>
        var collection = [];
        var all_collection = [];
        var collection_count = 0;
        var current_page = 0;
        var total_pages = 3;
        var total_collection = 0;
        var page_multiplaction = 1;
        var shard_page = 0;
        var current_catalog = 0;
        var current_category = 0;
        var current_criteria = '';
        var max_points = 0;
        var min_points = 0;
        var page = 1;
        var magic = 3;
        var first = 0;
        var memory_page = [];





        $(function() {


            $("#ver_todo").on("click", function() {

                first = 0;
                page = 1;
                all_collection = [];
                shard_page = 0;
                current_catalog = 0;
                current_category = 0;
                current_criteria = '';
                max_points = 0;
                min_points = 0;
                setpCollection('0', '0', '0', '0', '0');
                ClearSlide();



            });



            $("#filtrar").on("click", function() {

                first = 0;
                page = 1;
                all_collection = [];
                shard_page = 0;
                current_catalog = 0;
                current_category = 0;
                current_criteria = 0;

                setpCollection('0', '0', '0', '0', '0');

            });


            $('#catalogos').change(function() {
                current_catalog = $('#catalogos').find(":selected").val();

                first = 0;

                page = 1;

                all_collection = [];

                setpCollection(current_catalog, current_category, '0', '0', '0');

                ClearSlide();



            });

            $('#categorias').change(function() {
                current_category = $('#categorias').find(":selected").val();

                first = 0;

                page = 1;

                all_collection = [];

                setpCollection(current_catalog, current_category, '0', '0', '0');
                ClearSlide();

            });


            $("#slider").slider({
                range: true,
                min: 0,
                max: 157096,
                slide: function(event, ui) {
                    min_points = ui.values[0];

                    $('#minP').text(min_points);

                    max_points = ui.values[1];

                    $('#maxP').text(max_points);

                }
            });

            ClearSlide();



            setpCollection('0', '0', '0', '0', '0');

        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function ClearSlide() {


            $('#slider').each(function() {

                var options_slide = $(this).slider('option');

                $(this).slider('values', [options_slide.min, options_slide.max]);

                $('#maxP').text('157096');
                $('#minP').text('0');

            });


        }



        function setpCollection(catalog = '0', category = '0', criteria = '0', column = '0', page_current = 0, row_count = 20) {

            console.log('pagina');
            console.log(page_current);

            $.ajax({
                url: "http://127.0.0.1:8000/promo?page=" + page_current + '&catalog=' + catalog + '&category=' + category + '&criteria=' + criteria + '&column=' + column + '&min=' + min_points + '&max=' + max_points+'&rowcount='+row_count,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {

                    let catalogs = res.catalogs;
                    let categories = res.categories;
                    let prizes = res.prizes;
                    shard_page = prizes.length + shard_page;
                    let pagination_data = res.pagination;
                    let totalPages = (Math.floor((pagination_data.recordsTotal) / 6)) - 1;
                    total_collection = pagination_data.recordsTotal;

                    let current_count = 0;

                    console.log('shard' + shard_page);

                    $('#pagination').html('');
                    $('#pagination').html('<li id="parentPage0" class="page-item"><a id="backward" class="page-link" style="display:none;" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li><li class="page-item"><a id="forward" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>');
                    for (let i = 1; i < totalPages + 1; i++) {
                        if(current_page==i){
                            colorPage= 'background-color:#fff;color:black;';
                        }else{
                            colorPage='background-color:#fff;color:black';
                        }
                        let insert_to = i - 1;

                        $('#parentPage' + insert_to).after('<li  onclick="rotate(' + i + ');" id="parentPage' + i + '" class="page-item "><a style="'+colorPage+'" onclik="rotate(' + i + ')" id="page' + i + '" data-page="' + i + '" class="page-link page-number">' + i + '</a></li>');
                    }

                    document.getElementById("catalogos").innerHTML = '<option value="0" selected>Todos los Catálogos</option>';
                    $.each(catalogs, function(key, objeto) {
                        $.each(objeto, function(key, value) {
                            let st = document.getElementById("catalogos");
                            let opt = document.createElement('option');
                            opt.value = value.id;
                            opt.innerHTML = value.description;
                            st.appendChild(opt);
                        });
                    });

                    document.getElementById("categorias").innerHTML = '<option value="0" selected>Categorias</option>';
                    $.each(categories, function(key, objeto) {
                        $.each(objeto, function(key, value) {
                            let st = document.getElementById("categorias");
                            let opt = document.createElement('option');
                            opt.value = value.id;
                            opt.innerHTML = value.description;
                            st.appendChild(opt);
                        });
                    });

                    $.each(prizes, function(key, objeto) {
                        if (objeto != undefined) {
                            all_collection.push(objeto);
                        }
                    });

                    collection_count = all_collection.length;

                    if (first == 0) {
                        first = 1;
                        rotate(page);
                    }

                }
            });

        }

        function Canjea(c) {
            $('#canjea' + c).css('display', 'block');

            $('#card' + c).css('border', '1px solid silver');
            $('#card' + c).css('border-radius', '8px');
            $('#card' + c).css('opacity', '0.5');
            $('#card' + c).css('box-shadow', 'rgba(0, 0, 0, 0.35) 0px 5px 15px');

        }

        function NoCanjea(c) {
            $('#canjea' + c).css('display', 'none');
            $('#card' + c).css('border', '0px solid silver');
            $('#card' + c).css('border-radius', 'none');
            $('#card' + c).css('opacity', '1');
            $('#card' + c).css('box-shadow', 'none');
        }


        function rotate(num) {

            let min = (num * 6) - 5;
            let max = (num * 6) - 0;

            $('#parentPage'+num).css('background-color','black');
            $('#parentPage'+num).css('color','white');

            console.log('numero pagina');
            console.log('page selected '+num +'  current page ' +current_page +  '  total peerpage'+shard_page) ;

                
            memory_page.push(num);    

                let minLimit = num*20;

                  if(minLimit < shard_page && memory_page.includes(num)==false ){
                let row =6*page;
                all_collection =  [];
                setpCollection(current_catalog, current_category, '0', '0', '1',row);
                
                }

                memory_page.push(num);    


            $('.page-item').each(function (idx,el) {

                console.log('paginas');
                console.log(idx);

                $(el).css('background-color','white');
            $(el).css('color','black');


            })



            if (min < shard_page) {
                current_page = current_page + 1;
                setpCollection(current_catalog, current_category, '0', '0', current_page);
            }


            let minimal_count_rotate = 0;
            let simple_rotate_count = 0;

            $('#grid').html('');
            $.each(all_collection, function(key, objeto) {
                console.log('insert...')
                minimal_count_rotate = minimal_count_rotate + 1;
                if (minimal_count_rotate >= min && minimal_count_rotate <= max) {
                    $('#grid').append('<div  class="col-md-4 col-sm-6 col-md-4-P"><div onmouseover="Canjea(' + minimal_count_rotate + ')" onmouseout="NoCanjea(' + minimal_count_rotate + ')" id="card' + minimal_count_rotate + '"  class="card card-P"><div class="image-P"><div class="frame"><span class="helper"></span><img id="prize' + minimal_count_rotate + 'Image" src="' + objeto.image + '" /></div></div><div class="name-P"><h5 id="prize' + minimal_count_rotate + 'Name" class="card-title card-title-P">' + objeto.name + '</h5></div><div class="points-P"><label id="prize' + minimal_count_rotate + 'Points" class="card-points">' + objeto.points + ' puntos</label></div></div><a id="canjea' + minimal_count_rotate + '" style="display:none;"  href="#" class="ya btn btn-primary">CANJEA YA!</a></div></div>');
                }
            });
        }
    </script>
</head>

<body class="antialiased">

  <div class="columnZ">

  </div>

    <div class="columnX" >
    <div class="columnA">
        <div class="vr" style="height: 20px;border-top:2px solid black;margin-top:40px;margin-bottom:60px"></div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="contentSlide">
                        <div id="slider" style="height:4px;background-color:black"></div>

                        <span class="filterA"> <label class="filterText"><a class="filtertxt">Filtrar por puntos:</a> <a class="filtertxt">Desde <b id="minP">0</b> Hasta <b id="maxP">157096</b></a></label></span>

                        <span class="filterB"><button id="filtrar" type="button" class="btn btn-primary">FILTRAR</button></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <select id='catalogos' class="custom-select custom-select-lg mb-3">
                        <option selected>Todos los Catálogos</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">

                </div>
                <div class="col-md-4 col-sm-6">
                    <select id='categorias' class="custom-select custom-select-lg mb-3">
                        <option selected>Categorias</option>

                    </select>
                </div>
                <div class="col-md-4 col-sm-6">
                    <button id="ver_todo" type="button" class="btn btn-primary">VER TODO</button>
                </div>
            </div>


        </div>


        <!-- Vertical divider -->
        <div class="vr" style="height: 20px;border-top:2px solid black;margin-top:40px;margin-bottom:60px"></div>

        <div class="container-fluid cont-center">



            <div id="grid" class="row">
                <div class="col-md-4 col-sm-6 col-md-4-P">
                    <div class="card card-P">
                        <div class="image-P">
                            <div class="frame">
                                <span class="helper"></span><img id="prize1Image" src="http://jsfiddle.net/img/logo.png" />
                            </div>
                        </div>
                        <div class="name-P">
                            <h5 id="prize1Name" class="card-title card-title-P">Nombre</h5>
                        </div>
                        <div class="points-P">
                            <label id="prize1Points" class="card-points">0 puntos</label>
                        </div>
                    </div>
                    <a style="display:none;" href="#" class="ya btn btn-primary">CANJEA YA!</a>
                </div>
                <div class="col-md-4 col-sm-6 col-md-4-P">
                    <div class="card card-P">
                        <div class="image-P">
                            <div class="frame">
                                <span class="helper"></span><img id="prize2Image" src="http://jsfiddle.net/img/logo.png" />
                            </div>
                        </div>
                        <div class="name-P">

                            <h5 id="prize2Name" class="card-title card-title-P">Nombre</h5>
                        </div>
                        <div class="points-P">
                            <label id="prize2Points" class="card-points">0 puntos</label>
                        </div>
                    </div>
                    <a style="display:none;" href="#" class="ya btn btn-primary">CANJEA YA!</a>
                </div>
                <div class="col-md-4 col-sm-6 col-md-4-P">
                    <div class="card card-P">
                        <div class="image-P">
                            <div class="frame">
                                <span class="helper"></span><img id="prize3Image" src="http://jsfiddle.net/img/logo.png" />
                            </div>
                        </div>
                        <div class="name-P">

                            <h5 id="prize3Name" class="card-title card-title-P">Nombre</h5>
                        </div>
                        <div class="points-P">
                            <label id="prize3Points" class="card-points">0 puntos</label>
                        </div>
                    </div>
                    <a style="display:none;" href="#" class="ya btn btn-primary">CANJEA YA!</a>
                </div>
                <div class="col-md-4 col-sm-6 col-md-4-P">
                    <div class="card card-P">
                        <div class="image-P">

                            <div class="frame">
                                <span class="helper"></span><img id="prize4Image" src="http://jsfiddle.net/img/logo.png" />
                            </div>
                        </div>
                        <div class="name-P">

                            <h5 id="prize4Name" class="card-title card-title-P">Nombre</h5>
                        </div>
                        <div class="points-P">
                            <label id="prize4Points" class="card-points">0 puntos</label>
                        </div>
                    </div>
                    <a style="display:none;" href="#" class="ya btn btn-primary">CANJEA YA!</a>
                </div>
                <div class="col-md-4 col-sm-6 col-md-4-P">
                    <div class="card card-P">
                        <div class="image-P">

                            <div class="frame">
                                <span class="helper"></span><img id="prize5Image" src="http://jsfiddle.net/img/logo.png" />
                            </div>
                        </div>
                        <div class="name-P">

                            <h5 id='prize5Name' class="card-title card-title-P">Nombre</h5>
                        </div>
                        <div class="points-P">
                            <label id="prize5Points" class="card-points">0 puntos</label>
                        </div>
                    </div>
                    <a style="display:none;" href="#" class="ya btn btn-primary">CANJEA YA!</a>
                </div>
                <div class="col-md-4 col-sm-6 col-md-4-P">
                    <div class="card card-P">
                        <div class="image-P">

                            <div class="frame">
                                <span class="helper"></span><img id="prize6Image" src="http://jsfiddle.net/img/logo.png" />
                            </div>
                        </div>
                        <div class="name-P">
                            <h5 id="prize6Name" class="card-title card-title-P">Nombre</h5>
                        </div>
                        <div class="points-P">
                            <label id="prize6Points" class="card-points">0 puntos</label>
                        </div>
                    </div>
                    <a style="display:none;" href="#" class="ya btn btn-primary">CANJEA YA!</a>
                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul id="pagination" class="pagination">
                    <li id="parentPage0" class="page-item">
                        <a id='backward' class="page-link" style='display:none;' aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item">
                        <a id='forward' class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
        
    <div class="columnB">
                <span>SECCION

                    <Body></Body>
                </span>
    </div>
    </div>

</body>

</html>