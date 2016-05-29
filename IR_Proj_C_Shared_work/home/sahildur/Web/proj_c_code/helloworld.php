<html>
    <head>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://openlayers.org/en/v3.10.1/css/ol.css" type="text/css">
    <script src="http://openlayers.org/en/v3.10.1/build/ol.js"></script>
    <script src="http://sahildur.koding.io/jquery.tagcanvas.js"></script>
    <link rel="stylesheet" href="http://sahildur.koding.io/style.css" type="text/css">
    <title></title>
    <style>
    .result_row
    {
            background: lightseagreen;
    min-height: 100px;
        border-radius: 297px 0px 119px 0px;
            border-bottom: 10px solid white;
    }
    
    .row_a{
            color: black;
    padding-left: 2px;
    font-size: 30px;
    margin-right: 21px;
    }
    
    .row_b
    {
        color: white;
        }
     
     .row_c
     {   
           
    color: white;
    }
    .row_d
     {   
            float: right;
    color: white;
    }
    
    .got
    {
            background-image: url("http://darksidetoy.com/image/cache/data/Game%20of%20Thrones/Needle%20Sword%20of%20Arya%20Stark/F-700x700.jpg");
    top: 0px;
    right: 3px;
    background-color: red;
    height: 150px;
    width: 370px;
    position: absolute;
    /* float: right; */
    background-position: center;
    background-size: contain;
    }
    .top_search
    {
        
        color: white;
    /* background: red; */
    height: 150px;
        
            /* clear: both; */
    width: 100%;
   
    position: fixed;
    left: 0px;
    top: 0px;
    /* bottom: 60px; */
    z-index: 21;
    
    background-size: 100%;
    }
    
    .search_area
    {
        position:absolute;
            top: 51px;
            left: 215px;
    }
    
    #searchbox
    {color:black;
        border-color: black;
        padding-left:5px;
       width: 442px;
    }
    
    #search_button
    {color:black;
        width:80px
    }
    
    #myCanvasContainer
    {
            background: black;
    /* background: red; */
   
    height: 150px;
    }
    #map{
            width: 100%;
    height: 300px;
    }
    body
    {
        background-color:lightgrey;
    }
    .cola
    {
    
        margin-top: 150px;
        width:20%;
        float:left;
    }
    .colb
    {
        margin-top: 150px;
        border: 3px dashed #000;
        width:50%;
        float:left;
    }
    .colc
    {
        margin-top: 150px;
        border: 3px dashed #000;
        width:30%;
        float:right;
    }
    .facet_each_outer
    {
        background:white;
    }
    .facet_each_outer span
    {
        font-weight: bold;
    }
    
    #summary
    {
            font-weight: bold;
    }
    </style>
    </head>
    <body>
    <div class="top_search">

     <div class="search_area"><input type="text" name="fname" id="searchbox" placeholder="Search Here">
     <span id="search_button"><button type="button">Search</button></span>
     <br></div>
      <div id="myCanvasContainer">
      <canvas width="900" height="150" id="myCanvas">
        <p>Anything in here will be replaced on browsers that support the canvas element</p>
      </canvas>
    </div>
    <div class="got"></div>
    


    
    </div>
    <div class="cola">
    <div class="facet_html" id="facet_html"></div>
    </div>
    <div class="colb" style="background:white";>
    
     <div id="summary">
     </div>
    
        
    <div id="tagss">
    <!--
      <ul>
        <li><a href="http://www.google.com" target="_blank">Google</a></li>
        <li><a href="/fish">Fish</a></li>
        <li><a href="/chips">Peter</a></li>
        <li><a href="/salt">Salt</a></li>
        <li><a href="/vinegar">Vinegar</a></li>
      </ul>
    -->  
    </div>
    
     <div class="results">
     <?php 
  session_start();
    $_SESSION["strr"] = '[{"myname":"sahil"}]';
    
     ?>
    <!--
     <p>Results are here</p>
     <p>Results are here</p>
     <p>Results are here</p>
     <p>Results are here</p>
     <p>Results are here</p>
     <p>Results are here</p>
     <p>Results are here</p>
     <p>Results are here</p>
     -->
     </div>
    </div>
    
    <div class="colc">
