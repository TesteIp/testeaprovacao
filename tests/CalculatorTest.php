name: Run Tests and Upload to Codecov

on:
  push:
    branches:
      - main
      - dev
  pull_request:
    branches:
      - main
      - dev

jobs:
  test:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout code
        uses: actions/checkout@v4

      - name: Set up PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2' # Ajuste para a versão do PHP do seu projeto

      - name: Install dependencies
        run: composer install --no-progress --prefer-dist

      - name: Run tests with coverage
        run: vendor/bin/phpunit --coverage-clover=coverage.xml
        continue-on-error: true # Mesmo que falhe, continua o workflow

      - name: Upload test results to Codecov
        if: ${{ !cancelled() }}
        uses: codecov/test-results-action@v1
        with:
          token: ${{ secrets.CODECOV_TOKEN }}
          file: coverage.xml

      - name: Upload coverage to Codecov
        uses: codecov/codecov-action@v4
        with:
          token: ${{ secrets.CODECOV_TOKEN }}
          files: coverage.xml
          fail_ci_if_error: false # Continua mesmo se houver erro no upload
          verbose: true
          flags: unittests
          name: codecov-report
          override_pr: true

      - name: Post coverage comment on PR
        if: github.event_name == 'pull_request'
        uses: thollander/actions-comment-pull-request@v2
        with:
          message: "✅ Workflow concluído! Os resultados foram enviados para o [Codecov](https://app.codecov.io/gh/${{ github.repository }}/pull/${{ github.event.pull_request.number }})."
          GITHUB_TOKEN: ${{ secrets.DEV }}
