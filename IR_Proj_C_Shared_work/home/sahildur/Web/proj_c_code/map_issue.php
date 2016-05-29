<?php 
            
            

  $q=$_GET['search_term'];//=rawurlencode ( $_GET['search_term'] ); 
    //$q='Syria';
    $output = array();
    exec("python projc_qe.py "."\"".$q."\"", $output);
    //var_dump($output);
    $st=$output[0];  
    //echo $st;
                //$search='Russia';
                
                //$search=$_GET['search_term'];
                //$search=$GLOBALS['A'];
               // $search="Syria";
                //$search=rawurlencode ( $search ); 
               
                $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?&facet=on&facet.field=lang&q=".$st."&fl=retweet_count%2Ccreated_at%2Cid%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";        
     $json = file_get_contents($json_url);
    $decoded=json_decode($json);
    $currrent=$decoded->facet_counts->facet_fields->lang;
    
      $outer=array();
        
        //   $inner=array();
        //   $inner['name']='ennnnnn';
        //   $inner['y']=48;
        //   $outer[]=$inner;
        //     $inner=array();
        //   $inner['name']='mmmmennnnnn';
        //   $inner['y']=489;
        
          $outer[]=$inner;
        
        $curr_size=sizeof($currrent);
        
    for ($i=0;$i<$curr_size;$i++)
    {
          $inner=array();
          $inner['name']=$currrent[$i];
          $inner['y']=$currrent[$i+1];
     
          $i++;
          $outer[]=$inner;
    }
          $ll=json_encode($outer);
          echo $ll;
            

?>