<div class="container-fluid">

<div class="row-fluid">
  <div class="span12">
    <div id="map" class="map"></div>
  </div>
</div>

</div>
<div id="refresh_map">
<div class="second-map" id="second_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;"></div>
<div class="first-map" id="first_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; margin-top:"></div>
</div>


</div>
<div id="charts_proj">
<!--<div class="first-map" id="first_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; float:left;"></div>
<div class="second-map" id="second_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; float:right;"></div>
-->
    </div>
       <div id="charts_proj2">
<!--<div class="second-map" id="second_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>       -->

</div>
        <?php
            //echo "Hello World";
        ?>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://sahildur.koding.io/jquery.tagcanvas.js"></script>
    <script>
        $=jQuery; 
        var myParam = location.search.split('search_key=')[1]
        
        //var myParam = location.search
        // var captured = /myParam=([^&]+)/.exec()[1]; // Value is in [1] ('384' in our case)
        // console.log(captured);
         r_result = myParam ? myParam : '';
         $('#searchbox').val(r_result);
      $(document).ready(function() {
        var search = ["Burns","Simpson","Mann","Bouvier","Wiggum","Flanders","Quimby's","Muntz","Shelbyville","Sherri and Terri","Terwilliger","Szyslak"];


        $.get( "some_request.php", {} )
  .done(function( data ) {
  
  var jsonObj = $.parseJSON('[' + data + ']');

    var top_hashtags=jsonObj[0]['terms']['tweet_hashtags'];
   //some='<div id="tagss">';
   some='';
      some=some+'<ul>';
   
        // some=some+'<li><a href="http://www.google.com" target="_blank">Google</a></li>';
        // some=some+'<li><a href="/chips">Peter</a></li>';
        // some=some+'<li><a href="/salt">Salt</a></li>';
        // some=some+'<li><a href="/vinegar">Vinegar</a></li>';
   
   
    
        for(gh=0;gh<top_hashtags.length;gh=gh+2)
            {   
        some=some+'<li><a href="/helloworld.php?search_key='+top_hashtags[gh]+'">#'+top_hashtags[gh]+'</a></li>';
            }
        some=some+'</ul>';    
        //some=some+'</div>';
        
        //some=some+'<li><a href="http://www.google.com" target="_blank">Google</a></li>';
        //some=some+'<li><a href="/chips">Peter</a></li>';
        //some=some+'<li><a href="/salt">Salt</a></li>';
        //some=some+'<li><a href="/vinegar">Vinegar</a></li>';
   
  // console.log(some);
       $('#tagss').html(some);

 if(!$('#myCanvas').tagcanvas({
          textColour: '#ff0000',
          outlineColour: '#ff00ff',
          reverse: true,
          depth: 0.8,
          minSpeed:0.8,
          radiusY:1,
          centreImage:'http://i.telegraph.co.uk/multimedia/archive/03248/oathkeeper_3248610b.jpg',
          shape:"hring",
          stretchX:5.5,
          stretchY:.6,
          animTiming:"Smooth",
          initial:[0.3,-0.3],	
          maxSpeed: 0.05
        },'tagss',search)) {
          // something went wrong, hide the canvas container
          $('#myCanvasContainer').hide();
        }
  
  },"json");

       
      });
    </script>
    <script>
    $('#search_button').click(function(){
    
    var searchterm=document.getElementById('searchbox');
    var pass={};
    pass['add']='none';
    pass['fac_val']='none';
    pass['facet_head_key']='none';
    pass['search_term']=searchterm.value;
    on_search_result(pass);
    on_search_facet(pass);
    on_search_map(pass);
    
    
    //$('#refresh_map').html('<div class="second-map" id="second_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;"></div><div class="first-map" id="first_map_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; margin-top:"></div>');
    
    on_search_chart1(pass);
    on_search_chart2(pass);
    });
    
    $(document).on('click', '.facet_fq_click', function() { 
    
    console.log('on facet click');
     var inthis=$(this);
    var pass={};
    var searchterm=document.getElementById('searchbox');
    console.log(searchterm.value);
    
    pass['add']=inthis.prop('checked');
    
    var anyBoxesChecked = false;
    //unset($fac_checks);
    //console.log(pass);
    
    var facet_check = [];
    var facet_check_field = [];
    var i =0;
        $('#' + 'facet_html' + ' input[type="checkbox"]').each(function() {
        if ($(this).is(":checked")) {
            
            anyBoxesChecked = true;
            var pair_vals = {};
            console.log("sahil");
            console.log($(this).attr('fac_val'));
    
            facet_check[i]=$(this).attr('fac_val');
            facet_check_field[i]=$(this).attr('facet_head_key');
            
            console.log("Running Correctly");
            console.log(facet_check[i]);
            console.log(facet_check_field[i]);
            i++;
        }    
    });
 
    if (anyBoxesChecked == false) {
     console.log("no check selected");
     //pass null values
    } 
    
    console.log('check click');
    console.log(facet_check_field);
    
    pass['fac_val']= facet_check;
    pass['facet_field']= facet_check_field;
    pass['search_term']=searchterm.value;


    pass['facet_head_key']='none';

    
    //console.log(inthis[0].getAttribute('fac_val'));
    //console.log(inthis[0].getAttribute('facet_head_key'));
    on_search_result(pass);
    on_search_facet_again(pass);
    on_search_map(pass);
    on_search_chart1(pass);
    on_search_chart2(pass);

        
    });
    
    function on_search_facet(passed) {
    
      $.get( "test_request_rank_cross_ling.php", {status: passed['add'], fac_val:passed['fac_val'],facet_head_key:passed['facet_head_key'],search_term:passed['search_term']} )
  .done(function( data ) {
  
  
  
  
  var jsonObj = $.parseJSON('[' + data + ']');
  
  var res='';
  var iter=jsonObj[0]['facet_counts']['facet_fields'];
  var count=0;
  var html_fac='';
  for (key in iter)
  {
  
  html_fac=html_fac+'<div class="facet_head" facet_head_key="'+key+'">';
  html_fac=html_fac+'<span class="facet_head_heading" facet_head_key="'+key+'"><h4><b>'+key+'</b></h4></span>';
  html_fac=html_fac+'<div class="facet_each_outer" facet_head_key="'+key+'">';
  var facet_fields=iter[key]
  for(i=0;i< facet_fields.length;i=i+2)
  {
  if(i<9)
  {
  html_fac=html_fac+'<div>';
  html_fac=html_fac+'<input type="checkbox" class="facet_fq_click" fac_val="'+facet_fields[i]+'" facet_head_key="'+key+'">';
  html_fac=html_fac+'<span>'+facet_fields[i]+'('+facet_fields[i+1]+')</span>';
  
  html_fac=html_fac+'</div>';
  }
  
  }
  html_fac=html_fac+'</div>';
  html_fac=html_fac+'</div>';
  }
  
  $('.facet_html').html(html_fac);
  });
    
    
    }
    function on_search_facet_again(passed) {
    
       
    
      $.get( "test_request_rank_cross_ling.php", {status: passed['add'], fac_val:passed['fac_val'],facet_field:passed['facet_field'],search_term:passed['search_term']} )
  .done(function( data ) {
  
  
  
  
  //console.log(data);
  var jsonObj = $.parseJSON('[' + data + ']');
  
  var res='';
  console.log(jsonObj[0]['facet_counts']['facet_fields']);
  var iter=jsonObj[0]['facet_counts']['facet_fields'];
  console.log();
  var count=0;
  var html_fac='';
  for (key in iter)
  {
  
  
  console.log(iter[key]);
  html_fac=html_fac+'<div class="facet_head" facet_head_key="'+key+'" >';
  html_fac=html_fac+'<span class="facet_head_heading" facet_head_key="'+key+'"   ><h4><b>'+key+'</b></h4></span>';
  html_fac=html_fac+'<div class="facet_each_outer" facet_head_key="'+key+'" >';
  var facet_fields=iter[key]
  for(i=0;i< facet_fields.length;i=i+2)
  {
  //if(i>10)  return false;
  if(i<9)
  {
  html_fac=html_fac+'<div>';
  if(facet_fields[i+1]!=0)
  {
     html_fac=html_fac+'<input type="checkbox" class="facet_fq_click" fac_val="'+facet_fields[i]+'" facet_head_key="'+key+'">';
     html_fac=html_fac+'<span>'+facet_fields[i]+'('+facet_fields[i+1]+')</span>';
  }
  }
  
  console.log(facet_fields[i]);
  //console.log(facet_fields[i+1]);
  //html_fac=html_fac+'</div>';
  }
  html_fac=html_fac+'</div>';
  html_fac=html_fac+'</div>';
  }
  
  $('.facet_html').html(html_fac);
  });

          
      }

    
   
