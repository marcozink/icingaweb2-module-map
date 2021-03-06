# Map module for Icinga Web 2

#### Table of Contents

1. [About](#about)
2. [License](#license)
3. [Support](#support)
4. [Requirements](#requirements)
5. [Installation](#installation)
6. [Configuration](#configuration)
7. [FAQ](#faq)
8. [Thanks](#thanks)
9. [Contributing](#contributing)

## About

This module displays host objects as markers on [openstreetmap](https://www.openstreetmap.org) using [leaflet.js](http://leafletjs.com/). If you configure multiple hosts with the same coordinates, i.e. servers in a datacenter, a clustered view is rendered.

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/clustered-map.png" alt="Clustered map" height="300">

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/clustered-map2.png" alt="Clustered map" height="300">

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/detailed-map.png" alt="Detailed map" height="300">

In order to locate a specific host on the map, you can use the custom host action:

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/host-action.png" alt="Host action" height="100">

The map module is directly integrated into the detail view in Icinga Web 2:

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/tab-view.png" alt="Host detail view" height="300">

If you click on the host marker, a popup shows a service list and their current hard states.

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/host-details.png" alt="Host detail view" height="300">

You could also integrate a map as dashlet into your dashboards:

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/dashboard.png" alt="Map as a dashlet" height="300">

## License

Icinga Web 2 and this Icinga Web 2 module are licensed under the terms of the GNU General Public License Version 2, you will find a copy of this license in the LICENSE file included in the source package.

This module uses Leaflet and several plugins:

* [Leaflet](https://github.com/Leaflet/Leaflet) - BSD 2-clause "Simplified" License
* [Leaflet.markercluster](https://github.com/Leaflet/Leaflet.markercluster) - MIT license
* [Leaflet.Locate](https://github.com/domoritz/leaflet-locatecontrol) - MIT license
* [Leaflet.EasyButton](https://github.com/CliffCloud/Leaflet.EasyButton) - MIT license
* [Leaflet.Spin](https://github.com/makinacorpus/Leaflet.Spin) - MIT license
* [Spin.js](spin.js.org) - MIT license

## Support

Join the [Icinga community channels](https://www.icinga.com/community/get-involved/) for questions.

## Requirements

* [Icinga Web 2](https://www.icinga.com/products/icinga-web-2/) (>= 2.4.1)


## Installation

Extract this module to your Icinga Web 2 modules directory as `map` directory.

Git clone:

```
cd /usr/share/icingaweb2/modules
git clone https://github.com/nbuchwitz/icingaweb2-module-map.git map
```


Tarball download (latest [release](https://github.com/nbuchwitz/icingaweb2-module-map/releases/latest)):

```
cd /usr/share/icingaweb2/modules
wget https://github.com/nbuchwitz/icingaweb2-module-map/archive/v1.0.0.zip
unzip v1.0.0.zip
mv icingaweb2-module-map-1.0.0 map
```

### Enable Icinga Web 2 module

Enable the module in the Icinga Web 2 frontend in `Configuration -> Modules -> map -> enable`.
You can also enable the module by using the `icingacli` command:

```
icingacli module enable map
```

## Configuration

### Module

Configure the default coordinates and the zoom levels inside Configuration -> Modules -> map where you navigate to the configuration tab.

<img src="https://github.com/nbuchwitz/icingaweb2-module-map/raw/master/screenshots/configuration-tab.png" alt="Configuration Tab" height="300">


### Add coordinates to a host object in Icinga 2

Add a custom attribute called `geolocation` to any host you want to display on the map. Its value consists of WGS84 coordinates in the following format:

```
vars.geolocation = "<latitude>,<longitude>"
```

Example:

```
object Host "db-in-la" {
  check_command = "hostalive"
  address = "192.168.33.5"
  vars.geolocation = "34.052234,-118.243685"
}
```

## FAQ

### Change default parameters per map

It's possible to change the parameters ``default_zoom``, ``default_long`` and ``default_lat`` for a map by adding the parameters to the url:

```map?default_zoom=20&default_long=13.370324&default_lat=52.500859```

### Show host coordinates inside the map

In order to highlight the host's coordinate, hold the CTRL key and click on the desired map location.


## Thanks

This module borrows a lot from https://github.com/Mikesch-mp/icingaweb2-module-globe.

## Contributing

There are many ways to contribute to the Icinga Web module for Maps --
whether it be sending patches, testing, reporting bugs, or reviewing and
updating the documentation. Every contribution is appreciated!


Please continue reading in the [contributing chapter](CONTRIBUTING.md).
