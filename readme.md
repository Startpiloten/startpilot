
# Startpilot – a basic TYPO3 provider extension 

This documentation is written for version 1.0.4 of startpilot.



## What it does:

Startpilot is a TYPO3 extension providing you with a place to configure TYPO3. After setting up `startpilot` you will namely end up adding customized content elements or more general configuration to it. This provider extension contains a very lean configuration reducing configuration overrides.

Your `startpilot` extension comes with  a [CLI tool](https://github.com/Startpiloten/ce-gen) which lets you generate customizable content elements to your startpilot extension. If you want to know more about this stuff check out the documentation over at [startpiloten/ce-gen](https://github.com/Startpiloten/ce-gen).

If you need to work on the frontend side of things we got you covered. You might want to try the gulp workflow startpilot provides you with. In short it does watch and compile your .scss and .js files and also saves you some loading time by optimizing images.



## What you need:

System requirements:

- node 10
- npm 5.3.0+ | 6.0.1+
- TYPO3 9 LTS (PHP 7.2)

In order to get your `startpilot` extension running you need TYPO3 to be running. If you wonder how to get started with TYPO3 you can checkout the [official installation guide](https://docs.typo3.org/typo3cms/InstallationGuide/). 



## Getting started (unix):



### Download with curl

You can use the following command to clone `startpilot`. Simply open the CLI of your choice and paste the command down below. By editing the `--extname startpilot` parameter to `--extname mycustomproviderext`  your provider extension gets put in a directory called `mycustomproviderext`.

```shell
curl https://raw.githubusercontent.com/Startpiloten/startpilot/master/start.sh > start.sh && sh start.sh --extname startpilot --branch master --vendor Startpiloten --package Startpilot
```

Keep in mind, that we unfortunately This command will put your extension in the `packages` directory in your project root. 



### Install with composer

Next to install it via composer we have to add this package to the composer.json file in our project root:

 ```json "repositories": [
  "repositories": [
    {
      "type": "path",
      "url": "packages/*/"
    }
  ],
 ```

and execute `composer require mycustomproviderext`. 



### Activate our extension in TYPO3

The next thing we have to do now, is to tell TYPO3 to install the new providerextension we just added to its system. You can do this by navigating to the extensionmanager in the backend where our extension „mycustomproviderext“ should be listed and ready to install. If you like the TYPO3Console better you should be good with `typo3cms install:generatepackagestates`.



### Include configuration to Template

For the last step we have to include the page configuration of our extension in TYPO3. Simply head to your backend, open template module, edit the whole template record and add „mycustomproviderext“ under the includes tab.

We assume you are either executing these steps in a freshly setup TYPO3 9 or familiar with the quirks of including extension templates and the order in which you want to include the templates. 

If you are executing these steps in  a new installation of TYPO3 be sure to delete or comment the page configuration provided in setup. 



### Include Page TSConfig (from extensions)

There is one more thing we need to do, which is heading to the root page in our TYPO3 (the globe) and edit the page properties. The tab „resources“ allows us to add TypoScript Configuration from the „available items“ list by clicking on it. Save. Close. DONE.



### Does it work?

You  can check by adding Content to your page in the backend. Most of the TYPO3 default content elements should not be listed anymore and you should see a new content element tab called „Custom Content Elements“ with the „Text with Image“ element displayed.
There is a basic frontend output now which should display all the content you put into your first „Text with Image“ element. Text is being displayed? Image is being displayed? No error occurred? GZ you just successfully set up your first provider extension with startpilot.


#### Thanks
* To Benjamin Kott and his Bootstrap Package

  https://github.com/benjaminkott/bootstrap_package
* To Georg Ringer for the start.sh script

    https://github.com/georgringer/modernpackage



## Further steps

### gulp workflow

To get the gulp workflow running we first need to run `npm install` in the `Build` directory. Therefore we need to open our CLI and navigate to our build folder first, then execute `npm install`.

1. `cd typo3conf/ext/startpilot/Resources/Build`

2. `npm install`

You can run the predefined npm tasks through your CLI by entering one of `npm run build`, `npm run ci` , `npm run start`. If you are using PhpStorm you also can use them by right clicking on the `package.json` and selecting „Show npm Scripts“. After configuring node with your PhpStorm simply double click one of the shown tasks to execute them.



`ci` 

executes linting tasks which run over your .scss and .js files. The settings for the linter are oriented on the TYPO3 coding guidelines. Additionally `ci` runs a formatter that fixes some of the minor linting errors.



`build`

gets your frontend ready once. If you only need to check on the frontend once (maybe after a system update) this task is what you are looking for.



`start`

gets your frontend ready and keeps watching for changes. If you are going to work on things continuously and you will check the frontend multiple times this task suits you.

### ce-gen

If you want to know how to use the content element generator, please check out the external repository's [documentation](https://github.com/Startpiloten/ce-gen).