//     var json_sample={
// "type": "FeatureCollection",
// "features": [
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 56.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 56.466602 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 56.463702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 56.426702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 55.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 53.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -2.966700, 51.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -3.966700, 56.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -4.966700, 56.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -9.966700, 56.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -12.966700, 56.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -14.966700, 56.466702 ] } },
// { "type": "Feature", "properties": {"CITY_NAME": "Dundee"}, "geometry": { "type": "Point", "coordinates": [ -16.966700, 56.466702 ] } }
// ]
// }
// ;
  
    
    
    
    </script>
    <script>
    function on_search_result(passed) {
//     search='russian+intervention+syria'
//     var request =   {tagged: search,
//                 site: 'New York Times',
//                 order: 'decs',
//                 sort: 'creation'};

// var result = $.ajax({
//     //url: 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q=' + search + '&fq=source:("The New York Times")&page=0&sort=oldest&api-key=a1eeb62c8df499298c449983e6967154:3:69423736',
//     url: 'http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=russian+intervention+syria&fl=abstract&page=1&api-key=sample-key',
//     type: 'GET',
//     dataType: 'json',
//     data: search,
// })
// .done(function(result) {
//     console.log("success");
//     console.log(result.response);
//     console.log(result.response.docs[0]['abstract']);
//     summary=result.response.docs[0]['abstract'];
//     ht='<p>'+summary+'</p>';
//     $('#summary').html(ht);
    
// }).fail(function() {
//     console.log("error");
//     $('.results').html('This feature is not working. :-(');
// });
    
    
    
    
    
    console.log('on search result');
    console.log(passed);
    console.log(passed['add']);
    console.log(passed['fac_val']);
    console.log(passed['facet_field']);
    // var passed_json=JSON.stringify(passed)
    // var temp='{ "add": "Sahil", "time": "2pm" }';
    
//     $.get( "some_request.php", { status: passed['add'], fac_val:passed['fac_val'],facet_head_key:passed['facet_head_key'],search_term:passed['search_term']} )
//   .done(function( data ) {
//   },"json");
    //test_request_before_cross_ling
    $.get( "test_request_rank_cross_ling.php", { status: passed['add'], fac_val:passed['fac_val'],facet_field:passed['facet_field'],search_term:passed['search_term']} )
 
    //.done(function(data){console.log(data);});
 
 .done(function( data ) {
  
  //$('#first_map_container').html('');
  //on_search_chart1(passed);
  
      console.log('pappu2');
    console.log(passed['search_term']);
    console.log(data);
  var jsonObj = $.parseJSON('[' + data + ']');
  var res='';
  
  var iter=jsonObj[0]['response']['docs']
  var count=0;
  var summary=[];
  var search_summary='';
  for (key in jsonObj[0]['response']['docs'])
  {
   // console.log(iter[key]);
  
  if(count<3)
  {
  for (k in iter[key]['tweet_hashtags'])
  {
  new_word=iter[key]['tweet_hashtags'][k]
  var found = jQuery.inArray(new_word, summary);
if (found >= 0) {
    // Element was found, remove it.
    //filters.splice(found, 1);
} else {
    // Element was not found, add it.

    if(summary.length<3)
    {
    summary.push(new_word);
    search_summary=search_summary+' ';;
    }
}
  }
  }
  count++;


lang=iter[key]['lang'];
  var content=iter[key]['text_'+lang];
  
  
  
  
  var user_followers=iter[key]['user_followers'][0];
  var created_at=iter[key]['created_at'];
  
      res=res+'<div class="result_row">';
      res=res+'<span class="row_a">'+count;
      res=res+'</span>';
      res=res+'<span class="row_b">'+content+'</span>';
      res=res+'<div class="details_row">';
      res=res+'<span class="row_c">Followers: '+user_followers+'</span>';
      res=res+'<span class="row_d">Date:'+created_at+'</span>';
      res=res+'</div>';
      res=res+'</div>';
  }
  //$('#myCanvasContainer').hide(); 
  //search=search_summary;
  
  actual_query=    passed['search_term'];
  var split=actual_query.split(" ");
  split=split.concat(summary);
  
  search=split.join(' OR ');
  console.log('joined');
  console.log(search);
  //summary
  
  //search="Game of thrones Syria intervention in Syria";
  var search = search.replace(/[\s]+/g, "%20");
  console.log('bbbb');
  console.log(search);
  //console.log(abc);
  
  //search='russian+intervention+syria'
    var request =   {tagged: search,
                site: 'New York Times',
                order: 'decs',
                sort: 'creation'};

var result = $.ajax({
    //url: 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q=' + search + '&fq=source:("The New York Times")&page=0&sort=oldest&api-key=a1eeb62c8df499298c449983e6967154:3:69423736',
//    url: 'http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q='+search+'&fl=abstract,snippet,multimedia&page=1&api-key=sample-key',
    url:'http://api.nytimes.com/svc/search/v2/articlesearch.json?q='+search+'&api-key=sample-key',
    
    type: 'GET',
    dataType: 'json',
    data: search,
})
.done(function(result) {
    console.log("success");
    console.log(result.response);
    //console.log(result.response.docs[0]['abstract']);
    var kkey=0;
    var images_array=[]
  for(i=0;i<result.response.docs.length;i++)
  {
  console.log("i");
  console.log(i);
 if(result.response.docs[i]['snippet']!=null)
      {
  console.log('hereund');    
  console.log(result.response.docs[i]['snippet']);
      var multimedia=result.response.docs[i]['multimedia'];
      for (p=0;p<multimedia.length;p++)
      {
      images_array[p]='http://www.nytimes.com/'+multimedia[p]['url'];
      }
      console.log('kkey');
      console.log(kkey);
          kkey=i;
          summary=result.response.docs[kkey]['snippet'];
          ht='';
          ht=ht+'<p>'+summary+'</p>';
    $('#summary').html(ht);
          break;
      }
      
  }
    // if (result.response.docs[kkey]['abstract']!=undefined)
    // {
    // summary=result.response.docs[kkey]['abstract'];
    // }
    //ht='';
    // ht='<div>';
    // for(kq=0;kq<images_array.length;kq++)
    // {
        
    // ht=ht+'<img src="'+images_array[kq]+'">';    
    // }
    // ht=ht+'</div>';
    //ht=ht+'<p>'+summary+'</p>';
    //$('#summary').html(ht);
    
}).fail(function() {
    console.log("error");
    $('.results').html('This feature is not working. :-(');
});
    
  
  
  ///
  res = res + '<div class="pagination">  </div>';
  $.getScript( "http://sahildur.koding.io/jquery.js", function() {
  console.log( "jquery was performed." );
});



$.getScript( "http://sahildur.koding.io/paginate.js", function() {
  console.log( "pagination was performed." );
});


$.getScript( "http://sahildur.koding.io/custom.js", function() {
  console.log( "custom was performed." );
});
  
  $(".results").html(res);},"json"); 
 
 
 
 
  }
   function on_search_map(passed) {
   
   
   $('#map').html('');
    //session_start();
    //$_SESSION["query"]=passed['search_term'];
    var query_map=passed['search_term'];
    
    
    
    var vector = new ol.layer.Heatmap({
  source: new ol.source.Vector({
    url: '/map.php?search='+query_map,
    format: new ol.format.GeoJSON({
      extractStyles: false
    })
  }),
  blur: 5,
  radius: 4
});
    var raster = new ol.layer.Tile({
  source: new ol.source.Stamen({
    layer: 'toner'
  })
});

    var map = new ol.Map({
        controls: ol.control.defaults().extend([
    new ol.control.FullScreen(true)
  ]),
  
  layers: [raster, vector],
  target: 'map',
  view: new ol.View({
    center: ol.proj.transform([ -78.78958,42.99900], 'EPSG:4326', 'EPSG:3857'),
                    zoom: 1
  })
});
console.log('suri');
    }
    
  
    </script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
