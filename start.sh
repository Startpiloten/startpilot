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
	git clone https://github.com/misterboe/startpilot.git $DIR --depth=1
	echo "$DIR created."
	cd $DIR && rm -rf .git && grep -rl "startpilot" ./* -R | xargs sed -i '' "s/startpilot/${PWD##*/}/g" && grep -rl "Startpilot" ./* -R | xargs sed -i '' "s/Startpilot/${PWD##*/}/"
	cd Resources/Public/ && bower install
	echo "Your extension is now in $DIR."
fi