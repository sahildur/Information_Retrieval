<?php 
    
    $q=$_GET['search_term'];//=rawurlencode ( $_GET['search_term'] ); 
    //$q='Syria';
    $output = array();
    exec("python projc_qe.py "."\"".$q."\"", $output);
    //var_dump($output);
    $st=$output[0];     
      
    if($_GET['status']=='none')
    {
     $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?&facet=on&facet.field=tweet_hashtags&q=".$st."&fl=retweet_count%2Ccreated_at%2Cid%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";        
     $json = file_get_contents($json_url);
    $decoded=json_decode($json);
    $currrent=$decoded->facet_counts->facet_fields->tweet_hashtags;
    
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
        
    //for ($i=0;$i<$curr_size;$i++)
    for ($i=0;$i<20;$i++)
    {
          $inner=array();
          $inner['name']=$currrent[$i];
          $inner['y']=$currrent[$i+1];
     
          $i++;
          $outer[]=$inner;
    }
          $ll=json_encode($outer);
          echo $ll;
  
    }
    else{
     //echo "sahil is here";   
        //echo $_GET['facet_field'];
        
        $field_particular = array();
        $field_particular_val = array();
        $i=0;
        foreach($_GET['facet_field'] as $field)
        {
            $field_particular[$field] = 'fq='.$field.':';
        }
        foreach($_GET['fac_val'] as $val)
        {
            
        $field_particular_val[$_GET['facet_field'][$i]] = $field_particular_val[$_GET['facet_field'][$i]].'%20'.$val;
            
        //"http://suramrit.koding.io:8983/solr/VSM/select?fq=Country:Iraq%20Syria&fq=City:LONDON&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=syria&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc"
            
        // echo 'label:'.$val.'field:'.$_GET['facet_field'][$i];
        $i = $i+1;
        }
        $i=0;
        foreach( $field_particular_val as $labels )
        {
            $field_particular[$_GET['facet_field'][$i]] = $field_particular[$_GET['facet_field'][$i]].$labels;
        $i = $i+1;
            }
        foreach( $field_particular as $facet_terms )
        {
            $facet_terms_2=$facet_terms_2.'&'.$facet_terms;
        }
        //echo $facet_terms_2;
        //$json_url = "http://sahildur.koding.io:8983/solr/VSM/select?".$facet_terms_2."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$_GET['search_term']."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";
        // echo 'sahil is not here';
        // echo $facet_terms_2;
        // echo 'sahil is';
        $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?".$facet_terms_2."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=text_en:\"".$_GET['search_term']."\"&wt=json&indent=true&rows=1000&sort=score%20desc";        
        $json = file_get_contents($json_url);
        echo $json;
        
    }
    
    //chnged from here---- suramrit
    
    /*elseif($_GET['status']==true & isset($_GET['fac_val']))
    {
        
    $json_url = "http://suramrit.koding.io:8983/solr/VSM/select?fq=Country:".$_GET['fac_val']."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$_GET['search_term']."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";                
   $json = file_get_contents($json_url);
    echo $json;
    }
    elseif($_GET['status']==false)  {
    $json_url = "http://suramrit.koding.io:8983/solr/VSM/select?facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$_GET['search_term']."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";        
    $json = file_get_contents($json_url);
    echo $json;
    }
    else{
        $json_url ="";
        $json = file_get_contents($json_url);
    echo $json;
    }*/
    
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