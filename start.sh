#! /bin/bash

RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

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
    -b|--branch)
    BRANCH="$2"
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
branch=$BRANCH

if [ -d "$DIR" ]
then
    printf ${RED}
	echo "Directory/extension '$DIR' exists already!"
	printf ${NC}
else
    if [ -z ${VENDOR} ];
    then
        printf ${RED}
        echo "Please enter Vendor Name (first character uppercase): "
        printf ${NC}
        while [[ $VENDOR = "" ]]; do
            read VENDOR
        done
        vendor=`echo ${VENDOR:0:1} | tr  '[a-z]' '[A-Z]'`${VENDOR:1}
    fi

    if [ -z ${PACKAGE} ];
    then
        printf ${RED}
        echo "Please enter Package Name (first character uppercase): "
        printf ${NC}
        while [[ $PACKAGE = "" ]]; do
            read PACKAGE
        done
        package=`echo ${PACKAGE:0:1} | tr  '[a-z]' '[A-Z]'`${PACKAGE:1}
    fi

    if [ -z ${BRANCH} ];
    then
        printf ${RED}
        echo "Please enter Branch to start from: "
        printf ${NC}
        while [[ $BRANCH = "" ]]; do
            read BRANCH
        done
        branch=$BRANCH
    fi

    printf ${GREEN}
    echo
    echo "Your Extension will be placed in:     $DIR"
    echo "Your Vendor will be:                  $vendor"
    echo "Your Package Name will be:            $package"
    echo "You start from Branch:                $branch"
    echo
    printf ${NC}

    echo ${DIR}
	git clone https://github.com/Startpiloten/startpilot.git $DIR --depth=1
	echo "change origin"
    cd $DIR
	git pull origin feature/$branch
	echo "$DIR created."
	rm -rf .git && grep -rl "startpilot" ./* -R | xargs sed -i '' "s/startpilot/${PWD##*/}/g" && grep -rl "Startpilot" ./* -R | xargs sed -i '' "s/Startpilot/${PWD##*/}/"
	grep -rl "Vendor" ./* -R | xargs sed -i '' "s/Vendor/${vendor##*/}/g"
	grep -rl "Yourext" ./* -R | xargs sed -i '' "s/Yourext/${package##*/}/g"
	pwd
	cd Resources/Build/ && npm install && gulp
	echo "Your extension is now in $DIR."
fi