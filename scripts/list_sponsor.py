#!/usr//bin/python

import sys

fi_name = sys.argv[1]
fi = open(fi_name)

i=0
print """<div class="row">"""
for line in fi:
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
