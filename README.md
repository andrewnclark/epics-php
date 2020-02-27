![PHP Composer](https://github.com/ianleckey/epics-php/workflows/PHP%20Composer/badge.svg)

# epics-php

## Installation

Currently pre-release so no git tags syncing with packagist. Specify `dev-dev` along with the composer require command:

`composer require ianleckey/epics-php dev-dev`

## Authentication

```php
$auth = new Epics\Auth('email', 'password');
```

## Teams

The following properties are available in `Team` objects:

| Property | Description |
| --- | --- |
| id | (int) Epics team ID |
| country | (string) ISO 3166-1 alpha-2 two character country code (lowercase) |
| name | (string) Team name |
| active | (boolean) |
| images | (array) team_banner and team_logo images |
| shortName | (string) Short team name, i.e. "NiP" |
| manager | (string) Team manager. Not incredibly useful yet as this seems to always be "N/A" |
| dob | (string) Date the team was founded. YYYY-MM-DD |


To get all teams, call the `getAllTeams()` static method of the Team class:

```php
$teams = Epics\Team::getAllTeams();
```

To get a single team, pass the team ID into the Team class constructor:

```php
$team = new Epics\Team(1);
```

**Note:** `getAllTeams()` will return live, uncached data. Whereas (if caching is enabled), `new Epics\Team(1)` will return a team from the currently cached team data. Any time `getAlLTeams()` is called however, the local cache will be updated.
