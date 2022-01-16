# Contributing

Contributions are encouraged and welcome; I am always happy to get feedback or pull requests
on [GitLab](https://gitlab.com/stelgenhof/opensubtitles).

When contributing there are a few guidelines I would like you to keep in mind:

## Pull Requests

- **[PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)**
  Please use the following command after you have completed your work:

  ``` bash
  $ composer format
  ```

  This will check/correct all the code for the PSR-12 Coding Standard using the
  wonderful [php-cs-fixer](https://cs.symfony.com).

- **Add unit tests!** - Your Pull Request won't be accepted if it does not have tests:

- **Document any change** - Make sure the `README.md`, `CHANGELOG.md` and any other relevant documentation are kept
  up-to-date.

- **One pull request per feature** - If you want to contribute more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make
  multiple intermediate commits while developing,
  please [squash them](https://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#_changing_multiple) before
  submitting.

## Running Tests

``` bash
$ composer test
```

or alternatively run with:

``` bash
$ vendor/bin/phpunit
```
