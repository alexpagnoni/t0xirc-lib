#!/bin/bash

WHERE=`pwd`

if [ -a .encoded ]; then
  TGZ_NAME="t0xirc-lib-enc-1.0.1-1.tgz"
  DIR_NAME="t0xirc-lib-enc"
else
  TGZ_NAME="t0xirc-lib-1.0.1-1.tgz"
  DIR_NAME="t0xirc-lib"
fi

cd ..
tar -cvz --exclude=OLD --exclude=work --exclude=*~ --exclude=CVS --exclude=.?* --exclude=np --exclude=.cvsignore -f $TGZ_NAME $DIR_NAME
cd $WHERE