<script>

<?php
     //


?>
//$( document ).ready(function() {

function on_search_chart1(passed) {

var variable2='';
   $.get( "map_issue.php", {status: passed['add'], fac_val:passed['fac_val'],facet_head_key:passed['facet_head_key'],search_term:passed['search_term']} )
  .done(function( data ) {

  
  
  var variable2=JSON.parse(data);
  
  $(function () {
    $('#first_map_container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Language distribution'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Distribution %',
            colorByPoint: true,
            data: ( variable2 )
        }]

    });
});

  
  
  
  
  });

$=jQuery;

json_p='';

// $(function () {
//     $('#first_map_container').highcharts({
//         chart: {
//             plotBackgroundColor: null,
//             plotBorderWidth: null,
//             plotShadow: false,
//             type: 'pie'
//         },
//         title: {
//             text: 'Language distribution'
//         },
//         tooltip: {
//             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//         },
//         plotOptions: {
//             pie: {
//                 allowPointSelect: true,
//                 cursor: 'pointer',
//                 dataLabels: {
//                     enabled: true,
//                     format: '<b>{point.name}</b>: {point.percentage:.1f} %',
//                     style: {
//                         color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
//                     }
//                 }
//             }
//         },
//         series: [{
//             name: 'Brands',
//             colorByPoint: true,
//             data: ( variable2 )
//         }]

