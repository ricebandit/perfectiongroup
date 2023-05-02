[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

### Requirements

Node v14.19.3

### Setup

```sh
$ npm install
```

### OVERALL STRUCTURE OF WORDPRESS SET UP:

build - Core WP files - wp-content

source - .git - .gitignore - package.json - src - Copy of WP Core files - dev-scripts - copy.js - scss

### OVERALL WORKFLOW

All Development should be from the "source" directory, with Visual Studio Code watchinhg for Sass changes. After each save, Live Watch will compile and save style.css in the src directory.

Template files and folders can be added as needed.

When ready to preview, npm run copy. This will copy all files and directories into build/wp-content/themes/customtheme

This set up will allow you to use Node and migrate WP from local to server without having to move node_modules & git files/folders.

CAVEAT! Deleting a file from your src directory will not remove it from the compiled version, so you will need to remove it manually.

### SOURCE FOLDER

- cd to source directory

src/dev-scripts/copy.js, change themeName

npm run copy

If Bootstrap will be used (or any other package with CSS, for that matter), install via NPM

### SET UP SASS

Sass files should live in the src/dev-scripts directory

If Visual Studio Code, there's a SASS watcher that waits for changes and auto-compiles when SCSS files are saved.

Search for "Live Sass Compiler" extension

Settings can be applied for User & Workspaces. In this case, apply the below settings to Workspace. Click on the Extensions tab on the left-most column (square grid icon). Click on the cog wheel to the right of the Live Sass Compiler listing.

"liveSassCompile.settings.formats":[
{
"format": "compressed",
"extensionName": ".css",
"savePath": "/src"
}
]

Work Space = Project
User = Global/App-wide

### SASS Files

Open src/dev-scripts/style.scss

By default this boilerplate assumes Bootstrap will be used and is pointing to those SCSS files in the compile. (I left this in so you won't have to find the path to node_modules)
