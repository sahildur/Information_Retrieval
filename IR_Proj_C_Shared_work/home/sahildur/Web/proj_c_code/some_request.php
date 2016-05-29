<?php
     $search='Syria';
     $json_url = "http://sahildur.koding.io:8983/solr/VSM/terms?wt=json&indent=true&debugQuery=true&terms.fl=tweet_hashtags&terms.sort=count";        
     $json = file_get_contents($json_url);
        
     echo $json;
  //  $decoded=json_decode($json);
    //print_r('<pre>');
    
//    print_r($decoded->response->docs[0]->score);
//print_r('</pre>');
?>