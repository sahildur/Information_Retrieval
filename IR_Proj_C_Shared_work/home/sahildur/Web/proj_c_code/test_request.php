
<?php
//<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//echo 'test here1';
    
    
    if($_GET['status']=='none')
    {
//echo 'test here2';        
session_start();
    
    $_SESSION["query_search"]=$_GET['search_term'];
    //$_GET['search_term']=rawurlencode ( $_GET['search_term'] ); 
    //$GLOBALS['A'] = $_GET['search_term'];
    $q=$_GET['search_term'];//=rawurlencode ( $_GET['search_term'] ); 
    //$q='Syria';
    $output = array();
    exec("python projc_qe.py "."\"".$q."\"", $output);
    //var_dump($output);
    $st=$output[0];
//echo 'test here3';            
    //echo $st;
//$json_url = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=russian+intervention+syria&fl=abstract&page=1&api-key=sample-key";        
//$json = file_get_contents($json_url);
  
 //   $results = json_decode($json)->body;  
  
//echo $results;
//&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags
//echo $_GET['search_term'];
     $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$st."&wt=json&indent=true&rows=1000&sort=score%20desc";        
     $json = file_get_contents($json_url);
//echo 'test here4';                 
     echo $json;
//    echo 'suramrit says'.$json_url;
        
    }
    elseif($_GET['status']==true & isset($_GET['fac_val']))
    {
    
    $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?fq=Country:".$_GET['fac_val']."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$st."&wt=json&indent=true&rows=1000&sort=score%20desc";                
   $json = file_get_contents($json_url);
    echo $json;
    }
    elseif($_GET['status']==false)  {
    $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$st."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";        
    $json = file_get_contents($json_url);
    echo $json;
    }
    else{
        $json_url ="";
        $json = file_get_contents($json_url);
    echo $json;
    }
    
    //print_r($_GET['add'],1);
    $lines = explode(PHP_EOL, $json);
    
  //  $array = array();
//    $json_to_arr=json_decode($json);
    //echo '<pre>',print_r($json_to_arr,1),'</pre>';
 //   foreach ($json_to_arr->response->docs as $line) {
    //echo $line->text_en.'</br></br>';
    
   //            $array[] = $line->text_en;
//    }


//echo $str;

//echo json_encode( array( "name"=>$name,"time"=>$time ) ); 
//echo json_encode( array( "name"=>"Mary","time"=>"10pm" ) ); 

?>