# SVG Icons plugin for Craft CMS 3.x

Craft CMS Twig extension to include SVGs from the [Feather](https://feathericons.com/) and [Zondicons](https://www.zondicons.com/) SVG icon libraries directly in your templates.

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require monachilada/craft-svgicons

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for SVG Icons.

## Using SVG Icons

'icon-name'|feather or svgIcon('zondicons', 'icon-name')

For example `'cpu'|feather` would result in the following:

![Feather CPU](src/resources/icons/feather/cpu.svg =128x)

While `svgIcon('zondicons', 'announcement')` would result in:

![Zondicons announcement](src/resources/icons/zondicons/announcement.svg =128x)

## SVG Icons Roadmap

Some things to do, and ideas for potential features:

* Add more icon sets as requested

Brought to you by [Mike Pierce](https://michaelpierce.trade/)
