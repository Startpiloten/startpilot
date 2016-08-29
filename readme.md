# Startpilot - Typo3 provider extension with some basics


## How to use:

You can use the `start.sh` script to clone `startpilot` as extension with any name. Just use this code in your webroot.

```
curl https://raw.githubusercontent.com/misterboe/startpilot/master/start.sh > start.sh && sh start.sh ./web/typo3conf/ext/myext
```
This script is tested on MAC OSX. This script needs bower to load boostrap and jquery. 

#### Thanks

* To Benjamin Kott and his Bootstrap Package 
	*  https://github.com/benjaminkott/bootstrap_package
* To Georg Ringer for the start.sh script
    * https://github.com/georgringer/modernpackage