//     });
// });
console.log('charts1_end');
}

function on_search_chart2(passed) {
console.log('charts2_start');

var variable2='';
   $.get( "map_issue_lang.php", {status: passed['add'], fac_val:passed['fac_val'],facet_head_key:passed['facet_head_key'],search_term:passed['search_term']} )
  .done(function( data ) {

  console.log('map_issue2');
  console.log(data);
  
  var variable2=JSON.parse(data);
  
  $(function () {
    $('#second_map_container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'bar'
        },
        title: {
            text: 'Hashtag distribution'
        },
        tooltip: {
            pointFormat: ''//{series.name}: <b>{point.percentage:.1f}%</b>
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            //name: 'Distribution %',
            colorByPoint: true,
            data: ( variable2 )
        }]

    });
});

  
  
  
  
  });

$=jQuery;

json_p='';

// $(function () {
//     $('#first_map_container').highcharts({
//         chart: {
//             plotBackgroundColor: null,
//             plotBorderWidth: null,
//             plotShadow: false,
//             type: 'pie'
//         },
//         title: {
//             text: 'Language distribution'
//         },
//         tooltip: {
//             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//         },
//         plotOptions: {
//             pie: {
//                 allowPointSelect: true,
//                 cursor: 'pointer',
//                 dataLabels: {
//                     enabled: true,
//                     format: '<b>{point.name}</b>: {point.percentage:.1f} %',
//                     style: {
//                         color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
//                     }
//                 }
//             }
//         },
//         series: [{
//             name: 'Brands',
//             colorByPoint: true,
//             data: ( variable2 )
//         }]

//     });
// });

}

//});
</script>    
    
    
    <?php 
    
    ?>
</html>