# Standards

This package is an easy-to-use all in one coding standards package. It allows you in just a few seconds to check your
code against the most popular tools in term of code quality and have a clear answer about: Are you a champion? Or do you
still need improve? (Don't worry if you're reading this, you're already a champion!)

# Installation

[Standards][1] is a package to use during your development process, you can install it using [Composer][2].

## Inside one project

Use composer to add the package as a dev dependency:

```
composer require --dev natepage/standards
``` 

You can now run the standards tools as:

```
cd my-project
php vendor/bin/standards
```

## Multiple projects

If you are working on multiple projects at the same time (which is surely the case for a champion), you can install
the package as a global dependency and run it in all your projects:

```
composer global require natepage/standards
```

To make your life easier you can set Standards as a local binary to have an handy way to run it from anywhere:

```
# If your operating system doesn't have /usr/local/bin/ create it
mkdir /usr/local/bin

# Create a symlink of standards in your local bin
ln -s ~/.composer/vendor/natepage/standards/bin/standards /usr/local/bin/standards
```

Then you can run it in your projects:

```
cd my-project
standards # Run standards tools

cd my-project2
standards # Run standards tools
```

# Tools

## Default tools

By default, Standards comes with a collection of tools ready to go and offers you an easy way to customise the different
options each tool can have. For any further information about those tools, please feel free to have a look directly at
their documentation.

- [PHPCPD][3]: Copy/Paste Detector (CPD) for PHP code
- [Paratest][4]: Parallel testing for PHPUnit
- [PHP_CodeSniffer][5]: Tokenize PHP, JavaScript and CSS files and detects violations of a defined set of coding standards
- [PHPMD][6]: Takes a given PHP source code base and look for several potential problems within that source
- [PHPStan][7]: PHP Static Analysis Tool - discover bugs in your code without running it
- [PHPUnit][8]: Run unit tests in PHP applications

## Your own tools

The default tools are not enough for the champion you are!? Standards provides you all the interfaces you need to easily
create your own tool and run on it on all your favourite projects.

_Documentation upcoming but you can have a look a `NatePage\Standards\Interfaces` if you feel like an adventure_

# Usage

## Standalone

Once you've required the package using composer, inside an existing project or as a global dependency, you can run the
tools on your code from your favourite terminal using the binary as follows:

```
# Using the link created by composer
cd my-project
php vendor/bin/standards

# Using the binary directly
cd my-project
php vendor/natepage/standards/bin/standards
```

## Existing Console

Standards is built on the top of the amazing [Symfony Console Component][9], and more specifically as a single command.
So if you already have an application using `symfony/console` and you want to add Standards to it, guess what...
You can!

```php
use NatePage\Standards\Commands\StandardsCommand;
use Symfony\Component\Console\Application;

$app = new Application();
$app->addCommand(new StandardsCommand());
```

# Configuration

Standards offers you all the flexibility you need via a large panel of options you can configure. Most of them have
default values you can override if you need to.

## Configuration file

If you want to override configuration every time you run Standards, you can create a `standards.yaml` file at the root
level of your project. Or if you installed Standards as a global dependency and you want to override configuration for
all your projects you can create this file as follows: `~/.composer/standards.yaml`.

Note that in the case the two files exist at the same time, the project one has the priority.

## Command Input Options

When running Standards, you can at runtime pass input option to override any exposed configuration.

```
standards --only=phpcs,phpmd --phpcs.show_sniff_name=false
``` 

To know more about all available input options simply use the `-h|-help` option to display to full list.

## Available Configuration

Config | Default | Description
-------|---------|------------
display-config | Display configuration used to run tools | true
exit-on-binary-missing | Exit on binary missing or not | false
exit-on-failure | Exit on failure or not | false
only | Comma separated list of tools to run | NULL
paths | Comma separated list of directories to run tools on | app,src,tests
phpcpd.enabled | Enable/Disable PHPCPD | true
phpcpd.min_lines | The minimum number of lines which need to be duplicated to count as copy/paste | 5
phpcpd.min_tokens | The minimum number of tokens which need to be duplicated to count as copy/paste | 70
phpcs.enabled | Enable/Disable PHPCS | true
phpcs.show_sniff_name | Whether to show the code sniffs name on report output | true
phpcs.standards | The standards to compare code against, will be ignored if phpcs.xml exists | %standards_path%/sniffs/NatePage
phpmd.enabled | Enable/Disable PHPMD | true
phpmd.rule_sets | The rulesets to use to determine issues, will be ignored if phpmd.xml exists | cleancode,codesize,controversial,design,naming,unusedcode
phpstan.enabled | Enable/Disable PHPStan | true
phpstan.reporting_level | The reporting level, 1 = loose, 7 = strict | 7
phpunit.config_file | Config file to use to run PHPUnit | phpunit.xml
phpunit.coverage_minimum_level | The minimum percentage of coverage to have, will be ignored if coverage check is disabled | 90
phpunit.enable_code_coverage | Enable/Disable code coverage | true
phpunit.enabled | Enable/Disable PHPUnit | true
phpunit.junit_log_path | The path to output junit parseable log file, can be relative, will be ignored if left blank | NULL
phpunit.paratest_processes_number | Number of processes to run when using paratest | 8
phpunit.test_directory | The directory containing tests, will be ignored it phpunit.xml exists in working directory | tests

[1]: https://github.com/natepage/standards
[2]: https://getcomposer.org/
[3]: https://github.com/sebastianbergmann/phpcpd
[4]: https://github.com/paratestphp/paratest
[5]: https://github.com/squizlabs/PHP_CodeSniffer
[6]: https://phpmd.org/
[7]: https://github.com/phpstan/phpstan
[8]: https://phpunit.de/
[9]: https://symfony.com/doc/current/components/console.html
