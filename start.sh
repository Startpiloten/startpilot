#! /bin/bash

DIR="$1"

if [ $# -ne 1 ]
then
	echo "Usage: $0 {new extension key}"
	exit 1
fi

if [ -d "$DIR" ]
then
	echo "Directory/extension '$DIR' exists already!"
else
    echo "Please enter Vendor Name (first character uppercase): "
    read vendor
    echo "Your Vendor will be: $vendor"
    echo
    echo "Please enter Package Name (first character uppercase): "
    read package
    echo "Your Package will be: $package"
    echo
	git clone https://github.com/misterboe/startpilot.git $DIR --depth=1
	echo "$DIR created."
	cd $DIR && rm -rf .git && grep -rl "startpilot" ./* -R | xargs sed -i '' "s/startpilot/${PWD##*/}/g" && grep -rl "Startpilot" ./* -R | xargs sed -i '' "s/Startpilot/${PWD##*/}/"
	grep -rl "Vendor" ./* -R | xargs sed -i '' "s/Vendor/${vendor##*/}/g"
	grep -rl "Yourext" ./* -R | xargs sed -i '' "s/Yourext/${package##*/}/g"
	pwd
	cd Resources/Gulp/ && bower install && npm install && gulp default
	echo "Your extension is now in $DIR."
fi