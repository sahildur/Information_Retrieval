from __future__ import print_function
from alchemyapi import AlchemyAPI
import json
import time
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import os
import json


with open("NewFrench.json") as json_file:
    json_data = json.load(json_file)
    for single_tweet in json_data:
        print(single_tweet['created_at'])

    #demo_text = 'Yesterday dumb Bob destroye#d my fancy iPhone in beautiful Denver, Colorado. I guess I will have to head over to the Apple Store and buy a new one.'
        demo_text=single_tweet['text_fr']
        alchemyapi = AlchemyAPI()
    
    
    #print('Processing text: ', demo_text)
    #print('')
    
        response = alchemyapi.entities('text', demo_text, {'sentiment': 1})
        
        if response['status'] == 'OK':
            #print('## Response Object ##')
            #print(json.dumps(response, indent=4))
        
    #        print('')
     #       print('## Entities ##')
            list_of_type=['Country','TwitterHandle','Person','City','Hashtag',
                            'Organization','Quantity' , 'Company','Continent', 'Crime' ,'Drug'
                              'Geographic' , 'Holiday' ,  'JobTitle' , 'NaturalDisaster'  ,'Region'
                             ,'Technology' ]
            

            single_tweet['Country']=[]
            single_tweet['Company']=[]
            single_tweet['Continent']=[]
            single_tweet['Crime']=[]
            single_tweet['Drug']=[]
            single_tweet['Geographic']=[]
            single_tweet['Holiday']=[]
            single_tweet['JobTitle']=[]
            single_tweet['NaturalDisaster']=[]
            single_tweet['Region']=[]
            single_tweet['Technology']=[]


            single_tweet['Hashtag']=[] 
            single_tweet['TwitterHandle']=[]
            single_tweet['Person']=[]
            single_tweet['City']=[]
            single_tweet['Organization']=[]
            single_tweet['Quantity']=[]
            
            
            
            for entity in response['entities']:
#                if single_tweet.has_key(str(entity['type'])):
#                    do_nothing=2
#                else:
#                    single_tweet[str(entity['type'])]=[]
                try:
                    if str(entity['type']) in list_of_type:
                     #   print ('in_list')
                        #print(str(entity['type']))
                        #print(str(entity['text']))
                        
                        single_tweet[str(entity['type'])].append(str(entity['text']))
                    else:
                        print(entity['type']) 
                except Exception:
                    pass
                    #print('text: ', entity['text'].encode('utf-8'))
                #print('type: ', entity['type'])
            #    print('relevance: ', entity['relevance'])
            #    print('sentiment: ', entity['sentiment']['type'])
            #    if 'score' in entity['sentiment']:
            #        print('sentiment score: ' + entity['sentiment']['score'])
            #    print('')
        else:
            print('Error in entity extraction call: ', response['statusInfo'])
            
    
    
    
    
        #single_tweet['city']=[]
        #single_tweet['city'].append('nycity')    
        saveFile  =open('changed_new_french.json','a')
        json_string = json.dumps(single_tweet,ensure_ascii=False, indent = 4, sort_keys = True).encode('utf8')
        saveFile  =open('changed_new_french.json','a')
        saveFile.write(',\n')
        saveFile.write(json_string)
        saveFile.write('\n')
        saveFile.close()
        
    # saveFile  =open('sample_tweet.json','a')
    
    # saveFile.write(data)
    
    # saveFile.write('\n')
    # saveFile.close()
            
    # load_json = json.loads(saveFile)
    
    # print 
            
    # created_at = load_json['created_at']
            
    # tweet_id = str(load_json['id'])
    # text = load_json['text']
    # lang = load_json['lang']
    # hashtags = []
    # for i in load_json['entities']['hashtags']:
    #     hashtags.append(i['text'])
    #     urls = []
    # for j in load_json['entities']['urls']:
    #     urls.append(j['url'])
        
    # temp = {}
    # temp['created_at'] = time.strftime('%Y-%m-%dT%H:%M:%SZ', time.strptime(created_at,'%a %b %d %H:%M:%S +0000 %Y'))
    # temp['id'] = tweet_id
    # temp['text_en'] = text
    # temp['text'] = text
    # temp['lang'] = lang
    # temp['tweet_hashtags'] = hashtags
    # temp['tweet_urls'] = urls
            
    # json_string = json.dumps(temp,ensure_ascii=False, indent = 4, sort_keys = True).encode('utf8')
    
    # saveFile  =open('tweets_en.json','a')
    # saveFile.write(',\n')
    # saveFile.write(json_string)
    # saveFile.write('\n')
    # saveFile.close()
            
    
    
    
    
