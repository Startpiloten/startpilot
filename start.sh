#! /bin/bash

while [[ $# -gt 1 ]]
do
key="$1"

case $key in
    -e|--extname)
    EXTNAME="$2"
    shift # past argument
    ;;
    -v|--vendor)
    VENDOR="$2"
    shift # past argument
    ;;
    -p|--package)
    PACKAGE="$2"
    shift # past argument
    ;;
    *)
          # unknown option
    ;;
esac
shift # past argument or value
done

path=($(find . -name "typo3conf")/ext)
DIR=${path}/$EXTNAME

vendor=`echo ${VENDOR:0:1} | tr  '[a-z]' '[A-Z]'`${VENDOR:1}
package=`echo ${PACKAGE:0:1} | tr  '[a-z]' '[A-Z]'`${PACKAGE:1}

echo "Directory: $DIR"
echo "Vendor: $vendor"
echo "Package: $PACKAGE_upper"

if [ -d "$DIR" ]
then
	echo "Directory/extension '$DIR' exists already!"
else
    if [ -z ${vendor} ];
    then
        echo "Please enter Vendor Name (first character uppercase): "
        read VENDOR
        vendor=`echo ${VENDOR:0:1} | tr  '[a-z]' '[A-Z]'`${VENDOR:1}
    fi
    echo "Your Vendor will be: $vendor"
    echo
    if [ -z ${package} ];
    then
        echo "Please enter Package Name (first character uppercase): "
        read PACKAGE
        package=`echo ${PACKAGE:0:1} | tr  '[a-z]' '[A-Z]'`${PACKAGE:1}
    fi
    echo "Your Package will be: $package"
    echo
    echo ${DIR}
	git clone https://github.com/misterboe/startpilot.git $DIR --depth=1
	echo "$DIR created."
	cd $DIR && rm -rf .git && grep -rl "startpilot" ./* -R | xargs sed -i '' "s/startpilot/${PWD##*/}/g" && grep -rl "Startpilot" ./* -R | xargs sed -i '' "s/Startpilot/${PWD##*/}/"
	grep -rl "Vendor" ./* -R | xargs sed -i '' "s/Vendor/${vendor##*/}/g"
	grep -rl "Yourext" ./* -R | xargs sed -i '' "s/Yourext/${package##*/}/g"
	pwd
	cd Resources/Gulp/ && bower install && npm install && gulp default
	echo "Your extension is now in $DIR."
fi