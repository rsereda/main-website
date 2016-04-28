#!/usr//bin/python

## author: adam@kiron.ngo

### usage #################################
### export CSV of donors from drive (maintained by Johannes)
### put that into this folder.
### ../list_sponsor.py filename.csv/ > ../themes/kiron/partials/sponsors.htm
### that should automatically update the snippet. Check at:
### https://main-website.app/support/supporters
#####################################

import sys

fi_name = sys.argv[1]
fi = open(fi_name)

i=0
print """
description = "Our Sponsors"

[viewBag]
snippetCode = "sponsors"
snippetName = "sponsors"
==
<div class="row">"""
for line in fi:
    cp = line.find(',')
    line = line[0:cp]
    line = line.replace("\"", "")
    i+=1
    print """<div class= "col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1">
                <p> %s </p>
            </div>
            """ % line

    if not (i % 2):
        print """
        </div>
        <div class="row">"""

print """</div>"""
