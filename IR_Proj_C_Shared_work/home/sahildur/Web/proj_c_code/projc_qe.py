# -*- coding: utf-8 -*-
import json
import math
import sys
import urllib2

from microsofttranslator import Translator
translator = Translator('singhpri1603', 'iX3WnUfyhNHoq1+JTr1sttiA+gd+XUc0fTRxrJaH67Q=')
s=sys.argv[1];

#s="US intervention in Syria";
"""
if isinstance(s, str):
    print "ordinary string"
    elif isinstance(s, unicode):
        print "unicode string"
        else:
            print "not a string"
"""

query=[]
query.append(translator.translate(s, "en").encode('utf-8'))  #en
query.append(translator.translate(s, "de").encode('utf-8'))  #de
query.append(translator.translate(s, "ru").encode('utf-8'))  #ru
query.append(translator.translate(s, "fr").encode('utf-8'))  #fr
"""
query=[]
query.append("US intervention in Syria");  #en
query.append("US-Intervention in Syrien");  #de
query.append("Вмешательство США в Сирии");  #ru
query.append("Intervention des États-Unis en Syrie");  #fr
"""

#print query

flds=[]
flds.append("text_en")
flds.append("text_de")
flds.append("text_ru")
flds.append("text_fr")
flds.append("tweet_hashtags")
flds.append("tweet_urls")
flds.append("AlcEnt")
"""
flds.append("Country")
flds.append("City")
flds.append("Company")
flds.append("Continent")
flds.append("GeographicFeature")
flds.append("Holiday")
flds.append("JobTitle")
flds.append("NaturalDisaster")
flds.append("Crime")
flds.append("Organization")
flds.append("Person")
flds.append("Product")
flds.append("Region")
flds.append("Technology")
flds.append("Quantity")
flds.append("Hashtag")
flds.append("TwitterHandle")
"""
qrsp=[]
qr=[]
for lan in range(0,4):
    q=query[lan].split()
    le=len(q)
    slop=0
    if(le>1):
        slop=math.floor(le/2);
    else:
        slop=0;
    if(slop>5):
        slop=5;
    slop=int(slop)
    t_qr=''
    for ind in range(0,le):
        q[ind]=q[ind].replace(":","\:")
        t_qr=t_qr+urllib2.quote(q[ind])+"%20"
    qrsp.append("\""+urllib2.quote(query[lan])+"\"%7E"+str(slop)+"%5E4")   #sloppy phrase boost=4
    qr.append("("+t_qr[:len(t_qr)-3]+")")


#print qrsp[0]
#print qr[0]


fn=len(flds)
stri=flds[0]+'%3A'+qrsp[0]
for j in range(1,4):
    stri=stri+'%20OR%20'+flds[j]+'%3A'+qrsp[j]

for j in range(4,fn):
    for p in range(0,4):
        stri=stri+'%20OR%20'+flds[j]+'%3A'+qrsp[p]

stri=stri+flds[0]+'%3A'+qr[0]
for j in range(1,4):
    stri=stri+'%20OR%20'+flds[j]+'%3A'+qr[j]+"%5E3"

for j in range(4,fn):
    for p in range(0,4):
        stri=stri+'%20OR%20'+flds[j]+'%3A'+qr[p]+"%5E3"

print stri
"""
rank=-10;
#print "text_en:opposition"
#inurl = 'http://jughead90.koding.io:8983/solr/VSM/select?q='+stri+'&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc';        
#print inurl
inurl = 'http://sahildur.koding.io:8983/solr/VSM/select?q='+stri+'&fl=id%2Cscore&wt=json&indent=true&rows=1000'
print inurl
data = urllib2.urlopen(inurl)
docs = json.load(data)['response']['docs']
for doc in docs:
    rank += 1
print rank;
"""