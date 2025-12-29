## Overview

This is the Adyen PHP API Library, providing PHP developers with an easy way to interact with the Adyen API. The library is a wrapper around the Adyen API, with services and models generated from OpenAPI specifications.

## Code Generation

A significant portion of this library, particularly the API services and models, is automatically generated.

- **Engine**: We use [OpenAPI Generator](https://openapi-generator.tech/) with custom [Mustache](https://mustache.github.io/) templates to convert Adyen's OpenAPI specifications into PHP code.
- **Templates**: The custom templates are located in the `/templates` directory. These templates are tailored to generate models and services that integrate with our custom HTTP client and overall library structure.
- **Automation**:
    - **Centralized**: The primary generation process is managed in a separate repository, [`adyen-sdk-automation`](https://github.com/Adyen/adyen-sdk-automation). Changes to the OpenAPI specs trigger a GitHub workflow in that repository, which generates the code and opens Pull Requests in this library.
    - **Local**: For development and testing, you must use the [`adyen-sdk-automation`](https://github.com/Adyen/adyen-sdk-automation) repository.

### Local Code Generation

To test new features or changes to the templates, you must run the generation process from a local clone of the `adyen-sdk-automation` repository.

1.  **Clone the automation repository**:
    ```bash
    git clone https://github.com/Adyen/adyen-sdk-automation.git
    ```

2.  **Link this library**: The automation project needs to target your local clone of `adyen-php-api-library`. From inside the `adyen-sdk-automation` directory, run the following commands. This will replace the `php/repo` directory with a symlink to your local project. For example, if you cloned both repositories in the same parent directory:
    ```bash
    rm -rf php/repo
    ln -s ../adyen-php-api-library php/repo
    ```

3.  **Run the generator**: You can now run the Gradle commands to generate code.
    - **To generate all services for the PHP library**:
      ```bash
      ./gradlew :php:services
      ```
    - **To generate a single service (e.g., Checkout)**:
      ```bash
      ./gradlew :php:checkout
      ```
    - **To clean the repository before generating**:
      ```bash
      ./gradlew :php:cleanRepo :php:checkout
      ```

## Core Components

- **`Adyen\Client`**: The main class for configuring the library (API key, environment, etc.) and making API calls. It acts as the entry point for accessing different services.
- **`Adyen\HttpClient\ClientInterface`**: An interface for the HTTP client, allowing developers to inject their own client implementation.
- **`Adyen\HttpClient\CurlClient`**: The default HTTP client implementation using cURL.
- **`Adyen\Service\*`**: This directory contains the generated service classes (e.g., `Checkout`, `Management`) that expose methods for specific API endpoints.
- **`Adyen\Model\*`**: This directory contains the generated model classes used for request and response data structures, ensuring type safety and easier object construction.

## Development Workflow

This project uses [Composer](https://getcomposer.org/) for dependency management and [PHPUnit](https://phpunit.de/) for testing.

### Setup

To install the library and its development dependencies, run:
```bash
composer install
```

### Running Tests

You can run the unit tests using the following command:
```bash
vendor/bin/phpunit
```
This command executes the test suite defined in `phpunit.xml`. For some tests to pass, you may need to configure your test credentials in `tests/config/test.ini`, as described in the main `README.md`.

## Release Process

The release process is automated via GitHub Actions. When a release is triggered:
1.  A script determines the next version number (major, minor, or patch).
2.  The `src/Adyen/Client.php` and `README.md` are updated.
3.  A pull request is created with the version bump for review.
4.  Once merged, a GitHub release is created, and the new version is published to [Packagist](https://packagist.org/packages/adyen/php-api-library).
